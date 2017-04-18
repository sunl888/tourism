<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Content;
use App\Models\Link;
use App\Models\Traits\TourismTrait;
use App\Models\WebInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use TourismTrait;

    public function index()
    {
        return view('admin.index',['webinfo'=>WebInfo::first()]);
    }

    public function main()
    {
        //所有文章
        $articles = Article::Audited()->get()->toArray();
        //文章总浏览量
        $views = array_sum(array_column($articles, 'views'));
        //获取网站信息
        $webinfo = WebInfo::first()->toArray();

        return view('admin.main',['articles' =>$articles,'views'=>$views,'webinfo'=>$webinfo]);
    }

    public function column()
    {
        $classes = $this->getClasses();
        return view('admin.column',['classes'=>$classes]);
    }

    public function article()
    {
        $articles = Article::Sort()->get();
        return view('admin.article',['articles'=>$articles]);
    }
    public function link()
    {
        $links = Link::orderBy('created_at','desc')->get();
        return view('admin.link',['links'=>$links]);
    }
    public function mine()
    {
        return view('admin.mine');
    }
    public function webset()
    {
        $webset = WebInfo::first();
        return view('admin.webset',['webset'=>$webset]);
    }
    public function addArticle()
    {
        $classes = $this->getClasses();
        return view('admin.addArticle',['classes'=>$classes]);
    }
    public function updateArticle($article_id)
    {
        $article = Article::find($article_id);
        $content = Content::where(['article_id'=>$article->id])->get()->toArray();
        $classes = $this->getClasses();
        //dd(htmlentities($content[0]['content']));
        return view('admin.updateArticle',['article'=>$article,'content'=>$content,'classes'=>$classes]);
    }
}
