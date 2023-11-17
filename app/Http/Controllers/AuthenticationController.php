<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use App\Models\Employees;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $data['intUserId'] = 1;


        // $data->validate([
        //     'intUserId'=>'required',
        //     // ''=>'required',
        // ]);


        User::create($data);
        // Patient::create($data);
        // Employees::create($data);

        return $data;
    }
}
