<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Roster;
use App\Models\Patient;
use App\Models\PatientCareLog;
use App\Models\User;

class FamilyController extends Controller
{
    public function example() {
        $patients = Patient::all();
        return view('family/home', ['patients' => $patients]);
    }
    
    public function getPatientInfo(Request $request) {

        $patientCareLogs = PatientCareLog::join('tblPatients', 'tblPatientCareLogs.intPatientId', '=', 'tblPatients.intPatientId')
        ->where('tblPatients.intPatientId', '=', $patientId)
        ->where('dteLogDate', '=', $date)
        ->where('strFamilyCode', '=', $familyCode)
        ->get();
        return response()->json($patientCareLogs);

    }

    public function getDoctorInfo(Request $request) {
        $date = $request->input('date');
        $patientId = $request->input('patientId');

        $doctor = Appointment::join('tblUsers', 'tblUsers.intUserId', '=', 'tblAppointments.intDoctorId')
        ->where('dteAppointmentDate', '=', $date)
        ->select('tblUsers.*', 'tblAppointments.*')
        ->first();
        return response()->json($doctor);

    
        // new function needed maybe?
        // $careGiver = Roster::where();
    }
};