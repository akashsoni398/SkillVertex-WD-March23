<?php 
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "new user login with email id '$email' and password '$pwd' <BR> WELCOME ".$_SESSION['username']; ?>
</body>
</html>