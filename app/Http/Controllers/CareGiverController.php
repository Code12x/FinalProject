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
        $currDate = $request->attributes->get('currDate');
        $logs = PatientCareLog::join('tblpatients', 'tblpatients.intPatientId', '=', 'tblpatientcarelogs.intPatientId')
        ->join('tblusers', 'tblusers.intUserId', '=', 'tblpatients.intUserId')
        ->where('tblpatientcarelogs.dteLogDate', '=', $currDate)
        ->get();

        return response()->json($logs);     
    }

    public function updatePatient(Request $request)
    {
        $currDate = $request->attributes->get('currDate');
        $data = $request->all();

        $patient = PatientCareLog::find($data['intLogId']);

        if ($patient) {
            //dd($data);
        if ($request->input('bitMorningMed') == "on") {
            $patient->bitMorningMed = true;
        }

        if ($request->input('bitAfternoonMed') == "on") {
            $patient->bitAfternoonMed = true;
        }

        if ($request->input('bitEveningMed') == "on") {
            $patient->bitEveningMed = true;
        }

        if ($request->input('bitBreakfast') == "on") {
            $patient->bitBreakfast = true;
        }

        if ($request->input('bitLunch') == "on") {
            $patient->bitLunch = true;
        }
        
        if ($request->input('bitDinner') == "on") {
            $patient->bitDinner = true;
        }

            $patient->update();
        }
        return redirect('caregiver/home');
    }
}