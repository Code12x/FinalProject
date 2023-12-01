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

<div id = "test"></div>


<script>
$(document).ready(function () 
{
    let supervisorsIds = [];
    let doctorIds = [];
    let caregiverIds = [];

    $.get(`/suprivisor/updateRosterChoices`, function (data) 
    {
        $.each(data.roster, function (index, roster) 
        {
            if(roster.dteRosterDate >= '2023-11-29')
            {
                supervisorsIds.push(roster.intSupervisor);
                doctorIds.push(roster.intDoctor);
                caregiverIds.push(roster.intCaregiver1);
                caregiverIds.push(roster.intCaregiver2);
                caregiverIds.push(roster.intCaregiver3);
                caregiverIds.push(roster.intCaregiver4);
            }
        }); 
        $('#test').append(`<p>${caregiverIds}</p>`)

        $.each(data.supervisors, function (index, supervisor) 
        {
            if ((supervisorsIds.indexOf(supervisor.intUserId) === -1)) {
                $('#supdropdown').append(`<option value="${supervisor.intUserId}">${supervisor.strFirstName} ${supervisor.strLastName}</option>`);
            }
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