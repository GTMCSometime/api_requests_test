<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RequestStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Mail\Request\RequestAnswer;
use App\Models\Request;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest, Request $request) {
        $data = $storeRequest->validated();
        $data['type'] = RequestStatus::Resolved;
        $request->update($data);
        Mail::to($request->email)->send(new RequestAnswer($data));
        return view('admin.main.edit', compact('request'));
        

    }
}
