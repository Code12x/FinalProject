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
        $data = $request->all();

        return $data;
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['intUserId'] = 5;
        $data['intPatientId'] = 5;
        $data['intEmployeeId'] = 5;
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
