<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Epassport extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = 
    [
        'user_id',
        'insurance_id',
        'rpo_address',
        'phone',
        'post_code',
        'barcode',
        'item_id',
        'total_charge',
        'service_type',
        'vas_type',
        'price',
        'insured',
        'booking_status'
    ];

}
