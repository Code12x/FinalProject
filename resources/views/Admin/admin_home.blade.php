<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <title>Shady Oaks | Admin Home</title>
</head>
<body>
    <header>
        <nav>
            <ul>
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
            </ul>
            <div class="logout-div">
                <button class="logout-btn" onclick="logout()">Logout</button>
            </div>
        </nav>
    </header>

    <div class="content">
        
    </div>

    <footer>
        
    </footer>

    <script>
        function logout() {

        }
    </script>
</body>
</html>