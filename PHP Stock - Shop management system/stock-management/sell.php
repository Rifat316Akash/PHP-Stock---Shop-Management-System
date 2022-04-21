<html>
    

    <head>
    
    </head>
    <body>   

    <?php
        include "user.php";
        if(isset($_POST) && !empty($_POST['product_id'])){
            $product_name = $_POST['product_name'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
            $product_id = $_POST['product_id'];
            echo "product id  : ".$product_id. "unit: ".$unit. "price: ".$price;
            $response = add_sold($product_id, $unit, $price);
            if($response==1){
                echo "Product sold successful!";
                // header('Location:product.php');
            }
        }
        $row='';
       if(isset($_GET) && !empty($_GET['product_id'])){
           $product_id = $_GET['product_id'];
           $row = particular_product($product_id);
       }

    ?>



    <div style="margin: 300px 30% 0px 30%">
       <h1>Sell Product</h1>
            <table>
                <form action="" method='post'>
                    <tr>
                        <td>Product Name:</td>
                        <td><input type="text" name="product_name" value="<?php echo $row['name'];?>"  id="" require></td>
                        <input type="hidden" name="product_id" value="<?php echo $row['id'];?>" id="">
                    </tr>
                    <tr>
                        <td>Quantity: </td>
                        <td><input type="text" name="unit" value="<?php echo $row['unit'];?>" id="" require></td>
                    </tr>
                    <tr>
                        <td>Per Unit Price: </td>
                        <td><input type="text" name="price" value="<?php echo $row['price'];?>" id="" require></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="edit_product" value="Sell" id=""></td>                    
                    </tr>
                
                </form>
                <tr>
                    <td></td>
                    <td><a href="home.php">Go Home</a></td>
                </tr>
            </table>        
        </div>
    </body>
</html>