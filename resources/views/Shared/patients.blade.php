@extends('Shared/_layout')

@section('title', 'Patients')

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

    .apply-filters {
        padding: 5px;
        margin: 5px auto;
        display: block;
    }
</style>
@endsection

@section('content')

<button id="submit" class="apply-filters">Apply Filters</button>

<table id="patients-table">
    <thead>
        <tr>
            <td><input id="search-ids" type="text" placeholder="Search IDs"></td>
            <td><input id="search-names" type="text" placeholder="Search Names"></td>
            <td><input id="search-ages" type="text" placeholder="Search Ages"></td>
            <td><input id="search-emergency-contacts" type="text" placeholder="Search Emergency Contacts"></td>
            <td><input id="search-emergency-contact-relations" type="text" placeholder="Search Emergency Contact Relations"></td>
            <td><input id="search-admission-dates" type="text" placeholder="Search Admission Dates"></td>

        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Emergency Contact</th>
            <th>Emergency Contact Relation</th>
            <th>Admission Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->age }}</td>
            <td>{{ $row->emergencyContact }}</td>
            <td>{{ $row->emergencyContactRelation }}</td>
            <td>{{ $row->admissionDate }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        let table = new DataTable('#patients-table');
    });

    $("#submit").on('click', function(e) {
        let searchIds = valOrNull($("#search-ids"));
        let searchNames = valOrNull($("#search-names"));
        let searchAges = valOrNull($("#search-ages"));
        let searchEmergencyContacts = valOrNull($("#search-emergency-contacts"));
        let searchEmergencyContactRelations = valOrNull($("#search-emergency-contact-relations"));
        let searchAdmissionDates = valOrNull($("#search-admission-dates"));

        search = {};
        if (searchIds != null) search.searchIds = searchIds;
        if (searchNames != null) search.searchNames = searchNames;
        if (searchAges != null) search.searchAges = searchAges;
        if (searchEmergencyContacts != null) search.searchEmergencyContacts = searchEmergencyContacts;
        if (searchEmergencyContactRelations != null) search.searchEmergencyContactRelations = searchEmergencyContactRelations;
        if (searchAdmissionDates != null) search.searchAdmissionDates = searchAdmissionDates;

        $.get("/patients/search", search, function(rows) {
            console.log(rows);
            clearTable($("#patients-table"));
            populateTable($("#patients-table"), rows);
        })
    });

    function clearTable(table) {
        let body = $(table).find("tbody");
        $(body).empty();
    }

    function populateTable(table, rows) {
        let body = $(table).find("tbody");

        let newRows = [];
        
        for (row of rows) {
            newRow =
                `<tr>
                    <td>${row.id}</td>
                    <td>${row.name}</td>
                    <td>${row.age}</td>
                    <td>${row.emergencyContact}</td>
                    <td>${row.emergencyContactRelation}</td>
                    <td>${row.admissionDate}</td>
                </tr>`;
            
            newRows.push(newRow);
        }

        body.append(newRows);
    }

    function valOrNull(obj) {
        if (obj.val().trim() === "") {
            return null;
        }
        return obj.val();
    }
</script>
@endsection