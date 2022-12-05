<?php 
namespace App\Http\Services;

use App\Http\Repositories\CustomerRepository;
use App\Http\Repositories\VoucherRepository;
use Carbon\Carbon;

class VoucherService {
  /**
   * Description : use to check and add voucher by customer
   * 
   * @param object $customer eloquent model
   * @return bool
   */
  public function isVoucherAvailable(object $customer):bool
  {
    $voucherRepository = new VoucherRepository();
    $expiredVoucher = $voucherRepository->getDataExpiredLockTime();

    if($expiredVoucher){
      $expiredVoucher->customer_id = $customer->id;
      $expiredVoucher->lock_time = Carbon::now()->addMinutes(10);
      $expiredVoucher->save();
      return true;
    }else{
      $availableVoucher = $voucherRepository->getDataAvailableVoucher();
      if($availableVoucher){
        $availableVoucher->customer_id = 1;
        $availableVoucher->lock_time = Carbon::now()->addMinutes(10);
        $availableVoucher->save();
        return true;
      }else{
        return false;
      }
    }
  }


  /**
   * Description : use to get data voucher by customer email
   * 
   * @param string $email customer
   * @return ?object of eloquent voucher
   */
  public function getVoucherByCustomerEmail(string $email):?object
  {
    $customer = (new CustomerRepository())->getDataCustomerByEmail($email);

    if(!$customer){
      return false;
    }

    return (new VoucherRepository())->getDataVoucherByCustomerId($customer->id);
  }
}

?>