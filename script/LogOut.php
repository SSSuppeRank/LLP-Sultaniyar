<?php
    session_start();

    $newURL = "../index.php";
    header('Location: ' .$newURL);

    unset( $_SESSION['inSystem'] );
    unset( $_SESSION['admin'] );
    unset( $_SESSION['LoggedIn'] );
?>