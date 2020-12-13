<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Product;

class Order extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'purchase_date',
        'items_price',
        'delivery_price',
        'earliest_expected_delivery',
        'latest_expected_delivery',
        'delivered_on',
        'order_status',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @return HasOne
     */
    public function orderUser()
    {   
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function orderItem()
    {
        return $this->hasOne(Product::class, 'id', 'item_id');
    }
}
