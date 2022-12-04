<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['register'])) //if not chnge to signup
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(username,password,email) values('$username','$enc_password','$email')");

if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}
}

// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['email'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="home.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['username'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}

//Code for Forgot Password

// if(isset($_POST['send']))
// {
// $femail=$_POST['femail'];

// $row1=mysqli_query($con,"select email,password from users where email='$femail'");
// $row2=mysqli_fetch_array($row1);
// if($row2>0)
// {
// $email = $row2['email'];
// $subject = "Information about your password";
// $password=$row2['password'];
// $message = "Your password is ".$password;
// mail($email, $subject, $message, "From: $email");
// echo  "<script>alert('Your Password has been sent Successfully');</script>";
// }
// else
// {
// echo "<script>alert('Email not register with us');</script>";	
// }
// }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css" type='text/css'/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
 </head>
<body>
  <pre>  <font color ="#ff5d5d"><center>
    <h1>Login & Registration Form</h1></center></font>    
  </pre>
  <div class="login-page">
    <div class="form">
     <form class="register" method="post" action="" enctype="multipart/form-data">
         <input type="text" name="username" placeholder="username" value="" required/>
         <input type="text" name="password" placeholder="password" value="" required/>
         <input type="text" id="email" name="email" placeholder="email" value="" required/>
         <input type="submit" name="register"  value="Create"/>
         <p class="message">Already Registered? <a href="#"><font color ="#ff0000">Login</font></a></p>
     </form>
     <form class="login-form" action="" method="POST">
        <input type="text" name="email" placeholder="email" id="email"/>
        <input type="password" name="password" placeholder="password" id="password"/>
		<input type="submit" name="login"  value="Login"/>
        <p class="message">Not Registered? <a href="#"><font color ="#ff0000">Register</font></a></p>
     </form>
     
    </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'>
    </script>
    <script>
        $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
     });
    </script>
</body>
</html>