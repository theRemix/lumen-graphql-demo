<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Customer extends Model
{

    use Eloquence, Mappable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'firstname', 'lastname', 'address1', 'address2', 'city',
        'state', 'zip', 'country', 'region', 'email', 'phone',
        'creditcardtype', 'creditcard', 'creditcardexpiration',
        'username', 'password', 'age', 'income', 'gender'
    ];

    protected $maps = [
      'id' => 'customerid'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
      'creditcard',
      'password'
    ];
}
