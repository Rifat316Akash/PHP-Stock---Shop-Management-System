<?php
    
    include "user.php";

    if (empty($_SESSION['username'])){
        header('Location:signin.php');
    }

?>


<html>
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
        <div style = "margin: 0 30% 0 30%;">
            <h1>Profile</h1>
            <table>
                <tr>
                    <th>I.D</th>
                    <td><?php echo $_SESSION['userid']; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $_SESSION['username']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $_SESSION['useremail']; ?></td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td><?php echo $_SESSION['user_type']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="home.php">Go Home</a></td>
                </tr>
                       
            </table>
        </div>
    </body>
</html>