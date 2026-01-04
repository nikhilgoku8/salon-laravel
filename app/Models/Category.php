<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'sort_order'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
