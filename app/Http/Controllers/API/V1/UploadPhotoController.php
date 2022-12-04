<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadPhoto\UploadPhotoRequest;
use App\Http\Services\UploadPhotoService;

class UploadPhotoController extends Controller
{
    public function upload(UploadPhotoService $service, UploadPhotoRequest $request)
    {
        $uploaded = $service->storeNewData($request->validated());
        return response()->json(["data"=>$uploaded]);
    }
}
