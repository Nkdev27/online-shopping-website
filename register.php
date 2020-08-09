<?php 

	if (isset($_POST['submit'])){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "project";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}

		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phno'];
		$user = $_POST['user'];
		$password = md5($_POST['pass']);

		$sql = "INSERT INTO registration (first_name,last_name,email,phone_no,username,password) 
				VALUES ('$firstname','$lastname','$email','$phone','$user','$password')";

		if ($conn->query($sql) === TRUE) {
			echo "<script type='text/javascript'>alert('Registration Completed!!!');</script>";
    		header("Location: main.html");
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

 ?>