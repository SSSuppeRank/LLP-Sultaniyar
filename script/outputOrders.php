<?php
    require_once( 'database.php' );

    $userID = $_POST['order'];

    $query = "SELECT `userEmail` FROM `users` WHERE `userID` = '$userID'";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );

    $userEmail = mysqli_fetch_array($result)['userEmail'];

    $query = "SELECT * FROM `orders`";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );

    while( $row = mysqli_fetch_array( $result ) ) {
        if( $row['UserID'] == $userID ) {
            echo '<tr>';
            echo '<td>' . $row['OrderID'] . '</td>';
            echo '<td>' . $row['UserInformation'] . '</td>';
            echo '<td>' . $row['OrderExplonation'] . '</td>';
            echo '</tr>';
        }
    };
?>