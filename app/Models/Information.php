<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'tbl_information';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function Order()
    {
        return $this->hasMany(Order::class,'user_id','user_id')->where('tbl_order.status',2);
    }

    public function Order_PDF()
    {
        return $this->hasMany(Order::class,'user_id','user_id')->where('tbl_order.status',3);
    }

    public function Order_offline()
    {
        return $this->hasMany(OrderOffline::class,'information_id','id')->where('tbl_order_offline.status',2);
    }

}
