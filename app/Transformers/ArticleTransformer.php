<?php

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;

/**
 * Class ArticlesTransformer
 * @package namespace App\Transformers;
 */
class ArticleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Articles entity
     * @param \Articles $model
     *
     * @return array
     */
    public function transform(Article $model)
    {
        return [
            'id'         => (int) $model->id,
            /* place your other model properties here */
            'title' =>$model->title,
            'slug' =>$model->slug,
            'views' =>$model->views,
            'source' =>$model->source,
            'content' =>$model->content->content,
            'photos' =>$model->content->photos,
            'auther' =>$model->user['username'],
            'parent' =>$model->class['parent']['title'],
            'child' =>$model->class['child']['title'],
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
