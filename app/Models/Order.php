<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'pnumber',
        'address1',
        'address2',
        'country',
        'city',
        'postcode',
        'method',
        'trackingid',
        'status',
    ];
}
