<?php
$con = mysqli_connect("localhost","id4103524_instadp562","7756006653","id4103524_cadence");
if(mysqli_connect_errno()){
  echo 'Failed to connect : '.mysqli_connect_errno();
}
  if(isset($_POST['loginButton'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
      $query = mysqli_query($con,"SELECT * FROM user WHERE username = '$username' and password = '$password'");
      if(mysqli_num_rows($query) == 1){
        header("Location: page.php");
      }else{
        echo 'Login failed';
      }
    }
  
  if(isset($_POST['registerButton'])){
    $username = $_POST['regUsername'];
    $firstName = $_POST['regFirstname'];
    $lastName = $_POST['regLastname'];
    $email = $_POST['regEmail'];
    $password = $_POST['regPassword'];
    $query1 = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($query1) == 1){
      echo '<h1>Username already exist</h1>';
    }else{
      $query = mysqli_query($con,"INSERT INTO user VALUES('','$username','$password','$firstName','$lastName','$email')");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="main.js"></script>
  <title>Welcome to Candence</title>
</head>
<body>
  <div id="bg"></div>
  <a href="index.php">
    <div class="logo" >
      <p>Cadence</p>
    </div>
  </a>

  <div class="loginContainer">
    <div class="loginPannel">
      <form action="index.php" method="post">

        <h1 id='loginHeader'>Login Here</h1>
        <div>
          <label for="username">Username</label>
          <input type="text" id="username" name="username"  required>
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password"  required>
        </div>
        <div class="loginButton">
             <button name="loginButton">Login</button>
        </div>
        <div class="newUser" id="hideLogin">
          <p id="hideLogin">New to here!</p>
        </div>

      </form>
    </div>
    <div class="registerContainer">
      <form action="index.php" method="post">
      <h1 id='loginHeader'>Register Here</h1>
        <div>
          <label for="regUsername">Username</label>
          <input type="text" id="regUsername"  name="regUsername">
        </div>
        <div>
          <label for="regFirstname">First Name</label>
          <input type="text" id="regFirstname"  name="regFirstname">
        </div>
        <div>
          <label for="regLastname">Last Name</label>
          <input type="text" id="regLastname"  name="regLastname">
        </div>
        <div>
          <label for="regEmail">Email</label>
          <input type="text" id="regEmail"  name="regEmail">
        </div>
        <div>
          <label for="regPassword">password</label>
          <input type="password" id="regPassword"  name="regPassword">
        </div>
        <div class="loginButton">
             <button name="registerButton">SignUp</button>
        </div>
        <div class="newUser" id="hideReg">
          <p>Already have an account?</p>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS.load('bg', 'partical.json', function() {
        console.log(' particles.js config loaded');
        });
    </script>
</body> 
</html>