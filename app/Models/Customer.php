<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "first_name", "last_name", "gender", "date_of_birth", "contact_number", "email"
    ];

    public function purchase_transaction()
    {
        return $this->hasMany(PurchaseTransaction::class);
    }

    public function voucher()
    {
        return $this->hasOne(Voucher::class);
    }

    
}
