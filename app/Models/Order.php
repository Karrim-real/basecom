<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
        'message',
        'twitter',
        'discord',
        'instagram',
        'image',
        'reference_id',
        'payment_type',
        'payment_ref',
        'status'
    ];


    public function Products()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
