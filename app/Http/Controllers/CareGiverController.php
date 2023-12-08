<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Models\PatientCareLog;
use app\Http\Models\Patient;
use DB;

class CareGiverController extends Controller
{
    public function caregiverHome(Request $request) {
        return view('Shared/caregivers_home');
    }

    public function showPatients(Request $request){
        // need to grab caregiver ID to display each patient the caregiver will be taking care of        
    }

    public function sendCheckboxValue(Request $request) {
        $morningMed = $request->input('morningMed');
        $afternoonMed = $request->input('afternoonMed');
        $eveningMed = $request->input('eveningMed');
        $breakfast = $request->input('breakfast');
        $lunch = $request->input('lunch');
        $dinner = $request->input('dinner');

    }
}
