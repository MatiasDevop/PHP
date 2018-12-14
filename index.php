<!DOCTYPE html>
<html>
<head>
	<title> hi demo Php</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


</head>
<body class="container">
		<?php require_once 'process.php'; ?>
		<?php 
			if (isset($_SESSION['message'])):?>
				
		
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php 
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			 ?>
		</div>
		<?php endif ?>
		<?php 
			$mysqli =new mysqli('localhost','root','serverus101090','crud')or die(mysql_error($mysqli));
			$result=$mysqli->query("SELECT * FROM data") or die($mysqli->error); 
			//pre_r($result);
			
		?>
				<div class="row justify-content-center">
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Location</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<?php 
							while ($row=$result->fetch_assoc()): ?>
						 <tr>
						 	<td><?php echo $row['name']; ?></td>
						 	<td><?php echo $row['location']; ?></td>
						 	<td>
						 		<a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
						 		<a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
						 	</td>
						 </tr>
						<?php endwhile; ?>
					</table>
				</div>

			<?php
				function pre_r($array){
					echo '<pre>';
					print_r($array);
					echo '</pre>';
				}
			?>
		<div class="row justify-content-center">
			<form action="process.php" method="POST" class="form-group">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
			 <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name" 
			    value="<?php echo $name; ?>" placeholder="Enter name">
			    
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Location</label>
			    <input type="text" class="form-control" name="location" 
			    value="<?php echo $location; ?>" placeholder="Enter Location">
			  </div>
			  <div class="form-group">
			  	<?php 
			  	if ($update == true):
			  	?>
			  		<button type="submit" class="btn btn-info" name="update">Update</button>
			  	<?php else: ?>	
			  		<button type="submit" class="btn btn-primary" name="save">save</button>
			  	<?php endif; ?>	
			  </div>
			  
			</form>
		</div>








		
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
</body>
</html>