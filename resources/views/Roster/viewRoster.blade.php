@extends('Shared._layout')

@section('title', 'View Roster')

@section('css')
<style>
    .content {
        padding: 5px;
    }
    
    #rosterTable {
        border-collapse: collapse;
    }

    th, td {
        padding: 5px;
    }
</style>
@endsection

@section('content')
    <div>
        <form method="get" id="familyform">
            <label>Date
                <input type="date" name="date" id="date" value="">
            </label>

            <input type="submit" name="submit" id="submit">
        </form>
    </div>

    <br>

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
            
            <tbody></tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#familyform').submit(function (event) {
                event.preventDefault();

                $("#rosterTable tbody").empty();

                let date = $('#date').val();

                $.get(`/roster/viewRosterInfo?date=${date}`, function (data) {
                    $.each(data.roster, function (index, roster) {
                        $('#rosterTable tbody').append(`
                            <tr>
                                <td>${roster['supFirstName']} ${roster['supLastName']}</td>
                                <td>${roster['docFirstName']} ${roster['docLastName']}</td>
                                <td>${roster['cg1FirstName']} ${roster['cg1LastName']}</td>
                                <td>${roster['cg2FirstName']} ${roster['cg2LastName']}</td>
                                <td>${roster['cg3FirstName']} ${roster['cg3LastName']}</td>
                                <td>${roster['cg4FirstName']} ${roster['cg4LastName']}</td>
                            </tr>`
                        );
                    });

                });
            });
        });
    </script>
@endsection