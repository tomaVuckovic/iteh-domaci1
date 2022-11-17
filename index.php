<!DOCTYPE html>
<html lang="en">

<head>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencija studenata</title>
</head>

<body>



    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kreiranje novog studenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Ime i prezime-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="imePrezime">Ime i prezime</label>
                        <input type="text" class="form-control" id="imePrezime" placeholder="Unesite ime i prezime">
                    </div>
                </div>
                <!--Email-->

                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="someone@example.com">
                    </div>
                </div>
                <!--Broj telefona-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brTel">Broj telefona</label>
                        <input type="text" class="form-control" id="brTel" placeholder="+3816...">
                    </div>
                </div>

                <!--Broj indeksa -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brIndeksa">Broj indeksa</label>
                        <input type="text" class="form-control" id="brInd" placeholder="npr. 2020/0001">
                    </div>
                </div>
                <!--Zemlja-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="zemlja">Zemlja</label>
                        <input type="text" class="form-control" id="zemlja" placeholder="Zemlja porekla">
                        <ul class="list-group">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lista zemalja
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="napuniFormu(1)">Srbija </a>
                                    <a class="dropdown-item" onclick="napuniFormu(2)">Crna Gora</a>
                                    <a class="dropdown-item" onclick="napuniFormu(3)">Bosna i Hercegovina</a>
                                    <a class="dropdown-item" onclick="napuniFormu(4)">Hrvatska</a>
                                    <a class="dropdown-item" onclick="napuniFormu(5)">Slovenija</a>
                                </div>
                            </div></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="dodajStudenta()">Sacuvaj</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zatvori</button>

                </div>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <h1 class="text-center my-4">Evidencija studenata</h1>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#completeModal"> Dodaj </button>

        <div id="prikaziTabeluPodataka"> </div>


    </div>

    <!--Bootstrap JQUERY POPPER I BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    
    <!-- JS skripta koja cita ime i prezime preko id i cuva u promenljive-->
    <script>
        $(document).ready(function() {
            prikaziPodatke();
        }); //kada god je dokument spreman uradi funkciju prikaziPodatke()

        

        //prikaz na ekranu
        function prikaziPodatke() {
            var prikaziPodatke = "true";
            $.ajax({
                url: "display.php",
                type: 'post',
                data: {
                    prikaziPodatkeSend: prikaziPodatke
                },
                success: function(data, status) {
                    $('#prikaziTabeluPodataka').html(data); //jquery html metoda
                }
            });
        }
        //brisanje podataka

        function izbrisiPodatke(deleteid) {
            $.ajax({
                url: "delete.php",
                type: 'post',
                data: {
                    deleteSend: deleteid
                },
                success: function(data, status) {
                    prikaziPodatke();
                }
            });
        }


        function dodajStudenta() {
            var imePrezime = $('#imePrezime').val();
            var email = $('#email').val();
            var brTel = $('#brTel').val();
            var brInd = $('#brInd').val();
            var zemlja = $('#zemlja').val();

            //AJAX i JQUERY
            $.ajax({
                //url - gde zelimo da saljemo podatke
                url: "insert.php",
                //tip 'POST' , saljemo samo post zahteve
                type: 'post',
                //data -
                data: {
                    imePrezimeSend: imePrezime,
                    emailSend: email,
                    brTelSend: brTel,
                    brIndSend: brInd,
                    zemljaSend: zemlja
                }, //success
                success: function(data, status) {
                    console.log(status);
                    prikaziPodatke();
                }

            });

        }
        function napuniFormu(vrednost){
        var vrednost = vrednost;

        document.getElementById("zemlja").value = vrednost;
        }
    </script>


</body>

</html>