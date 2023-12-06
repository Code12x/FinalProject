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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>


    <h1>Patient Page</h1>

    <h2>Old Perscriptions</h2>


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
<br>
@if ($appointmentToday->count() == 1)
    <h2>New Perscription</h2>
    <p>{{ $appointmentToday[0]->dteAppointmentDate }}</p>

    <form action="" method="post">
        <label for="comment">Comment:</label>
        <input type="text" id="comment" name="strComment">
        <br>
        <label for="mmned">Morning Med:</label>
        <input type="text" id="mmned" name="strMorning">
        <br>
        <label for="amed">Afternoon Med:</label>
        <input type="text" id="amed" name="strAfternoon">
        <br>
        <label for="nmed">Night Med:</label>
        <input type="text" id="nmed" name="strNight">
        <br>
        <input type="submit" value="Submit">
    </form>
@else
    <p>No appointments today.</p>
@endif

<script>
$(document).ready(function () 
    {
        var newPerscriptionInputs = document.getElementById('newPerscriptionInputs');


        if (dropdown.value === '4') {
            patientInputs.style.display = 'block';
        } else {
            patientInputs.style.display = 'none';
        }
    });

</script>

</body>
</html>

@endsection