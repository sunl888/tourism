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

            // links
            'links' => [
                [
                    'rel' => 'self',
                    'href' => url('path/to/resource'),
                ],
            ]
        ];
    }
}
