<?php

    include 'connect.php';


    if(isset($_POST['updateid']))
    {
        $userid=$_POST['updateid'];

        $sql = "SELECT * `crud` WHERE id=$user_id"; 
        $result=mysqli_query($con, $sql);
        $response=array(); //pravimo niz da bi svaki red iz baze usao u niz
        while($row=mysqli_fetch_assoc($result))
        {
            $response = $row;

        }
        echo json_encode($response); //php objekat se moze pretvoriti u json ovom funkcijom, kako bi odgovarala u index.php
        
    }else{
        $response['status']=200;
        $response['message'] = "Postoji neka greksa: nisu pronadjeni podaci";
    }



?>