<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Exception;

class WebInfoController extends Controller
{
    public function show()
    {
        return WebInfo::findOrFail();
    }

    /**
     * 更新网站配置信息
     * @param Request $request
     * @param int $id
     * @throws \Exception
     */
    public function update(Request $request)
    {
        //validate
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'copyright' => 'required',
                'case_number' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ]);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            $webinfo = WebInfo::first();
            $webinfo->update($validator->valid());
            return redirect('webset');
        }catch(Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * 删除配置信息
     * @param $id
     * @return bool|null
     */
    public function delete($id)
    {
        return WebInfo::destroy($id);
    }
}
