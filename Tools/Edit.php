
<?php
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
?>

