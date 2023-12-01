<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Rosters;
use App\Models\Patients;
use App\Models\PatientCareLogs;

class FamilyController extends Controller
{
    public function example() {
        // $Appointments = Appointments::all();
        $patients = Patients::all();
        // $PatientCareLogs = PatientCareLogs::all();
        // $Rosters = Rosters::all();
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

        $patientCareLogs = PatientCareLogs::where('intPatientId', '=', $patientId)
        ->where('dteLogDate', '=', $date)
        ->get();
        return response()->json($patientCareLogs);

        // return view('family/home', ['patientCareLogs'=>$patientCareLogs]);
    }
};