<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Member Home Page</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <header>

    </header>

    <div class="">

        <form method="get" id="familyform">
            <label>Date
                <input type="date" name="date" id="date" value="">
            </label>

            <label>Family Code
                <input type="text" name="familyCode" id="familyCode" value="">
            </label>

            <label>Patient ID
                <input type="int" name="patientId" id="patientId" placeholder="Enter patient's ID">
            </label>

            <input type="submit" name="submit" id="submit">
        </form>

    </div>

    <div>
        <table id="patientInfoTable" border="1">

            <thead>
                <tr>
                    <!-- <th>Doctor</th>
                    <th>Appointment</th>
                    <th>Caregiver</th> -->
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
            </thead>
            
            <tbody>
        
            </tbody>

        </table>
    </div>

    <div>
        <!-- test display data -->
        <!-- @foreach ($patients as $patient)
        <div>
            <p>1. {{ $patient->intPatientId }}</p>
        </div>
        @endforeach -->
    </div>

    <footer>

    </footer>

    <script>
        $(document).ready(function () {
            $('#familyform').submit(function (event) {
                event.preventDefault();

                let date = $('#date').val();
                let patientId = $('#patientId').val();

                $.get(`/family/getInfo?date=${date}&patientId=${patientId}`, function (data) {

                    $.each(data, function (index, patientCareLog) {
                        $('#patientInfoTable tbody').append(`
                            <tr>
                                <td>${patientCareLog.bitMorningMed}</td>
                                <td>${patientCareLog.bitAfternoonMed}</td>
                                <td>${patientCareLog.bitEveningMed}</td>
                                <td>${patientCareLog.bitBreakfast}</td>
                                <td>${patientCareLog.bitLunch}</td>
                                <td>${patientCareLog.bitDinner}</td>
                            </tr>
                        `);
                    });
                });
            });
        });
    </script>

<!-- <th>${DoctorintFirstName}</th> -->
<!-- <th>${intAppointment}</th> -->
<!-- <th>${CaregiverintFirstName}</th> -->

</body>
</html>