<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyAcc extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token'
    ];

    // public function users()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
}
