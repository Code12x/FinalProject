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
</style>
@endsection

@section('content')

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Emergency Contact</th>
        <th>Emergency Contact Relation</th>
        <th>Admission Date</th>
    </tr>
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
</table>

@endsection

@section('script')
<script>

</script>
@endsection