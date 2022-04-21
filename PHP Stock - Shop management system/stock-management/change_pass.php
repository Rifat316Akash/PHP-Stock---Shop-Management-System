<?php

    include "user.php";

    if (empty($_SESSION['username'])){
        header('Location:signin.php');
    }

    $dont_match = $unsuccess ='';
    if (isset($_POST) && !empty($_POST['new_pass'])){
        // echo $_POST['new_pass'];
        // echo $_POST['old_pass'];
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $conf_pass = $_POST['conf_pass'];
        if ($new_pass!= $conf_pass){
            $dont_match = "Password doesn't matching!";
        }
        else{
            $check = user_change_password($_SESSION['userid'],$old_pass, $new_pass);
            if ($check==-1){
                $unsuccess = "Failed to change Password!";
            }
            else if ($check==1){
                header('Location:logout.php');
                exit();
                // echo 'Sucess';
            }
        }
    }

?>

<html>
    <head></head>

    <body>
        
        <div style="margin-left:30%;">
            <h1>Change password!</h1>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="old_pass">Old Password: </label></td>
                        <td><input type="password" name="old_pass" id=""></td>                    
                    </tr>
                    <tr>
                        <td><label for="new_pass">New Password</label></td>
                        <td><input type="password" name="new_pass" id=""></td>
                    </tr>
                    <tr>
                        <td><label for="conf_pass">Confirm Password</label></td>
                        <td><input type="password" name="conf_pass" id=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p style = "color:red;"><?php echo $dont_match; ?></p></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p style = "color:red;"><?php echo $unsuccess; ?></p></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="change_pass" value = "Change Password" id=""></td>
                    </tr>
                
                </table>
            
            
            </form>
        
        </div>

    </body>
</html>