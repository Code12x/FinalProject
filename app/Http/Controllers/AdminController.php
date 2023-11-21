<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class AdminController extends Controller
{
    public function Home(Request $request) {
        $user = $request->attributes->get('user');
        return view("Admin/admin_home", ['user' => $user]);
    }

    public function Report(Request $request) {
        $user = $request->attributes->get('user');


        
        // return view('Admin/admin_report', ['user' => $user, 'rows' => $rows]);
        return "hi";
    }

    public function Approval(Request $request) {
        $user = $request->attributes->get('user');
        return "approve";
    }

    public function Payment(Request $request) {
        $user = $request->attributes->get('user');
        return "money";
    }

    public function createrolepage(Request $request) {
        $user = $request->attributes->get('user');
        return view("Admin/create_role", ['user' => $user]);
    }

    public function createrole(Request $request) {
        $request->validate([
            'strName'=>'required',
             'intAccessLevel'=>'required',
        ]);

        $data = $request->all();
        $data['intRoleId'] = 8;

        Role::create($data);
        $user = $request->attributes->get('user');
        return view("Admin/create_role", ['user' => $user]);
    }
}
