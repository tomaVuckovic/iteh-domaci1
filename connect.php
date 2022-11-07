<?php

    $con = new mysqli('localhost', 'root', '',  'domaci1db');

    if(!$con){
        die(mysqli_error($con));
    }


?>