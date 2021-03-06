<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'images',
        'slug',
        'maincategories_id',
        'status'

    ];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }

}
