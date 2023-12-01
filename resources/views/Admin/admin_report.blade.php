@extends('Shared/_layout')

@section('title', 'Report')

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
    <label for="date">Date</label>
    <input type="date" name="date" id="date">
</div>

<br>

<table>
    <tr>
        <th>Patient's Name</th>
        <th>Doctor's Name</th>
        <th>Doctor's Appointment</th>
        <th>Caregiver's Name</th>
        <th>Morning Medicine</th>
        <th>Afternoon Medicine</th>
        <th>Night Medicine</th>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    @foreach ($rows as $row)

    <tr>
        <td>{{ $row->patientName }}</td>
        <td>{{ $row->doctorName }}</td>
        <td>{{ $row->caregiverName }}</td>
        <td>{{ $row->doctorAppointment }}</td>
        <td>{{ $row->prescription }}</td>
        <td>{{ $row->morningMedicine }}</td>
        <td>{{ $row->afternoonMedicine }}</td>
        <td>{{ $row->nightMedicine }}</td>
        <td>{{ $row->breakfast }}</td>
        <td>{{ $row->lunch }}</td>
        <td>{{ $row->dinner }}</td>
    </tr>

    @endforeach
</table>


@endsection