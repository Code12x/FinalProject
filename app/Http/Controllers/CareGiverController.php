<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Models\PatientCareLog;
use app\Http\Models\Patient;

class CareGiverController extends Controller
{
    public function showPatients(){
        $userId = $request->session()->get('userId');
        foreach($patients as $patient) {
            if($data['intGroup'] == 1) {
                $patientList = DB::select('
                SELECT * FROM tblPatientCareLog AS pcl, tblPatients AS p, tblRoster AS r, tblUsers AS u
                WHERE pcl.intPatientId = p.intPatientId
                AND u.intUserId = "'.$userId.'"
                AND r.Caregiver1 = (SELECT CONCAT(u.strFirstName, " ", u.strLastName) WHERE u.intUserId = "'.$userId.'";)');
            }
        }
    }
}
