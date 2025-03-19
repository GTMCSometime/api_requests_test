<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreRequest;
use App\Models\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest) {
        $data = $storeRequest->validated();
        Request::create($data);
        return redirect()->back();
    }
}
