
<?php
// Connexion à la base de données MySQL
$pdo = new PDO('mysql:host=localhost;dbname=brief2;charset=utf8', 'root', '');

// Récupération des données de l'image correspondante
$stmt = $pdo->prepare("SELECT * FROM images");

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification que l'image existe

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS pour styliser chaque élément individuellement -->
    <link rel="stylesheet" href="style1.css">
    <script src="script.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

 
    <style>
        .container {
            margin: 10px;
        }
        .record {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: solid 1px;
            justify-content: center;
            border-radius: 6px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
            gap: 3%;
            width: 300px;
            border-style: none;

        }
        .record p{
            text-decoration: none;
            text-decoration-style: black;


        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            border-style: none;

        }

        .record img {
            height: 200px;
            width: 300px;
            object-fit: cover;
            border-radius: 6px 6px 0 0;
            text-decoration: none;
        }

        #Voir_plus{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 14px;
            border-radius: 4px;
            background-color: white;
            border-color: green;
            
        }

        .record .espace {
            height: 35px;
            display: flex;
            font-size: 20px;
            /* align-items: center; */
            /* justify-content: center; */
            padding: 10px;
            text-align:justify;
            border-radius: 0 0 6px 6px;
            text-decoration: none;

        }
        


.swiper-slide img {
    width: 30px;
    height: 30px;
    border-radius: 25px;
} 


    </style>

</head>
<body>
    <br>    
<div class="bloc1">
        <div class="sous_bloc1">

            <div class="logo">
                <img src="images/microsoft-bing-logo.jpg" alt="" srcset="">
            </div> 
            <div class="recherche_bare">
                 <input type="text" placeholder=" ">
                     <button style="border: none; outline: none; background-color: white; height: 2px; margin: 5px;" type="submit">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                        <path fill="#36b1cd" d="M128 172a52.06 52.06 0 0 0 52-52V64a52 52 0 0 0-104 0v56a52.06 52.06 0 0 0 52 52ZM100 64a28 28 0 0 1 56 0v56a28 28 0 0 1-56 0Zm40 147.22V232a12 12 0 0 1-24 0v-20.78A92.14 92.14 0 0 1 36 120a12 12 0 0 1 24 0a68 68 0 0 0 136 0a12 12 0 0 1 24 0a92.14 92.14 0 0 1-80 91.22Z"/></svg>
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#36b1cd" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/>
                </svg> 
                    </button> 
            </div>

        </div>

        <div class="sous_bloc2">
            <div class="connexion">
                <button class="Connexion" type="connexion">Connexion</button>
            </div>
                <div class="menu">
                    <img src="images/R (1).png" alt="" srcset="">  
                </div>
        </div>
    </div>
<br>
<br>

    <div class="bloc2">
        <div class="liens">
            <a href="index.php">TOUT</a>
            <a href="affichage.php?id=18">ACTUALITES</a>
            <a class="active" href="">IMAGES</a>
            <a href="">VIDEO</a>
            <a href="">CARTE</a>
            
        </div>

        <div class="change">
            <div class="modere">
            Filtre adulte:
            <div class="col">
                <select name="types" id="filtre" class="form-control mb-3">
                    <option value="">Choix</option>
                    <option value="rest">Recette</option>
                    <option value="restaurant">Restaurant</option>
                    <option value="retour d'expérience">Retour d'expérience</option>
                    <option value="conseil">Conseil</option>
                </select>
            </div>
            </div>
            <div class="filtre">
                Filtre: <img src="images/filtre.jpg" alt=""> 
            </div>
        </div>
    </div>
    <hr>

    <!-- <div class="swipermySwiper">
        <div class="swiper-wrapper">
               
        </div>
   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>
</div> -->

<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <?php
                 while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             ?>
             <div class="swiper-slide" id="nourri">
            <img  src="images/<?= $row['image']; ?>">
             <?= $row['titre']; ?>
             </div> 
         <?php
             }
            ?> 
  </div>
  <!-- If we need pagination -->
  </div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>


 
    <br> 
    <div class="container">
        <div class="row">
           
        </div>
        <div class="row" id="records">
            <!-- Les enregistrements seront insérés ici -->
        </div> 
            <br>
            <br>
        <div class="row">
             <button id="Voir_plus">Voir plus</button>
        </div>
    </div>

</body>
</html>
   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Charger tous les enregistrements au chargement de la page
            $.get('fetch.php', function (data) {
                $('#records').html(data);
            });

            // Charger les enregistrements en fonction du filtre sélectionné
            $("#selct").on('change',function(){

            let value = $( this ).val();
            // console.log(value);
                $.ajax({ 
                        url:'seting.php',
                        type:'POST',
                        data:'request='+ value,

                        beforeSend: function(){

                        $(".container").html("<span>working...</span>");
                        },
                    success:function(data){
                            $(".container").html(data)
                    }
               });
           });

            // Charger les enregistrements supplémentaires lors du clic sur "Voir plus"
            var req = 0;
            $("#Voir_plus").click(function () {
                req = req + 3;
                $.ajax({
                    url: 'fetch.php?limit=' + req,
                    type: 'GET',
                    dataType: "html",
                    success: function (data) {
                        $("#records").append(data);
                        $('#records').fadeIn(2000);
                    },
                    error : function(){
                        alert(" Erreur ! ");
                    }
                });                   
            });

    });
</script>

