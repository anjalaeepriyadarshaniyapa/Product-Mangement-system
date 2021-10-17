<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
<div class="container-fluid">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		
		<div class="collapse navbar-collapse">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			<a class="nav-link" aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="add.html">Add New Data</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
			</li>


		</ul>

		</div>
	</div>
</nav>
<div class="row mt-3">
	<div class="col-12">
	<table class="table" width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Quantity</td>
			<td>Price (euro)</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";	
			echo "<td><a class='btn btn-success' href=\"edit.php?id=$res[id]\">Edit</a> | <a class='btn btn-danger' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>
	</div>
</div>
</div>
	
		



	
</body>
</html>
