<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = [
        'title',
        'description',
        'price',
        'sort_order'
    ];

    public function services()
    {
        // return $this->belongsToMany(Service::class);
        return $this->belongsToMany(
            Service::class,
            'package_service',
            'package_id',
            'service_id'
        )->withTimestamps();
    }
}
