<?php

namespace App\Http\Controllers;



use App\Http\Filters\RequestFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Resources\RequestResource;
use App\Mail\Request\RequestRegister;
use App\Models\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\UpdateRequestRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;

class RequestController extends BaseController implements HasMiddleware
{

    public static function middleware() {
        return [
            new Middleware('auth:sanctum', except: ['store'])
        ];
    }
    
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
