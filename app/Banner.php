<?php

namespace BirBrand;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['image_url','is_shown', 'title', 'description', 'url', 'type', 'user_id'];

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
