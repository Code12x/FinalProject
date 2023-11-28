<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Perscription;

class DoctorController extends Controller
{
    public function Home(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("Doctor/doctorhome", ['user' => $user]);
    }

    public function getOldAppointments() 
    {
        $system_date = '2023-11-24';
        $appointments = Appointment::where('dteAppointmentDate', '<', $system_date)->get();
        return response()->json($appointments);
    }

    public function getNewAppointments($date) 
    {
        $system_date = '2023-11-24';
        $appointments = Appointment::where('dteAppointmentDate', '>=', $system_date)
        ->where('dteAppointmentDate', '<=', $date)->get();
        return response()->json($appointments);
    }

    public function patient(Request $request, $id) 
    {
        $user = $request->attributes->get('user');

        $oldperscriptions = Perscription::join('Appointment', 'Perscription.intAppointmentId', '=', 'Appointment.intAppointmentId')
        ->where('intAppointmentId', '=', `${id}`)
        ->get();

        return view("Doctor/patientpage", ['user' => $user]);
    }

    // public function getPatientInfo(Request $request)
}