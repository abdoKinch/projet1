<?php
session_start();
$message = "";
if (isset($_POST['btn_submit'])) {
    if ($_POST['email'] != '' && $_POST['password'] != '') {
        include_once 'beans/Admin.php';
        include_once 'services/AdminService.php';
        $es = new AdminService();
        $cin = $es->findByEmail($_POST['email']);
        $em = $es->findById($cin);
        if ($em->getPassword() == md5($_POST['password'])) {
            $_SESSION['employe'] = $em->getCin();
            $_SESSION['nom'] = $em->getNom() . ' ' . $em->getPrenom();
            $_SESSION['email'] = $em->getEmail();
            header('Location:./index.php');
        } else {
            header('Location:./login.php?error=invalid');
        }
    } else {
        header('Location:./login.php?error=vide');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gestion Classes-Filieres - Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="login-css/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-css/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-css/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="login-css/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-css/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-css/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="login-css/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-css/css/util.css">
        <link rel="stylesheet" type="text/css" href="login-css/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('login-css/images/1209535.jpg');">
                <div class="wrap-login100 p-t-30 p-b-50">
                    <span class="login100-form-title p-b-41">
                        Classes-Filieres
                    </span>
                    <div class="login-form">
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "invalid")
                                echo '<div class="alert alert-danger" role="alert">Mote de passe ou Email incorrect!</div>';
                            if ($_GET['error'] == "vide")
                                echo '<div class="alert alert-danger" role="alert">Quelque champ est vide</div>';
                        }if (isset($_GET['success'])) {
                            if ($_GET['success'] == "verifyok")
                                echo '<div class="alert alert-success" role="alert">Votre mot de passe est changé avec succés</div>';
                        }
                        ?>
                        <form action="" method="POST" class="login100-form validate-form p-b-33 p-t-5">

                            <div class="wrap-input100 validate-input" data-validate = "Email Addres">
                                <input class="input100" type="email" id="email" name="email" placeholder="Email">
                                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Password">
                                <input class="input100" type="password" id="password" name="password" placeholder="Password">
                                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                            </div>
                            <div class="container-login100-form-btn m-t-32">
                                <button id="connect" name="btn_submit" type="submit" class="login100-form-btn">
                                    Login
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div id="dropDownSelect1"></div>

            <!--===============================================================================================-->
            <script src="login-css/vendor/jquery/jquery-3.2.1.min.js"></script>
            <!--===============================================================================================-->
            <script src="login-css/vendor/animsition/js/animsition.min.js"></script>
            <!--===============================================================================================-->
            <script src="login-css/vendor/bootstrap/js/popper.js"></script>
            <script src="login-css/vendor/bootstrap/js/bootstrap.min.js"></script>
            <!--===============================================================================================-->
            <script src="login-css/vendor/select2/select2.min.js"></script>
            <!--===============================================================================================-->
            <script src="login-css/vendor/daterangepicker/moment.min.js"></script>
            <script src="login-css/vendor/daterangepicker/daterangepicker.js"></script>
            <!--===============================================================================================-->
            <script src="login-css/vendor/countdowntime/countdowntime.js"></script>
            <!--===============================================================================================-->
            <script src="login-css/js/main.js"></script>

    </body>
</html>