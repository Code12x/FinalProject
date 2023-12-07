<?php

namespace App\Http\Controllers;

use App\Http\GetDataTools;
use App\Models\Patient;
use App\Models\User;
use App\ViewModels\PatientsPageVM;
use DateTime;
use Illuminate\Http\Request;

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
}
