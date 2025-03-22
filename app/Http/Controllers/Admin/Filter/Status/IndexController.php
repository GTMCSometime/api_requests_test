<?php

namespace App\Http\Controllers\Admin\Filter\Status;

use App\Http\Controllers\Controller;
use App\Enums\RequestStatus;

class IndexController extends Controller
{
    public function __invoke() {
        $types = RequestStatus::cases();

        return view('admin.filter.status.index', compact('types'));
        

    }
}
