<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use App\Customer;

class Order extends Model
{

    use Eloquence, Mappable;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerid', 'customerid');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'orderdate', 'customerid', 'netamount', 'tax', 'totalamount'
    ];

    protected $maps = [
      'id' => 'orderid'
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
