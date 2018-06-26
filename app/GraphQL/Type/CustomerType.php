<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class CustomerType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Customer',
        'description' => 'A Customer'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the customer'
            ],
            'firstname' => [
              'type' => Type::string(),
              'description' => 'The customer\'s first name'
            ],
            'lastname' => [
              'type' => Type::string(),
              'description' => 'The customer\'s last name'
            ],
            'address1' => [
              'type' => Type::string(),
              'description' => 'The customer\'s address line 1'
            ],
            'address2' => [
              'type' => Type::string(),
              'description' => 'The customer\'s address line 2'
            ],
            'city' => [
              'type' => Type::string(),
              'description' => 'The customer\'s address city'
            ],
            'state' => [
              'type' => Type::string(),
              'description' => 'The customer\'s address state'
            ],
            'zip' => [
              'type' => Type::int(),
              'description' => 'The customer\'s address zip'
            ],
            'country' => [
              'type' => Type::string(),
              'description' => 'The customer\'s address country'
            ],
            'region' => [
              'type' => Type::string(),
              'description' => 'The customer\'s address region'
            ],
            'email' => [
              'type' => Type::string(),
              'description' => 'The customer\'s email address'
            ],
            'phone' => [
              'type' => Type::string(),
              'description' => 'The customer\'s phone number'
            ],
            'creditcardtype' => [
              'type' => Type::int(),
              'description' => 'The customer\'s credit card type'
            ],
            'creditcard' => [
              'type' => Type::string(),
              'description' => 'The customer\'s credit card'
            ],
            'creditcardexpiration' => [
              'type' => Type::string(),
              'description' => 'The customer\'s credit card expiration date'
            ],
            'username' => [
              'type' => Type::string(),
              'description' => 'The customer\'s username'
            ],
            /* 'password' => [ */
            /*   'type' => Type::string(), */
            /*   'description' => 'The customer\'s password' */
            /* ], */
            'age' => [
              'type' => Type::int(),
              'description' => 'The customer\'s age'
            ],
            'income' => [
              'type' => Type::int(),
              'description' => 'The customer\'s income'
            ],
            'gender' => [
              'type' => Type::string(),
              'description' => 'The customer\'s gender'
            ]
        ];
    }

}
