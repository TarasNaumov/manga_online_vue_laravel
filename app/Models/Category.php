<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'description',
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

}
