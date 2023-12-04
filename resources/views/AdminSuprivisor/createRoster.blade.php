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
    <label for="date">Date:</label>
    <input type="date" id = "date" name = "date">
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
let caregiverIds = [];
$(document).ready(function () 
{
    let supervisorsIds = [];
    let doctorIds = [];

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

        $.each(data.supervisors, function (index, supervisor) 
        {
            if ((supervisorsIds.indexOf(supervisor.intUserId) === -1)) {
                $('#supdropdown').append(`<option value="${supervisor.intUserId}">${supervisor.strFirstName} ${supervisor.strLastName}</option>`);
            }
        });

        $.each(data.doctors, function (index, doctor) 
        {
            if ((doctorIds.indexOf(doctor.intUserId) === -1)) {
                $('#docdropdown').append(`<option value = ${doctor.intUserId}>${doctor.strFirstName} ${doctor.strLastName}</option>`);
            }
        });

        $.each(data.caregivers, function (index, caregiver) 
        {
            if ((caregiverIds.indexOf(caregiver.intUserId) === -1)) {
                $('#cardropdown1').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
                $('#cardropdown2').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
                $('#cardropdown3').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
                $('#cardropdown4').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
            }
        });
    });
});

function updateCaregivers()
{
    let selectedSupervisorsIds = [];
   // $('#cardropdown1').html('');
    $('#cardropdown2').html('');
    $('#cardropdown3').html('');
    $('#cardropdown4').html('');

    selectedSupervisorsIds.push($('#cardropdown1').val());
    selectedSupervisorsIds.push($('#cardropdown2').val());
    selectedSupervisorsIds.push($('#cardropdown3').val());
    selectedSupervisorsIds.push($('#cardropdown4').val());

    console.log(selectedSupervisorsIds);
    $.get(`/suprivisor/updateRosterChoices`, function (data) 
    {
        $.each(data.caregivers, function (index, caregiver) 
        {
            if ((caregiverIds.indexOf(caregiver.intUserId) === -1) && (selectedSupervisorsIds.indexOf(caregiverIds.intUserId) === -1)) {
              //  $('#cardropdown1').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
                $('#cardropdown2').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
                $('#cardropdown3').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
                $('#cardropdown4').append(`<option value = ${caregiver.intUserId}>${caregiver.strFirstName} ${caregiver.strLastName}</option>`);
            }
        });
    });
}

</script>

</body>
</html>

@endsection