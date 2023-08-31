<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title>Order Part</title>
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

                    <a href="index.php">Home</a>
                    <a href="dealer_application.php">Dealer Application</a>
                </nav>
            </div>
        </div>

        </header>

<h2> Order Part </h2>
<hr/>
<?php
include 'include/db_connect.php';
$id=$_GET['id'];
$topics="";
$logged="|<a href='custom_order.php?id=".$id."'>Click Here to Create A Custom Order</a>";
$sql="SELECT * FROM Items WHERE id='".$id."' LIMIT 1";
$res= mysqli_query($con,$sql);
if(mysqli_num_rows($res)==1){
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $partno=$row['part_no'];
        $topics .="<form action='order_part_parse.php?id=".$id."' method='post'>";
        $topics .="<section class='portfolioItems'><div class='row'><div class='mobile-full tablet-full desktop-full'><table><tr><th>Part No</th><th>ID</th><th>Order</th></tr><tr><td>".$partno."</td><td><input type='number' min='1' placeholder='Please Enter a Quantity' name='quantity'/></td></tr></table><br/><br/></div><div></section>";
        $topics .="Name: <input type='name' name='name' placeholder='Name'/><br/><br/>";
        $topics .="Phone: <input type='tel' name='tel' placeholder='Number'/><br/><br/>";
        $topics .="Email: <input type='email' name='email' placeholder='Email'/><br/><br/>";
        $topics .="<input type='submit' name='submit' value='Submit Your Order'/>";
        $topics .="</form>";
    }

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