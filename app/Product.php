<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Product extends Model
{

    use Eloquence, Mappable;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'category');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'actor', 'price', 'special', 'common_prod_id'
    ];

    protected $maps = [
      'id' => 'prod_id',
      'category_id' => 'category'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
