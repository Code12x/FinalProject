<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Models\PatientCareLog;
use app\Http\Models\Patient;
use DB;

class CareGiverController extends Controller
{
    public function showPatients(){
        $user = DB::table('tblusers')->where('intUserId', '2')->get();
        $roster = DB::table('tblroster')->get();
        // $patients = DB::table('tblpatients')->get();
        $patients = DB::table('tblpatients')
                ->join('tblUsers', 'tblpatients.intPatientid', '=', 'tblUsers.intUserId')
                ->select('tblUsers.*', 'tblPatients.*')
                ->get();
        return view('shared/caregivers_home', ['patients' => $patients], ['roster' => $roster], ['user' => $user]);
    }
}
