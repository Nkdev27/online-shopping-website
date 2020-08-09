<?php 

	if(isset($_POST["submit"])){  
  
		if(!empty($_POST['user']) && !empty($_POST['pass'])) {  

  		    $user=$_POST['user'];  
    		$pass=$_POST['pass'];

    		$con=new mysqli('localhost','root','','project'); 
  			$qu="SELECT * FROM registration WHERE username='$user'";
    		$result=$con->query($qu);
    		
    			while($row=$result->fetch_assoc())  
    			{  
    				$dbusername=$row['username'];  
    				$dbpassword=$row['password'];
    
    				if($user == $dbusername && md5($pass) == $dbpassword)  
    				{   
    					header("Location: index.html"); 
    				}  
    				else 
    				{  
    					echo "Invalid username or password!";  
    				}  
  				}
			
		}else {  
			echo "All fields are required!";    
		}  
	}
	$con->close();
 ?>