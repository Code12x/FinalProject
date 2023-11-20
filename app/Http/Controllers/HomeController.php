<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function reroute(Request $request)
    {
        $user = $request->attributes->get('user');
        return $user;
        //return view("Admin/admin_home");
    }
}
