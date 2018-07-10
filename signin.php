<?php
 define('DB_HOST', 'localhost'); 
 define('DB_NAME', 'trainproj');
 define('DB_USER','root');
 define('DB_PASSWORD',''); 
 $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
 $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

 function SignIn() { 
		$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
        $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
		session_start(); 
		$x=$_POST['email'];
		$y=md5($_POST['pass']);
		if(!empty($x)) 
		       { 
		         $sql="SELECT * FROM users where Email ='$x' AND Password ='$y'";
				 
		         $query = mysqli_query($con,$sql); 
				 $row = mysqli_fetch_array($query); 
			if(!empty($row['Email']) AND !empty($row['Password'])) 
			   {
				   session_start();
				   $_SESSION['fname'] = $row['FirstName'];
				   $_SESSION['id'] = $row['Email'];
				   $_SESSION['time']=$_SERVER['REQUEST_TIME'];
				
				   header("location:../userlogin.php");
			   } 
			else 
			  { 
				echo "<script>alert('YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...')</script>";
			     print "<script>window.location.href='reg.html';</script>";
	   		  } 
			 } 
			 } 
	   if(isset($_POST['submit'])) 
	       { 
	          SignIn(); 
		    } 
?>

