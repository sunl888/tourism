<?php

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;
//use App\Entities\Articles;

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
            'auther' =>$model->user->name,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
