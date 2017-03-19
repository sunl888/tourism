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
        foreach ($classes as $item => $val) {
            if ($val['parent_id']) {
                $classes[$val['parent_id'] - 1]['child'][] = $val;
                unset($classes[$item]);
            }
        }
        return $classes;
    }

    /**
     * 获取某个栏目下的文章列表
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
        return $this->response()->collection($articles, new ArticleTransformer());
    }

    /**
     * 通过文章slug获取文章详情
     * @param $slug
     * @return \Dingo\Api\Http\Response
     */
    public function getArticleBySlug($slug)
    {
        $article = Article::where(['slug' => $slug])->limit(1)->get();
        return $this->response()->collection($article, new ArticleTransformer());
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
     * 获取该类别的id以及其子类别id
     * @param int $class_id
     * @return array
     */
    public function getChildClass($class_id = 0)
    {
        $result = array();
        /*$classes = $this->getClasses();
        foreach ($classes as $item) {

            if ($item['id'] == $class_id) {
                if (!isset($item['child'])) {
                    $result[] = $item['id'];
                    break;
                } else {
                    $result[] = $item['id'];
                    foreach ($item['child'] as $val) {
                        $result[] = $val['id'];
                    }
                    break;
                }
            }
        }*/
        $classes = Classes::all()->toArray();
        foreach ($classes as $item){
            if($item['id'] ==$class_id || $item['parent_id'] ==$class_id){
                $result[] = $item['id'];
            }
        }
        return $result;
    }
}