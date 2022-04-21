<html>
    <?php
        include "user.php";

        $sql = "SELECT count(quantity) as total_sold, SUM(total_price) total_earn FROM `sold`";
        $result = mysqli_query($conn, $sql);
        $sold_info =  mysqli_fetch_assoc($result);

        $sql = "SELECT count(unit) as num_product, SUM(price) total_price FROM `product`";
        $new_result = mysqli_query($conn, $sql);
        $inventory_info =  mysqli_fetch_assoc($new_result);
        

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
        <div style="marign: 300px 30% 0 30%;">
            <table>
                <tr>
                    <th>Product in Inventory</th>
                    <td><?php echo $inventory_info['num_product'] ?></td>
                </tr>
                <tr>
                    <th>Price Value</th>
                    <td><?php echo $inventory_info['total_price'] ?></td>
                </tr>
                <tr>
                    <th>Product category sold</th>
                    <td><?php echo $sold_info['total_sold'] ?></td>
                </tr>
                <tr>
                    <th>Total Price earned</th>
                    <td><?php echo $sold_info['total_earn'] ?></td>
                </tr>        
            
            </table>

        </div>

    </body>
</html>