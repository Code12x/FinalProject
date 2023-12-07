@extends('Shared._layout')

@section('title', 'View Roster')

@section('content')
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
@endsection

@section('script')
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Group 1</td>
                                <td>Group 2</td>
                                <td>Group 3</td>
                                <td>Group 4</td>
                            </tr>
                        `);
                    });
                });
            });
        });
    </script>
@endsection