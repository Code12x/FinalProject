<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Prescription;

// change misspelled table name  tblappoitment patient function

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

        $oldperscriptions = Prescription::join('tblappoitment', 'tblprescription.intAppointmentId', '=', 'tblappoitment.intAppointmentId')
        ->where('intPatientId', '=', $id)
        ->get();

        $system_date = '2023-11-24';

        $appointmentToday = Appointment::where('intPatientId', '=', $id)
        ->where('dteAppointmentDate', '=', $system_date)
        ->get();

        return view("Doctor/patientpage", ['user' => $user, 'oldperscriptions' => $oldperscriptions, 'appointmentToday' => $appointmentToday]);
    }

    public function createPerscription(Request $request, $id)
    {
        $data = $request->all();
        $data['intPrescriptionId'] = 9;
        
        $data['intAppointmentId'] = $id;

        Prescription::create($data);

        return redirect('/doctor/home');
    }
}