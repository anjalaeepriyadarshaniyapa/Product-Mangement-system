<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<div id="header" class="col-12 text-center">
				<h1 class="text-danger text-center" style="text-transform:uppercase;">Product management</h1> 
			</div>
		</div>
		<div class="row">
			
			<?php
				if(isset($_SESSION['valid'])) {			
					include("connection.php");					
					$result = mysqli_query($mysqli, "SELECT * FROM login");
				?>
				<div class="col-12 text-center">	
					<h3 class="text-center">Welcome <?php echo $_SESSION['name'] ?> !</h3>
				</div>
				<div class="col-12 d-flex justify-content-center">
					
					<a class="btn btn-success mx-2" href='view.php'>View and Add Products</a>
					<a class="btn btn-danger mx-2" href='logout.php'>Logout</a>
				</div>
					

				<?php	
				} else {
					echo "You must be logged in to view this page.<br/><br/>";
					echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
				}
			?>

		</div>
	</div>

	
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>
