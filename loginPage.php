<!--
Login page
-->
<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device width, 
	intitial-scale=1" />
	<!-- Links to style pages and scripts -->
	<link href="stylesheet.css" rel="stylesheet" />
	

</head>

<body>
	<!-- Box with login information -->
	<header>
		<img src="Education Banner.jpeg" id="banner" alt="" />
	</header>
	<div>
		<form action="DatabaseCode/checkPassword.php" method="POST">
			<input name="usernameIn" id="username" type="text" placeholder="User Name" required />
			<input name="password" id="password" type="password" required placeholder="Password" />
			<input value="Submit" type="submit" />
		</form>
		<form action="registrationPage.php" method="POST">
			<input value="Create Account" type="submit" />
		</form>
	</div>


	<footer></footer>
</body>
<script>
		const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
		const error = urlParams.get('error');
        if (error != null){
			
			if(error == "incorrectLogin"){
				alert("Incorrect Username or Password");
			}
			else{
				alert("You do not have access to the course, ask teacher for access");
			}
		}
	</script>
</html>