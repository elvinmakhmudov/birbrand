<?php

namespace BirBrand;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description','image_url', 'url', 'is_shown'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id'
    ];
    /*
     * Product belongs to a user
     */
    public function user() {
        return $this->belongsTo(User::class);
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
