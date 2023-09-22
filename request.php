<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
<head>
    <div class="nav">
        <img src="images\hhs trans.PNG" alt="doritos">
        <a href="home.php">HOME</a>
        <a href="aboutus.php">ABOUT US</a>
        <a class="active" href="request.php">REQUEST LOST ITEM</a>
        <a href="contactus.php">CONTACT US</a>
      </div>
</head>
</body>
<body>
    <br>
    <br>
<div class="container">
  <h2>Lost Item Request</h2>
  <form action="" method="post" enctype="multipart/form-data"> 
    <!--multipart means image has multiple part such as name, size,type -->
  <div class="form-group"> 
      <label>Name:</label>
      <input type="text" class="form-control" placeholder="Enter name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label>Add Image of item (If possible):</label>
      <input type="File" class="form-control" placeholder="image" name="user_image">
    </div>

    <div class="form-group">
      <label>Details of missing item:</label>
     <textarea class="form-control" name="order_details"></textarea>
    </div>
    
     <input type="submit" name="insert_btn" class="btn btn-primary" ></input>
    <a class="btn btn-primary" href="viewDetails.php">View updated info</a>
  </form>
  <br>
<?php
$conn = mysqli_connect('localhost','root','','cafeoperation');
// if(mysqli_connect_errno()){
//     echo "connection fail";
// }else{
//     echo "connected"; 
// }



if(isset($_POST['insert_btn'])){ // iset() check whether the value is there or not
   $user_name =$_POST['user_name'];
   $user_email =$_POST['user_email'];
   $user_image=$_FILES['user_image']['name'];
   $tmp_name=$_FILES['user_image']['tmp_name'];
   $order_details=$_POST['order_details'];

  $insert ="INSERT INTO `order`(`user_name`,`user_email`, `user_image`,`order_details`) 
  VALUES('$user_name','$user_email', '$user_image','$order_details')";
  $run_insert =mysqli_query($conn,$insert);
  if($run_insert){
    echo "Request Sent";
    move_uploaded_file($tmp_name,"images/$user_image");
  }
  else{
    echo " try again";
  }

}
?>
<!--   -->
</body>
</html>