@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>

</style>
@endsection

@section('content')
    
 
<h1>Caregiver's Home</h1>
{{$currDate}}
        
<div id="forms">

</div>
    


@endsection

@section('script')
<script>
$(document).ready(function () 
{
    $.get('/caregiver/getPatients', function (data) {
        $.each(data, function (index, patient) 
        {
            $('#forms').append(`

            <form action="updatePatient" method="post">
                <p>Name: ${patient.strFirstName} ${patient.strLastName}</p>
                <input type="hidden" id="patientId" name="intLogId" value="${patient.intLogId}" readonly>

                <label for="mmed">Morning Med:</label>
                <input type="checkbox" id="mmed" name="bitMorningMed" ${patient.bitMorningMed === 1 ? 'checked disabled' : ''}>
                
                <label for="amed">Afternoon Med:</label>
                <input type="checkbox" id="amed" name="bitAfternoonMed" ${patient.bitAfternoonMed === 1 ? 'checked disabled' : ''}>

                <label for="nmed">Night Med:</label>
                <input type="checkbox" id="nmed" name="bitEveningMed" ${patient.bitEveningMed === 1 ? 'checked disabled' : ''}>
                
                <label for="breakfast">Breakfast:</label>
                <input type="checkbox" id="breakfast" name="bitBreakfast"${patient.bitBreakfast === 1 ? 'checked disabled' : ''}>

                <label for="lunch">Lunch:</label>
                <input type="checkbox" id="lunch" name="bitLunch" ${patient.bitLunch === 1 ? 'checked disabled' : ''}>

                <label for="dinner">Dinner:</label>
                <input type="checkbox" id="dinner" name="bitDinner" ${patient.bitDinner === 1 ? 'checked disabled' : ''}>
                
                <input type="submit" value="Submit">
            </form>
            <br>
            `);
        });
    });
});

</script>
@endsection