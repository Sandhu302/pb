<?php
session_start();
//echo $_SESSION['username'];
//echo $_SESSION['contact_id'];

?>
<html>
<head>
<title>Vieiw Profile</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

  <div id="main">
  
  <h1> Phone Book</h1>
  <?php  include_once 'menu-main.php';?>
  <p class="prof">Users</p>
  
   <table class=" viewtabl" >
  <th>
  <tr>
  
  <td><strong>Name</strong></td>
  <td><strong>Username</strong></td>
  <td><strong>email</strong></td>
  
  <td>Action</td>
  </tr>
  </th>
  <?php  //https://www.formget.com/update-data-in-database-using-php/  to display table in echo 
  //echo $_SESSION['contact_id'];
   require_once 'db.php';

  //  $count= 1;
  //  $query = "SELECT * FROM userdetail ORDER BY contact_name";
  //   $result = mysqli_query($conn,$query);
	//  while($row = mysqli_fetch_assoc($result) )



   
  // echo $query = "SELECT * FROM userdetail where id= '".$_SESSION['contact_id']."'";
  $count= 1;
  $query = "SELECT * FROM userdetails  where contact_id= 2";
  //  $query = "SELECT * userdetails  ORDER BY contact_name";
    $result = mysqli_query($conn,$query);
	 while($row = mysqli_fetch_assoc($result))
   {?>
  
<!--     
  $result = mysqli_query($conn,$query);
	//  $row = mysqli_fetch_assoc($result);
  //  echo '<pre>'; print_r($row);echo '</pre>';
   while($row = mysqli_fetch_assoc($result)) { -->
    ?>
     
  <tr>
  <td id="od"> <?php echo $count;?></td>
  <td class="ev"> <?php echo $row["name"];?></td>
  <td class="od"><?php echo $row["email"];?></td>
  <td class="ev"><?php echo $row["username"];?></td>
  
 <a href="editProfile.php?editProfile=<?php echo $row["contact_id"]; ?> "id="edt">Edit</a>
  </td>
  </tr>
    <?php
    // echo "id: " . $row["name"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
  }

   ?>
  
 

	 </table>
	   </div>
</body>
</html>
