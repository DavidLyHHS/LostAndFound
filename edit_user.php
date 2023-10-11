<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
<head>
  <div class="nav">
        <img src="images\hhs trans.PNG" alt="Henderson High School logo">
        <a class="active" href="home.php">HOME</a>
        <a href="aboutus.php">ABOUT US</a>
        <a href="request.php">REQUEST LOST ITEM</a>
        <a href="viewDetails.php">VIEW DETAILS</a>
      </div>
</head>
</body>
<body>
  
<body>
    <br>
    <br>
<div class="container">
  <h2>Edit or Update User</h2>
  <?php

  $conn =mysqli_connect('localhost','root','','cafeoperation');

  if(isset($_GET['edit'])){
    $edit_id =$_GET['edit'];
    $select="SELECT * FROM `order` WHERE user_id=$edit_id"; 
    $run =mysqli_query($conn,$select); 
   $row_user =mysqli_fetch_array($run);
        $user_name1=$row_user['user_name'];
        $user_email=$row_user['user_email'];
        $user_image=$row_user['user_image'];
        $order_details=$row_user['order_details'];

   // to get the id into a variable
   // GET method is used to pick the data from the url
   // you can check by echoing it wheter the perticular id is pressed or not after pressing the del btn
  }
  ?>

  <form action="" method="post" enctype="multipart/form-data"> 
    <!--multipart means image has multiple part such as name, size,type -->
  <div class="form-group"> 
      <label>User Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name1; ?>" placeholder="Enter name" name="user_name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" value="<?php echo $user_email;?>" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label>Add Image:</label>
      <input type="File" class="form-control" placeholder="image" name="user_image">
    </div>

    <div class="form-group"> 
      <label>Details:</label>
     <textarea class="form-control"  name="order_details"><?php echo $order_details;?></textarea>
    </div>
    
    <input type="submit" name="edit_btn" class="btn btn-primary" ></input>
  </form>
  
</div>

<?php
$conn = mysqli_connect('localhost','root','','cafeoperation');
// if(mysqli_connect_errno()){
//     echo "connection fail";
// }else{
//     echo "connected";
// }



if(isset($_POST['edit_btn'])){ // iset() check whether the value is there or not
   $euser_name =$_POST['user_name'];
   $euser_email =$_POST['user_email'];
   $euser_image=$_FILES['user_image']['name'];
   $etmp_name=$_FILES['user_image']['tmp_name'];
   $euser_details=$_POST['order_details'];

   if(empty($euser_image)){
    $euser_image=$user_image;
   }

  $update="UPDATE `order` SET user_name='$euser_name',user_email='$euser_email',
  user_image='$euser_image',order_details='$euser_details' WHERE user_id='$edit_id' ";
  $run_update =mysqli_query($conn,$update);
  if($run_update){
    echo "record updated";
    move_uploaded_file($etmp_name,"images/$euser_image");
  }
  else{
    echo " try again";
  }

}
?>

<!-- https://www.youtube.com/watch?v=S1GdH8sd9og -->
</body>
</html>