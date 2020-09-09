<?php
	include '../includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
	<?php
		include '../includes/config.php';
		$id=$_GET['id'];
		$select = "SELECT * FROM pets WHERE pet_id = '$id'";
		$result = $conn->query($select);
		while($row = $result->fetch_assoc()){
				$pet_name=$row['pet_name'];
				$pet_type=$row['pet_type'];
				$pet_price=$row['price'];
				$image=$row['image'];
								}
							?>
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
		</div>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="index.php">Dashboard</a>
			<span>&gt;</span>
			Add New Pet
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<div class="box-head">
						<h2>Add New pets</h2>
					</div>
					
					<form action="" method="post" enctype="multipart/form-data">
						
						<div class="form">
								<input type="hidden" class="field size1" name="size" value="10000"required />
								<p>
									
									<label>Pet Name <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="pet_name" value="<?php echo $pet_name;?>" required />
								</p>	
								<p>
									
									<label>Pet type <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="pet_type" value="<?php echo $pet_type;?>" required />
								</p>
								<p>
									
									<label>Pet Price <span>(Required Field)</span></label>
									<input type="text" class="field size1" value="<?php echo $pet_price;?>" name="price" required />
								</p>
								<p>
									
									<label>Pet Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="image"  />
								</p>
									
							
						</div>
						
						<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="submit" name="send" />
						</div>
						<img src="css/images/footer.gif">
					</form>
					<?php

							if(isset($_POST['send'])){
								
								$target = "css/images".basename($_FILES['image']['name']);
								$image=$_FILES['image']['name'];

								if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
								    echo "File is valid, and was successfully uploaded";

								} else {
								    echo "Possible file upload attack";
								}

								$pet_name = $_POST['pet_name'];
								$pet_type = $_POST['pet_type'];
								$hire_cost = $_POST['price'];

								$qr = "UPDATE pets SET pet_name = '$pet_name', pet_type= '$pet_type',price='$hire_cost',image='$image' WHERE pet_id = '$id'";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Pet Succesfully updated\");
											window.location = (\"add_pet.php\")
											</script>";
									}
								
							
							}
						?>
				</div>

			</div>
			
			<div id="sidebar">
				
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

	
</body>
</html>