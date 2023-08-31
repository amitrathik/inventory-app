<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title>Test</title>
<style>
html,body{
height:100%;
margin:0;
padding:0;
}
.header{
margin:0;
padding:0;
height:25%;
}
.header h2{
margin:0;
padding:0;
}
.content{
margin:0;
padding:0;
height:50%;
overflow:scroll;
}
table{
width:100%;
}
table tr,td,th{
border:1px solid #000;
}
th{
background-color:#ddd;
}
</style>
</head>

<body>
<div class="header">
<h2>Inventory</h2>
</div>

<?php
include 'include/db_connect.php';
$sql="SELECT * FROM Table8";
$res=mysqli_query($con,$sql);
$row=mysqli_num_rows($res);
$categories="<div class='content'><table>";
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $pid=$row['PID'];
        $partno=$row['Part_No'];
        $specs=$row['Specification'];
        $od=$row['OD'];
        $id=$row['ID'];
        $thick=$row['Thickness'];
        $stud=$row['STUD'];
        $categories .="<tr><th>Part No.</th><th>Specifications</th><th>OD</th><th>ID</th><th>Thickness</th><th>Stud</th></tr>";
        $categories .= "<tr><td><a href='view_parts.php?pid=".$pid."'>".$partno."</a></td><td>".$specs."</td><td>".$od."</td><td>".$id."</td><td>".$thick."</td><td>".$stud."</td></tr>";
    }
    $categories .="</table></div>";
    echo $categories;
}else{
echo "<p>There is no data available right now.</p>";
}

?>
</body>
</html>