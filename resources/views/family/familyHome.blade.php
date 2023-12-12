@extends('Shared/_layout')

@section('title', 'Home')

@section('css')
<style>

    .tables {
        display: flex;
    }

    .center {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 25px;
        margin-bottom: 25px;
    }

    #familyForm {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .fields {
        display: flex;
        flex-direction: column;
        text-align: center;
        line-height: 25px;
    }

    #submit {
        margin-top: 10px;
        width: 50%;
    }

</style>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Member Home Page</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <div class="center">

        <form method="get" id="familyForm">
            <div class="fields">
                <label>Date</label>
                <input type="date" name="date" id="date" value="">

                <label>Family Code</label>
                <input type="password" name="familyCode" id="familyCode" value="">

                <label>Patient ID</label>
                <input type="int" name="patientId" id="patientId" placeholder="Enter patient's ID">
            </div>

                <input type="submit" name="submit" id="submit" value="GO">
        </form>

    </div>

    <div class="center">
        <div class="tables">
            <table id="doctorInfoTable" border="1">

                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Appointment</th>
                    </tr>
                </thead>
                
                <tbody>
            
                </tbody>

            </table>

            <table id="caregiverInfoTable" border="1">

                <thead>
                    <tr>
                        <th>Caregiver</th>
                    </tr>
                </thead>
                
                <tbody>
            
                </tbody>

            </table>

            <table id="patientInfoTable" border="1">

                <thead>
                    <tr>
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
    </div>

    <script>

        $(document).ready(function () {
            $('#familyForm').submit(function (event) {
                event.preventDefault();

                let date = $('#date').val();
                let familyCode = $('#familyCode').val();
                let patientId = $('#patientId').val();

                $('#doctorInfoTable tbody').empty();
                $('#caregiverInfoTable tbody').empty();
                $('#patientInfoTable tbody').empty();

                $.get(`/family/getDoctorInfo?date=${date}&patientId=${patientId}`, function (data) {
                    $.each(data, function (index, doctorInfo) {
                    $('#doctorInfoTable tbody').append(`
                        <tr>
                            <td>${doctorInfo.strFirstName} ${doctorInfo.strLastName}</td>
                            <td>${doctorInfo.intAppointmentId}</td>
                        </tr>
                    `);
                });
            });

            $.get(`/family/getRosterInfo?date=${date}`,{patientId}, function (data) {
                $.each(data, function (index, caregiver) {
                    $('#caregiverInfoTable tbody').append(`
                        <tr>
                            <td>${caregiver.strFirstName} ${caregiver.strLastName}</td>
                        </tr>
                    `);
                });
            });

            $.get(`/family/getPatientInfo?date=${date}&familyCode=${familyCode}&patientId=${patientId}`)
                .then(function(data) {
                    $.each(data, function(index, patientCareLog) {
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

                        let table = document.getElementById("patientInfoTable").rows;
                        let newRow = table[table.length - 1];

                            if (patientCareLog.bitMorningMed === 1) {
                                newRow.cells[0].innerHTML = '&#10003;';
                            } else {
                                newRow.cells[0].innerHTML = '';
                            }

                            if (patientCareLog.bitAfternoonMed === 1) {
                                newRow.cells[1].innerHTML = '&#10003;';
                            } else {
                                newRow.cells[1].innerHTML = '';
                            }

                            if (patientCareLog.bitEveningMed === 1) {
                                newRow.cells[2].innerHTML = '&#10003;';
                            } else {
                                newRow.cells[2].innerHTML = '';
                            }

                            if (patientCareLog.bitBreakfast === 1) {
                                newRow.cells[3].innerHTML = '&#10003;';
                            } else {
                                newRow.cells[3].innerHTML = '';
                            }

                            if (patientCareLog.bitLunch === 1) {
                                newRow.cells[4].innerHTML = '&#10003;';
                            } else {
                                newRow.cells[4].innerHTML = '';
                            }

                            if (patientCareLog.bitDinner === 1) {
                                newRow.cells[5].innerHTML = '&#10003;';
                            } else {
                                newRow.cells[5].innerHTML = '';
                            }
                    });
                });
            });
        });
        
    </script>

</body>
</html>
@endsection