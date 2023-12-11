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
    <link rel="stylesheet" href="{{ asset('css/_layout.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    @yield('head')
    @yield('css')

    <title>@yield('title') | Shady Oaks</title>
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
                <button class="logout-btn" onclick="logout()">Logout</button>
            </div>
        </nav>
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