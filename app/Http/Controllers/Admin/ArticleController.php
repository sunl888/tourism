<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Overtrue\LaravelPinyin\Facades\Pinyin;

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
        $article = $request->except('content');
        $article['slug'] = Pinyin::abbr($article['title']);
        $article['user_id'] = Auth::id();
        $article['status'] = 0;
        $article['views'] = 0;
        $article['source'] = "原创文章";
        $article = Article::create($article);
        $article = $article->toArray();

        $content['article_id'] = $article['id'];
        $content['content'] = $request->get('content');
        $content['cover'] = $request->get('cover');
        Content::create($content);
        return redirect('article');
    }

    public function update(Request $request)
    {
        $post = $request->all();
        $article = Article::find($request->get("article_id"));

        $article->slug = Pinyin::abbr($post['title']);
        $article->user_id = Auth::id();
        $article->sort = $post['sort'];
        $article->title = $post['title'];
        $article->source = "原创文章";
        $article->update();

        $content = Content::where(['article_id'=>$post['article_id']])->first();
        $content->content = $post['content'];
        $content->cover = isset($post['cover'])?$post['cover']:null;
        $content->update();
        return redirect('article');
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
