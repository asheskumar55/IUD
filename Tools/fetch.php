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
					<td><a href="index.php?delete=1&country_id=<?php echo $row["country_id"];?>" class="btn_delete" id="<?php echo $row["country_id"];?>">Delete</a></td>
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