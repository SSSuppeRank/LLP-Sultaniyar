<?php
    // Начало Сессии 
    session_start(); 

    // Получение значении с базы данных
    require_once 'database.php'; 

    // Поключение к базе данных
    $link = mysqli_connect( $host, $user, $password, $database ) 
        or die( "Error: " . mysqli_error( $link ) );


    // Получение данных пользователя
    $email = $_POST["e-mail"];
    $password = $_POST["pass"];

    // Перенос данных пользователя в кэш
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $password;

    // Получение хэшированного пароля через полученного логина пользователя 
    $query = "SELECT `userPass` FROM `users` WHERE `userEmail` = '$email'";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );
        
    $hash = mysqli_fetch_array( $result )['userPass'];
    
    // Проверка совпадения введенного пароля с значением userPass в базе данных
    if( password_verify( $password, $hash ) ) {
        unset($_SESSION['error']);
        $_SESSION['LoggedIn'] = true;
        $newURL = "../main.php";
        header('Location: ' .$newURL);
    }
    else if( $email == "admin@sultok.kz" && $password == "admin123" ) {
        $newURL = "../adminPage.php";
        header( "Location: " . $newURL );
        $_SESSION['LoggedIn'] = true;
        $_SESSION['admin'] = true;
    }
    else {
        $newURL = "../index.php";
        header('Location: ' .$newURL);
        $_SESSION['error'] = true;
    }
    // проверка на нахождение в системе
    if( isset( $_POST["check"] ) ) {
        $_SESSION["inSystem"] = true;
    }

    // Закрытие связи с базой данных
    mysqli_close( $link );
?>