<?php

namespace App\Http\Controllers;

use App\Http\Auth;
use App\Models\Role;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function Home(Request $request) {
        $user = $request->attributes->get('user');
        return view("Admin/admin_home", ['user' => $user]);
    }

    public function Report(Request $request) {
        $user = $request->attributes->get('user');
        return view('Admin/admin_report', ['user' => $user]);
    }

    public function Approval() {
        return "approve";
    }

    public function Payment() {
        return "money";
    }
}
