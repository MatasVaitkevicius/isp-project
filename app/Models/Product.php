<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        //created_at
        'name',
        'description',
        'product_condition',
        'stock_count',
        'price',
        'sold_count',
        'storage_location',
        'origin',
        'manufacture_date',
        'expiry_date',
        'warranty',
        'weight',
        'is_confirmed',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'manufacture_date', 'expiry_date' => 'date',
    ];
}
