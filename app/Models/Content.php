<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = ['content','article_id','photos'];

    public function article()
    {
        return $this->belongsTo('App\Models\User');
    }

}
