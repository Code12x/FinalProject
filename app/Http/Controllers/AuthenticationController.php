<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use App\Models\Role;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'Email'=>'required',
            'Password'=>'required',
        ]);

        $data = $request->all();

        $user = User::where('strEmail', $data['Email'])
        ->where('strPassword', $data['Password'])
        ->get();

        if ($user->count() == 1) {
            $user = $user[0];
            if($user["bitApproved"] == 0)
            {
                return view('Authentication.Login')->with('message', 'Not Authorized');
            } else {
                session(['userId' => $user['intUserId']]);
            }
        } else {
            return view('Authentication.Login')->with('message', 'Incorrect Log in Information');
        }

        $url = $request->query('url', '/home');

        return redirect($url);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    public function getRegister() {
        $roles = Role::all();
        return view('Authentication.Register', ['roles' => $roles]);
    }

    public function register(Request $request)
    {
        $data = $request->all();

        // $data->validate([
        //     'intUserId'=>'required',
        //     // ''=>'required',
        // ]);


        $user = User::create($data);

        $data['intUserId'] = $user->intUserId;

        if($data['intRoleId'] == 5)
        {
            Patient::create($data);
        }
        else if($data['intRoleId'] != 5 && $data['intRoleId'] != 6)
        {
            Employee::create($data);
        }

        return redirect('/login');
    }
}
