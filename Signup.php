<html>
<head>
	<title> Signup </title>	
	<link href="CSS\style.css" rel="stylesheet"/>
</head>

<body>
	<center>
	
		<h1 style="font-size:40;font-weight: bold; margin:0; text-align: center;"> 
			Sign Up - PHP Assessment 
		</h1>
		<br/>
		<br/>
		<div>
		<form method="POST" >
			<font color="yellow" ><b>Sign Up</b></font>
			<hr>
			 
			<input type="text" name="uname" placeholder="Username" />
			<br/><br/>
			<input type="password" name="pswd" placeholder="Password"/>
			<br/><br/>
			<input type="text" name="eid" placeholder="Your Email Id" />
			<br/><br/>
			<input type="text" name="age" placeholder="Age" />
			<br/><br/>
			<select id="country" name="country" >
			   <option disabled selected>-- Select Country --</option>
			   <option value="India">India</option>
			   <option value="United States">United States</option>
			   <option value="Russia">Russia</option>
			</select>
			<br/><br/>
			<input type="submit" name="subm" value="Sign Up" />
		
		</div>
		</center>

		<?php
			
			$host='localhost';
			$user='bottomsc_test'; 		//user same as login @ phpmyadmin
			$pass='TestDB@123';    //password same as starting login @ phpmyadmin
			$dbname='bottomsc_test';
			$conn=mysqli_connect($host,$user,$pass,$dbname);
			
			if(isset($_POST['uname'],$_POST['pswd'],$_POST['eid'],$_POST['age'], $_POST['country']))
			{
			$un=$_POST['uname'];
			$pw=$_POST['pswd'];
			
			$email=$_POST['eid'];
			$country=$_POST['country'];
			$age=$_POST['age'];
			
			$sql2="SELECT uname FROM users WHERE uname='$un' ";
			$show=mysqli_query($conn,$sql2);
			
			$result=mysqli_num_rows($show);
					
					if($result==0)
					{
						if(preg_match("/^[a-zA-Z_.0-9]+.@[a-zA-Z0-9]+.com$/",$email))
							{
							echo "Accepted";
							
							$sql="INSERT INTO users VALUES('$un','$pw','$email','$age','$country')";
							
						
							if(mysqli_query($conn,$sql))
								{echo "";}		
							else
								{
									echo "<script> alert('database error') </script>";
								}
							
							 echo "<script type='text/javascript'>window.location.href = 'Registered.php';</script>";
       
							}
						else	
							{echo "<script> alert('alert -  Invalid Email') </script>";}
					}
					else
						
						{echo "<script> alert('alert -  username already existed') </script>";}
				
	
		
			
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
