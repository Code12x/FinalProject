<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/_layout.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @yield('head')
    @yield('css')

    <title>@yield('title') | Shady Oaks</title>
</head>
<body>
    <header>
        <div class="date-bar">
            <form action="set-date" method="post" id="set-date-form">
                <input type="date" name="date" id="currDate" value="{{ $currDate }}" min="{{ $currDate }}">
                <button type="submit">Change Date</button>
            </form>
        </div>
        <nav>
            <ul>{{-- nav links --}}
            @if ($user->role->intAccessLevel == 1) {{-- Admin --}}
                <li class="nav-li">
                    <a href="/admin/home">Home</a>
                </li>
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
            @elseif ($user->role->intAccessLevel == 2) {{-- Supervisor --}}
                <li class="nav-li">
                    <a href="#"></a>
                </li>
            @elseif ($user->role->intAccessLevel == 3) {{-- Doctor --}}
                <li class="nav-li">
                    <a href="/doctor/home">Doctor Home</a>
                </li>
            @elseif ($user->role->intAccessLevel == 4) {{-- Caregiver --}}
                <li class="nav-li">
                    <a href="#"></a>
            </li>
            @elseif ($user->role->intAccessLevel == 5) {{-- Patient --}}
                <li class="nav-li">
                    <a href="#"></a>
                </li>
            @elseif ($user->role->intAccessLevel == 6) {{-- Family --}}
                <li class="nav-li">
                    <a href="#"></a>
                </li>
            @endif
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

            $.post("/update-date", {"date": $("#currDate").val()}, function(data) {
                $("#currDate").val(data.date);
                $("#currDate").prop('min', data.date);
            });
        });

        function advanceDate() {
        }
    </script>
    @yield('script')
</body>
</html>