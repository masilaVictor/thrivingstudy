

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="style4.css" rel="stylesheet" type="text/css">
	</head>
	<style type="text/css">
		.links{
			color: blue;
			text-decoration: none;
			cursor: pointer;
		}
		.links:hover{
			color: #fff;

		}
	</style>
	<body>
		<div class="secure__title">
			
			<img src="login2.png">
			<h1>SECURE LOGIN SYSTEM</h1>
		</div>	
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
				<p>Don't have an account?<a class='links' href="register.php">Signup</a></p>
				<p>Are you a Tutor? <a class="links" href="../tutor/index.php">Tutor Login</a></p>
			</form>
		</div>
	</body>
</html>