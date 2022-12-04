<?php 
namespace App\Http\Services;

use App\Http\Repositories\CustomerRepository;
use App\Http\Repositories\VoucherRepository;

class UploadPhotoService {
  public function storeNewData(array $requestedData)
  {
    $customer = (new CustomerRepository())->getDataCustomerByEmail($requestedData["email"]);

    if(!$customer){
      return false;
    }

    $newData = [
      "is_redeemed" => 1,
      "is_image_qualified" => 1
    ];
    return (new VoucherRepository())->updateDataVoucherByCustomerId($customer->id, $newData);
  }
}

?>