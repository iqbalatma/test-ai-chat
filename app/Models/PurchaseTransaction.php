<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTransaction extends Model
{
    use HasFactory;
    protected $table = "purchase_transaction";
    public $timestamps = false;

    protected $fillable = [
        "customer_id", "total_spent", "total_saving", "transaction_at"
    ];
}
