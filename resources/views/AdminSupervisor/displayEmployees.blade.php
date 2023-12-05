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
    <title>Create Roster</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div>
    <h1>Display Employees</h1>
</div>


<table id="employees" border="1">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>User ID</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>



<script>
 $(document).ready(function () 
    {
        $.get('/supervisor/displayEmployees', function (data) {
            $.each(data, function (index, employee) 
            {
                $('#employees tbody').append(`
                    <tr>
                        <td>${employee.intAppointmentId}</td>
                        <td>${employee.intPatientId}</td>
                        <td>${employee.intDoctorId}</td>
                    </tr>
                `);
            });
        });
    });

</script>

</body>
</html>

@endsection