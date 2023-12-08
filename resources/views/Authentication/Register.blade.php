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

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        form {
            background-color: rgba(255, 255, 255, 0.95);
            height: fit-content;
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .userTypeDropdown {
            display: flex;
        }

        .dropdownLabel {
            padding-right: 10px;
        }

        input {
            width: 200px;
            height: 25px;
            border-radius: 20px;
            border-width: 1px;
        }

        #submitButton {
            background-color: #3B2712;
            /* background-color: rgba(165, 129, 91, 1); */
            border-style: none;
            cursor: pointer;
            border-radius: 20px;
            height: 35px;
            color: white;
        }

        .divSubmit {
            padding-top: 25px;
        }

        .divName {
            height: 100vh;
            background-color: rgba(165, 129, 91, .9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-left: 20px;
            padding: 50px;
            color: white;
            
        }

        body {
            height: 100vh;
            background-image: url('images/loginRegisterBackground.jpeg');
            background-size: cover;
            background-color: #FAE7C7;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>
    <form action="" method="post" onchange="showInputs()">
        <div class="userTypeDropdown">
            <label for="dropdown" class="dropdownLabel">User type </label><br>
            <select id="dropdown" name="intRoleId">
                @foreach ($roles as $role)
                <option value="{{ $role->intRoleId }}">{{ $role->strName }}</option>
                @endforeach
            </select>
        </div>
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

        <div class="divSubmit">
            <input type="submit" value="Register" id="submitButton">
        </div>



    </form>

    <div class="divName">
        <h1>
            Shady Oaks
        </h1>
        <h1>
            Retirement Village
        </h1>
        <h1>
            Registration Page
        </h1>
    </div>

</body>

<script>
    function showInputs() {
        var dropdown = document.getElementById('dropdown');
        var patientInputs = document.getElementById('patientInputs');

        if (dropdown.value === '5') {
            patientInputs.style.display = 'block';
        } else {
            patientInputs.style.display = 'none';
        }
    }
</script>


</html>