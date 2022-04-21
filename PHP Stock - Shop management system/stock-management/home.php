<?php

    include "user.php";
    if (empty($_SESSION['username'])){
        header('Location:signin.php');
    }


?>


<html>
    <head>
    
    </head>

    <body>
        <div style = "margin-left: 30%;margin-top:300px; margin-right:30%; text-align:center;">
                <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
                <a href="profile.php">Profile</a><br>
                <a href="product.php">All Product</a><br>
                <a href="change_pass.php"> Change Password</a><br>
                <a href="status.php">Stock status</a>
                <a href="logout.php">Logout</a><br>             
            
        </div>
    </body>
</html>