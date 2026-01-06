<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'sub_category_id',
        'title',
        'slug',
        'price',
        'sort_order'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function packages()
    {
        return $this->belongsToMany(
            Package::class,
            'package_service',
            'service_id',
            'package_id'
        )->withTimestamps();
    }
}
