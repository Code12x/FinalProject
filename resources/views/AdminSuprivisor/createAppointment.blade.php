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
    <title>Create Appointment</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div>
    <h1>Create Appointment</h1>
</div>

<form action="" method="post" onchange = "displayname()">
    <label for="patientId">Patient ID:</label><br>
    <input type="number" id = "patientId" name = "intPatientId">
    <p>Name:</p> <p id="nameDisplay"> </p>
    <br>
    <label for="date">Date:</label><br>
    <input type="date" id = "date" name = "dteAppointmentDate" onchange = "displaydoctors()">
    <br>

    <label for="docdropdown">Doctor:</label><br>
    <select id="docdropdown" name="intDoctorId">
        
    </select>

    <br>
    <input type="submit" value="Submit">
    
</form>


<script>
function displaydoctors()
{
    $('#docdropdown').html('');

    var date = $("#date").val();
    $.get(`/suprivisor/searchRoster/${date}`, function (data) 
    {
        {
            $.each(data, function (index, doctor) 
            {
                $('#docdropdown').append(`<option value = ${doctor.intUserId}>${doctor.strFirstName} ${doctor.strLastName}</option>`);
            });
        }
    });
};

function displayname()
{
    var patientId = $("#patientId").val();
    $.get(`/suprivisor/searchForName/${patientId}`, function (data) 
    {
        $('#nameDisplay').html(`${data[0].strFirstName} ${data[0].strLastName}`);
    });
}


</script>

</body>
</html>

@endsection