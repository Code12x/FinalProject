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

        // $doctor = Appointments::select('')
        // ->join('tblPatientCareLog', 'intPatientId', '=', 'tblPatientCareLog.intPatientId')
        // ->join()
        // ->get();
    
        // $careGiver = ;

        $patientCareLogs = PatientCareLog::where('intPatientId', '=', $patientId)
        ->where('dteLogDate', '=', $date)
        ->get();
        return response()->json($patientCareLogs);
    }
};