<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use App\Customer;
use App\OrderLine;

class Order extends Model
{

    use Eloquence, Mappable;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerid', 'customerid');
    }

    public function order_line_items()
    {
        return $this->hasMany(OrderLine::class, 'orderid', 'orderid');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'orderid', 'orderdate', 'customerid', 'netamount', 'tax', 'totalamount'
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
