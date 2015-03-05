<?php

  session_start();

  include("connection.php");

  $query = "SELECT diary FROM users WHERE id='" . $_SESSION['id'] . "' LIMIT 1";

  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_array($result);

  $diary = $row['diary'];
  
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
        
      <div class="navbar-header pull-left">
        <a href="" class="navbar-brand">Secret Diary</a>
      </div>

      <div class="pull-right">
        <ul class="navbar-nav nav">
          <li><a href="index.php?logout=1">Log Out</a></li>
        </ul>
      </div>

    </div>
  </div>


  <div class="container">

    <div class="row">

      <div class="col-md-6 col-md-offset-3">

        <textarea class="form-control"><?php echo $diary; ?></textarea>        

      </div>

    </div>
      

  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="updatediary.js"></script>

</body>
</html>

