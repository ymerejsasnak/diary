<?php

  session_start();

  if (isset($_GET['logout']) && $_GET['logout'] === 1 AND isset($_SESSION['id'])) {
    $message = "You have been logged out.";
    session_destroy();
  }

  include("connection.php");
  
  //sign up
  if (isset($_POST['submit']) && $_POST['submit'] === "Sign Up") {

    $error = "";
    
    //make sure email is entered...
    if(!$_POST['email']) {
      $error.="<br>Please enter your email.";
    }
    //...and valid
    else {
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error.="<br>You must enter a valid email address.";
      }
    }

    //same for password...
    if (!$_POST['password']) {
      $error .= "<br>You must enter a password.";
    }
    else {
      if (strlen($_POST['password']) < 8) {
        $error .= "<br>Password must be at least 8 characters long.";
      }
      if (!preg_match('`[A-Z]`', $_POST['password'])) {
        $error .= "<br>Include at least one capital letter in your password.";
      }
      if (!preg_match('`[0-9]`', $_POST['password'])) {
        $error .= "<br>Include at least one digit in your password.";
      }
    }

    if ($error) {
      $error =  "Please address the following errors: ".$error;
    }
    //if no errors, sign up user!
    else {

      //prevent sql injection attack with this:
      $safeEmail = mysqli_real_escape_string($link, $_POST['email']);

      $query = "SELECT * FROM users WHERE email='".$safeEmail."'";

      $result = mysqli_query($link, $query);

      $results = mysqli_num_rows($result);

      if ($results) {
        $error = "That email is already in use.  Please log in above";
      }
      else {                                                                        //hash, salt, etc. the pw
        $query = "INSERT INTO `users` (`email`, `password`) VALUES('".$safeEmail."', '".md5(md5($safeEmail).$_POST['password'])."')";

        mysqli_query($link, $query);

        echo "Sign-up successful.";

        $_SESSION['id'] = mysqli_insert_id($link); //most recent id in DB

        //then redirect to logged in page
        header("Location:diary.php");
      }
    }
  }

  //log in
  if (isset($_POST['submit']) && $_POST['submit'] === "Log In") {

    $safeEmail = mysqli_real_escape_string($link, $_POST['login-email']);
    $query = "SELECT * FROM users WHERE email='".$safeEmail."' AND password='".md5(md5($safeEmail).$_POST['login-password'])."' LIMIT 1";
    
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    if ($row) {
      $_SESSION['id'] = $row['id'];

      //redirect to logged in page
      header("Location:diary.php");
    }
    else {
      $error = "Incorrect email or password.";
    }

  }

?>