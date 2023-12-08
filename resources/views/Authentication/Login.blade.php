<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        form {
            background-color: rgba(255, 255, 255, .95);
            height: 300px;
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
        }

        input {
            width: 200px;
            height: 25px;
            border-radius: 20px;
            border-width: 1px;
        }

        #submitButton {
            background-color: #3B2712;
            /* background-color: rgba(165, 129, 91, 1); */
            border-style: none;
            cursor: pointer;
            border-radius: 20px;
            height: 35px;
            color: white;
        }

        .divName {
            height: 100vh;
            background-color: rgba(165, 129, 91, .9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-left: 20px;
            padding: 50px;
            color: white;
            
        }

        body {
            height: 100vh;
            background-image: url('images/loginRegisterBackground.jpeg');
            background-size: cover;
            background-color: #FAE7C7;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>

</head>
<body>
    <div class="divForm">
        <form action="" method="post">
            <label for="Email">Email:</label><br>
            <input type="email" id = "email" name = "Email"> <br>
            <label for="Password">Password:</label><br>
            <input type="password" id = "password" name = "Password">
            <br>
            <input type="submit" value="Log in" id="submitButton">
        </form>
    </div>

    <div class="divName">
        <h1>
            Shady Oaks
        </h1>
        <h1>
            Retirement Village
        </h1>
        <h1>
            Login Page
        </h1>
    </div>

    @if(isset($message))
        <script>
            alert("{{ $message }}");
        </script>
    @endif
</body>
</html>