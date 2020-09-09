<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to Approve this request?")){
				window.location.href ='approve.php?id='+id;
			}
		}
	</script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="index.php">Dashboard</a>
			<span>&gt;</span>
			Client Requests
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content" style="width:90%">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Client Requests</h2>
						
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Client Name</th>
								<th>Client Phone</th>
								<th>Pet Name</th>
								<th>price</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								
								
								$connect = mysqli_connect("localhost", "root", "", "petshop"); 
								// Check connection
								if ($connect->connect_error) {
								    die("Connection failed: " . $conn->connect_error);
								} 

								$sql ="SELECT pets.pet_id,customer.customer_id,customer.fname,customer.phone,pets.pet_name,pets.price,customer.status FROM customer JOIN pets ON customer.pet_id=pets.pet_id"; 
								$result = mysqli_query($connect, $sql);  ?>

								
								 <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>
								
								<td><h3><a href="#"><?php echo $row['fname'] ?></a></h3></td>
								<td><h3><a href="#"><?php echo $row['phone'] ?></a></h3></td>
								<td><?php echo $row['pet_name'] ?></td>
								<td><a href="#"><?php echo $row['price'] ?></a></td>
								
								<td><a href="javascript:sureToApprove(<?php echo $row['pet_id'];?>)">Approve</a></td>
								<td><a href="appoint.php?id=<?php echo $row['pet_id'];?>">Appointment</a></td>
							</tr> 
                          <?php  
                               }  
                          }  
                          ?> 
							
						</table>
						
					</div>
					
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->			
		</div>
		<!-- Main -->
	</div>
</div>
	
</body>
</html>