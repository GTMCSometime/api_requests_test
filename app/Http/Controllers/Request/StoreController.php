<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreRequest;
use App\Mail\Request\RequestRegister;
use App\Models\Request;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest) {
        $data = $storeRequest->validated();
        $message = Request::create($data);
        Mail::to($data['email'])->send(new RequestRegister($message));
        
        return view('user.request.show');
    }
}
