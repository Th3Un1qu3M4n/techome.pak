<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
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
        'totalprice',
        'status',
    ];

    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
}
