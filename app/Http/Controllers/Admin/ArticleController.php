<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function lists($offset,$limit)
    {
        $articles = Article::with('content')->Sort()->Page($offset, $limit)->get();
        return $articles;
    }

    /**
     * 文章审核
     * @param string $slug
     * @param int $status
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function audit($slug = '', $status = 0)
    {
        $crdi['slug'] =$slug;
        $crdi['status'] =$status;
        $validator = Validator::make($crdi,[
            'status' =>'required|in:1,0,-1',
            'slug' =>'required',
        ]);
        if($validator->fails()){
            throw new \Exception($validator->errors()->first());
        }
        unset($crdi['slug']);
        Article::where(['slug'=>$slug])->update($crdi);
       return redirect('article');
    }

    /**
     * 删除文章
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($slug)
    {
        $article = Article::where(['slug'=>$slug])->firstOrFail()->toArray();

        if(!Article::where(['slug'=>$slug])->first()->delete()){
            return response()->redirectTo('article')->with(['message'=>'删除失败。']);
        }
        Content::destroy(['article_id'=>$article['id']]);
        return redirect('article');
    }

    public function store(Request $request)
    {
        
        dd($request->all());
    }

    protected function credentials(Request $request)
    {
        return $request->only('title', 'content');
    }

    protected function validater($request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
        ],[
            'title.required'=>'标题为必填项。',
        ]);
        return $validator;
    }

}
