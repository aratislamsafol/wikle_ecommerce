<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoleController extends Controller
{
    public function index(){
        $role_show=Role::latest()->paginate();

        return view('backend.role.index',compact('role_show'));
    }
}
