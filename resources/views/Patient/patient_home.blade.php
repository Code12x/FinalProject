@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>
    .content {
        padding: 5px;
    }
    
    table {
        border-collapse: collapse;
    }
    
    th, td {
        border: 1px solid black;
        padding: 5px;
    }
</style>
@endsection

@section('content')
<div>
    <label for="patientId">PatientID</label>
    <input type="text" disabled value="{{ $row->patientId }}">
    <label for="patientName">Patient Name</label>
    <input type="text" disabled value="{{ $row->patientName }}">
</div>
<br>
<div>
    <label for="date">Date</label>
    <input type="date" name="date" id="date" value="{{ $date }}">
    <button type="submit">Apply</button>
</div>

<br>

<table>
    <tr>
        <th>Patient's Name</th>
        <th>Doctor's Name</th>
        <th>Caregiver's Name</th>
        <th>Doctor's Appointment</th>
        <th>Presciption</th>
        <th>Morning Medicine</th>
        <th>Afternoon Medicine</th>
        <th>Night Medicine</th>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    <tr>
        <td>{{ $row->patientName }}</td>
        <td>{{ $row->doctorName }}</td>
        <td>{{ $row->caregiverName }}</td>
        <td>{{ $row->appointment }}</td>
        <td>{{ $row->prescription }}</td>
        <td>{{ $row->morningMed }}</td>
        <td>{{ $row->afternoonMed }}</td>
        <td>{{ $row->nightMed }}</td>
        <td>{{ $row->breakfast }}</td>
        <td>{{ $row->lunch }}</td>
        <td>{{ $row->dinner }}</td>
    </tr>
</table>

@endsection

@section('script')
<script>
    $("button[type='submit']").on('click', function(e) {
        let loc = window.location;
        loc.search = `?date=${$("#date").val()}`;
    });
</script>
@endsection