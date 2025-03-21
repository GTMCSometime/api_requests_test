<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ParentEnum;
use App\Enums\RequestStatus;
use App\Http\Controllers\Controller;
use App\Http\Filters\RequestFilter;
use App\Http\Requests\Admin\FilterRequest;
use App\Models\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ShowController extends Controller
{
    public function __invoke(FilterRequest $request) {
        $types = RequestStatus::cases();
        $data = $request->validated();
        $filter = app()->make(RequestFilter::class, ['queryParams' => array_filter($data)]);
        $usersRequests = Request::filter($filter)->get();

        return view('admin.main.index', compact('usersRequests', 'types'));
        

    }
}
