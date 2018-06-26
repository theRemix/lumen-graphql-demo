<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use App\Order;
use App\Product;

class OrderLine extends Model
{

    use Eloquence, Mappable;

    protected $table = 'orderlines';

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderid', 'orderid');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'prod_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'orderid', 'prod_id', 'quantity', 'orderdate'
    ];

    protected $maps = [
      'id' => 'orderlineid'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
