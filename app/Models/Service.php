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
        'image',
        'description',
        'pdf',
        'specifications_table',
        'sort_order'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
