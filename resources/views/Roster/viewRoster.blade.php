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
                    console.log(data)
                    console.log(data.roster)
                    $.each(data.roster, function (index, roster) {
                        $('#rosterTable tbody').append(`
                            <tr>
                                <td>${roster['supFirstName']} ${roster['supLastName']}</td>
                                <td>${roster['docFirstName']} ${roster['docLastName']}</td>
                                <td>${roster['cg1FirstName']} ${roster['cg1LastName']}</td>
                                <td>${roster['cg2FirstName']} ${roster['cg2LastName']}</td>
                                <td>${roster['cg3FirstName']} ${roster['cg3LastName']}</td>
                                <td>${roster['cg4FirstName']} ${roster['cg4LastName']}</td>
                            </tr>
                        `);
                    });
                });
            });
        });
    </script>

</body>
</html>