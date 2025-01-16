<?php

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Package\Google;

class TestController extends Controller
{

    public function index()
    {
        Google::load();
    }
}
