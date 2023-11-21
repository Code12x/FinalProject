<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class DoctorController extends Controller
{
    public function Home(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("Doctor/doctorhome", ['user' => $user]);
    }

    public function patient(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("Doctor/patientpage", ['user' => $user]);
    }

    public function getOldAppointments($date) 
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }

    public function getNewAppointments($date) 
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }
}
