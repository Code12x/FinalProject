<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function Home(Request $request) {
        $user = $request->attributes->get('user');
        return view("Doctor/doctorhome", ['user' => $user]);
    }

}
