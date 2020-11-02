<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud Operation-Edit User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Edit User</h2>
  <?php
    $conn = mysqli_connect('localhost','root','','user');
if(isset($_GET['edit'])) {
     $edit_id = $_GET['edit'];
     $select = "SELECT user_nam, user_email, user_password  FROM user_info WHERE user_idn='$edit_id'";
            $run =  mysqli_query($conn,$select);
            $row_user = mysqli_fetch_array($run) ;
             $user_name = $row_user['user_nam'];
             $user_email = $row_user['user_email'];
             $user_password = $row_user['user_password'];
}
  ?>  
  <form action=" " method="post" enctype="multipart/form-data" >
  <div class="form-group">
      <label for="user_name">Name:</label>
      <input type="user_name" class="form-control" id="user_name" value="<?php echo $user_name ?>" placeholder="Enter Your name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php echo $user_email ?>" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" value="<?php echo $user_password ?>" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" name ="insert-btn" class="btn btn-primary">Submit</button>
  </form>
  <?php
    $conn = mysqli_connect('localhost','root','','user');
    //checking Connection with mysql
    //if (mysqli_connect_errno()) {
    //  echo "Connection failed: ";
   // }
    //echo "Connected successfully";


    if(isset($_POST['insert-btn'])) {
       $euser_name = $_POST['user_name'];
       $euser_email = $_POST['email'];
       $euser_password = $_POST['pswd'];
    }
    //Values to get inserted in database-Insert Query

    $update = "UPDATE user_info SET user_nam='$euser_name', user_email='$euser_email', user_password='$euser_password' WHERE user_idn='$edit_id'";
    //Creating Variable for running the insert Query

    $run_update = mysqli_query($conn, $update);
    //Checking if the query is running properly or not

    if($run_update === true)
    {
      echo "Data Has Been Updated/edited Properly";
    } else{
        echo "Failed!!, Try Again";
    }
    ?>
    <a class ="btn btn-success" href="dashboard.php">View User</a>
</div>
</body>
</html>