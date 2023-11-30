<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use App\Models\Roster;

class AdminSuprivisorController extends Controller
{
    // Appointment Page ----------------------------------------------------------------------------
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

    public function searchRoster($date) 
    {
        $doctors = Roster::join('tblusers', 'tblusers.intUserId', '=', 'tblroster.intDoctor')
        ->where('dteRosterDate', '=', $date)
        ->get();
        return response()->json($doctors);
    }

    public function createAppointment(Request $request)
    {
        $request->validate([
            'intPatientId'=>'required',
            'dteAppointmentDate'=>'required',
            'intDoctorId'=>'required',
        ]);

        $data = $request->all();
        $data['intAppointmentId'] = 6;
    
        Appointment::create($data);

        return redirect('/suprivisor/createAppointment');
    }

    // Create Roster ----------------------------------------------------------------------------------
    public function createRosterHome(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("AdminSuprivisor/createRoster", ['user' => $user]);
    }

    public function createRoster(Request $request) 
    {
        return redirect('/suprivisor/createRoster');
    }

    public function updateRosterChoices(Request $request) 
    {
        return response()->json($supervisors);
    }
}