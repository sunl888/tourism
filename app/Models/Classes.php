<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'class';
    //黑名单 包含你不想被赋值的属性数组
    protected $guarded = [];

}
