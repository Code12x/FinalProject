@extends('Shared/_layout')

@section('title', 'Approve')

@section('css')
<style>
    .content {
        padding: 5px;
    }

    table {
        border-collapse: collapse;
        border: 1px solid black;
        margin-bottom: 5px;
    }

    td, th {
        border: 1px solid black;
        padding: 5px;
    }

    td>input {
        width: 100%;
    }

    input[type='submit'] {
        padding: 2px;
    }
</style>
@endsection

@section('content')

<form method="post" action="approve">
    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Approve</th>
            <th>Deny</th>
        </tr>
        @foreach ($unapprovedUsers as $unapprovedUser)
        <tr>
            <td>{{ $unapprovedUser->strFirstName }} {{ $unapprovedUser->strLastName }}</td>
            <td>{{ $unapprovedUser->strName }}</td>
            <td><input name="approval-{{ $unapprovedUser->intUserId }}" type="radio" value='approve'></td>
            <td><input name="approval-{{ $unapprovedUser->intUserId }}" type="radio" value='deny'></td>
        </tr>
        @endforeach
    </table>

    <input type="submit" value="Apply">
</form>

@endsection