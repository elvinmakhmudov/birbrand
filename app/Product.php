<?php

namespace BirBrand;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Buyable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price', 'image_url', 'options','old_price', 'sale_percent','is_shown','ordered','likes', 'dislikes', 'rating','note'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id','note','is_shown','likes','dislikes','created_at','updated_at','trending'
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
        return $this->belongsToMany(Order::class)->withPivot('options', 'price', 'amount', 'reviewable');
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

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
        // TODO: Implement getBuyableIdentifier() method.
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->title;
        // TODO: Implement getBuyableDescription() method.
    }

    /**
     * Get the price of the Buyable item.
     *
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
        // TODO: Implement getBuyablePrice() method.
    }

    /**
     * Update the rating of product
     */
    public function updateRating() {
        return $this->rating = 5 * $this->likes / ($this->likes + $this->dislikes);
    }
}
