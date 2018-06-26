<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Order;

class OrderQuery extends Query
{
    protected $attributes = [
        'name' => 'orders'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Order'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'first' => ['name' => 'first', 'type' => Type::int()]
        ];
    }

    public function resolve($root, $args, $context, $info)
    {
        $fields = $info->getFieldSelection($depth = 3);

        $query = Order::query();

        foreach ($fields as $field => $keys) {
            if ($field === 'customer') {
                $query = $query->with('customer');
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
