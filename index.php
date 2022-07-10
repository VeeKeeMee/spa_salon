<?php

session_start();
  
//to allow the user to sign in
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: index.php');
}
  
//signing out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}

?>

<?php include('functions.php') ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Spa-Salon in Brooklyn, NY</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="C:\openserver\domains\localhost\spa_salon\style.css">
    </head>

    <body>  

        <div class="topnav">
            <a class="active" href="#home">Home</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
            <button class="login" type="button" action = "login">Sign In</button>
        </div>
        
    <header>
            <h1 class ="headname">Spa-Salon Chinese Lilac</h1>
    </header>

    <h2>Enjoy our spa services in Brooklyn, NY</h2>

    <p>Take a break from your daily routines and visit us! 
    We offer soothing customized health and beauty treatments in the quiet comfort 
    of our individual treatment rooms.<br>
    It will be an experience you will not soon forget!</p>

    <h2>Login to your cabinet</h2>

    <form method="post" action="login" class = "signForm">
  
        <?php include('errors.php'); ?>

    <label>User Name</label>
    <input type="text" name="login"><br>
    <label>Password</label>
    <input type="password" name="password"><br> 
    <button class="signBut" type="submit">Sign In</button>
    </form>

    <p>Do not have a cabinet yet?
    <a href="register.php">Click here to SignUp!</a>
    </p>

    <footer>
        <div class="links">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Pinterest</a>
            <a href="#">YouTube</a>
        </div>

        <div class="copyright">Copyright &copy; Spa Chinese Lilac
        2022</div>
    </footer>

</body>
</html>