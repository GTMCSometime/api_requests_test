<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\RequestFilter;
use App\Http\Requests\Admin\FilterRequest;
use App\Models\Request;

class ShowController extends Controller
{
    public function __invoke(FilterRequest $request) {

        $data = $request->validated();
        
        $filter = app()->make(RequestFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Request::filter($filter)->get();
        dd($posts);
        
        return view('admin.main.index', compact('posts'));
        

    }
}
