<?php
 define('DB_HOST', 'localhost'); 
 define('DB_NAME', 'trainproj');
 define('DB_USER','root');
 define('DB_PASSWORD',''); 
 function NewUser()
{
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
	$loc ="../images/uploads/".$_POST['id'].".jpg";
	$fname = $_POST['fname'];
	$lName = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password =  md5($_POST['pass']);
	move_uploaded_file($_FILES['img']['tmp_name'],$loc);
	$id = $_POST['id'];
	//$sql = "insert into users values('$id','$loc')";
	//$exe = mysqli_query($con,$sql) or die("Error While Uploading".mysqli_error($con));
	//$sql2 = "select * from users where id=$id";
	//$query  = mysqli_query($con,$sql2);
	//$row = mysqli_fetch_array($query);
	//$rt = $row['path'];
	$query = "insert into users(FirstName,LastName,Email,Phone,Password,path,id) values('$fname','$lName','$email','$phone','$password','$loc','$id')";
	$data = mysqli_query($conn,$query)or die("Error: ".mysqli_error($conn));
	if($data)
	{
		echo "<script>alert('RegistraionComplete')</script>";
		 print "<script>window.location.href='reg.html';</script>";

	}
}
function SignUp()
{
	$x=$_POST['email'];
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
	$db = mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
if(!empty($x))   
{   

    $sql="SELECT * FROM users WHERE Email = '$x'"; 
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