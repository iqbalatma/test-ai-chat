<?php 
namespace App\Http\Services;

use App\Http\Repositories\CampaignRepository;
use App\Http\Repositories\CustomerRepository;

class RedeemService{
  public function redemVoucher(string $campaignCode, array $requestedData)
  {
    $isCampaignValid = $this->isCampaignCodeValid($campaignCode);

    if(!$isCampaignValid){
      return false;
    }

    $customer =  $this->isCustomerEligible($requestedData["email"]);


    return $customer;
  }


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