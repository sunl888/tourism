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
use App\Transformers\ArticleTransformer;

class IndexController extends ApiController
{

    /**
     * 获取栏目列表
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

    /**
     * 获取文章列表
     * @param $offset 偏移量
     * @param $limit 每页显示记录数
     */
    public function getArticles($offset=0, $limit=10)
    {
        $articles = Article::with('user')
            ->with('content')
            ->Audited()
            ->Sort()
            ->Page($offset, $limit)
            ->get();
        return $this->response()->collection($articles, new ArticleTransformer());
    }

    /**
     * 通过文章slug获取文章详情
     * @param $slug
     * @return \Dingo\Api\Http\Response
     */
    public function getArticleBySlug($slug)
    {
        $article = Article::where(['slug'=>$slug])->limit(1)->get();
        return $this->response()->collection($article, new ArticleTransformer());
    }

}