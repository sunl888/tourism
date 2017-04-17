<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;

    /**
     * 指定表的名字
     *
     * @var string
     */
    protected $table = 'class';

    /**
     * 黑名单 包含你不想被赋值的属性数组
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public static function getClass($class_id = 0){
        $result = array();
        $classes = self::find($class_id)->toArray();
        if($classes['parent_id']){
            $result['parent'] = self::where(['id'=>$classes['parent_id']])->first()->toArray();
            $result['child'] = $classes;
        }else{
            $result['parent'] = $classes;
        }
        return $result;
    }
}
