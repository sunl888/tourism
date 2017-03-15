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
use League\Fractal\Resource\Collection;
use Tymon\JWTAuth\Facades\JWTAuth;

class IndexController extends ApiController
{

    /**
     *
     * @return array
     */
    public function getClasses()
    {
        $classes = Classes::all()->toArray();
        foreach ($classes as $item =>$val)
        {
            if($val['parent_id']){
                $classes[$val['parent_id']-1]['child'][] = $val;
                unset($classes[$item]);
            }
        }
        return $classes;
    }
}