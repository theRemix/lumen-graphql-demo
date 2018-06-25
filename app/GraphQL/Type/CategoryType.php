<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'description' => 'Movie Categories or Genres'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the category'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the category'
            ],
            'first' => [
                'type' => Type::int(),
                'description' => 'Pagination limit'
            ]
        ];
    }

}
