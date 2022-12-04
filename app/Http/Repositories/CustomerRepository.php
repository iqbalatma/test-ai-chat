<?php 
namespace App\Http\Repositories;

use App\Models\Campaign;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerRepository{
  private const TRANSACTION_THRESHOLD = 3;
  private const SPENT_THRESHOLD = 100;
  public function getDataEligibleCustomerByEmail(string $email, array $columns = ["*"])
  {
    return Customer::where("email", $email)
      ->whereHas("purchase_transaction", function ($q){
        $q->whereBetween("transaction_at", [Carbon::now()->subDays(30),Carbon::now()]);
      }, ">=", self::TRANSACTION_THRESHOLD)
      ->withSum("purchase_transaction", "total_spent")
      ->having("purchase_transaction_sum_total_spent", ">=", self::SPENT_THRESHOLD)
      ->first($columns);
  }
}
?>