<?php session_start();?>
<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="dealer_application.php">Dealer Application</a>
        </nav>
    </header>


    <?php
    include 'include/db_connect.php';
    $tid=1;
    $table="<table><th>Items</th><tr><th>Part No</th></tr>";
    $sql="SELECT * FROM Items";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)) {
            $id=$row['id'];
            $partno=$row['part_no'];
            $table .="<tr><td>".$partno."</td><td><a href='order_part.php?pid=".$id."?&".$tid."' class='orderpart'>Order Part</a></td></tr>";
        } 
        $table .="</table>";
        echo $table;
    }else{
        echo "<p> There are no categories available yet:</p>";
    }
    ?>

    <footer>
        <p>Copyright 2014 &copy; SplitScreenNetwork</p>
    </footer>
</body>
</html>