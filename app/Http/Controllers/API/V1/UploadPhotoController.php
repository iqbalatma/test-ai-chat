<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadPhoto\UploadPhotoRequest;
use App\Http\Services\UploadPhotoService;
use Illuminate\Http\JsonResponse;

class UploadPhotoController extends Controller
{
    public function upload(UploadPhotoService $service, UploadPhotoRequest $request):JsonResponse
    {
        $uploaded = $service->storeNewData($request->validated());

        if($uploaded){
            return response()->json([
                "message" => "Your face is confirmed",
                "status" => JsonResponse::HTTP_OK,
                "error" => false,
                "data" => $uploaded
            ]);
        }

        return response()->json([
            "message" => "Action denied. You're not allowed to do this action !",
            "status" => JsonResponse::HTTP_FORBIDDEN,
            "error" => true
        ]);
    }
}
