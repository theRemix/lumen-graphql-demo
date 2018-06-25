<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\DB;
use Folklore\GraphQL\Support\Query;
use App\GraphQL\Query\ResolveInfo;
use App\Product;

class ProductQuery extends Query
{
    protected $attributes = [
        'name' => 'products'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'title' => ['name' => 'title', 'type' => Type::string()],
            'actor' => ['name' => 'actor', 'type' => Type::string()],
            'price' => ['name' => 'price', 'type' => Type::float()],
            'first' => ['name' => 'first', 'type' => Type::int()]
        ];
    }

    public function resolve($root, $args, $context, $info)
    {
        DB::enableQueryLog();
        $fields = $info->getFieldSelection($depth = 3);

        $products = Product::query();

        foreach ($fields as $field => $keys) {
            if ($field === 'category') {
                $products->with('category');
            }
        }

        if (isset($args['id'])) {
            $query = $products->where('id' , $args['id'])->get();
        } else if(isset($args['title'])) {
            $query = $products->where('title', $args['title'])->get();
        } else if(isset($args['actor'])) {
            $query = $products->where('actor', $args['actor'])->get();
        } else if(isset($args['price'])) {
            $query = $products->where('price', $args['price'])->get();
        } else if(isset($args['first'])) {
            $query = $products->paginate($args['first']);
        } else {
            $query = $products->get();
        }

        dd(DB::getQueryLog());
        return $query;
    }
}
