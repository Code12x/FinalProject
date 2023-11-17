<?php

namespace App\Http\Controllers;

use App\Http\Auth;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function Home() {
        return view("Admin/admin_home");
    }

    public function Report(Request $request) {
        $request->session()->put('userId', 1);
        
        $user = Auth::User($request);
        if (!$user) {
            return "No User Found";
        }
        return $user->strFirstName . ' ' . $user->strLastName;
    }

    public function Approval() {
        return "approve";
    }

    public function Payment() {
        return "money";
    }
}
