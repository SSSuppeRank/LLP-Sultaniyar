<?php
    require_once 'database.php';
    session_start();

    $link = mysqli_connect( $host, $user, $password, $database )
        or die( "Error: " . mysqli_error( $link ) );

    $userInfo = $_POST["userInfo"];
    $orderEnplonation = $_POST["orderExplonation"];
    $userEmail = $_SESSION['email'];

    $query = "SELECT `userID` FROM `users` WHERE `userEmail` = '$userEmail'";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );  

    $userID = mysqli_fetch_array( $result )['userID'];
    
    $query = "INSERT INTO `orders`(`OrderExplonation`, `UserInformation`, `UserID`) VALUES ('$userInfo', '$orderEnplonation', '$userID')";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );

    $newURL = "../main.php";
    header( 'Location: ' .$newURL );


    mysqli_close( $link )
?>