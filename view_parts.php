<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title>View Part</title>
    <link rel="stylesheet" href="bower_components/normalize-css/normalize.css">
    <link rel="stylesheet" href="bower_components/Gridlock/fs.gridlock-base.css">
    <link rel="stylesheet" href="bower_components/Gridlock/fs.gridlock-12.css">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/naver/jquery.fs.naver.min.js"></script>
    <link rel="stylesheet" href="bower_components/naver/jquery.fs.naver.css">
    <link rel="stylesheet" href="css/style.css">
    <script>
        $(document).ready(function() {
            $("nav").naver({
                maxWidth: "740px"
            });
            $.mimeo();
        });
    </script>
</head>
<body class="gridlock">
    <header>
        <div class="topBar">
            <div class="row">
                <nav class="mobile-full tablet-full desktop-full">

                <a href="test.php">Home</a>
                    <a href="custom_order.php">Custom Order</a>
                    <a href="dealer_application.php">Dealer Application</a>
                </nav>
            </div>
        </div>

        </header>


<h2> View Part </h2>
<hr/>
<?php
include 'include/db_connect.php';
$pid=$_GET['pid'];
$topics="<section class='portfolioItems'><div class='row'><div class='mobile-full tablet-full desktop-full'><table>";
$logged="|<a href='custom_order.php?pid=".$pid."'>Click Here to Create A Custom Order</a>";
$sql="SELECT * FROM Table8 WHERE PID='".$pid."' LIMIT 1";
$res= mysqli_query($con,$sql);
if(mysqli_num_rows($res)==1){
while($row=mysqli_fetch_assoc($res)){
$pid=$row['PID'];
$partno=$row['Part_No'];
$specs=$row['Specification'];
$od=$row['OD'];
$id=$row['ID'];
$thick=$row['Thickness'];
$stud=$row['STUD'];

$topics .="<tr><th>Part No</th><th>Specification</th><th>OD</th><th>ID</th><th>Thickness</th><th>Stud</th><th>Order</th></tr><tr><td>".$partno."</td><td>".$specs."</td><td>".$od."</td><td>".$id."</td><td>".$thick."</td><td>".$stud."</td><td><a href='order_part.php?pid=".$pid."'>Order Part</a><br/></td></tr>";
}
$topics .="</table></div><div></section>";
echo $topics;
}
?>
<footer>
       <div class="row">
           <div class="all-full">
               <p>Copyright 2014 &copy; Split Screen Network</p>
           </div>
       </div>
    </footer>


</body>
</html>