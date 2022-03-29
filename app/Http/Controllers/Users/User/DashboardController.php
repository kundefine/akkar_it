<?php

namespace App\Http\Controllers\Users\User;
use App\Http\Controllers\Controller;
use App\Models\ShortUrl;

class DashboardController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $short_urls = auth()->user()->urls;
        return view('users.user.dashboard', compact('short_urls'));
    }
}
