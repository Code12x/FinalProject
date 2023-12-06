<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\ViewModels\PatientsPageVM;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Roster;

class HomeController extends Controller
{
    public function reroute(Request $request)
    {
        $user = $request->attributes->get('user');

        if (is_null($user)) return redirect('/login');
        
        switch ($user->role->intAccessLevel) {
            case 1:
                return redirect('/admin/home');
                break;
            case 2:
                return redirect('/supervisor/home');
                break;
            case 3:
                return redirect('/doctor/home');
                break;
            case 4:
                return redirect('/caregiver/home');
                break;
            case 5:
                return redirect('/patient/home');
                break;
            case 6:
                return redirect('/family/home');
                break;
            default:
                return redirect('/');
                break;
        }
    }

    public function patients(Request $request) {
        $currDate = $request->attributes->get('currDate');
        
        $rows = [];

        $patients = Patient::all();
        foreach ($patients as $patient) {
            $row = new PatientsPageVM();
            $row->id = $patient->intPatientId;
            $patientUser = User::where('intUserId', $patient->intUserId)->first();
            $row->name = $patientUser->strFirstName . " " . $patientUser->strLastName;
            $row->age = date_diff(new DateTime($currDate), new DateTime($patientUser->dteDateOfBirth))->format('%y');
            $row->emergencyContact = $patient->strEmergencyContactPhone;
            $row->emergencyContactRelation = $patient->strEmergencyContactRelation;
            $row->admissionDate = $patient->dteAdmissionDate;
            
            array_push($rows, $row);
        }

        return view('Shared.patients', ['rows'=>$rows]);
    }

    public function viewRosterInfo(Request $request) {
        $date = $request->input('date');

        $roster = Roster::where('dteRosterDate', '=', $date)
        ->get();
        return response()->json($roster);
    }

}
