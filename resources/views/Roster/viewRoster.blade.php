<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Roster</title>
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

            <input type="submit" name="submit" id="submit">

        </form>

    </div>

    <div>
        <table id="rosterTable" border="1">

            <thead>
                <tr>
                    <th>Supervisor</th>
                    <th>Doctor</th>
                    <th>Caregiver 1</th>
                    <th>Caregiver 2</th>
                    <th>Caregiver 3</th>
                    <th>Caregiver 4</th>
                </tr>
            </thead>
            
            <tbody>
        
            </tbody>

        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#familyform').submit(function (event) {
                event.preventDefault();

                let date = $('#date').val();

                $.get(`/roster/viewRosterInfo?date=${date}`, function (data) {
                    $.each(data, function (index, roster) {
                        $('#rosterTable tbody').append(`
                            <tr>
                                <td>${roster.intSupervisor}</td>
                                <td>${roster.intDoctor}</td>
                                <td>${roster.intCaregiver1}</td>
                                <td>${roster.intCaregiver2}</td>
                                <td>${roster.intCaregiver3}</td>
                                <td>${roster.intCaregiver4}</td>
                            </tr>
                        `);
                    });
                });
            });
        });
    </script>

</body>
</html>