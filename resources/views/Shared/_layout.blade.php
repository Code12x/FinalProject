<?php
$originalDate = new DateTime($currDate);
$nextDate = $originalDate->modify("+1 day");
$nextDateStr = $nextDate->format('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- commented it out bc im going to do in-line bc idk we agreed to just do that -->
    <!-- <link rel="stylesheet" href="{{ asset('css/_layout.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    @yield('head')
    <title>@yield('title') | Shady Oaks</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .date-bar {
            justify-content: space-between;
            padding: 5px 10px;
            background-color: #566454;
        }

        nav {
            background-color: #ddd;
            display: flex;
            justify-content: space-between;
        }

        nav > ul {
            display: flex;
            padding: 10px;
            flex-direction: row;
            list-style-type: none;
            
        }

        body {
            background-color: #f4f1de;
        }

        table {
        border-collapse: collapse;
        }
    
        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        .nav-li {
            margin-right: 30px;
            align-self: center;
        }

        .nav-li > a {
            text-decoration: none;
            color: #444;
        }

        .role {
            align-self: center;
            margin-right: 10px;
        }

        .logout-div {
            display: flex;
            flex-wrap: nowrap;
        }

        .logout-btn {
            border: none;
            color: white;
            background-color: #c16e70;
            height: 100%;
            padding: 10px;
        }

        .logout-btn:hover {
            cursor: pointer;
            background-color: #c44536;
            color: black;
            transition: .3s;
        }

        tr, th, td {
            /* color: white; */
            border-style: none;
            text-align: center;
        }

        th {
            background-color: #3d405b;
            color: white;
        }

        /* td {
            background-color: white;
        } */

        tr:nth-child(even) {
            background-color: #fff;
        }

        td:nth-child(even) {
            background-color: #fff;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        td:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .dateBar {
            display: flex;
            justify-content: center;
            margin: 20px;
        }

        input {
            height: 25px;
        }

        select {
            height: 25px;
        }

        button {
            border-style: none;
            padding: 5px;
            cursor: pointer;
        }

        #submit {
            border-style: none;
            padding: 15px;
            cursor: pointer;
            border-radius: 30px;
            background-color: #566454;
            color: white;
            height: 40px !important;
        }

        .date-bar {
            background-color: #603c1c;
        }

        nav{
            background-color: #603c1c;
            color: white;
        }

        .nav-li a{
            color: white;
        }

        .nav-li a:hover{
            color: #d4982a;
            transition: .5s;
        }

        .logout-div{
            background-color: #603c1c;
        }

        .role{
            background-color: #603c1c;
        }

        .logout-btn{
            background-color: #603c1c;
            color: white;
        }
    </style>
    @yield('css')
</head>
<body>
    <header>
        <div class="date-bar">
            <form action="set-date" method="post" id="set-date-form">
                <input type="date" name="date" id="currDate" value="{{ $currDate }}" min="{{ $nextDateStr }}">
                <button type="submit">Change Date</button>
            </form>
        </div>
        <nav>
            <ul>{{-- nav links --}}
                <li class="nav-li">
                    <a href="/home">Home</a>
                </li>
            @if ($user->role->intAccessLevel == 1) {{-- Admin --}}
                <li class="nav-li">
                    <a href="/admin/report">Report</a>
                </li>
                <li class="nav-li">
                    <a href="/admin/payment">Payments</a>
                </li>
                <li class="nav-li">
                    <a href="/admin/approval">Approve Registration</a>
                </li>
                <li class="nav-li">
                    <a href="/admin/createrole">Create Role</a>
                </li>
                <li class="nav-li">
                    <a href="/patients">Patients</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/createAppointment">Create Appointment</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/createRoster">Create Roster</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/createAdditionalPatientInfo">Add Patient Info</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/displayEmployees">Employees</a>
                </li>
            @elseif ($user->role->intAccessLevel == 2) {{-- Supervisor --}}
                <li class="nav-li">
                    <a href="/patients">Patients</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/createAppointment">Create Appointment</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/createRoster">Create Roster</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/createAdditionalPatientInfo">Add Patient Info</a>
                </li>
                <li class="nav-li">
                    <a href="/supervisor/displayEmployees">Employees</a>
                </li>
            @elseif ($user->role->intAccessLevel == 3) {{-- Doctor --}}
                <li class="nav-li">
                    <a href="/patients">Patients</a>
                </li>
            @elseif ($user->role->intAccessLevel == 4) {{-- Caregiver --}}
                <li class="nav-li">
                    <a href="/patients">Patients</a>
                </li>
            @elseif ($user->role->intAccessLevel == 5) {{-- Patient --}}
            @elseif ($user->role->intAccessLevel == 6) {{-- Family --}}
            @endif
            <li class="nav-li">
                <a href="/roster/viewRoster">Roster</a>
            </li>
            </ul>{{-- nav links --}}
            
            <div class="logout-div">
                <div class="role">{{ $user->strFirstName }} {{ $user->strLastName }} ({{ $user->role->strName }})</div>
                <button class="logout-btn" onclick="logout()">LOG OUT</button>
            </div>
        </nav>        <div class="header">
            <!-- <img src="{{url('/images/logo.jpg')}}" alt="logo"> -->
        </div>
    </header>

    <div class="content">
        @yield('content')
    </div>

    @yield('footer')

    <script>
        function logout() {
            window.location = '/logout';
        }

        $("#set-date-form").on('submit', function(e) {
            e.preventDefault();

            $.post("/update-date", {"date": $("#currDate").val()}, function() {
                window.location.href = window.location.href;
            });
        });
    </script>
    @yield('script')
</body>
</html>