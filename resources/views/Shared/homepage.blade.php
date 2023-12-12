<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shady Oaks Retirement Village
    </title>
    <link rel="stylesheet" href="">

<style>

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

  /* header {

  } */

#navigationBar {
  display: flex;
  justify-content: space-between;
  padding: 50px 200px;
  background-color: #603c1c;
}

#navigationBar a:link, #navigationBar a:visited, #navigationBar a:active {
  text-decoration: none;
  color: white;
}

#navigationBar a:hover {
  cursor: pointer;
}

#logInSignUpLinks {
  position: relative;
  height: 100vh;
  width: 100%;
  background-image: url('images/transparent background.jpg');
  background-size: cover;
  background-color: #FAE7C7;
  display: flex;
  justify-content: center;
}

#logInSignUpLinksBoxes {
  min-width: 10%;
  padding: 2%;
  margin: 5% 5%;
  background-color: #c16228;
  font-size: 20pt;
  height: 10%;
  border: 2px solid #603c1c;
  box-shadow: 5px 5px 5px;
}

#logInSignUpLinks a:link, #logInSignUpLinks a:visited, #logInSignUpLinks a:active {
  text-decoration: none;
  color: white;
}

#logInSignUp a:hover {
  cursor: pointer;
}

</style>
    
</head>
<body>
    <header>
        <div id="navigationBar">
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Pricing</a>
            <a href="#">Testimonies</a>
            <a href="#">Contact</a>
        </div>
    </header>



    <div id="logInSignUpLinks">
      <div id="logInSignUpLinksBoxes">
        <a href="/login" id="logInSignUpLinksBoxes2">Login</a>
      </div>
      <div id="logInSignUpLinksBoxes">
        <a href="/register" id="logInSignUpLinksBoxes2">Register</a>
      </div>
    </div>

    <footer>

    </footer>
</body>
</html>
