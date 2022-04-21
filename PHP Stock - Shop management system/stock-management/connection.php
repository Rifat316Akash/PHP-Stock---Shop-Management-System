<?php 

    // '''
    //     This script is followed by mysqli procedural based to connect the specific database created for this assignment
    // '''

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = 'stock';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";


?>