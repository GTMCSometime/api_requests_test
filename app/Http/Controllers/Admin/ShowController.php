<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request;

class ShowController extends Controller
{
    public function __invoke() {
        $requests = Request::all();
        return view('admin.main.index')->with(['requests' => $requests]);
    }
}
