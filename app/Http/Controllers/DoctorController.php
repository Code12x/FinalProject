<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Prescription;
use DateTime;
use Illuminate\Support\Facades\Date;

// change misspelled table name  tblappoitment patient function

class DoctorController extends Controller
{
    protected $dateFormat = "Y-m-d";
    
    public function Home(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("Doctor/doctorhome", ['user' => $user]);
    }

    public function getOldAppointments(Request $request) 
    {
        $system_date = new DateTime($request->attributes->get('currDate'));
        $appointments = Appointment::where('dteAppointmentDate', '<', $system_date->format($this->dateFormat))->get();
        return response()->json($appointments);
    }

    public function getNewAppointments(Request $request, $date) 
    {
        $system_date = new DateTime($request->attributes->get('currDate'));
        $appointments = Appointment::where('dteAppointmentDate', '>=', $system_date->format($this->dateFormat))
        ->where('dteAppointmentDate', '<=', $date)->get();
        return response()->json($appointments);
    }

    public function patient(Request $request, $id) 
    {
        $user = $request->attributes->get('user');
        $system_date = new DateTime($request->attributes->get('currDate'));

        $oldperscriptions = Prescription::join('tblAppointments', 'tblPrescriptions.intAppointmentId', '=', 'tblAppointments.intAppointmentId')
        ->where('intPatientId', '=', $id)
        ->get();

        $appointmentToday = Appointment::where('intPatientId', '=', $id)
        ->where('dteAppointmentDate', '=', $system_date->format($this->dateFormat))
        ->get();

        return view("Doctor.patientpage", ['user' => $user, 'oldperscriptions' => $oldperscriptions, 'appointmentToday' => $appointmentToday]);
    }

    public function createPerscription(Request $request, $id)
    {
        $data = $request->all();
        
        $data['intAppointmentId'] = $id;

        Prescription::create($data);

        return redirect('/doctor/home');
    }
}