<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('backend.admin_dash');
    }
    public function Logout(){
        Auth::logout();
        return Redirect()->route('admin.dashboard');
    }
}
