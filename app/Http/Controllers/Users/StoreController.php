<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;


class StoreController extends Controller
{
    public function __invoke() {
        return view('users.index');
    }
}
