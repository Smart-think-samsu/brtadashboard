<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Brtabookings extends Model
{
    
    use HasApiTokens, HasFactory;
    protected $fillable = ['drivingLicenseNo','brtaReferenceNo','name','fatherName','mobileNo','deliveryAddress'];
    

}
