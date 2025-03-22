<?php

namespace App\Http\Controllers\Admin;


use App\Enums\RequestStatus;
use App\Http\Controllers\Controller;
use App\Http\Filters\RequestFilter;
use App\Http\Requests\Admin\FilterRequest;
use App\Models\Request;
use Carbon\Carbon;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request) {
        $types = RequestStatus::cases();
        $data = $request->validated();
        $filter = app()->make(RequestFilter::class, ['queryParams' => array_filter($data)]);
        $usersRequests = Request::filter($filter)->get();

        return view('admin.main.index', compact('usersRequests', 'types'));
        

    }
}
