
<?php
	include_once 'connection.php';
	include_once 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Update Delete using Store Procedure in PHP MYSQL</title>
	<?php include_once 'Tools/bootstrap.php' ?>
</head>
<body>
	<div class="container box">
		<?php

		// If the edit button is pressed 
		if(isset($_GET["edit"]))
		{
			include_once 'Tools/Edit.php';
		}
		else 
		{
		?>
	<!-- This is all the form -->
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
		<?php
		} 
		 ?>

		 <!-- This is the code for table -->
		<br/>
		<br/>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Country Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<!-- For fetching all the data to website -->
				<?php
				include_once 'Tools/fetch.php';
				?>
			</table>
	</div>
</body>
</html>
