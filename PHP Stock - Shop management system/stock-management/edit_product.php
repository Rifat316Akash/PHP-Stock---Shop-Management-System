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
            // echo "product name: ".$product_name. "unit: ".$unit. "price: ".$price;
            $response = edit_product($product_id, $product_name, $unit, $price);
            if($response){
                echo "Product addition successful!";
                header('Location:product.php');
            }
        }
        $row='';
       if(isset($_GET) && !empty($_GET['product_id'])){
           $product_id = $_GET['product_id'];
           $row = particular_product($product_id);
       }

    ?>



    <div style="margin: 300px 30% 0px 30%">
       <h1>Edit Product</h1>
            <table>
                <form action="" method='post'>
                    <tr>
                        <td>Product Name:</td>
                        <td><input type="text" name="product_name" value="<?php echo $row['name'];?>"  id="" require></td>
                        <input type="hidden" name="product_id" value="<?php echo $row['id'];?>" id="">
                    </tr>
                    <tr>
                        <td>Unit: </td>
                        <td><input type="text" name="unit" value="<?php echo $row['unit'];?>" id="" require></td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td><input type="text" name="price" value="<?php echo $row['price'];?>" id="" require></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="edit_product" value="edit-product" id=""></td>                    
                    </tr>
                
                </form>
            </table>        
        </div>
    </body>
</html>