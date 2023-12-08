<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientCareLog;
use App\Models\Patient;
use DateTime;
use Illuminate\Support\Facades\Date;

class CareGiverController extends Controller
{
    public function caregiverHome(Request $request) 
    {
        return view('Caregiver/caregivers_home');
    }

    public function getPatients(Request $request)
    {
        $logs = PatientCareLog::get(); //::where('dteAppointmentDate', '==', $system_date->format($this->dateFormat))
        //->get();

        return response()->json($logs);     
    }
}