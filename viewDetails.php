<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<head>
    <div class="nav">
        <img src="images\hhs trans.PNG" alt="Henderson High School logo">
        <a href="home.php">HOME</a>
        <a href="aboutus.php">ABOUT US</a>
        <a href="request.php">REQUEST LOST ITEM</a>
        <a href="viewDetails.php">VIEW DETAILS</a>
      </div>
</head>

<body>
    <br><br>
   
<div class="container">
  <h2>View User Details</h2>
  
  <?php

  $conn =mysqli_connect('localhost','root','','cafeoperation');
  if(isset($_GET['del'])){
    $del_id =$_GET['del'];
    $delete ="DELETE FROM `order` WHERE user_id=$del_id";
   $run_delete = mysqli_query($conn,$delete);
   if ($delete){
     echo "Record deleted";
   }else{
    echo "fail to delete";
   }

   // to get the id into a variable
   // GET method is used to pick the data from the url
   // you can check by echoing it wheter the perticular id is pressed or not after pressing the del btn
  }
  ?>
  <br><br>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        <th>Edit</th>
        <th>Add </th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $conn = mysqli_connect('localhost','root','','cafeoperation');
        $select="SELECT * FROM `order`"; // select all data from table and store it under select variable
        $run =mysqli_query($conn,$select); // this command is to establish the connection and run the query
        while($row_order =mysqli_fetch_array($run)){// this command will store the data in the form of array
            $user_id=$row_order['user_id'];
            $user_name=$row_order['user_name'];
            $user_email=$row_order['user_email'];
            $user_image=$row_order['user_image'];
            $order_details=$row_order['order_details'];

       
        ?>
      <tr>
        <td><?php echo $user_id;?></td>
        <td><?php echo $user_name;?></td>
        <td><?php echo $user_email;?></td>
        <td><img src="images/<?php echo $user_image;?>"></td>
        <td><?php echo $order_details;?></td>
        <td><a class="btn btn-danger"  href="viewDetails.php?del=<?php echo $user_id;?>">Delete</a></td>
       <!-- del is variable which store the id of a particular user when we press delete button
       you can check by looking at the url -->

       <td><a class="btn btn-success"  href="edit_user.php?edit=<?php echo $user_id;?>">Edit</a></td>
      <td>   <button class="btn btn-primary"><a href="request.php" class="text-light"> AddUser </a> </button></td>
      </tr>
      <?php  
       }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>