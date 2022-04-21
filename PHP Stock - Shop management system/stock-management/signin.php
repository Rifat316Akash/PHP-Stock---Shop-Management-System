<?php

    include "user.php";

    // if (empty($_SESSION['username'])){
    //     header('Location:signin.php');
    // }

    $error = "";
    $username = '';
    if(isset($_POST) && !empty($_POST['id'])){
        $id = $_POST['id'];
        $pass= $_POST['pass'];

        if (empty($id) || empty($pass)){
            echo "Username ans password shouldn't be empty!";
        }
        else{
            $username = user_signin($id, $pass);
            // echo "username: ".$username;
            if ($username== -1){
                $error = "username or password is incorrect!";
            }
            else{
                // echo "Login Successful".$username;
                header('Location:home.php');
            }
        }
    }
?>

<html>
    <head>
    
    </head>
    <body>
        
        <div style="margin:300px 30% 0px 30%;">
            <h1 style="margin:0 30% 0 30%;"> Admin Sign In</h1>
            <form action="" method="post">
                
                <table>
                    <tr>
                        <td><label for="id">I.D: </label></td>
                        <td><input type="text" name="id" id="" require></td>
                    </tr> 
                    <tr>
                        <td><label for="pass">Password: </label></td>
                        <td><input type="password" name="pass" id="" require></td>
                    </tr> 
                    <tr><td><p style="color:red;"><?php echo $error; ?></p></td></tr>     
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value = "Signin" id=""></td>
                        <td><a href="signup.php">Register</a></td>
                    </tr> 
                </table>        
            </form>        
        
        </div>


    </body>
</html>