<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;

class AdminSuprivisorController extends Controller
{
    public function createAppointmentHome(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("AdminSuprivisor/createAppointment", ['user' => $user]);
    }

    public function searchForName($id) 
    {
        $user = User::join('tblpatients', 'tblpatients.intUserId', '=', 'tblusers.intUserId')
        ->where('tblpatients.intPatientId', '=', $id)
        ->get();
        return response()->json($user);
    }

    public function createAppointment(Request $request, $id)
    {
        $data = $request->all();
    
        // $data->validate([
        //     'intUserId'=>'required',
        //     // ''=>'required',
        // ]);

        Appointment::create($data);

        return redirect('');
    }
}