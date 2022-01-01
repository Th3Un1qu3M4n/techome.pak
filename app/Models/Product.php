<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cat_id',
        'name',
        'short_desc',
        'desc',
        'price',
        'image',
        'quantity',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_desc',
    ];
}
