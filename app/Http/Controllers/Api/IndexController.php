<?php
/**
 * Created by PhpStorm.
 * User: wqer
 * Date: 2017/3/3
 * Time: 19:58
 */

namespace app\Http\Controllers\Api;

use App\Models\Classes;
use App\Transformers\ClassesTransformer;
use App\Http\Controllers\Api\ApiController;

class IndexController extends ApiController
{

    public function classList()
    {
        return $this->response()->item(Classes::all(), new ClassesTransformer);
    }
}