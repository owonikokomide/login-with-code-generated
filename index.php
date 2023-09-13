<?php session_start(); ?>
<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sign up</title>
</head>
<body>
  <div class="container">
    <div class="all">
    <div class="sign_up">
      <h1 class="head">Sign Up Here</h1>
    </div>
    <div class="form">
      <form action="" method="POST" class="forms">
       NAME:<input type="text" name="fullname" placeholder="Enter your full name" required></br></br>
      EMAIL:<input type="email" name="email" placeholder="Enter your Email" required></br></br>
      PASSWORD: <input type="password" name="password" placeholder="Enter your password" required></br></br>
      CONFIRM PASSWORD <input type="password" name="confirm" placeholder="Confirm your password" required></br></br>
      <button type="submit" name="submit">Sign Up</button>
      </form>
    </div>
    </div>
  </div>
</body>
</html>


<?php

if(isset($_POST['submit'])){
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];
  $pin = rand(1111,9999);

  if($password !== $confirm){
   echo "<script>alert('password doesnot match with confirm password')</script>";
  }else{
    $select = "SELECT * FROM login  WHERE email = '$email'";
    $select_query = mysqli_query($connection, $select);
    $no = mysqli_num_rows($select_query);
    if($no > 0){
      echo "email alredy exist";
    }
    else{
      $insert = "INSERT INTO login (fullname, email, password, pin, count)
      VALUES('$name', '$email', '$password', '$pin', '0')";
      $insert_query = mysqli_query($connection, $insert);
      if($insert_query){
      echo "<script>alert('this is your login pin $pin')
      location.href='login.php'
      </script>";
      }
    }
  }
}

?>