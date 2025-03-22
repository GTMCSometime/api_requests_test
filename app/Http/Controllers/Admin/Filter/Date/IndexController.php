<?php

namespace App\Http\Controllers\Admin\Filter\Date;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke() {


        return view('admin.filter.date.index');
        

    }
}
