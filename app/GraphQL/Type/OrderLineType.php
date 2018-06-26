<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use App\Order;
use App\Product;

class OrderLineType extends GraphQLType
{
    protected $attributes = [
        'name' => 'OrderLine',
        'description' => 'Order Line Items'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the order line item'
            ],
            'order' => [
                'type' => GraphQL::type('Order'),
                'description' => 'The Order that this line item belongs to'
            ],
            'product' => [
                'type' => GraphQL::type('Product'),
                'description' => 'The Product in this line item'
            ],
            'quantity' => [
                'type' => Type::int(),
                'description' => 'The number of products added to this line item'
            ],
            'orderdate' => [
                'type' => Type::string(),
                'description' => 'The date this line item was added'
            ]
        ];
    }

    public function resolveOrderField($root, $args)
    {
      return Order::where('id', $root->orderid)->first();
    }

    public function resolveProductField($root, $args)
    {
      return Product::where('id', $root->prod_id)->first();
    }

}
