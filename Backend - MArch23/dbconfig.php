<?php 
    $dbhost = "localhost";
    $dbdatabase = "music_hub";
    $dbuser = "root";
    $dbpassword = "";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);

    if(!$conn) {
        $errmsg = "Database connection error:".mysqli_connect_error();
    }

?>