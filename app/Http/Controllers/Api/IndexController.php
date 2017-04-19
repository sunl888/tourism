<?php
/**
 * Created by PhpStorm.
 * User: wqer
 * Date: 2017/3/3
 * Time: 19:58
 */

namespace app\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Classes;
use App\Http\Controllers\Api\ApiController;
use App\Models\Link;
use App\Models\Traits\TourismTrait;
use App\Models\WebInfo;
use App\Transformers\ArticleTransformer;

class IndexController extends ApiController
{
    use TourismTrait;

    /**
     * 获取某个栏目下的文章列表
     * @param $classes 栏目id
     * @param $offset 偏移量
     * @param $limit 每页显示记录数
     */
    public function getArticles($classes = 0, $offset = 0, $limit = 10)
    {
        $classes = $this->getChildClass($classes);
        $articles = Article::with('user')
            ->with('content')
            ->Audited()
            ->Sort()
            ->Classes($classes)
            ->Page($offset, $limit)
            ->get();
        //dd($articles->toArray());
        return $this->response()->collection($articles, new ArticleTransformer());
    }


    /**
     * 通过文章slug获取文章详情
     * @param $slug
     * @return \Dingo\Api\Http\Response
     */
    public function getArticleBySlug($slug)
    {
        //get取的值是一个集合，first和find取得值不是集合
        $article = Article::where(['slug' => $slug])->Audited()->with('user')->with('content')->first();
        $article->views++;
        $article->save();
        return $this->response()->item($article, new ArticleTransformer());
    }

    /**
     * 获取所有的友情链接
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getLinks()
    {
        return Link::all();
    }

    /**
     * 获取网站信息
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getWebInfo()
    {
        return WebInfo::all();
    }


}