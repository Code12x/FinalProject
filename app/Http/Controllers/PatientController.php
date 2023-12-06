<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PatientCareLog;
use App\Models\Prescription;
use App\Models\Roster;
use App\Models\User;
use Illuminate\Http\Request;

class PatientHomeVM {
    public $patientId;
    public $patientName;
    public $date;
    public $doctorName = "";
    public $appointment = 0;
    public $prescription = 0;
    public $caregiverName = "";
    public $morningMed = 0;
    public $afternoonMed = 0;
    public $nightMed = 0;
    public $breakfast = 0;
    public $lunch = 0;
    public $dinner = 0;
}

class PatientController extends Controller
{
    public function home(Request $request)
    {
        $user = $request->attributes->get('user');
        $currDate = $request->attributes->get('currDate');

        $date = $request->query('date', $currDate);

        if ($request->input('date') != null)
            $date = $request->input('date');

        $patients = Patient::where('intUserId', $user->intUserId)->get();

        $patient = null;
        if (count($patients) == 1) {
            $patient = $patients[0];
        }

        if (is_null($patient)) {
            return "No patietn associated with this account";
        }

        $row = new PatientHomeVM();
        $row->patientId = $patient->intPatientId;
        $row->patientName = $user->strFirstName . " " . $user->strLastName;
        $row->date = $date;

        $row->patientName = $user->strFirstName . " " . $user->strLastName;

        $appointments = Appointment::where('intPatientId', $patient->intPatientId)
            ->where('dteAppointmentDate', $date)
            ->get();
        if (count($appointments) == 1) {
            $appointment = $appointments[0];
            $row->appointment = 1;

            $prescriptions = Prescription::where('intAppointmentId', $appointment->intAppointmentId)->get();

            if (count($prescriptions) == 1) $row->prescription = 1;
        }

        $rosters = Roster::where("dteRosterDate", $date)->get();

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

            $row->caregiverName = $caregiver->strFirstName . " " . $caregiver->strLastName;

            $doctor = User::where('intUserId', $roster->intDoctor)->first();

            $row->doctorName = $doctor->strFirstName . " " . $doctor->strLastName;

            $careLogs = PatientCareLog::where('dteLogDate', $date)->where('intPatientId', $patient->intPatientId)->get();

            if (count($careLogs) == 1) {
                $careLog = $careLogs[0];

                $row->morningMed = $careLog->bitMorningMed;
                $row->afternoonMed = $careLog->bitAfternoonMed;
                $row->nightMed = $careLog->bitEveningMed;
                $row->breakfast = $careLog->bitBreakfast;
                $row->lunch = $careLog->bitLunch;
                $row->dinner = $careLog->bitDinner;
            }

        }
        return view('Patient.patient_home', ['row' => $row, 'date' => $date]);
    }
}