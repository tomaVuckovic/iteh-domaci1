<?php

include 'connect.php';

if(isset($_POST['deleteSend']))
{
    $vr=$_POST['deleteSend'];

    $sql="delete from `crud` where id=$vr";
    $result = mysqli_query($con, $sql);

}


?>