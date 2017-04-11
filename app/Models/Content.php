<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];
    protected $primaryKey = 'article_id';
    protected $fillable = ['content','article_id','photos'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
