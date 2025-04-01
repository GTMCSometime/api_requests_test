<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Users\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $storeRequest) {
        $data = $storeRequest->validated();
        $this->service->store($data);
        return view('user.request.show');
    }
}
