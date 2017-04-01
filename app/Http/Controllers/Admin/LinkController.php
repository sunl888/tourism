<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    /**
     * 显示友情链接
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function show()
    {
        return Link::all();
    }

    /**
     * 添加友情链接
     * @param Request $request
     * @throws \Exception
     */
    public function store(Request $request)
    {
        try{
            $validator = $this->validater($request);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            Link::create($validator->valid());
        }catch(\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * 更新友情链接
     * @param $id
     * @param Request $request
     * @throws \Exception
     */
    public function update($id, Request $request)
    {
        try{
            $validator = $this->validater($request);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            $link = Link::findOrFail($id);
            $link->update($validator->valid());
        }catch(\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * 验证
     * @param $request
     * @return mixed
     */
    public function validater($request)
    {
        $validator = Validator::make($request->input(),[
            'title'=>'required',
            'url'=>['required','url']
        ],[
            'title.required'=>'标题为必填项。',
            'url.required'=>'url为必填项',
            'url.url'=>'url不合法.'
        ]);
        return $validator;
    }

    /**
     * 删除友情链接
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return Link::destroy($id);
    }
}
