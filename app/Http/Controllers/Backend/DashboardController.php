<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $hello = "Hello HR Venture!";
        $test = "Batch 105";
        return view('test',compact('hello','test'));
    }
}
