@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>
.form {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f4f4f4;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form p {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

label {
    /* display: inline-block;
    width: 120px; 
    margin-right: 10px; */
}

input[type="checkbox"] {
    margin-right: 5px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
@endsection

@section('content')
    
 
<h1>Caregiver's Home</h1>
<div>{{$currDate}}</div>

        
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

            <form class = "form" action="updatePatient" method="post">
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