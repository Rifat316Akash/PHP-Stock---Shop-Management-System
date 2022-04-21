<?php 

    include 'connection.php';
    session_start();

    // if (empty($_SESSION['username'])){
    //     header('Location:signin.php');
    // }

// ****************** User Panel ****************************
    function user_signin($id, $pass){
        global $conn;
        $sql = "select * from user where user_id = '$id' and password='$pass'";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        if(empty($result)){
            return -1;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            if (empty($row)){
                return -1;
            }
            
            $_SESSION['username'] = $row['name'];
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['useremail'] = $row['email'];
            return $row["name"];
        }
    }

    function user_registration($user_id, $email, $pass, $name){
        global $conn;
        $sql = "INSERT INTO `user` (`id`, `user_id`, `name`, `email`, `password`) VALUES (NULL, '$user_id','$name', '$email', '$pass')";
        // $sql = "insert into user VALUES('','$user_id', '$name', '$email', '$pass') ";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        if(empty($result)){
            return -1;
        }
        else{
            // $row = mysqli_fetch_assoc($result);
            return 1;
        }
    }

    function user_profile($email){
        global $conn;
        $sql = "select * from user where email = '$email'";
        $result = mysqli_query($conn, $sql);
        if(empty($result)){
            return -1;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function user_change_password($user_id, $old_pass, $new_pass){
        global $conn;
        $sql = "select * from user where user_id ='$user_id' and password = '$old_pass'";
        $result = mysqli_query($conn, $sql);
        if (empty($result)){
            return -1;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $sql = "update user set password = '$new_pass' where id = '$id'";
            if (mysqli_query($conn, $sql)){
                return 1;
            }
            return -1;
        }
    }

    function add_product($product_name,$unit, $price){
        global $conn;
        // echo "product id: ".$product_id. "unit: ".$unit. "price: ".$price;
        $sql = "INSERT INTO `product` (`id`, `name`, `unit`, `price`) VALUES (NULL, '$product_name','$unit' , '$price')";
        // $sql = "insert into product values(, '$product_name', '$unit', '$price')";
        $result = mysqli_query($conn, $sql);
        if($result){
            return -1;
        }
        else{
            return 1;
        }
    }

    function add_sold($product_id,$unit, $price){
        global $conn;
        // echo "product name: ".$product_name. "unit: ".$unit. "price: ".$price;
        echo "product id: ".$product_id. "unit: ".$unit. "price: ".$price;
        $total_price = (int)$price*(int)$unit;
        $sql = "INSERT INTO `sold` (`id`, `product_id`, `user_id`, `quantity`, `date`, `total_price`) VALUES (NULL, '$product_id', \'1\', '$unit',date(), '$total_price')";
        // $sql = "INSERT INTO `sold` (`id`, `product_id`, `user_id`, `unit`,`date`, `price`) VALUES (NULL, '$product_id',NULL,'$unit',now() , '$total_price')";
        // $sql = "insert into product values(, '$product_name', '$unit', '$price')";
        $result = mysqli_query($conn, $sql);

        print_r($result);
        if($result){
            return -1;
        }
        else{
            return 1;
        }
    }

// ---------------- End of user panel ---------------------


// // *************** Admin Panel **************************
//     function admin_signin($id, $pass){
//         global $conn;
//         $sql = "select * from admin where id = '$id' and password='$pass'";
//         $result = mysqli_query($conn, $sql);
//         if(empty($result)){
//             return -1;
//         }
//         else{
//             $row = mysqli_fetch_assoc($result);
//             if (empty($row)){
//                 return -1;
//             }
//             $_SESSION['adminname'] = $row['name'];
//             $_SESSION['adminid'] = $row['id'];
//             $_SESSION['adminemail'] = $row['email'];
//             return $row["name"];
//         }
//     }

//     function admin_registration($id, $email, $pass, $name){
//         global $conn;
//         $sql = "insert into admin values('$id', '$email', '$name', '$pass') ";
//         $result = mysqli_query($conn, $sql);
//         if(empty($result)){
//             return -1;
//         }
//         else{
//             // $row = mysqli_fetch_assoc($result);
//             return 1;
//         }
//     }

    function delete_product($product_id){
        global $conn;
        $sql = "delete from product where id ='$product_id' ";
        $result = mysqli_query($conn, $sql);
        if($result){
            return -1;
        }else{
            return 1;
        }
    }

    function edit_product($product_id, $product_name, $unit, $price){
        global $conn;
        $sql = "UPDATE `product` SET `name`='$product_name', `unit` = '$unit', `price`='$price' WHERE `product`.`id` = '$product_id'";
        // $sql = "update product set name ='$product_name', unit = '$unit', price = '$price' where id = '$product_id' ";
        $result = mysqli_query($conn, $sql);
        if($result){
            return -1;
        }else{
            return 1;
        }
    }

    function particular_product($product_id){
        global $conn;
        $sql = "select * from product where id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        if(empty($result)){
            return -1;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    function all_product(){
        global $conn;
        $sql = "select * from product";
        $result = mysqli_query($conn, $sql);
        if(empty($result)){
            return -1;
        }
        else{
            // $row = mysqli_fetch_assoc($result);
            return $result;
        }
    }



// -------------- End of Admin panel --------------------

// ************** Testing above function for sign up (inserting value into database) and sigin (reading/selecting value from database)
    // $temp = user_registration("2000", "someone", "none", "Annonymous");

    // $username = user_signin('2000', 'none');

    // echo $username;

    // $check = user_change_password('jnu','333','nothing');
    // echo $check;

    // $admin_test = admin_registration("2000", "someone", "none", "Annonymous");

    // $admin_name = admin_signin('someone', 'none');
    // echo $admin_name;

    // $response = add_sold(4,2,50000);

    // echo "now: ".date("Y/m/d");

?>