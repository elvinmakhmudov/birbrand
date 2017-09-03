<?php

namespace BirBrand;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price', 'image_url', 'options','old_price', 'sale_percent','is_shown'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id'
    ];

    /**
     * Cast values automatically
     * @var array
     */
    protected $casts = [
        'images' => 'array'
    ];

    /*
     * Product belongs to a category
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Get all categories
     */
    public function allCategories() {
        return $this->category()->with('allCategories');
    }

    /*
     * Product belongs to a user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /*
     * Product belongs to orders
     */
    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('option', 'price', 'amount');
    }

    /**
     * Is shown scope
     *
     * @param $query
     * @return mixedkk
     */
    public function scopeIsShown($query)
    {
        return $query->where('is_shown', true);
    }
}
