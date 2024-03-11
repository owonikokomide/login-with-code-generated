<?php session_start(); ?>
<?php include('config.php'); ?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>
<body>  
  <div class="container">
    <div class="all">
      <?php
echo "<marquee scrollamount='15' behavior='alternate' style='color:green';> <h1>Congratulations, " . $_SESSION['fullname'], " Welcome To Your Dashboard</h1></marquee>";
      ?>
    </div>
  </div>
</body>
</html>


