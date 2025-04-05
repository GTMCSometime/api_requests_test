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
            dispatch(new RequestRegisterJob($data));
            $requestCreate = Request::create($data);
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $requestCreate;
    }

    public function update($data, $request) {
        try {

            $data['type'] = RequestStatus::Resolved;
            $data['email'] = $request->email;
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