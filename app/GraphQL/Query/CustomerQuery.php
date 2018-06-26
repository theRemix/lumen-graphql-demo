<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Customer;

class CustomerQuery extends Query
{
    protected $attributes = [
        'name' => 'customers'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Customer'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'firstname' => ['name' => 'firstname', 'type' => Type::string()],
            'lastname' => ['name' => 'lastname', 'type' => Type::string()],
            'city' => ['name' => 'city', 'type' => Type::string()],
            'state' => ['name' => 'state', 'type' => Type::string()],
            'zip' => ['name' => 'zip', 'type' => Type::int()],
            'country' => ['name' => 'country', 'type' => Type::string()],
            'region' => ['name' => 'region', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'username' => ['name' => 'username', 'type' => Type::string()],
            'age' => ['name' => 'age', 'type' => Type::int()],
            'gender' => ['name' => 'gender', 'type' => Type::string()],
            'first' => ['name' => 'first', 'type' => Type::int()]
        ];
    }

    public function resolve($root, $args)
    {
        $query = Customer::query();

        if (isset($args['id'])) {
            $query = $query->where('id' , $args['id']);
        }
        if (isset($args['firstname'])) {
            $query = $query->where('firstname' , $args['firstname']);
        }
        if (isset($args['lastname'])) {
            $query = $query->where('lastname' , $args['lastname']);
        }
        if (isset($args['city'])) {
            $query = $query->where('city' , $args['city']);
        }
        if (isset($args['state'])) {
            $query = $query->where('state' , $args['state']);
        }
        if (isset($args['zip'])) {
            $query = $query->where('zip' , $args['zip']);
        }
        if (isset($args['country'])) {
            $query = $query->where('country' , $args['country']);
        }
        if (isset($args['region'])) {
            $query = $query->where('region' , $args['region']);
        }
        if (isset($args['email'])) {
            $query = $query->where('email' , $args['email']);
        }
        if (isset($args['username'])) {
            $query = $query->where('username' , $args['username']);
        }
        if (isset($args['age'])) {
            $query = $query->where('age' , $args['age']);
        }
        if (isset($args['gender'])) {
            $query = $query->where('gender' , $args['gender']);
        }

        if(isset($args['first'])) {
            return $query->paginate($args['first']);
        } else {
            return $query->get();
        }
    }
}
