<?php
if (isset($_POST['submit'])) {
	require_once 'db.php';
	$name = $_POST['name'];
	$username = $_POST['usrname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if ($name == '' || $username == ''  || $password == '' || $cpassword == '') {
		echo '<p class="errorMsg">Fields marked with * are required</p>';
	} else if ($password != $cpassword) {
		echo '<p class="errorMsg" style= "text-align: center;">Passwords do not match..</p>';
	} else {
		$sql = "SELECT * FROM userdetail WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			echo 'user is already exist!';
		} else {

			$sql = "INSERT INTO userdetail (name, username, email,password) VALUES ('$name', '$username', '$email','$password')";

			if ($conn->query($sql) === TRUE) {
				echo "new record add successfully!";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
		}
	}
}



?>


<?php


?>
<html>

<head>
	<title>Phone Book</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<form class="registbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<?php
		?>

		<h1> Registration</h1>
		<label>Name<span style="color:red;">*</span></label> <input type="text" name="name" class="labelname"><br>
		<label>Username<span style="color:red;">*</span></label> <input type="text" name="usrname" class="labelname"><br>
		<label>Email</label> <input type="text" name="email" class="labelname"><br>
		<label>Password<span style="color:red;">*</span></label> <input type="password" name="password" class="labelname"><br>
		<label>Confirm Password<span style="color:red;">*</span></label> <input type="password" name="cpassword" class="labelname"><br>

		<input type="submit" value="Register" name="submit">
		<p class="acount"> Already have an account? please login <a href="index.php" id="reg"> Here </a>


	</form>

</body>

</html>