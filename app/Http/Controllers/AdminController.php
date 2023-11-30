<?php

namespace App\Http\Controllers;

use App\Http\GetDataTools;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PatientCareLog;
use App\Models\Payment;
use App\Models\roster;
use App\Models\User;
use App\ViewModels\AdminReport;
use Illuminate\Http\Request;
use App\Models\Role;
use DateTime;
use Exception;

class AdminController extends Controller
{
    public function Home(Request $request) {
        $user = $request->attributes->get('user');
        return view("Admin/admin_home", ['user' => $user]);
    }

    public function Report(Request $request, $date) {
        $user = $request->attributes->get('user');

        return "Report";

        $rows = [];

        $patients = Patient::all();
        foreach ($patients as $patient) {
            $row = new AdminReport;
            
            $patientUser = User::where('intUserId', $patient->intUserId)->first();
            $row->patientName = $patientUser->strFirstName . " " . $patientUser->strLastName;
            
            $appointment = Appointment::
                where('intPatientId', $patient->intPatientId)->
                where('dteAppointmentDate', $date)->
                first();
            if (sizeof($appointment) > 0) {
                $row->doctorAppointment = true;

                $doctor = User::where('intUserId', $appointment->intDoctorId)->first();
                
                $row->doctorName = $doctor->strFirstName . " " . $doctor->strLastName;
                
            } else {
                $row->doctorAppointment = false;
            }

            $roster = Roster::where("dteRosterDate", $date)->first();

            $caregiverId = null;
            switch($patient->intGroup) {
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

            $row->caregiverName = $caregiver->strFirstName . " " . $caregiver->strLastName;

            $careLog = PatientCareLog::where('dteLogDate', $date)->first();
            
            $row->morningMedicine = $careLog->bitMorningMed;
            $row->afternoonMedicine = $careLog->bitAfternoonMed;
            $row->nightMedicine = $careLog->bitEveningMed;
            $row->breakfast = $careLog->bitBreakfast;
            $row->lunch = $careLog->bitLunch;
            $row->dinner = $careLog->bitDinner;

            // if ($row->doctorAppointment && $row->)
        }
        
        return view('Admin/admin_report', ['user' => $user, 'rows' => $rows]);
    }

    public function Approval(Request $request) {
        $user = $request->attributes->get('user');

        $unapprovedUsers = User::where('bitApproved', 0)->where('bitDenied', 0)->join('tblRoles', 'tblRoles.intRoleId', '=', 'tblUsers.intRoleId')->get();
        
        return view('Admin/admin_approval', ['user'=>$user, 'unapprovedUsers'=>$unapprovedUsers]);
    }

    public function _Approve(Request $request) {
        $content = $request->input();

        foreach ($content as $userApproval => $status) {
            $userId = substr($userApproval, strpos($userApproval, "-")+1);
            $user = User::where('intUserId', $userId)->first();
            $user->bitApproved = $status == "approve" ? true : false;
            $user->bitDenied = $status == "deny" ? true : false;
            $user->update();
        }

        return redirect('/admin/approval');
    }

    public function Payment(Request $request) {
        $user = $request->attributes->get('user');



        return view('Admin/admin_payment', ['user'=>$user]);
    }

    public function _payment(Request $request) {
        try {
            $validated = $request->validate(
                [
                    'patientId' => 'required',
                    'newPayment' => 'required',
                ]
            );

            $date = new DateTime();

            Payment::create(['intPatientId' => $validated['patientId'], 'dmlAmount' => $validated['newPayment'], 'dtePaymentDate' => $date->format(GetDataTools::$dateFormat)]);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success'=>false];
        }
    }

    public function _totalDue(Request $request) {
        $id = $request->input('id');

        $patientTest = GetDataTools::TryGetPatient($id);
        if ($patientTest['success'] == 'true') {
            $patient = $patientTest['patient'];

            $amountDue = GetDataTools::GetPatientAmountDue($patient);

            return ['success' => true, 'data' => $amountDue];
        } else {
            return ['success' => false];
        }
    }

    public function createrolepage(Request $request) {
        $user = $request->attributes->get('user');
        return view("Admin/create_role", ['user' => $user]);
    }

    public function createrole(Request $request) {
        $request->validate([
            'strName'=>'required',
             'intAccessLevel'=>'required',
        ]);

        $data = $request->all();
        $data['intRoleId'] = 8;

        Role::create($data);
        $user = $request->attributes->get('user');
        return view("Admin/create_role", ['user' => $user]);
    }
}
