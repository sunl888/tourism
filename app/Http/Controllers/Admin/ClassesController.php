<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClassesRequest;
use App\Models\Classes;
use App\Models\Traits\TourismTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class ClassesController extends Controller
{
    use TourismTrait;

    public function show()
    {
        return $this->getClasses();
    }

    /*public function store(Request $request)
    {
        try{
            $validator = $this->validator($request);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            Classes::create($validator->valid());
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }*/
    public function store(ClassesRequest $request)
    {
        return Classes::create($request->input());
    }

    public function update($id, Request $request)
    {
        try{
            $validator = $this->validater($request);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            $classes = Classes::findOrFail($id);
            $classes->update($validator->valid());
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    public function delete($id)
    {
        return Classes::destroy($id);
    }

    public function validater($request)
    {
        $validator = Validator::make($request->input(),[
            'title'=>'required',
            'is_top_menu'=>'numeric',
            'parent_id'=>'numeric',
        ],[
            'title.required'=>'标题为必填项。',
            'is_top_menu.nemeric'=>'类型必须是数值。',
            'parent_id.nemeric'=>'类型必须是数值。'
        ]);
        return $validator;
    }
}
