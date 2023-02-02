<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brtabookings extends Model
{
    use HasFactory;
    protected $fillable = ['drivingLicenseNo','brtaReferenceNo','name','fatherName','mobileNo','deliveryAddress'];
    

}
