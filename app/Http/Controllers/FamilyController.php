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

    public function familyHome() {
        return view('family/familyHome');
    }

    public function getPatientInfo(Request $request) {
        $date = $request->input('date');
        $familyCode = $request->input('familyCode');
        $patientId = $request->input('patientId');

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
        ->where('tblAppointments.dteAppointmentDate', '=', $date)
        ->select('tblUsers.*', 'tblAppointments.*')
        ->get();
        return response()->json($doctor);
    }
    
    public function getRosterInfo(Request $request) {
        $date = $request->input('date');
        $patientId = $request->input('patientId');

        $rosters = Roster::where("dteRosterDate", '=', $date)->get();
        $patient = Patient::where('intPatientId', '=', $patientId)->first();

        if (count($rosters) == 1) {
            $roster = $rosters[0];

            $caregiverId = null;
            switch ($patient->intGroup) {
                case 1:
                    $caregiverId = $roster->intCaregiver1;
                    break;
                case 2:
                    $caregiverId = $roster->intCaregiver2;
                    break;
                case 3:
                    $caregiverId = $roster->intCaregiver3;
                    break;
                case 4:
                    $caregiverId = $roster->intCaregiver4;
                    break;
                default:
                    return "error with patient group";
                    break;
            }

            $caregiver = User::where('intUserId', $caregiverId)->first();
        }
        return response()->json(['caregiver' => $caregiver]);
    }
};