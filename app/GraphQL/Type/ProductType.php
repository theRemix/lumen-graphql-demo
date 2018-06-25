<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'Movies'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the product'
            ],
            'category' => [
              'args' => [
                'id' => ['name' => 'id', 'type' => Type::int()],
                'name' => ['name' => 'name', 'type' => Type::string()]
              ],
              'type' => Type::nonNull(GraphQL::type('Category')),
              'description' => 'The category/genre of the movie'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of the movie'
            ],
            'actor' => [
                'type' => Type::string(),
                'description' => 'The actor in the movie'
            ],
            'price' => [
                'type' => Type::float(),
                'description' => 'The price of the movie'
            ],
            'special' => [
                'type' => Type::int(),
                'description' => '@TODO not sure what this is'
            ],
            'common_prod_id' => [
                'type' => Type::int(),
                'description' => '@TODO not sure what this is'
            ]
        ];
    }

    public function resolveCategoryField($root, $args)
    {
        if (isset($args['id'])) {
            return $root->categories->where('id', $args['id'])->get();
        } else if(isset($args['name'])) {
            return $root->categories->where('name', $args['name'])->get();
        } else {
            return $root->categories;
        }
    }

}
