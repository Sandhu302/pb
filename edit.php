<?php
 ob_start();
  require_once 'db.php';
   // $getid = $_GET['editid'];
   // update
   if(isset($_POST['update1'])){
	    $getid = $_POST['contact_id'];
	   $fname = $_POST['fname'];
	   $designation = $_POST['designation'];
	   $phone = $_POST['phone'];
	   $address = $_POST['address'];
   $sql = "UPDATE contactdetails SET contact_name='$fname', designation= '$designation',phone= '$phone',address='$address' 
   WHERE contact_id ='$getid'";
    $run_query =mysqli_query($conn,$sql);
	if($run_query){
	header("Location:view_user.php");	
  
   }else  {
	 echo '<p class="errorMsg">There was error while updating record</p>';  
   
	}
   }
   $getid = $_GET['editid']; // GETTING ID FROM URL
   $query = "SELECT * FROM contactdetails WHERE contact_id ='$getid' ";
    $result = mysqli_query($conn,$query);
	 $row = mysqli_fetch_assoc($result);
	 echo $row['contact_name'];
?>
  <html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

 
  
  <div id="main">
  <h1> Phone Book</h1>
 <?php  include_once 'menu-main.php';?></div>
 <form class="addusrbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <h1> Update User</h1>
  <input type="hidden" name ="contact_id" value= "<?php echo $row['contact_id'];?>"><br>
 <label>Name</label> <input type="text" name ="fname" value= "<?php echo $row['contact_name'];?>"><br>
 <label>Designation</label> <input type="text" name ="designation" value="<?php echo $row['designation'];?>"><br>
 <label>Phone</label> <input type="text" name="phone" value="<?php echo $row['phone'];?>"><br>
	<label>Address</label> <input type="text" name="address" value="<?php echo $row['address'];?>"><br>
 
 
  <input type="submit" value ="Update" name="update1">
  
  

  </form>
  
  </body>
  </html>
  