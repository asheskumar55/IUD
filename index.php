<?php 
$connect=mysqli_connect("localhost","root","root","testing");
if(isset($_POST["btn_add"]))
{
	$insertSql="CALL insertCOuntry('".$_POST["country_name"]."')";
	if(mysqli_query($connect, $insertSql))
	{
		header("location:index.php?inserted=1");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inser Update Delete using Store Procedure in PHP MYSQL</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		body{
			margin:0;
			padding: 0;
			background-color: #f1f1f1;
		}
		.box{
			width: 500px;
			border: 1px solid #ccc;
			background-color: #fff;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="container box">
		<form name="add_country" method="post">
			<h3 align="center">Add Country</h3>
			<div class="form-group">
				<label>Enter Country Name</label>
				<input type="text" name="country_name" class="form-control">
			</div>
			<div class="form-group" align="center">
				<input type="submit" name="btn_add" value="Add" class="btn btn-info">
			</div>
		</form>
		<br/>
		<br/>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Country Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			<?php
			$selectSql= "CALL selectCountry()";
			$selectResult=mysqli_query($connect,$selectSql);
			if(mysqli_num_rows($selectResult) > 0) 
			{
				while($row=mysqli_fetch_array($selectResult))
				{
					?>
					<tr>
						<td><?php echo $row["country_name"]; ?></td>
						<td><a href="index.php?edit=1&country_id=<?php echo $row["country_id"];?>">Edit</a></td>
						<td><a href="" class="btn_delete" id="<?php echo $row["country_id"];?>">Delete</a></td>
					</tr>
					<?php
				}
			}
			else
			{
				?>
					<tr>
						<td colspan="3">No Data</td>
					</tr>
				<?php
			}
			?>
			</table>
	</div>
</body>
</html>