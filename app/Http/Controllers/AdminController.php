<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function Home(Request $request) {
        $user = $request->attributes->get('user');
        return view("Admin/admin_home", ['user' => $user]);
    }

    public function Report(Request $request) {
        $user = $request->attributes->get('user');

        
        return view('Admin/admin_report', ['user' => $user, 'rows' => $rows]);
    }

    public function Approval(Request $request) {
        $user = $request->attributes->get('user');
        return "approve";
    }

    public function Payment(Request $request) {
        $user = $request->attributes->get('user');
        return "money";
    }
}
