<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Services\RedeemService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RedeemController extends Controller
{
    public function redeem(RedeemService $service, Request $request, string $campaignCode):JsonResponse
    {
        $data = $service->redemVoucher($campaignCode, $request->all());
        if(!$data){
            return response()->json([
                "message" => "Access Denied. Invalid event or customer does not allowed to redeem !",
                "status" => JsonResponse::HTTP_FORBIDDEN,
                "error" => true
            ]);
        }

        return response()->json([
            "message" => "Access Granted. Please submit your selfie photo to proceed this event !",
            "status" => JsonResponse::HTTP_OK,
            "error" => false,
            "data"=>$data,
            "now" => Carbon::now()
        ]);
    }
}
