<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'category_id',
        'user_id',
        'prod_qty',
        'selling_price',
        'discount_price',
        'slug',
        'image',
        'status'
    ];

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'user_id');
    // }

    public function categorys()
    {
        return $this->belongsTo(Category::class, 'category_id' );
    }
}
