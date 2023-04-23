<!--
Create Account page
-->
<!DOCTYPE html>
<html>

<head>
	<title>Registration Page</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device width, 
	intitial-scale=1" />
	<!-- Links to style pages and scripts -->
	<link href="stylesheet.css" rel="stylesheet" />
	<script type = "text/javascript" src="script.js" defer></script>

</head>

<body>
	<!-- Box with login information -->
	<header>
		<img src="Education Banner.jpeg" id="banner" alt="" />
	</header>
	<div>
		<form action="DatabaseCode/addUserToDatabase.php" method="POST">
			<input name="username" id="username" type="text" placeholder="User Name" required />
			
			<input name="password" id="password" type="password" required placeholder="Password" />
			
			<input name="confirm_password" id="confirm_password" type="password" required placeholder="Confirm Password" />
			
			<select name="teacher/student">
				<option value="teacher">Teacher</option>
				<option value="student">Student</option>
			</select>

			<input name="courseIDIn" id="courseID" type="text" placeholder="Enter CourseID" />

			<input value="Create Account" type="submit" onclick = "validatePassword()" />
		</form>
	</div>

	
	<footer></footer>
</body>
	
</html>
