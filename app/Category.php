<?php

namespace BirBrand;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class Category extends Model
{
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image_url', 'slug', 'user_id','is_shown'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'created_at', 'updated_at'
    ];
    
    /**
     * A category may belong to another category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//    public function parent() {
//        return $this->belongsTo(Category::class);
//    }

    /**
     * A category may have multiple categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories() {
        return $this->belongs_to(Category::class, 'parent_id');
    }

    /**
     * Get all categories
     */
    public function allCategories() {
        return $this->categories()->with('allCategories');
    }

    /*
     * Category belongs to a user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /*
     * Category has many products
     */
    public function products() {
        return $this->hasMany(Product::class);
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
