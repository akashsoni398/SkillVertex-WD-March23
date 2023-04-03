<?php

    include "./../dbconfig.php";
    session_start();

    $errmsg="";

    if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
        $cpwd = mysqli_real_escape_string($conn,$_POST['cpwd']);
        
        if($name!="" && $email!="" && $pwd!="" && $cpwd!="") {
            if($cpwd===$pwd) {
                $sql_query = "SELECT count(*) AS usercount FROM users WHERE email='$email';";
                $result = mysqli_query($conn,$sql_query);
                $row = mysqli_fetch_array($result);
                $count = $row['usercount'];
                if($count==0) {
                    $pwd_crypt = password_hash($pwd,PASSWORD_BCRYPT);
                    $sql_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$pwd_crypt');";
                    $result = mysqli_query($conn,$sql_query);
                    if($result) {
                        header("Location:login.php");
                    }
                    else {
                        $errmsg = "An unexpected error occured. Try again later or contact customer support.";
                    }
                }
                else {
                    $errmsg = "The email address is already registered. USe another email or login using this emaill address";
                }
            }
            else {
                $errmsg = "Passwords entered do not match";
            }
        }
        else {
            $errmsg = "Please fill all fields";
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple registration Form Example</title>
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

    .registration-form {
      background: #fff;
      width: 500px;
      margin: 65px auto;
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
              flex-direction: column;
      border-radius: 4px;
      box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
    }
    .registration-form h1 {
      padding: 35px 35px 0 35px;
      font-weight: 300;
    }
    .registration-form .content {
      padding: 35px;
      text-align: center;
    }
    .registration-form .input-field {
      padding: 12px 5px;
    }
    .registration-form .input-field input {
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
    .registration-form .input-field input::-webkit-input-placeholder {
      text-transform: uppercase;
    }
    .registration-form .input-field input::-moz-placeholder {
      text-transform: uppercase;
    }
    .registration-form .input-field input:-ms-input-placeholder {
      text-transform: uppercase;
    }
    .registration-form .input-field input::-ms-input-placeholder {
      text-transform: uppercase;
    }
    .registration-form .input-field input::placeholder {
      text-transform: uppercase;
    }
    .registration-form .input-field input:focus {
      border-color: #222;
    }
    .registration-form button.link {
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
    .registration-form .action {
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
              flex-direction: row;
    }
    .registration-form .action button {
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
    .registration-form .action button:hover {
      background: #d8d8d8;
    }
    .registration-form .action button:nth-child(1) {
      background: #2d3b55;
      color: #fff;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 4px;
    }
    .registration-form .action button:nth-child(1):hover {
      background: #3c4d6d;
    }
    .registration-form .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="registration-form">
  <form method="post" action=""> 
    <h1>Register</h1>
    <div class="content">
      <div class="input-field">
        <input type="text" placeholder="Name" name="name">
      </div>
      <div class="input-field">
        <input type="email" placeholder="Email" name="email">
      </div>
      <div class="input-field">
        <input type="password" placeholder="New Password" name="pwd" cautocomplete="new-password">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Contfirm Password" name="cpwd" cautocomplete="new-password">
      </div>
      <p class="error"><?php echo $errmsg ?></p>
      <button type="submit" name="submit" value="registration" class="link">SUBMIT</button><br>
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