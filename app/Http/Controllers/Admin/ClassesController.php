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
    protected $redirectSuccessUrl = 'column';
    use TourismTrait;

    public function show()
    {
        return $this->getClasses();
    }

    public function store(Request $request)
    {
        try{
            $validator = $this->validater($request);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            Classes::create($validator->valid());
            return $this->redirect();
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
    /*public function store(ClassesRequest $request)
    {
        try{
            Classes::create($request->only('title','slug','parent_id'));
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
        return $this->redirect();
    }*/

    public function update(Request $request)
    {
        try{
            $validator = $this->validater($request);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            $classes = Classes::find($request->get('parent_id'));
            $classes->title = $request->get('title');
            $classes->slug = $request->get('slug');
            $classes->save();

            return $this->redirect();

        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    public function delete($id)
    {
        Classes::destroy($id);
        return $this->redirect();
    }

    protected function redirect()
    {
        return redirect($this->redirectSuccessUrl);
    }

    public function validater($request)
    {
        $validator = Validator::make($request->input(),[
            'title'=>'required',
            'is_top_menu'=>'numeric',
            'slug' =>'alpha_dash',
            //'parent_id' =>'alpha_dash'
        ],[
            'title.required'=>'标题为必填项。',
            'is_top_menu.nemeric'=>'类型必须是数值。',
            'slug.alpha_dash' =>'slug必须是字母或数字。',
            //'parent_id.nemeric' =>'父级id必须是数字。'
        ]);
        return $validator;
    }
}
