<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Request;


class EditController extends Controller
{
    public function __invoke(Request $request) {
        return view('admin.main.edit', compact('request'));
        

    }
}
