<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileVerification extends Model
{
    use HasFactory;
    protected $table = 'mobile__verifications';
    protected $fillable = [
        'mobile',
        'otp',
        'is_verified',
        
    ];
}
