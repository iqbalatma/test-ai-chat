<?php 
namespace App\Http\Services;

use App\Http\Repositories\CampaignRepository;
use App\Http\Repositories\CustomerRepository;

class RedeemService{

  /**
   * Description : use to redeem voucher
   * 
   * @param string $campaignCode 
   * @param array $requestedData request from client
   * return bool
   */
  public function redemVoucher(string $campaignCode, array $requestedData):bool
  {
    if(!$this->isCampaignCodeValid($campaignCode)){
      return false;
    }

    if(!$customer =  $this->isCustomerEligible($requestedData["email"])){
      return false;
    }

    return (new VoucherService())->isVoucherAvailable($customer);
  }

  /**
   * Description : use to check is customer eligible or not
   * 
   * @param string $email of customer
   * @return ?object of customer data that eligible
   */
  private function isCustomerEligible(string $email):?object
  {
    return (new CustomerRepository())->getDataEligibleCustomerByEmail($email);
  }

  /**
   * Description : use to check is campaign code is exists and valid
   * 
   * @param string $campaignCode
   * @return bool status valid of campaign code
   */
  private function isCampaignCodeValid(string $campaignCode):bool
  {
    if((new CampaignRepository())->getValidDataCampaignByCode($campaignCode)){
      return true;
    }
    return false;
  }
}

?>