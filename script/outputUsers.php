<?php
    require_once( 'database.php' );

    $query = "SELECT * FROM `users`";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );
        

    while( $row = mysqli_fetch_array( $result ) ) {
        echo '<tr>';
        echo '<td>' . $row['userID'] . '</td>';
        echo '<td>' . $row['userEmail'] . '</td>';

        $query2 = "SELECT * FROM `orders`";
        $result2 = mysqli_query( $link, $query2 )

        or die( "Error: " . mysqli_error( $link ) );
        $count = 0;
        $count2 = 0;
        while( $row2 = mysqli_fetch_array( $result2 ) ) {
            if( $row2['UserID'] == $row['userID'] && $count == 0 ) {
                $count++;
                echo '<td>';
                echo '<form action="orders.php" method="POST">';
                echo '<button type="submit" class="btn btn-oultine-dark text-warning" name="order" value="' . $row['userID'] . '">Order</button>';
                echo '</form>';
                echo '</td>';
            } 
        }

        if( $count == 0 ) {
            echo '<td><button class="btn btn-oultine-dark">NULL</button></td>';
        }
    }
?>