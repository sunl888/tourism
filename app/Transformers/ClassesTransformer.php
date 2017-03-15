<?php

namespace App\Transformers;

use App\Models\Classes;
use League\Fractal\TransformerAbstract;

class ClassesTransformer extends TransformerAbstract
{
    /**
     * Related models to include in this transformation.
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * Turn this item object into a generic array.
     *
     * @param Classes $classes
     * @return array
     */
    public function transform(Classes $classes)
    {
        return [
            // attributes
            'id' =>$classes->id,
            'title' =>$classes->title,
            'slug' =>$classes->slug,
            'is_top_menu' =>$classes->is_top_menu
        ];
    }
}
