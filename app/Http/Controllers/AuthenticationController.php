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
            //create session 
            // $request->session()->put('userId' => $user['intUserId']);

            session(['userId' => $user['intUserId']]);
        } else {
            return redirect('/Authentication/login');
        }

        return $user;
    }

    public function logout()
    {
        session()->flush();
        return redirect('/Authentication/login');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['intUserId'] = 7;
        $data['intPatientId'] = 7;
        $data['intEmployeeId'] = 7;
        $data['bitApproved'] = 0;


        // $data->validate([
        //     'intUserId'=>'required',
        //     // ''=>'required',
        // ]);


        User::create($data);

        if($data['intRoleId'] = 5)
        {
            Patient::create($data);
        }
        else if($data['intRoleId'] != 6)
        {
            Employees::create($data);
        }

        return $data;
    }
}
