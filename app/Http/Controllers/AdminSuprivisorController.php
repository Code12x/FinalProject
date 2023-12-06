<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use App\Models\Roster;
use App\Models\Employees;

class AdminSuprivisorController extends Controller
{
    // Home page
    public function suprivisorHome(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("AdminSupervisor/suprivisor_home", ['user' => $user]);
    }

    // Appointment Page ----------------------------------------------------------------------------
    public function createAppointmentHome(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("AdminSupervisor/createAppointment", ['user' => $user]);
    }

    public function searchForName($id) 
    {
        $user = User::join('tblpatients', 'tblpatients.intUserId', '=', 'tblusers.intUserId')
        ->where('tblpatients.intPatientId', '=', $id)
        ->get();
        return response()->json($user);
    }

    public function searchRoster($date) 
    {
        $doctors = Roster::join('tblusers', 'tblusers.intUserId', '=', 'tblroster.intDoctor')
        ->where('dteRosterDate', '=', $date)
        ->get();
        return response()->json($doctors);
    }

    public function createAppointment(Request $request)
    {
        $request->validate([
            'intPatientId'=>'required',
            'dteAppointmentDate'=>'required',
            'intDoctorId'=>'required',
        ]);

        $data = $request->all();
        $data['intAppointmentId'] = 6;
    
        Appointment::create($data);

        return redirect('/supervisor/createAppointment');
    }

    // Create Roster ----------------------------------------------------------------------------------
    public function createRosterHome(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("AdminSupervisor/createRoster", ['user' => $user]);
    }

    public function createRoster(Request $request) 
    {
        // $request->validate([
        //     'dteRosterDate'=>'required',
        //     'intSupervisor'=>'required',
        //     'intDoctor'=>'required',
        // ]);

        $data = $request->all();

        $data['intRosterId'] = 3;

        Roster::create($data);

        return redirect('/supervisor/createRoster');
    }

    public function updateRosterChoices(Request $request) 
    {
        $roster = Roster::get();

        $supervisors = User::where('intRoleId', '=', '1')
        ->get();

        $doctors = User::where('intRoleId', '=', '2')
        ->get();

        $caregivers = User::where('intRoleId', '=', '3')
        ->get();

        return response()->json(['roster' => $roster, 'supervisors' => $supervisors, 'doctors' => $doctors, 'caregivers' => $caregivers]);

    }

    // Additonal Patient Info
    public function createAdditionalPatientInfoHome(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("AdminSupervisor/additionalPatientInfo", ['user' => $user]);
    }

    public function createAdditionalPatientInfo(Request $request)
    {
        $request->validate([
            'intGroup'=>'required',
            'dteAdmissionDate'=>'required',
            'intPatientId'=>'required',
        ]);

        $data = $request->all();
        Patient::find($data['intPatientId'])->update($data);

        return redirect('/supervisor/createAdditionalPatientInfo');
    }

    // Display Employees
    public function displayEmployeesHome(Request $request) 
    {
        $user = $request->attributes->get('user');
        return view("AdminSupervisor/displayEmployees", ['user' => $user]);
    }

    public function getEmployees() 
    {
        $employees = Employees::get();
        return response()->json($employees);
    }

    public function updateSalary(Request $request)
    {
        $request->validate([
            'dmlSalary'=>'required',
            'intEmployeeId'=>'required',
        ]);

        $data = $request->all();
        Employees::find($data['intEmployeeId'])->update($data);

        return redirect('/supervisor/displayEmployees');
    }
}