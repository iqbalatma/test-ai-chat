<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        "campaign_id", "customer_id", "code", "image", "is_image_qualified", "is_redeemed", "lock_time"
    ];
}
