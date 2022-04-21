<html>
    

    <head>
    
    </head>
    <body>   

    <?php
        include "user.php";
        if(isset($_POST) && !empty($_POST['product_name'])){
            $product_name = $_POST['product_name'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];

            // echo "product name: ".$product_name. "unit: ".$unit. "price: ".$price;
            $response = add_product($product_name, $unit, $price);
            if($response){
                // echo "Product addition successful!";
                header('Location:product.php');
            }
        }


    ?>



    <div style="margin: 300px 30% 0px 30%">
            <table>
                <form action="" method='post'>
                    <tr>
                        <td>Product Name:</td>
                        <td><input type="text" name="product_name" id="" require></td>
                    </tr>
                    <tr>
                        <td>Unit: </td>
                        <td><input type="text" name="unit" id="" require></td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td><input type="text" name="price" id="" require></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="add_product" value="add-product" id=""></td>                    
                    </tr>
                
                </form>
            </table>        
        </div>
    </body>
</html>