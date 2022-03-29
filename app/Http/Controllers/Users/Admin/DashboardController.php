<?php

namespace App\Http\Controllers\Users\Admin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
     public function index()
    {
        return view('users.admin.dashboard');
    }
}