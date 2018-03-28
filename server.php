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

	if(isset($_GET["delete"]))
		{	
			$deleteSql="CALL deleteCountry('".$_GET['country_id']."')";
			if(mysqli_query($connect,$deleteSql))
			{
				header("location:index.php?deleted=1");
			}
		}
?>