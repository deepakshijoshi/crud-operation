<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD Operation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><h2 align="center";>Welcome!!</h2> <br>
<br><br><br>

<div class="container">
  <a class="btn btn-danger" href="logout.php">Logout</a><br><br>
  <a class ="btn btn-primary" href="add_user.php">Add User</a><br><br>
 
  <br><br>  
  
  <?php
    
     
    $conn = mysqli_connect('localhost','root','','user');


     

    if(isset($_GET['del'])) {
         $del_id = $_GET['del'];
    //query for delete
          $delete = "DELETE FROM user_info WHERE user_idn='$del_id'" ;
            $run_delete = mysqli_query($conn,$delete);
         if($run_delete === true){
         echo "Record has been deleted";
     } else{
         echo "Failed!!, Try again lateer";
     }
}
  ?>  
  

  <table class="table table-hover">
    <thead>
      <tr> 
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $conn = mysqli_connect('localhost','root','','user');
            //Dynamic HTML
            $select = "SELECT user_idn, user_nam, user_email FROM user_info";
            $run =  mysqli_query($conn,$select);
            while($row_user = mysqli_fetch_array($run)) {
              $user_id = $row_user['user_idn'];
              $user_name = $row_user['user_nam'];
              $user_email = $row_user['user_email'];
       ?>
        <tr>
            <td><?php echo $user_id; ?></td>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><a class="btn btn-primary" href="edit_user.php?edit=<?php echo $user_id; ?>">Edit</a></td>
            <td><a class="btn btn-danger" href="dashboard.php?del=<?php echo $user_id; ?>">Delete</a></td>
        </tr>
            <?php }  ?>
    </tbody>
  </table>
</div>
</body>
</html>