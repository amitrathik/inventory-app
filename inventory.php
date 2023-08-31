<?php
	require "includes/db_connect.php";
	
$result = mysqli_query($con,"SELECT * FROM Sheet2");	





?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<title>Forum</title>
	<style>
		body{
			width:80%;
			margin:0 auto;
		}
		table{
			border:1px solid #000;
			width:100%;
			text-align:center;
		}
		table th,td{
			border:1px solid #000;
		}
	
	
	</style>
</head>
<body>
	<div class="border">
		<div class="content">	
		<?php
			while($row = mysqli_fetch_array($result)){
				echo "<table>";
				echo "<tr><th>Part No</th><th>Pattern 1</th><th>Pattern 2</th><th>Specification</th><th>OD</th><th>ID</th><th>Thickness</th><th>STUD</th></tr>";				
				echo "<tr><td>".$row['Part_No']."</td><td>".$row['Pattern_1']."</td><td>".$row['Pattern_2']."</td><td>".$row['Specification']."</td><td>".$row['OD']."</td><td>".$row['ID']."</td><td>".$row['Thickness']."</td><td>".$row['STUD']."</td></tr>";
				echo "</table>";
			}

			mysqli_close($con);
		?>
		</div>
	</div>
	
	
</body>
</html>