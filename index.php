
<?php
	include_once 'connection.php';
	// This is for add the data in the website 
	if(isset($_POST["btn_add"])){
		$insertSql="CALL insertCOuntry('".$_POST["country_name"]."')";
		if(mysqli_query($connect, $insertSql))
		{
			header("location:index.php?inserted=1");
		}
	}
	// This is for edit the data in website
	if(isset($_POST["btn_edit"]))
	{
		$updateSql= "CALL updateCountry('".$_POST["country_id"]."','".$_POST["country_name"]."')";
		if(mysqli_query($connect,$updateSql))
		{
			header("location:index.php?updated=1");
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Update Delete using Store Procedure in PHP MYSQL</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container box">
		<?php

		// If the edit button is pressed 
		if(isset($_GET["edit"]))
		{
			$singlsql= "CALL singleCountry('".$_GET["country_id"]."')";
			$singleResult=mysqli_query($connect,$singlsql);
			if(mysqli_num_rows($singleResult)>0)
			{
				while($singleRow= mysqli_fetch_array($singleResult))
					{
		?>
			<form name="add_country" method="post">
			<h3 align="center">Edit Country</h3>
			<div class="form-group">
				<label>Enter Country Name</label>
				<input type="text" name="country_name" class="form-control" value="<?php echo $singleRow["country_name"]?>">
			</div>
			<div class="form-group" align="center">
				<input type="hidden" name="country_id" value="<?php echo $singleRow["country_id"]; ?>"/>
				<input type="submit" name="btn_edit" value="Edit" class="btn btn-info">
			</div>
		</form>
			<?php
					}
					mysqli_next_result($connect);
				}
		}
		else if(isset($_GET["delete"]))
		{
			$deleteSql="CALL deleteCountry('".$_GET['country_id']."')";
			if(mysqli_query($connect,$deleteSql))
			{
				header("location:index.php?deleted=1");
			}
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

	<!-- This code is for the table -->
		<?php
		} 
		 ?>
		<br/>
		<br/>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Country Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
	<!-- This is for showing the data in the website-->

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
				mysqli_next_result($connect);
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

<script>
	$(document).ready(function(){
		$('.btn_delete').click(function(){
			var country_id=$(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				window.location="index.php?delete=1&country_id="+country_id+"";
			} 
			else
			{
				return false;
			}
		});
	});
</script>