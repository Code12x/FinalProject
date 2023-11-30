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
    <h1>Create Roster</h1>
</div>

<form action="" method="post">
    <label for="date">Until Date:</label>
    <input type="date" id = "date" name = "untilDate">
    <br>    

    <label for="supdropdown">Supervisor:</label>
    <select id="supdropdown" name="intSupervisor">
        
    </select>
    <br>   
    <label for="docdropdown">Doctor:</label>
    <select id="docdropdown" name="intDoctor">
        
    </select>
    <br>   
    <label for="cardropdown1">Caregiver 1:</label>
    <select id="cardropdown1" name="intCaregiver1" onchange = "updateCaregivers()">
        
    </select>
    <br>   
    <label for="cardropdown2">Caregiver 2:</label>
    <select id="cardropdown2" name="intCaregiver2" onchange = "updateCaregivers()">
        
    </select>
    <br>   
    <label for="cardropdown3">Caregiver 3:</label>
    <select id="cardropdown3" name="intCaregiver3" onchange = "updateCaregivers()">
        
    </select>
    <br>   
    <label for="cardropdown4">Caregiver 4:</label>
    <select id="cardropdown4" name="intCaregiver4" onchange = "updateCaregivers()">
        
    </select>
    <br>   
    <br>
    <input type="submit" value="Submit">
    
</form>


<script>
$(document).ready(function () 
{
    $.get(`/suprivisor/updateRosterChoices`, function (data) 
    {
        $.each(data.supervisors, function (index, supervisors) 
        {
            $('#supdropdown').append(`<option value = ${supervisors.intUserId}>${supervisors.strFirstName} ${supervisors.strLastName}</option>`);
        });

        $.each(data.doctors, function (index, doctors) 
        {
            $('#docdropdown').append(`<option value = ${doctors.intUserId}>${doctors.strFirstName} ${doctors.strLastName}</option>`);
        });

        $.each(data.caregivers, function (index, caregivers) 
        {
            $('#cardropdown1').append(`<option value = ${caregivers.intUserId}>${caregivers.strFirstName} ${caregivers.strLastName}</option>`);
            $('#cardropdown2').append(`<option value = ${caregivers.intUserId}>${caregivers.strFirstName} ${caregivers.strLastName}</option>`);
            $('#cardropdown3').append(`<option value = ${caregivers.intUserId}>${caregivers.strFirstName} ${caregivers.strLastName}</option>`);
            $('#cardropdown4').append(`<option value = ${caregivers.intUserId}>${caregivers.strFirstName} ${caregivers.strLastName}</option>`);
        });
    });
});

function updateCaregivers()
{

}

</script>

</body>
</html>

@endsection