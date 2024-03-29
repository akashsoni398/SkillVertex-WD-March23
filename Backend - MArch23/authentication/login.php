<?php

    include "./../dbconfig.php";
    session_start();

    $errmsg="";

    if(isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
        
        if($email!="" && $pwd!="") {
            $sql_query = "SELECT count(*) AS usercount FROM users WHERE email='$email';";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
            $count = $row['usercount'];

            if($count>0) {

                $sql_query = "SELECT name as username, id as userid,password as pwd FROM users WHERE email='$email';";
                $result = mysqli_query($conn,$sql_query);
                $row = mysqli_fetch_array($result);
                if(password_verify($pwd,$row['pwd'])) {
                  $_SESSION['username'] = $row['username'];
                  $_SESSION['userid'] = $row['userid'];
                  $_SESSION['useremail'] = $email;
                  header("Location:./../index.php");
                } 
                else {
                  $errmsg = "The email address or password you entered isn't correct. Find your account and log in.";
                }
            }
            else {
                $errmsg = "The email address or password you entered isn't correct. Find your account and log in.";
            }

        }
        else {
            $errmsg = "The email address or password is missing. Please fill all fields";
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
    }

    body {
      background: #e35869;
      font-family: 'Rubik', sans-serif;
    }

    .login-form {
      background: #fff;
      width: 500px;
      margin: 125px auto;
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
              flex-direction: column;
      border-radius: 4px;
      box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
    }
    .login-form h1 {
      padding: 35px 35px 0 35px;
      font-weight: 300;
    }
    .login-form .content {
      padding: 35px;
      text-align: center;
    }
    .login-form .input-field {
      padding: 12px 5px;
    }
    .login-form .input-field input {
      font-size: 16px;
      display: block;
      font-family: 'Rubik', sans-serif;
      width: 100%;
      padding: 10px 1px;
      border: 0;
      border-bottom: 1px solid #747474;
      outline: none;
      -webkit-transition: all .2s;
      transition: all .2s;
    }
    .login-form .input-field input::-webkit-input-placeholder {
      text-transform: uppercase;
    }
    .login-form .input-field input::-moz-placeholder {
      text-transform: uppercase;
    }
    .login-form .input-field input:-ms-input-placeholder {
      text-transform: uppercase;
    }
    .login-form .input-field input::-ms-input-placeholder {
      text-transform: uppercase;
    }
    .login-form .input-field input::placeholder {
      text-transform: uppercase;
    }
    .login-form .input-field input:focus {
      border-color: #222;
    }
    .login-form button.link {
      text-decoration: none;
      background-color: lightgray;
      padding:5px 10px;
      border: none;
      color: #747474;
      letter-spacing: 0.2px;
      text-transform: uppercase;
      display: inline-block;
      margin-top: 20px;
    }
    .login-form .action {
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
              flex-direction: row;
    }
    .login-form .action button {
      width: 100%;
      border: none;
      padding: 18px;
      font-family: 'Rubik', sans-serif;
      cursor: pointer;
      text-transform: uppercase;
      background: #e8e9ec;
      color: #777;
      border-bottom-left-radius: 4px;
      border-bottom-right-radius: 0;
      letter-spacing: 0.2px;
      outline: 0;
      -webkit-transition: all .3s;
      transition: all .3s;
    }
    .login-form .action button:hover {
      background: #d8d8d8;
    }
    .login-form .action button:nth-child(1) {
      background: #2d3b55;
      color: #fff;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 4px;
    }
    .login-form .action button:nth-child(1):hover {
      background: #3c4d6d;
    }
    .login-form .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-form">
  <form method="post" action=""> 
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="email" placeholder="Email" name="email">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="pwd" cautocomplete="new-password">
      </div>
      <p class="error"><?php echo $errmsg ?></p>
      <button type="submit" name="submit" value="login" class="link">SUBMIT</button><br>
      <a href="#" class="link">Forgot Your Password?</a>
    </div>
    <div class="action">
      <button>Sign in</button>
      <button>Register</button>
    </div>
  </form>
</div>
<!-- partial -->
  <script>
    /*
inspiration: 
https://dribbble.com/shots/2292415-Daily-UI-001-Day-001-Sign-Up
*/

let form = document.querySelecter('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  return false;
});
  </script>

</body>
</html>