<?php
session_start();
if(isset($_SESSION['email']))
{
	 echo "<script>location.href = 'home.php'</script>";
}
?>

<!DOCTYPE HTML>
<html>
	<head>
	  <title>Forg Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel='stylesheet', href='stylesheets/login.css'>
		<!-- <link rel='stylesheet', href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap'> -->
		<!-- <link rel='stylesheet', href='https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet'> -->
	</head>
	<body>

		<header>
				<?php
						include("nav_bar.php");
				?>
		</header>

		<div class="right-side">
		<h1>Login</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form-group">
			<label>Email:</label>
			<br>
			<input class="form-control" type="text" name="email" placeholder="Email">
			</div>

			<div class="form-group">
			<label>Password:</label>
			<br>
			<input class="form-control" type="password" name="password" placeholder="Password">
			</div>
			<br>

			<input class="btn btn-primary" type="submit" name="submit" value="Login">
			<br>
			<p>You don't have an account? </p>
			<a href="register.php">Register here!</a>
		</form>
		</div>
	</body>
</html>


<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include('Includere/connection.php');
		$stmt = $dbh->prepare("SELECT * FROM `users` WHERE `email` = :email AND `password` = :password");

		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);

		$email = $_POST["email"];
		$password = $_POST["password"];
		$password = strtoupper(hash('whirlpool', $password));

		$stmt->execute();

		$count = $stmt->rowCount();
		if ($count == 1)
		{
			$_SESSION['email']=$email;
			$_SESSION['name']=$stmt->fetch()['first_name'];
			
			echo "<script>location.href = 'home.php'</script>";
		}
		else
		{
			echo '<script type="text/javascript">alert("Ai introdus emailul sau parola gresit.")</script>';
			echo "<script>location.href = 'login.php'</script>";
		}
		$dbh = null;
	}
?>
