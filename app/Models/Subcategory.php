<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = [
        'category_id',
        'title',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
