<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title>Your Order</title>
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


<h2> Order Part </h2>

<hr/>

<?php
include 'include/db_connect.php';
if(isset($_POST['submit'])){
if(($_POST['quantity']=="") && ($_POST['name']=="") && ($_POST['tel']=="") && ($_POST['email']=="")){
echo "Please fill out the form completely. Thank you.";
}else{
$quantity=$_POST['quantity'];
$name=$_POST['name'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$pid=$_GET['pid'];
$request="<section class='portfolioItems'><div class='row'><div class='mobile-full tablet-full desktop-full'><table>";
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

$request.="<tr><th>Part No</th><th>Specification</th><th>OD</th><th>ID</th><th>Thickness</th><th>Stud</th><th>Order</th></tr><tr><td>".$partno."</td><td>".$specs."</td><td>".$od."</td><td>".$id."</td><td>".$thick."</td><td>".$stud."</td><td>$quantity</td></tr>";
}
$to="themobidev@gmail.com";
$from=$email;
$subject="Part Order Requested";
$message = "Request from " . $name . " \nPhone: ".$tel." \nEmail: ".$email."\nPart No:".$partno." Specification: ".$specs." OD: ".$od." ID: ".$id." Stud: ".$stud." Order: ".$quantity."" ;
$headers="From: $name\r\nPhone: $tel\r\nReply-To: $from";
mail($to,$subject,$message,$headers);

echo "Your order has been submitted!<br/>";
$request .="</table></div><div></section>";
echo $request;
echo "<a href='test.php'>Return to Order More!</a>";
}
}}
else{
echo "There has been an error with your request";
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