<?php
  include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>


  <!-- sign up form -->
  <form method="post">

    <input type="email" name="email" id="email" 
      value="<?php if (isset($_POST['email'])) echo addslashes($_POST['email']); ?>" required>

    <input type="password" name="password" required>

    <input type="submit" name="submit" value="Sign Up">

  </form>


  <!-- log in form -->
  <form method="post">

    <input type="email" name="login-email" id="login-email" 
      value="<?php if (isset($_POST['login-email'])) echo addslashes($_POST['login-email']); ?>" required>

    <input type="password" name="login-password" required>

    <input type="submit" name="submit" value="Log In">

  </form>
  


</body>
</html>

