<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();

    // Сохранен ли пользователь в системе
    if( isset( $_SESSION["inSystem"] ) && $_SESSION["inSystem"] == true ) {
        if( isset( $_SESSION["admin"] ) ) {
            $newURL = "adminPage.php";
            header('Location: ' .$newURL);
        }
        else {
            $newURL = "main.php";
            header('Location: ' .$newURL);
        }
    }
 
    $var;
    if( isset( $_SESSION['SuccessSignUp'] ) == false ) {
        $var = "╰(*°▽°*)╯ Hey! I am Mr.Output! If you want to use the system, click [Sign Up] or [Log In]";
    } 
    if( isset( $_SESSION['SuccessSignUp'] ) ) {
        if( $_SESSION['SuccessSignUp'] == true ) {
            $var = "(¬‿¬) Yeah! Now you are with us! Now you can Login.";
            unset( $_SESSION['SuccessSignUp'] );
        }
    }
    if( isset( $_SESSION['SuccessSignUp'] ) ) {
        if( $_SESSION['SuccessSignUp'] == false ) {
            $var = "(╯°□°）╯ This email is already in use! Use another email or Login to she system.";
            unset( $_SESSION['SuccessSignUp'] );
        }
    }
    if( isset( $_SESSION['error'] ) ) {
        $var = "¯\_(ツ)_/¯ Smth get wrong. Password or email? I do not care!";
        unset( $_SESSION['error']  );
    }
    if( isset( $_SESSION['messageError'] ) ) {
        $var = $_SESSION['messageError'];
        unset( $_SESSION['messageError'] );
    }
?>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LLP Sultaniyar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/styleForIndex.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/img/icon.ico" type="image/x-icon">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js" integrity="sha512-zKaK6G2LZC5YZTX0vKmD7xOwd1zrEEMal4zlTf5Ved/A1RrnW+qt8pWDfo7oz+xeChECS/P9dv6EDwwPwelFfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <script src="code/BG.js"></script>
</head>
<body >
    <nav class="navbar navbar-expand-lg navbar-light text-uppercase">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/img/left_big.png" alt="" width="200"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <form class="d-flex"> 
                        <input placeholder="(^///^) Send me a message!" class="border-dark rounded input-lg outputBox" type="search" value="<?php echo $var?>" aria-label="Search">
                    </form>
                </ul>

                <!-- Sign Up modal -->
                <button type="button" class="btn btn-outline-dark ss" data-bs-toggle="modal" data-bs-target="#SignUp">
                    Sign Up
                </button>

                <!-- Log In modal -->
                <button type="button" class="btn btn-outline-dark ss" data-bs-toggle="modal" data-bs-target="#SignIn">
                    Log In
                </button>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead text-dark text-center" id="header">
        <div class="row header text-center">            
            <!-- <div class="display-1">Sultaniyar</div>  -->
            <p class="lead"><strong><b>LLP Sultaniyar</b> is an organization for the <span class="typed-text"></strong></del></p>          
        </div>
    </header>
  
                
    <!-- Sign Up Modals -->
    <div class="modal fade" id="SignUp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sign Up Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="script/SignUp.php" method="POST" class="need-validation">
                        <div class="mb-3 row">
                            <label for="Email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" required>
                                <div class="invalid-feedback">
                                    smth get wrong
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="submit" class="btn btn-outline-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Log In Modals -->
    <div class="modal fade" id="SignIn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Log In Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="script/LogIn.php" method="POST">
                        <div class="mb-3 row">
                            <label for="Email" class="col-sm-2 col-form-label">
                                Email
                            </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="e-mail" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Password" class="col-sm-2 col-form-label">
                                Password
                            </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="pass" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="submit" class="btn btn-outline-dark">
                    
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="check">
                            <label class="form-check-label" for="flexCheckDefault">
                                Check me out!
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>