<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Roster;
use App\Models\Patient;
use App\Models\PatientCareLog;

class FamilyController extends Controller
{
    public function example() {
        $patients = Patient::all();
        return view('family/home', ['patients' => $patients]);
    }
    
    public function getInfo(Request $request) {
        $date = $request->input('date');
        // $familyCode = $request->input('familyCode');
        $patientId = $request->input('patientId');

        // why doesnt this work
        // $doctor = Appointment::where('dteAppointmentDate', '=', $date)
        // ->join('tblUsers', 'tblUsers.intUserId', '=', 'tblAppointments.intDoctorId')
        // ->select('tblUsers.*')
        // ->get();
        // return response()->json($doctor);

    
        // $careGiver = Roster::where();

        $patientCareLogs = PatientCareLog::where('intPatientId', '=', $patientId)
        ->where('dteLogDate', '=', $date)
        ->get();
        return response()->json($patientCareLogs);
    }
};