<?php

    include "user.php";

    if (empty($_SESSION['username'])){
        header('Location:signin.php');
    }

    session_destroy();
    header('Location:signin.php');


?>