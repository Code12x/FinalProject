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
    <h1>Create Additoinal Info</h1>
</div>

<form action="" method="post" onchange = "displayname()">
    <label for="patientId">Patient ID:</label><br>
    <input type="number" id = "patientId" name = "intPatientId">
    <p>Name:</p> <p id="nameDisplay"> </p>
    <br>
    <label for="group">Group:</label><br>
    <input type="int" id = "group" name = "intGroup">
    <br>
    <label for="admissionDate">Admission Date:</label><br>
    <input type="date" id = "admissionDate" name = "dteAdmissionDate">
    <br>
    <input type="submit" value="Submit">
</form>


<script>
function displayname()
{
    var patientId = $("#patientId").val();
    $.get(`/supervisor/searchForName/${patientId}`, function (data) 
    {
        $('#nameDisplay').html(`${data[0].strFirstName} ${data[0].strLastName}`);
    });
}
</script>

</body>
</html>

@endsection