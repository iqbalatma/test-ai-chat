<?php 
namespace App\Http\Repositories;

use App\Models\Campaign;
use Carbon\Carbon;

class CampaignRepository{

  public function getValidDataCampaignByCode(string $code, array $columns = ["*"])
  {
    return Campaign::where("code", $code)
      ->where("end_date", ">", Carbon::now())
      ->first($columns);
  }
}
?>