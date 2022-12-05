<?php 
namespace App\Http\Services;

use App\Http\Repositories\CustomerRepository;
use App\Http\Repositories\VoucherRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadPhotoService {
  public function storeNewData(array $requestedData)
  {
    $customer = (new CustomerRepository())->getDataCustomerByEmail($requestedData["email"]);

    if(!$customer){
      return false;
    }

    if(!(new FaceRecognitionService())->checkFaceIsValid(request()->file("image"))){
      return false;
    }

    $uploaded = Storage::putFile(
      'public/images',
      request()->file('image')
    );
    $filename = basename($uploaded);
   
    $voucher = (new VoucherRepository())->getDataVoucherAvailableByCustomerId($customer->id);
    if($voucher){
      $voucher->is_redeemed = true;
      $voucher->is_image_qualified = true;
      $voucher->image = $filename;
      $voucher->save();

      return $voucher;
    }

    return false;
  }
}

?>