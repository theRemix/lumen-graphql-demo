<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Category;

class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'categories'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Category'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'name' => ['name' => 'name', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Category::where('id' , $args['id'])->get();
        } else if(isset($args['name'])) {
            return Category::where('name', $args['name'])->get();
        } else {
            return Category::all();
        }
    }
}
