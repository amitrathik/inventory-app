<?php

include_once('include/db_connect.php');
$sql="SELECT * FROM Table8";
$res=mysqli_query($con,$sql);
$row=mysqli_num_rows($res);
$myfile = fopen("parts.xml", "w") or die("Unable to open file!");
$txt="<?xml version='1.0' encoding='UTF-8'?>";
$txt .="<Parts>";
if(mysqli_num_rows($res)>0){
while($row=mysqli_fetch_assoc($res)){
$txt .="<Part>";
$txt .="<PartNo>".$row['Part_No']."</PartNo>";
$txt .="<Specification>".$row['Specification']."</Specification>";
$txt .="<OD>".$row['OD']."</OD>";
$txt .="<ID>".$row['ID']."</ID>";
$txt .="<Thickness>".$row['Thickness']."</Thickness>";
$txt .="<Stud>".$row['STUD']."</Stud>";
$txt .="</Part>";
}}
$txt .="</Part>";
fwrite($myfile, $txt);
fclose($myfile);
?>
