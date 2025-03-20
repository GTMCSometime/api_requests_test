<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    public function __invoke() {
        return view('user.request.create');
    }
}
