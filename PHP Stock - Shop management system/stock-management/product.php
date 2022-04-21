<html>
    <?php
        include "user.php";

        if(isset($_POST) && !empty($_POST['product_id'])){
            // $product_name = $_POST['product_name'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
            $product_id = $_POST['product_id'];
            echo "product name: ".$product_id. "unit: ".$unit. "price: ".$price;

            $response = delete_product($product_id);
            if($response==1){
                echo "Product deletion successful!";
                // header('Location:product.php');
            }
        }




        $result = all_product();


    ?>


    <head>
        <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
        </style>
    </head>
    <body>
        
        <div style="margin: 300px 30% 0px 30%">
            <h1>All Products</h1>
            <a href="add_product.php" style="float:right;"><button>Add Product</button></a>
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Product in inventory</th>
                        <th>Per unit price</th>
                        <th colspan = 3>Operation</th>
                    </tr>   
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $row['name'];  ?></td>
                            <input type="hidden" name="product_id" value="<?php echo $row['id'];?>" id="">
                            <td><?php echo $row['unit'];  ?></td>
                            <input type="hidden" name="unit" value ="<?php echo $row['unit']; ?>" id="">
                            <td><?php echo $row['price'];  ?></td>
                            <input type="hidden" name="price" value = "<?php echo $row['price'];  ?>" id="">
                            <td><a href="edit_product.php?product_id=<?php echo $row['id'];?>">Edit</a></td>
                            <td><input type="submit" name="delete" value ="delete" id=""></td>   
                            <td><a href="sell.php?product_id=<?php echo $row['id'];?>">Sell</a></td>                 
                        </tr>
                    </form> 
                    <?php } ?>
                    <tr>
                        <td><a href="home.php">Go Home</a></td>
                    </tr>
                </table> 
                  
        </div>
    </body>
</html>