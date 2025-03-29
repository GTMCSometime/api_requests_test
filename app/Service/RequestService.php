<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Mail\Request\RequestAnswer;
use Illuminate\Support\Facades\Mail;
use App\Enums\RequestStatus;
use App\Mail\Request\RequestRegister;
use App\Models\Request;

class RequestService {

    public function store($data) {
        try {
            DB::beginTransaction();

            $message = Request::create($data);
            Mail::to($data['email'])->send(new RequestRegister($message));
            
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, $request) {
        try {
            $data['type'] = RequestStatus::Resolved;
            $request->update($data);
            Mail::to($request->email)->send(new RequestAnswer($data));
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $request;
    }


}