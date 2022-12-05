<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Services\VoucherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VoucherController extends Controller
{

    /**
     * Description : use to get data voucher by customer email
     * 
     * @param VoucherService dependency injection
     * @param string $email
     * @return JsonResponse
     */
    public function show(VoucherService $service, string $email):JsonResponse
    {
        $data = $service->getVoucherByCustomerEmail($email);

        if($data){
            return response()->json([
                "message" => "Get data voucher by customer email successfully",
                "status" => JsonResponse::HTTP_OK,
                "error" => false,
                "data" => $data
            ]);
        }
        return response()->json([
            "message" => "Get data voucher by customer email failed.",
            "status" => JsonResponse::HTTP_NOT_FOUND,
            "error" => true,
        ]);

    }
}
