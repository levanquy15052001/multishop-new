<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderOffline extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_offline';

    public $timestamps = true;
}
// status = 0  Admin delete to order 
// status = 1  User add to order 
// status = 2  User confirm to order 
// status = 3  Admin confirm to order 
// status = 4  Order shipped successfully
// status = 5  Shipping order failed

