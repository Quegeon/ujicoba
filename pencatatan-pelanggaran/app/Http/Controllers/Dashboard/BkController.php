<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BkController extends Controller
{
    public function index()
    {
        return view('home.dashboard.dashboard-bk');
    }
}
