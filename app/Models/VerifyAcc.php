<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyAcc extends Model
{
    use HasFactory;
protected $table = 'verify_accs';
    protected $fillable = [
        'email',
        'token'
    ];

}
