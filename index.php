<?php
  include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="style.css">

  <title>Diary</title>
</head>
<body>


  <div class="navbar navbar-default navbar-fixed-top">

    <div class="container">
        
      <div class="navbar-header">
           
        <a href="" class="navbar-brand">Secret Diary</a>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <div class="collapse navbar-collapse" id="myNav">

          <!-- log in form -->
          <form method="post" class="navbar-form navbar-right">

            <div class="form-group">

              <label for="login-email">Email:</label>

              <input type="email" name="login-email" class="form-control" id="login-email" 
              value="<?php if (isset($_POST['login-email'])) echo addslashes($_POST['login-email']); ?>" required>

            </div>

            <div class="form-group">

              <label for="login-password">Password:</label>
              <input type="password" name="login-password" class="form-control" required>

            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Log In">

          </form>

        </div> 

      </div>

    </div>


  <div class="container">

    <div class="row">

      <div class="col-md-6 col-md-offset-3 white-box">

        <h1 class="text-center">Secret Diary</h1>

        <p class="lead text-center">Your own private diary...online!</p>

        <?php

          if (isset($error) && $error != "") {
            echo "<div class='alert alert-danger'>" . $error . "</div>";
          }

          if (isset($message)) {
            echo "<div class='alert alert-info'>" . $message . "</div>"; 
          }

        ?>

        <!-- sign up form -->
        <form method="post">

          <div class="form-group">

            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" 
              value="<?php if (isset($_POST['email'])) echo addslashes($_POST['email']); ?>" required>

          </div>

          <div class="form-group">

            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>

          </div>

          <input type="submit" name="submit" class="btn btn-success" value="Sign Up">

        </form>

      </div>

    </div>
      

  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>

