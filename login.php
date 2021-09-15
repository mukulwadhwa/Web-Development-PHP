<html>
<head>
	<title> Login </title>	
	<link href="CSS\style.css" rel="stylesheet"/>
</head>

<body>
	<center>
	
		<h1 style="font-size:40;font-weight: bold; margin:0; text-align: center;"> 
			Log In - PHP Assessment 
		</h1>
		<br/>
		<br/>
		<div>
		<form method="POST" >
			<font color="yellow" ><b>Log In</b></font>
			<hr>
			 
			<input type="text" name="uname" placeholder="Username" />
			<br/><br/>
			<input type="password" name="pswd" placeholder="Password"/>
			<br/><br/>
			<br/><br/>
			<input type="submit" name="subm" value="Log In" />
		
		</div>
		</center>

		<?php
			
			$host='localhost';
			$user='root'; 		//user same as login @ phpmyadmin
			$pass='';    //password same as starting login @ phpmyadmin
			$dbname='test';
			$conn=mysqli_connect($host,$user,$pass,$dbname);
			
			if(isset($_POST['uname'],$_POST['pswd']))
			{
			$un=$_POST['uname'];
			$pw=$_POST['pswd'];
			
			
			
			$sql="SELECT uname FROM users WHERE uname='$un' AND password='$pw'";
			
			$show=mysqli_query($conn,$sql);
			
			
			if(mysqli_num_rows($show)>0)
				{
				
			
			    $_SESSION['user_data']=$_POST['uname'];
			
				echo "<script type='text/javascript'>window.location.href ='login_success.php';</script>";
				    
				}
			else
				{echo "<script> alert('Wrong Username Or Password')</script>";}
			
			mysqli_close($conn);
			}

			else {echo "";}
		?>

			
		</form>
		<br/><br/><br/>
	<center>
	<footer style="font-size:15; align=bottom"> By: Mukul Wadhwa </footer>
	</center>

</body>
</html>

		

