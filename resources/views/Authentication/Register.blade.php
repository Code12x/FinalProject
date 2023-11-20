<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <form action="" method="post" onchange="showInputs()">
        <label for="Email">Email:</label><br>
        <select id="dropdown" name="intRoleId">
            <option value="0">Admin</option>
            <option value="1">Suprivisor</option>
            <option value="2">Doctor</option>
            <option value="3">Caregiver</option>
            <option value="4">Patient</option>
            <option value="5">Family Member</option>
        </select>
        <br>
        <label for="firstname">First name:</label><br>
        <input type="text" id = "firstname" name = "strFirstName">
        <br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id = "lastname" name = "strLastName">
        <br>
        <label for="email">Email:</label><br>
        <input type="email" id = "email" name = "strEmail">
        <br>
        <label for="phonenumber">Phone Number:</label><br>
        <input type="tel" id = "phonenumber" name = "strPhone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        <br>
        <label for="password">Password:</label><br>
        <input type="password" id = "password" name = "strPassword">
        <br>
        <label for="dateofbirth">Date of Birth:</label><br>
        <input type="date" id = "dateofbirth" name = "dteDateOfBirth">

        <div id="patientInputs" class="hidden">
            <label for="familycode">Family Code:</label>
            <input type="password" id="familycode" name="strFamilyCode">
            <br>
            <label for="emergancycontact">Emergency Contact:</label>
            <input type="text" id="emergencycontact" name="strEmergencyContactPhone">
            <br>
            <label for="relationemergancycontact">Relation to emergancy contact:</label>
            <input type="text" id="relationemergancycontact" name="strEmergencyContactRelation">
        </div>

        <input type="submit" value="Submit">
        
    </form>
</body>

<script>
    function showInputs() {
        var dropdown = document.getElementById('dropdown');
        var patientInputs = document.getElementById('patientInputs');

        if (dropdown.value === '4') {
            patientInputs.style.display = 'block';
        } else {
            patientInputs.style.display = 'none';
        }
    }
</script>


</html>