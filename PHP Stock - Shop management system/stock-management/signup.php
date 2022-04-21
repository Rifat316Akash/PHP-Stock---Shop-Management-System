<?php

    include "user.php";

    $error = false;
    $username = '';
    $id_error = $name_error = $email_error = $pass_error ='';
    if(isset($_POST) && !empty($_POST['id'])){

        $id = $_POST['id'];
        $pass= $_POST['pass'];
        $conf_pass = $_POST['conf_pass'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        $id_regx = "/^[0-9]{4}-[0-9]{1}-[0-9]{2}-[0-9]{3}$/";
        $email_regx = "/^[0-9]{4}-[0-9]{1}-[0-9]{2}-[0-9]{3}@std.ewubd.edu$/";
        $name_regx ="/^[a-Z]*$/";
        if (empty($name)){
            $name_error = "Name is requred!";
        }
        // else if(!preg_match($name_regx, $name)){
        //     $name_regx = "Name should be valid";
        // }
        if (empty($id)){
            $id_error = "Id is required!";
            $error = true;
        }else if(!preg_match($id_regx,$id)){
            $id_error = "User ID violating EWU official ID formate!";
            $error = true;
        }
        if (empty($email)){
            $email_error = "Email is requred!";
            $error = true;
        }
        else if(!preg_match($email_regx,$email)){
            $email_error = "Email doesn't matching ewu email formate!";
            $error = true;
        }
        if (empty($pass) or empty($conf_pass)){
            $pass_error = "Password is recquired!";
            $error = true;
        }
        else if($pass!=$conf_pass){
            $pass_error = "Password doesn't matching!";
            $error = true;
        }

       if ($error == false){
            $check = user_registration($id, $email, $pass, $name);
            // echo "Registration: ".$check;
            if ($check==1){
                // echo "Registration success!.";
                header('Location:signin.php');
                exit();
            }
       }
    }
?>
<html>
    <head>
    
    </head>
    <body>

        <div  style = "margin-left:30%;"> 
            <h1>Registration Form </h1>
            <form action="" method="post">            
                <table>
                    <tr>
                        <td><label for="id">I.D: </label></td>
                        <td><input type="text" name="id" id="" require></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p style = "color:red;"><?php echo $id_error; ?></p></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Password: </label></td>
                        <td><input type="password" name="pass" id="" require></td>
                    </tr>
                    <tr>
                        <td><label for="conf_pass">Confirm Password: </label></td>
                        <td><input type="password" name="conf_pass" id="" require></td>
                    </tr> 
                    <tr>
                        <td></td>
                        <td><p style = "color:red;"><?php echo $pass_error; ?></p></td>
                    </tr>
                    <tr>
                        <td><label for="name">Name: </label></td>
                        <td><input type="text" name="name" id="" require></td>
                    </tr> 
                    <tr>
                        <td></td>
                        <td><p style = "color:red;"><?php echo $name_error; ?></p></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input type="email" name="email" id="" require></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p style = "color:red;"><?php echo $email_error; ?></p></td>
                    </tr>
                    <!-- <tr><td><p style="color:red;"><?php // echo $error; ?></p></td></tr>      -->
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value = "Signup" id=""></td>
                        <td><a href="signin.php">Signin</a></td>
                    </tr>      
                </table>            
            </form>
        </div>
    </body>
</html>