<!DOCTYPE html>
<html lang="en">
<head>
	<title>PET STORE</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<section class="">
		<?php
			include 'header.php';
		?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">Find You Dream PETS</h2>
			</section>
	</section><!--  end hero section  -->


	

	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
				<form method="post">
					<table>
						<tr>
							<td>Transaction ID:</td>
							<td><input type="text" name="mpesa" required></td>
						</tr>
						<tr>
							<td>National ID Number:</td>
							<td><input type="text" name="id_no" required></td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="pay" value="Submit Details"></td>
						</tr>
					</table>
				</form>
				<?php
						if(isset($_POST['pay'])){
							include 'includes/config.php';
							$mpesa = $_POST['mpesa'];
							$id_no = $_POST['id_no'];
							
							$qry = "UPDATE customer SET mpesa = '$mpesa' WHERE id_no = '$id_no'";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Payment Successfully Done. Wait for Admin Approval\");
											window.location = (\"wait.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"pay.php\")
											</script>";
							}
						}
						
					  ?>
			</ul>
			<div class="more_listing">
				<a href="#" class="more_listing_btn">View More</a>
			</div>
		</div>
	</section>
</body>
</html>