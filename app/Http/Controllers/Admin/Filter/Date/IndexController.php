<?php

namespace App\Http\Controllers\Admin\Filter\Date;

use App\Http\Controllers\Controller;
use App\Models\Request;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke() {
        $latest = Request::orderBy('created_at', 'desc')->latest('created_at')->first();
        $first = Request::orderBy('created_at')->first();
        $carbonFirst = Carbon::now();
        $carbonLatest = Carbon::parse($latest->created_at);

        return view('admin.filter.date.index', compact('carbonFirst', 'carbonLatest'));
        

    }
}
