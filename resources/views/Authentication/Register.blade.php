<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="Email">Email:</label><br>
        <select id="dropdown" name="dropdown">
            <option value="admin">Admin</option>
            <option value="suprivisor">Suprivisor</option>
            <option value="doctor">Doctor</option>
            <option value="caregiver">Caregiver</option>
            <option value="patient">Patinet</option>
            <option value="familymember">Family Member</option>
        </select>
        <br>
        <label for="firstname">First name:</label><br>
        <input type="text" id = "firstname" name = "First Name">
        <br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id = "lastname" name = "Last Name">
        <br>
        <label for="email">Email:</label><br>
        <input type="email" id = "email" name = "Email">
        <br>
        <label for="phonenumber">:</label><br>
        <input type="tel" id = "phonenumber" name = "Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        <br>
        <label for="">:</label><br>
        <input type="text" id = "" name = "">
        <br>
        <label for="">:</label><br>
        <input type="text" id = "" name = "">
        
    </form>
</body>
</html>