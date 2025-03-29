<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Request;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $storeRequest, Request $request) {
        $data = $storeRequest->validated();
        $request = $this->service->update($data, $request);
        return view('admin.main.edit', compact('request'));
        

    }
}
