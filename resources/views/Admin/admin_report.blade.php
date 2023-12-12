@extends('Shared/_layout')

@section('title', 'Report')

@section('css')
<style>
    .content {
        padding: 5px;
    }
    
    table {
        border-collapse: collapse;
    }
    
    th, td {
        border: 1px solid black;
        padding: 5px;
    }

    .infoTable {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

</style>
@endsection

@section('content')

<div class="dateBar">
    <label for="date">Date</label>
    <input type="date" name="date" id="date" value="{{ $date }}">
    <button type="submit">Apply</button>
</div>

<div class="infoTable">
    <table id="table">
        <tr>
            <th>Patient's Name</th>
            <th>Doctor's Name</th>
            <th>Caregiver's Name</th>
            <th>Doctor's Appointment</th>
            <th>Presciption</th>
            <th>Morning Medicine</th>
            <th>Afternoon Medicine</th>
            <th>Night Medicine</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
        </tr>
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->patientName }}</td>
            <td>{{ $row->doctorName }}</td>
            <td>{{ $row->caregiverName }}</td>
            
            <!-- <td>{{ $row->doctorAppointment }}</td> -->
                @if ($row->doctorAppointment === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

            <!-- <td>{{ $row->prescription }}</td> -->
                @if ($row->prescription === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

            <!-- <td>{{ $row->morningMedicine }}</td> -->
                @if ($row->morningMedicine === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

            <!-- <td>{{ $row->afternoonMedicine }}</td> -->
                @if ($row->afternoonMedicine === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

            <!-- <td>{{ $row->nightMedicine }}</td> -->
                @if ($row->nightMedicine === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

            <!-- <td>{{ $row->breakfast }}</td> -->
                @if ($row->breakfast === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

            <!-- <td>{{ $row->lunch }}</td> -->
                @if ($row->lunch === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

            <!-- <td>{{ $row->dinner }}</td> -->
                @if ($row->dinner === 1)
                    <td>&#10003;</td>
                @else
                    <td>&times;</td>
                @endif

        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
<script>
    $("button[type='submit']").on('click', function() {
        let loc = window.location;
        loc.search = `?date=${$("#date").val()}`;
    });
</script>
@endsection