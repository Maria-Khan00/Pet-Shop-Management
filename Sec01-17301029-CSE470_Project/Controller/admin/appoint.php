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
			Add New pet clinic
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<div class="box-head">
						<h2>Add New pets</h2>
					</div>
					
					<form action="" method="post">
						
						<div class="form">
								<input type="hidden" class="field size1" name="size" value="10000"required />
									
								<p>
									
									<label>Location<span>(Required Field)</span></label>
									<input type="text" class="field size1" name="location" required />
								</p>
								<p>
									
									<label>medicine <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="medicine" required />
								</p>
								<p>
									
									<label>Doctor <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="doctor" required />
								</p>
									
							
						</div>
						
						<div class="buttons">
							<input type="submit" class="button" value="submit" name="send" />
						</div>
						<img src="css/images/footer.gif">
					</form>
					<?php
							if($_GET["id"]){
								var_dump($_GET['id']);
							}
							if(isset($_POST['send'])){
								
								
								$pet_id = $_GET['id'];
								$location = $_POST['location'];
								$medicine=$_POST['medicine'];
								$doctor = $_POST['doctor'];
								
								$qr = "INSERT INTO pet_clinic (pet_id, location,medicine,doctor) 
													VALUES ('$pet_id','$location','$medicine','$doctor')";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Clinic Succesfully Added\");
											window.location = (\"pet_clinic.php\")
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