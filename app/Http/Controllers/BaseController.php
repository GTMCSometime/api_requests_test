<?php

namespace App\Http\Controllers;

use App\Service\RequestService;
class BaseController extends Controller
{
    public $service;

    public function __construct(RequestService $service) {
        $this->service = $service;
    }
}
