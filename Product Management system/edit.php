<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];	
	
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$qty = $res['qty'];
	$price = $res['price'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
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
	
		<!-- <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a> -->
		<br/><br/>
		<div class="row justify-content-center">
			<div class="col-4">
				<form name="form1" method="post" action="edit.php">
					<!-- <table border="0">
						<tr> 
							<td>Name</td>
							<td><input type="text" class="form-control" name="name" value="<?php echo $name;?>"></td>
						</tr>
						<tr> 
							<td>Quantity</td>
							<td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
						</tr>
						<tr> 
							<td>Price</td>
							<td><input type="text" name="price" value="<?php echo $price;?>"></td>
						</tr>
						<tr>
							<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
							<td><input type="submit" name="update" value="Update"></td>
						</tr>
					</table> -->
					<div class="row">
						<div class="col-12">
							<label class="form-labe">Name</label>
							<input type="text" class="form-control" name="name" value="<?php echo $name;?>">
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-12">
							<label class="form-labe">Quentity</label>
							<input type="text" class="form-control" name="qty" value="<?php echo $qty;?>">
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-12">
							<label class="form-labe">Price</label>
							<input type="text" class="form-control" name="price" value="<?php echo $price;?>">
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-12">
							<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
							<input type="submit" class="btn btn-success" name="update" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
