<?php include('config.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <link rel="stylesheet" href="login.css">
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>login here</title>  
</head>
<body> 
  <div class="container">
    <div class="all">
    <div class="sign_up">
      <h1 class="head">Login Here</h1>
    </div> 
    <div class="form">
      <form action="" method="POST" class="forms">
      EMAIL:<input type="email" required name="email" placeholder="Enter your Email" required></br></br>
      PASSWORD:<input type="password" required name="password" placeholder="Enter your password" required></br></br>
      PIN: <input type="text" name="pin" placeholder="Enter your 4digit pin"></br></br>
     <div class="butt"><button type="submit" name="login">Login</button></div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>


<?php

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pin = $_POST['pin'];

   $select = "SELECT * FROM login WHERE email = '$email' AND password ='$password'";
  $select_query = mysqli_query($connection, $select);
  $row = mysqli_fetch_array($select_query);

  if($row){
  $tea = $row['pin'];
  $name = $row['fullname'];

  $id = $row['id'];
  $count = $row['count'];
  $plus = $row['count']+1;

if($count == 3){
  echo "Pin is Invalid";
}else{
 
    if($tea == $pin){
      $update = mysqli_query($connection,"UPDATE login SET count ='$plus' WHERE id ='$id'");
      if($update){
      $_SESSION['fullname'] = $name;

        header('location:welcome.php');

      }
      }else{
       
        echo "pin not correct";

      }
  }
}else{
echo "incorrect email or password";
}
}

  // $tea = mysqli_num_row($select_query);
    // if($tea['pin']=="1"){
      // $row = mysqli_fetch_array($select_query);
      // $pin = $row['pin'];
// echo $pin;
  //  if($select_query){
  //   if(mysqli_nums_row($select_query)=="1"){
  //     $row = mysqli_fetch_array($select_query);
  //     $fullname = $row['fullname'];
  //     // $pin = $row['pin'];
  //     $_SESSION['fullname'] = $name;
  //     header('location:welcome.php');
  //   }
  //   else{
  //     echo "invalid inputs";
  //   }
  //  }


  
?>
