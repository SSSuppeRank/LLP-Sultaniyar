<?php
    // Начало Сессии 
    session_start(); 

    // Получение значении с базы данных
    require_once 'database.php'; 

    // Поключение к базе данных
    $link = mysqli_connect( $host, $user, $password, $database ) 
        or die( "Error: " . mysqli_error( $link ) );

    // Получение электронной почты и пароля пользователя и хэширование пароля 
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Получение данных о всех зарегестрированных пользователях
    $query = "SELECT * FROM `users`";
    $result = mysqli_query( $link, $query )
        or die( "Error: " . mysqli_error( $link ) );  
    
    // Проверка идентичной записи в базе данных
    $count = 0;
    
    while( $row = mysqli_fetch_array( $result ) ) {
        if( $row['userEmail'] == $email) {
            $count++;
        }
    }

    // Значение успешной регистрации
    $_SESSION['SuccessSignUp'] = false;
    
    // Прокерка на возможность успешной регистрации пользователя
    if( $count == 0 ) {
        $query = "INSERT INTO `users`(`userEmail`, `userPass`) VALUES ('$email', '$password')";
        $result = mysqli_query( $link, $query )
            or die( "Error: " . mysqli_error( $link ) );
        $newURL = "../index.php";
        header('Location: ' .$newURL);
        $_SESSION['SuccessSignUp'] = true;
    }
    else {
        $_SESSION['SuccessSignUp'] = false;
        $newURL = "../index.php";
        header('Location: ' .$newURL);
    }

    // Закрытие связи с базой данных
    mysqli_close( $link );
?>