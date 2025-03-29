<?php

namespace App\Service;


use Illuminate\Support\Facades\DB;
use App\Enums\RequestStatus;
use App\Models\Request;
use App\Jobs\RequestRegisterJob;
use App\Jobs\RequestAnswerJob;

class RequestService {

    public function store($data) {
        try {
            DB::beginTransaction();
            dispatch(new RequestRegisterJob($data));
            Request::create($data);
            
            
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, $request) {
        try {
            $data['type'] = RequestStatus::Resolved;
            dispatch(new RequestAnswerJob($data));
            $request->update($data);
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $request;
    }


}