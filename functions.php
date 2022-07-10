<?php

//starting session
session_start();

//variables
$username = "";
$b_day = "";
$errors = array();
$_SESSION['success'] = "";

//usernames, passwords encrypted, birthdays
$db = mysqli_connect('localhost', 'spa', '', 'users');

//receiving the values 
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$b_day = mysqli_real_escape_string($db, $_POST['b_day']);

//user is signing up
if (isset($_POST['reg_user'])) {
  
    //storing data
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);
    $b_day = mysqli_real_escape_string($db, $_POST['b_day']);
  
    //error: empty box
    if (empty($username)) { array_push($errors, "Username is required"); }   
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($b_day)) { array_push($errors, "DOB is required"); }
  
    //password encription
    $password = md5($password);

    //receiving data for SQL
    $query = "INSERT INTO users (username, password, b_day)
    VALUES('$username', '$password', '$b_day')";

    mysqli_query($db, $query);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You have logged in successfully!"; //welcome message
         
        //page after signing up
        header('location: index.php');
    }

//user is signing in
if (isset($_POST['login_user'])) {
     
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
         
        if (mysqli_num_rows($results) == 1) {
             
        //password is good, encrypted
        $password = md5($password);
         
        $query = "SELECT * FROM users WHERE username=
                '$username' AND password='$password'";
        $results = mysqli_query($db, $query);
  
        //get exist user
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You have logged in!"; //welcome message
             
            //page after signing up
            header('location: index.php');
        }
        else {
             
            //credentials are bad
            array_push($errors, "Username or password incorrect");
        }
    }
}
}
  
?>