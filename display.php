<?php

include 'connect.php';

if (isset($_POST['prikaziPodatkeSend'])) {
    $table = '<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Ime i prezime</th>
        <th scope="col">Email</th>
        <th scope="col">Broj telefona</th>
        <th scope="col">Broj indeksa</th>
        <th scope="col">Zemlja</th>
        <th scope="col"> </th>
      </tr>
    </thead>';

    
    //izvlacenje podataka iz baze
   // $sql = "SELECT * FROM `crud`";
    $sql = "SELECT crud.* , zemlja.ime as zemlja  FROM crud LEFT JOIN zemlja ON crud.zemlja = zemlja.id";
    $result = mysqli_query($con, $sql);
    // da bi ID u tabeli na sajtu bio redom
    $brojID =1;
    //pristupamo SVIM podacima iz baze preko WHILE petlje 

    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $imePrezime=$row['imePrezime'];
        $email=$row['email'];
        $brTel=$row['brTel'];
        $brInd=$row['brInd'];
        $zemlja=$row['zemlja'];

        $table.='<tr>
        <td scope="row">'.$brojID.'</td>
        <td>'.$imePrezime.'</td>
        <td>'.$email.'</td>
        <td>'.$brTel.'</td>
        <td>'.$brInd.'</td>
        <td>'.$zemlja.'</td>
        <td> 
        <button class="btn btn-danger" onclick="izbrisiPodatke('.$id.')"> Izbrisi </button>
        </td>

      </tr>';
      $brojID++;
    }
  //    <button class="btn btn-warning" onclick="izmeniPodatke('.$id.')"> Izmeni </button>


    $table.='</table>';
    echo $table;
}

?>
