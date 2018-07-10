<?php
 define('DB_HOST', 'localhost'); 
 define('DB_NAME', 'trainproj');
 define('DB_USER','root');
 define('DB_PASSWORD',''); 
 function NewUser()
{
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
	$name = $_POST[''];
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password =  md5($_POST['pass']);
	$query = "insert into users values('$name','$email','$userName','$password')";
	$data = mysqli_query($conn,$query)or die("Error: ".mysqli_error($conn));
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
}
function SignUp()
{
	$x=$_POST['user'];
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
if(!empty($x))   
{   

    $sql="SELECT * FROM users WHERE Username = '$x'"; 
	$query = mysqli_query($conn,$sql);
	if(!$row = mysqli_fetch_array($query))
	{
		NewUser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>