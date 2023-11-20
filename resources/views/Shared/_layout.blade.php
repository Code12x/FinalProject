<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/_layout.css') }}">
    @yield('css')

    <title>@yield('title') | Shady Oaks</title>
</head>
<body>
    <header>
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
            @elseif ($user->role->intAccessLevel == 2) {{-- Supervisor --}}
                <li class="nav-li">
                    <a href="#"></a>
                </li>
            @elseif ($user->role->intAccessLevel == 3) {{-- Doctor --}}
                <li class="nav-li">
                    <a href="#"></a>
                </li>
            @elseif ($user->role->intAccessLevel == 4) {{-- Caregiver --}}
                <li class="nav-li">
                    <a href="#"></a>
                </li>
            @elseif ($user->role->intAccessLevel == 5) {{-- Family --}}
                <li class="nav-li">
                    <a href="#"></a>
                </li>
            @elseif ($user->role->intAccessLevel == 6) {{-- Patient --}}
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
            window.location = '/Authentication/logout';
        }
    </script>
    @yield('script')
</body>
</html>