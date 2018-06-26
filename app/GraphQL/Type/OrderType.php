<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use App\Customer;
use App\OrderLine;

class OrderType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Order',
        'description' => 'Customer Orders'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the order'
            ],
            'order_line_items' => [
                'type' => Type::listOf(GraphQL::type('OrderLine')),
                'description' => 'The customer\'s Order'
            ],
            'orderdate' => [
                'type' => Type::string(),
                'description' => 'The date of the order'
            ],
            'customer' => [
                'type' => GraphQL::type('Customer'),
                'description' => 'The customer who created the Order'
            ],
            'netamount' => [
                'type' => Type::float(),
                'description' => 'The net amount of the order'
            ],
            'tax' => [
                'type' => Type::float(),
                'description' => 'The tax applied to the order'
            ],
            'totalamount' => [
                'type' => Type::float(),
                'description' => 'The total amount of the order'
            ]
        ];
    }

    public function resolveCustomerField($root, $args)
    {
      return Customer::where('id', $root->customerid)->first();
    }

    public function resolveOrderLineItemsField($root, $args)
    {
      return OrderLine::where('orderid', $root->orderid)->get();
    }

}
