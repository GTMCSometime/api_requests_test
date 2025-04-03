<?php

namespace App\Http\Controllers\Admin;


use App\Enums\RequestStatus;
use App\Http\Filters\RequestFilter;
use App\Http\Requests\Admin\FilterRequest;
use App\Http\Resources\RequestResource;
use App\Models\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;

class RequestController extends BaseController
{
    public function index(FilterRequest $request) {
        $data = $request->validated();
        $filter = app()->make(RequestFilter::class, ['queryParams' => array_filter($data)]);
        $usersRequests = Request::filter($filter)->get();
        if($usersRequests->count() > 0) {
            return RequestResource::collection($usersRequests);
        } else {
            return response()->json(['message' => 'Нет записей'], 200);
        }
        

    }

    public function store(StoreRequestRequest $storeRequest) {
        $data = $storeRequest->validated();
        $requestCreate = $this->service->store($data);
        return response()->json(
            ['message' => 'Заявка оформлена',
                    'data' => new RequestResource($requestCreate)], 200);
    }

    public function show(Request $request) {
        return new RequestResource($request);

    }
    public function update(UpdateRequestRequest $storeRequest, Request $request) {
        $data = $storeRequest->validated();
        $request = $this->service->update($data, $request);
        return response()->json(
            ['message' => 'Заявка рассмотрена. Ответ отправлен.',
                    'data' => new RequestResource($request)], 200);
    }

    public function destroy() {
    }
}
