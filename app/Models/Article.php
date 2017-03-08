<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = ['title','slug','class_id','user_id','views','source','sort'];

    //文章详情与内容一一对应
    public function content()
    {
        return $this->hasOne('App\Models\Content');
    }
    //一篇文章对应一个作者
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    //一篇文章对应一个菜单
    public function classes()
    {
        return $this->belongsTo('App\Models\Classes');
    }
    //查看已审核文章
    public function scopeAudited($query)
    {
        return $query->where('status',1);
    }
    //按照sort降序，sort相等按添加时间降序排序
    public function scopeSort($query)
    {
        return $query->where(['sort'=>'desc','create_at'=>'desc']);
    }
    //

}
