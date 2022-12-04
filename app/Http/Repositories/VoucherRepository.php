<?php 
namespace App\Http\Repositories;

use App\Models\Voucher;
use Carbon\Carbon;

class VoucherRepository{
  
  public function getDataVoucherByCustomerId(int $customerId, array $columns = ["*"])
  {
    return Voucher::where([
      "customer_id" => $customerId,
      ])->first($columns);
  }

  public function getDataVoucherAvailableByCustomerId(int $customerId, array $columns = ["*"])
  {
    return Voucher::where([
      "customer_id" => $customerId,
      "is_redeemed" => false
      ])->first($columns);
  }
  public function updateDataVoucherByCustomerId(int $customerId, array $requestedData)
  {
    return Voucher::where("customer_id", $customerId)->update($requestedData);
  }
  
  public function getDataExpiredLockTime(array $columns = ["*"])
  {
    return Voucher::where([
      "is_redeemed" => false,
    ])
    ->where("lock_time", "<", Carbon::now()->subMinutes(10))
    ->first($columns);
  }

  public function getDataAvailableVoucher(array $columns = ["*"])
  {
    return Voucher::where([
      "is_redeemed" => false,
    ])
    ->whereNull("lock_time")
    ->first($columns);
  }
}
?>