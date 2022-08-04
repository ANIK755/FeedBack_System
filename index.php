<?php
include("configASL.php");
session_start();                                //new session
if(isset($_SESSION['aid']))                     //true if variable is set
{
	header("location:home.php");                //sends raw https to client
}
if(!empty($_POST))                              // true if the data input is empty
{
	$aid=mysqli_real_escape_string($al,$_POST['aid']);  //function escapes special characters in a string
	$pass=mysqli_real_escape_string($al,$_POST['pass']);
	$sql=mysqli_query($al,"select * from admin where aid='$aid' and password='$pass'"); //fetches one record
	if(mysqli_num_rows($sql)==1)                       //no of row in the fetched data
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:home.php");
	}
	else
	{
		?>
        <script type="text/javascript">                //if more than one row
		alert("Incorrect Admin ID or Password");
		</script>
      <?php
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<style>
</style>
<div id="topHeader">
	<a href= https://leetcode.com/problemset/all/ >  I2IT PROJECTS</a><br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Admin Login</span>
<form method="post" action="" >                      
<div id="table">
	<div class="tr">
		<div class="td">
        	<label>Admin ID : </label>
        </div>
        <div class="td">
			<input type="text" name="aid" size="25" required />         <!-- text box for admin id-->
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Password : </label>
        </div>
        <div class="td">
			<input type="password" name="pass" size="25" required />     <!-- text box for password-->
        </div>
    </div>
</div>
		
        <div class="tdd">
        	<input type="submit" value="Login" />
        </div>
    
    <br>
</div>
</form>
<br>

<center>
<span class="SubHead" style="font-weight:100;">Student Feedback <a href="feedback.php" class="link">Click Here</a>
</span>                                       <!-- redirects user to student feedback page-->

</center>
</body>
</html>