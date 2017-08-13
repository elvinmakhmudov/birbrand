<?php

namespace BirBrand;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['option', 'price', 'amount'];
    /*
     * Order belongs to a user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /*
     * Order belongs to products
     */
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('option', 'price', 'amount');
    }
}
