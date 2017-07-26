<?php

namespace BirBrand;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image_url'
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
     * A category may belong to another category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent() {
        return $this->belongsTo(Category::class);
    }
    
    /*
     * Product belongs to a user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
