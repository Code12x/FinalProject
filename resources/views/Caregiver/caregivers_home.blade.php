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

            <form action="" method="post">
                <p>Name: ${patient.intPatientId}</p>

                <label for="mmed">Morning Med:</label>
                <input type="checkbox" id="mmed" name="" ${patient.bitMorningMed === 1 ? 'checked disabled' : ''}>
                
                <label for="amed">Afternoon Med:</label>
                <input type="checkbox" id="amed" name="" ${patient.bitAfternoonMed === 1 ? 'checked disabled' : ''}>

                <label for="nmed">Night Med:</label>
                <input type="checkbox" id="nmed" name="" ${patient.bitEveningMed === 1 ? 'checked disabled' : ''}>
                
                <label for="breakfast">Breakfast:</label>
                <input type="checkbox" id="breakfast" name="" ${patient.bitBreakfast === 1 ? 'checked disabled' : ''}>

                <label for="lunch">Lunch:</label>
                <input type="checkbox" id="lunch" name="" ${patient.bitLunch === 1 ? 'checked disabled' : ''}>

                <label for="dinner">Dinner:</label>
                <input type="checkbox" id="dinner" name="" ${patient.bitDinner === 1 ? 'checked disabled' : ''}>
                
                <input type="submit" value="Submit">
            </form>
            <br>
            `);
        });
    });
});

</script>
@endsection