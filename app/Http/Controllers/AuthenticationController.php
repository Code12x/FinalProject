<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use App\Models\Employees;

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
                return view('/Authentication/login')->with('message', 'Not Authorized');
            } else {
                session(['userId' => $user['intUserId']]);
            }
        } else {
            return view('/Authentication/login')->with('message', 'Incorrect Log in Information');
        }

        return redirect('/home');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/home');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['intUserId'] = 10;
        $data['intPatientId'] = 10;
        $data['intEmployeeId'] = 10;
        $data['bitApproved'] = 0;


        // $data->validate([
        //     'intUserId'=>'required',
        //     // ''=>'required',
        // ]);


        User::create($data);

        if($data['intRoleId'] == 4)
        {
            Patient::create($data);
        }
        else if($data['intRoleId'] != 5)
        {
            Employees::create($data);
        }

        return redirect('/login');
    }
}
