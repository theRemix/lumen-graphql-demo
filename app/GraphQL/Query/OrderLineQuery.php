<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\OrderLine;

class OrderLineQuery extends Query
{
    protected $attributes = [
        'name' => 'order_line_items'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('OrderLine'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'order_id' => ['name' => 'order_id', 'type' => Type::int()],
            'product_id' => ['name' => 'product_id', 'type' => Type::int()],
            'first' => ['name' => 'first', 'type' => Type::int()]
        ];
    }

    public function resolve($root, $args, $context, $info)
    {
        $fields = $info->getFieldSelection($depth = 3);

        $query = OrderLine::query();

        foreach ($fields as $field => $keys) {
            if ($field === 'order_id') {
                $query = $query->with('order');
            } else if ($field === 'product_id') {
                $query = $query->with('product');
            }
        }

        if (isset($args['id'])) {
            $query = $query->where('id' , $args['id']);
        }

        if(isset($args['first'])) {
            return $query->paginate($args['first']);
        } else {
            return $query->get();
        }
    }
}
