@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>
    table{
        border-collapse: collapse;
    }
    table th, table tr, table td{
        padding: 5px;
    }
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
    <h1>Patient Page</h1>
</div>

<table id="OldPerscriptions" border="1">
    <thead>
        <tr>
            <th>Date</th>
            <th>Comment</th>
            <th>Morning Med</th>
            <th>Afternoon Med</th>
            <th>Night Med</th>
        </tr>
        @foreach($oldperscriptions as $prescription)
            <tr>
                <td>{{ $prescription->dteAppointmentDate }}</td>
                <td>{{ $prescription->strComment }}</td>
                <td>{{ $prescription->strMorning }}</td>
                <td>{{ $prescription->strAfternoon }}</td>
                <td>{{ $prescription->strNight }}</td>
            </tr>
        @endforeach
    </thead>
    <tbody>
        
    </tbody>
</table>


<script>
$(document).ready(function () 
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


</script>

</body>
</html>

@endsection