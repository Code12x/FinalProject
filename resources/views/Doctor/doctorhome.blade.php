@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>
</style>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div>
    <h1>Doctor</h1>
</div>

<div>
    <h1>Old appointments</h1>
    <table id="oldappointmentsTable" border="1">
    <thead>
        <tr>
            <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Appointment Date</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data will be inserted here dynamically -->
    </tbody>
</table>
</div>

<div>
    <h1>New appointments</h1>
    <label for="tilldate">Display appointments until:</label><br>
    <input type="date" id = "tilldate" name = "tilldate" value="2023-11-25">
    <input type="submit" value="Submit" id="submitbtn">
</div>

<table id="newappointmentsTable" border="1">
    <thead>
        <tr>
            <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Appointment Date</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data will be inserted here dynamically -->
    </tbody>
</table>

<script>
    // Old appointments
    $(document).ready(function () 
    {
        $.get('/doctor/getOldAppointments', function (data) {
            $.each(data, function (index, appointment) 
            {
                $('#oldappointmentsTable tbody').append(`
                    <tr>
                        <td>${appointment.intAppointmentId}</td>
                        <td>${appointment.intPatientId}</td>
                        <td>${appointment.intDoctorId}</td>
                        <td>${appointment.dteAppointmentDate}</td>
                    </tr>
                `);
            });
        });
    });

    // New appointments
    $(document).on("click", "#submitbtn", function () 
    {
        var untilldate = $("#tilldate").val();
        $.get(`/doctor/getNewAppointments/${untilldate}`, function (data) {
            {
                $.each(data, function (index, appointment) 
                {
                    $('#newappointmentsTable tbody').append(`
                        <tr>
                            <td>${appointment.intAppointmentId}</td>
                            <td>${appointment.intPatientId}</td>
                            <td>${appointment.intDoctorId}</td>
                            <td>${appointment.dteAppointmentDate}</td>
                        </tr>
                    `);
                });
            }
        });
    });
</script>

</body>
</html>

@endsection