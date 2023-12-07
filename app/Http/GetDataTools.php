<?php

namespace App\Http;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Prescription;
use App\Models\User;
use App\ViewModels\PatientsPageVM;
use DateInterval;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;

class GetDataTools {
    /* Universal */
    public static $dateFormat = "Y-m-d";
    
    public static function TryGetUser($userId) {
        try
        {
            $user = User::findOrFail($userId);

            return ['success' => 'true', 'user' => $user];
        }
        catch(Exception $e)
        {
            return ['success' => 'false', 'exception' => $e];
        }
    }

    public static function TryGetPatient($patientId)
    {
        try
        {
            $patient = Patient::findOrFail($patientId);

            return ['success' => 'true', 'patient' => $patient];
        }
        catch(Exception $e)
        {
            return ['success' => 'false', 'exception' => $e];
        }
    }

    /* Admin */
    
    public static function GetPatientAmountDue(Patient $patient) {
        $total = 0;

        $curr_date = new DateTime();
        $admissionDate = new DateTime($patient->dteAdmissionDate);
        
        $totalDays = $curr_date->diff($admissionDate)->format('%a');
        $numOfAppointments = count(GetDataTools::Appointments($patient, true));

        $numOfMonths = ceil($totalDays / 30);
        $leftDate = $admissionDate;
        for ($i=0; $i<$numOfMonths; $i++) {
            $rightDate = $leftDate->add(new DateInterval("P30D"));

            $appointments = Appointment
                ::where('intPatientId', $patient->intPatientId)
                ->whereBetween('dteAppointmentDate', [$leftDate->format(GetDataTools::$dateFormat), $rightDate->format(GetDataTools::$dateFormat)])
                ->get();

            $medicines = [];
            foreach ($appointments as $appointment) {
                $prescription = Prescription::where('intAppointmentId', $appointment->intAppointmentId)->get();
                if (count($prescription) == 1) {
                    $prescription = $prescription[0];
                    if (!in_array($prescription->strMorning, $medicines)) $medicines[] = $prescription->strMorning;
                    if (!in_array($prescription->strAfternoon, $medicines)) $medicines[] = $prescription->strAfternoon;
                    if (!in_array($prescription->strNight, $medicines)) $medicines[] = $prescription->strNight;
                }
            }

            $total += count($medicines) * 5;

            $leftDate = $rightDate;
        }

        $totalPayments = Payment::where('intPatientId', $patient->intPatientId)->get()->sum('dmlAmount');

        $total += $totalDays * 10;
        $total += $numOfAppointments * 50;

        $total -= $totalPayments;

        return $total;
    }

    public static function Appointments(Patient $patient, $future=false) {
        if ($future) {
            return Appointment::where('intPatientId', $patient->intPatientId)->where('dteAppointmentDate', '<=', new DateTime())->get();
        } else {
            return Appointment::where('intPatientId', $patient->intPatientId)->get();
        }
    }

    public static function Patients($currDate) {
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

        return $rows;
    }
}

