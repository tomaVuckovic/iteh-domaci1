<?php

include 'connect.php';

//$name=$_POST['imePrezime'];

extract($_POST); //sve varijable koje smo kreirali iz dodajStudenta() zapisace, ne mora explicitno svaku

if(isset($_POST['imePrezimeSend']) && isset($_POST['emailSend']) && isset($_POST['brTelSend']) && isset($_POST['brIndSend']) && isset($_POST['zemljaSend']))
{
    $sql= "INSERT INTO `crud` (imePrezime, email, brTel, brInd, zemlja)
    VALUES ('$imePrezimeSend', '$emailSend', '$brTelSend', '$brIndSend', '$zemljaSend')";

    $result = mysqli_query($con, $sql);
}


?>