<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "users";

    $link = mysqli_connect( $host, $user, $password, $database )
        or die( "Error: " . mysqli_error( $link ) );
?>