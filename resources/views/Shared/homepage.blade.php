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

header {
  background-color: #566454;
  height: 10vh;
  display: flex;
  flex-direction: column;
}

.headerText {
  color: white;
  margin-left: 15px;
}

#navigationBar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-left: 200px;
  margin-right: 200px;
  height: 10vh;
}

#navigationBar a:link, #navigationBar a:visited, #navigationBar a:active {
  text-decoration: none;
  color: #3B2712;
}

#navigationBar a:hover {
  cursor: pointer;
  color: #566454;
  transition: color .5s;
}

#logInSignUpLinks {
  display: flex;
  justify-content: flex-end;
}

#logInSignUpLinks a:link, #logInSignUpLinks a:visited, #logInSignUpLinks a:active {
  text-decoration: none;
  color: white;
}

#logInSignUpLinks a:hover {
  cursor: pointer;
  color: #f4f1de;
  transition: color .5s;
}

.authLink {
  margin-right: 15px;
}

body {
  background-color: #f4f1de;
}

.divMainImage {
  text-align: center;
}

.mainImage {
  width: 60vw;
  padding: 10px;
  background-color: #3B2712;
}

.pText {
  font-size: 24px;
  margin: 100px;
  color: #3B2712;
}

.squaresContainer {
  display: flex;
  justify-content: space-between;
  margin-left: 50px;
  margin-right: 50px;
}

.squares {
  background-color: #566454;
  padding: 10px;
  /* height: 450px */
  margin-bottom: 50px;
}

.squareImg {
  width: 300px;
  height: auto;
}

.squaresText {
  color: #f4f1de;
  text-align: center;
}

footer {
  height: 25vh;
  background-color: #3B2712;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

#footerNavigationBar {
  display: flex;
  flex-direction: column;
  line-height: 25px;
  margin-right: 20px;
  text-align: right;
}

#footerNavigationBar a:link, #footerNavigationBar a:visited, #footerNavigationBar a:active {
  text-decoration: none;
  color: white;
}

#footerNavigationBar a:hover {
  cursor: pointer;
  color: #C28F59;
  transition: color .5s;
}

</style>
    
</head>
<body>
  <header>

  <div class="headerText">
    <h1>
      Shady Oaks Retirement Village
    </h1>
  </div>

    <div id="logInSignUpLinks">
      <a class="authLink" href="/login">LOGIN</a>
      <a class="authLink" href="/register">REGISTER</a>
    </div>

  </header>

  <div id="navigationBar">
    <a href="#about">ABOUT</a>
    <a href="#">SERVICES</a>
    <a href="#">PRICING</a>
    <a href="#">TESTIMONIES</a>
    <a href="#">CONTACT</a>
  </div>

  <div class="divMainImage">
    <img class="mainImage" src="images/diverseOldPeople.jpeg" alt="">
  </div>

    <p class="pText" id="about">
      Nestled in the serene embrace of nature, our retirement home provides a haven of tranquility 
      and comfort for those seeking an enriched and relaxed lifestyle during their golden years. 
      We offer top of the line health care to treat your loved ones.
    </p>

  <div class="squaresContainer">

    <div class="squares">
      <img class="squareImg" src="images/OldGuyGolfing.jpeg" alt="">
      <p class="squaresText">
        Ammenities such as golfing
      </p>
    </div>



    <div class="squares">
      <img class="squareImg" src="images/oldLadyG.jpeg" alt="">
      <p class="squaresText">
        Many styles of dancing
      </p>
    </div>



    <div class="squares">
      <img class="squareImg" src="images/oldPeopleHugging.jpeg" alt="">
      <p class="squaresText">
        Relationships that will last the rest of your life
      </p>
    </div>
    


    <div class="squares">
      <img class="squareImg" src="images/oldPeopleVideoGames.jpeg" alt="">
      <p class="squaresText">
        Multitude of activities
      </p>
    </div>

  </div>

  <footer>

    <div id="footerNavigationBar">
      <a href="#">ABOUT</a>
      <a href="#">SERVICES</a>
      <a href="#">PRICING</a>
      <a href="#">TESTIMONIES</a>
      <a href="#">CONTACT</a>
    </div>

  </footer>
</body>
</html>
