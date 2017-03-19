<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebInfo extends Model
{
    protected $table = 'web_info';
    protected $fillable = ['name','copyright','case_number','address','phone'];
}
