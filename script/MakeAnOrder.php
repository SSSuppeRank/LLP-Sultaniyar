<?php
    require_once 'database.php';
    session_start();

    $link = mysqli_connect( $host, $user, $password, $database )
        or die( "Error: " . mysqli_error( $link ) );

    $userInfo = $_POST["userInfo"];
    $orderEnplonation = $_POST["orderExplonation"];
    $userEmail = $_SESSION['email'];

    $query = "SELECT * FROM `orders`";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );  
    
    $query = "INSERT INTO `orders`(`OrderExplonation`, `UserInformation`, `UserEmail`) VALUES ('$userInfo', '$orderEnplonation', '$userEmail')";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );

    $newURL = "../main.php";
    header( 'Location: ' .$newURL );


    mysqli_close( $link )
?>