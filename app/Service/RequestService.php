<?php

namespace App\Service;


use App\Enums\RequestStatus;
use Illuminate\Support\Facades\DB;
use App\Jobs\RequestRegisterJob;
use App\Jobs\RequestAnswerJob;
use App\Models\Request;


class RequestService {

    public function store($data) {
        try {
            DB::beginTransaction();
            
            Request::create($data);
            dispatch(new RequestRegisterJob($data));
            
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
            dispatch(new RequestAnswerJob($data));

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $request;
    }


}