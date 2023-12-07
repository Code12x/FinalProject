<?php

namespace App\Http\Controllers;

use App\Http\GetDataTools;
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
        
        $rows = GetDataTools::Patients($currDate);

        return view('Shared.patients', ['rows'=>$rows]);
    }

    public function patientsSearch(Request $request) {
        $currDate = $request->attributes->get('currDate');
        
        $rows = GetDataTools::Patients($currDate);

        if ($request->has("searchIds")) {
            $searchId = $request->input("searchIds");

            $rows = array_filter($rows, function($row) use ($searchId) {
                return stripos($row->id, $searchId) !== false;
            });
        }

        if ($request->has("searchNames")) {
            $searchName = $request->input("searchNames");

            $rows = array_filter($rows, function($row) use ($searchName) {
                return stripos($row->name, $searchName) !== false;
            });
        }

        if ($request->has("searchAges")) {
            $searchAges = $request->input("searchAges");

            $rows = array_filter($rows, function($row) use ($searchAges) {
                return stripos($row->age, $searchAges) !== false;
            });
        }

        if ($request->has("searchEmergencyContacts")) {
            return "ec";
            $searchEmergencyContacts = $request->input("searchEmergencyContacts");

            $rows = array_filter($rows, function($row) use ($searchEmergencyContacts) {
                return stripos($row->emergencyContact, $searchEmergencyContacts) !== false;
            });
        }

        if ($request->has("searchEmergencyContactRelations")) {
            $searchEmergencyContactRelations = $request->input("searchEmergencyContactRelations");

            $rows = array_filter($rows, function($row) use ($searchEmergencyContactRelations) {
                return stripos($row->emergencyContactRelation, $searchEmergencyContactRelations) !== false;
            });
        }

        if ($request->has("searchAdmissionDates")) {
            $searchAdmissionDates = $request->input("searchAdmissionDates");

            $rows = array_filter($rows, function($row) use ($searchAdmissionDates) {
                return stripos($row->admissionDate, $searchAdmissionDates) !== false;
            });
        }

        return array_values($rows);
    }

    public function viewRoster() {
        return view('roster/viewRoster');
    }

    public function viewRosterInfo(Request $request) {
        $date = $request->input('date');

        $roster = Roster::where('dteRosterDate', '=', $date)
        ->rightjoin('tblUsers as sup', 'sup.intUserId', '=', 'tblRosters.intSupervisor')
        ->rightjoin('tblUsers as doc', 'doc.intUserId', '=', 'tblRosters.intDoctor')
        ->rightjoin('tblUsers as cg1', 'cg1.intUserId', '=', 'tblRosters.intCaregiver1')
        ->rightjoin('tblUsers as cg2', 'cg2.intUserId', '=', 'tblRosters.intCaregiver2')
        ->rightjoin('tblUsers as cg3', 'cg3.intUserId', '=', 'tblRosters.intCaregiver3')
        ->rightjoin('tblUsers as cg4', 'cg4.intUserId', '=', 'tblRosters.intCaregiver4')
        ->select(
            'sup.strFirstName as supFirstName', 'sup.strLastName as supLastName',
            'doc.strFirstName as docFirstName', 'doc.strLastName as docLastName',
            'cg1.strFirstName as cg1FirstName', 'cg1.strLastName as cg1LastName',
            'cg2.strFirstName as cg2FirstName', 'cg2.strLastName as cg2LastName',
            'cg3.strFirstName as cg3FirstName', 'cg3.strLastName as cg3LastName',
            'cg4.strFirstName as cg4FirstName', 'cg4.strLastName as cg4LastName'
        )
        ->get();
    
        return response()->json(['roster' => $roster]);
    }
}
