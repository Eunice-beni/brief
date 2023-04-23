<?php
// Récupération de l'identifiant de l'image depuis l'URL
$id = $_GET['id'];

// Connexion à la base de données MySQL
$pdo = new PDO('mysql:host=localhost;dbname=brief2;charset=utf8', 'root', '');

// Récupération des données de l'image correspondante
$stmt = $pdo->prepare("SELECT * FROM images WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification que l'image existe
if (!$row) {
    echo "Aucune image trouvée";
    exit;
}

// Récupération du nombre de likes et de dislikes
$stmt2 = $pdo->prepare("SELECT COUNT(*) as nb_likes FROM likes WHERE image_id = :id AND value = 1");
$stmt2->bindParam(':id', $id);
$stmt2->execute();
$likes = $stmt2->fetch(PDO::FETCH_ASSOC)['nb_likes'];

$stmt3 = $pdo->prepare("SELECT COUNT(*) as nb_dislikes FROM likes WHERE image_id = :id AND value = -1");
$stmt3->bindParam(':id', $id);
$stmt3->execute();
$dislikes = $stmt3->fetch(PDO::FETCH_ASSOC)['nb_dislikes'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de l'image</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_.css">
    <script src="script.js"></script>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
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
    <!-- carroussel -->
    <!-- <div class="swiper mySwiper">
   
   <ul class="swiper-wrapper">
      <li class="swiper-slide" id="nourri"><img  src="images/PNG.jpeg" alt="" srcset=""> Nourriture PNG</li>
   
       <li class="swiper-slide" id="nourri"><img  src="images/cartoon.jpeg" alt="" srcset=""> Nourriture Cartoon</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/calorie.jpeg" alt="" srcset=""> Nourriture à Calorier</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/français.jpeg" alt="" srcset=""> Nourriture Française</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/bebe.jpeg" alt="" srcset=""> Nourriture Bébé</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/afrique.jpeg" alt="" srcset=""> Nourriture Africaines</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/itali.jpeg" alt="" srcset=""> Nourriture Italienne</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/chinois.jpeg" alt="" srcset=""> Chinoise Nourriture</li>

       <li class="swiper-slide" id="nourri"><img  src="images/viande.jpeg" alt="" srcset=""> Viande</li>

       <li class="swiper-slide" id="nourri"><img  src="images/japon.jpeg" alt="" srcset=""> Nourriture Japon</li>
        
       <li class="swiper-slide" id="nourri"><img  src="images/maroc.jpg" alt="" srcset=""> Nourriture Marocaine</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/plat.jpeg" alt="" srcset=""> Plat Nourriture</li>
    
       <li class="swiper-slide" id="nourri"><img  src="images/saine.jpeg" alt="" srcset=""> Nourriture Saine</li>
     
       <li class="swiper-slide" id="nourri"><img  src="images/grasse.jpeg" alt=""> Nourriture Grasse</li>
       <li class="swiper-slide" id="nourri"><img  src="images/logo.jpeg" alt="" srcset=""> Logo Nourriture</li>
                 
   </ul>
   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>
</div> -->
    <br> 
     <div class="body">

 <div class="ensemble">
   <img src="images/<?php echo $row['image']; ?>" alt="">
   <div class="like-buttons">
     <button class="like-button" onclick="likeImage(<?php echo $id; ?>)">
      <!-- <img src="thumbs-up-icon.png" alt="like-icon"> -->
      <?php echo $likes; ?>
     </button>
      <span class="like-counter" id="like-counter">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#3ed4f7" d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59c-.125.36-.479 1.013-1.04 1.639c-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545c1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484c.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464c.201-.263.38-.578.488-.901c.11-.33.172-.762.004-1.149c.069-.13.12-.269.159-.403c.077-.27.113-.568.113-.857c0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362a1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272c-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05a9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164c-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868c-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65c1.095-.3 1.977-.996 2.614-1.708c.635-.71 1.064-1.475 1.238-1.978c.243-.7.407-1.768.482-2.85c.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725a.5.5 0 0 0 .595.644l.003-.001l.014-.003l.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164c.175.058.45.3.57.65c.107.308.087.67-.266 1.022l-.353.353l.353.354c.043.043.105.141.154.315c.048.167.075.37.075.581c0 .212-.027.414-.075.582c-.05.174-.111.272-.154.315l-.353.353l.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353l.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/></svg>
      </span>
      <!-- <img src="thumbs-down-icon.png" alt="dislike-icon"> -->
     <span class="dislike-counter" id="dislike-counter">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
      <path fill="red" d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42c-.072-1.05-.23-2.015-.428-2.59c-.125-.36-.479-1.012-1.04-1.638c-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546c1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064c.164.287.254.607.254.913c0 .152-.023.312-.077.464c.201.262.38.577.488.9c.11.33.172.762.004 1.15c.069.13.12.268.159.403c.077.27.113.567.113.856c0 .289-.036.586-.113.856c-.035.12-.08.244-.138.363c.394.571.418 1.2.234 1.733c-.206.592-.682 1.1-1.2 1.272c-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05a9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163c-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868c-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65c1.095.3 1.977.997 2.614 1.709c.635.71 1.064 1.475 1.238 1.977c.243.7.407 1.768.482 2.85c.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726a.5.5 0 0 1 .595-.643h.003l.014.004l.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163c.175-.059.45-.301.57-.651c.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315c.048-.167.075-.37.075-.581c0-.211-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354l.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354l.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z"/></svg>
     </span>
      
     <button class="dislike-button" onclick="dislikeImage(<?php echo $id; ?>)">
     <?php echo $dislikes; ?>
     </button>
    </div>
  </div>
  <div class="record">
    <div class="espace">
      <h2><?php echo $row['titre']; ?></h2>
      <br>
      <p><?php echo $row['description']; ?></p>
      <br>
      <p><?php echo $row['date']; ?></p>
    </div>
  </div>
  </div>
  <script>
    function likeImage(id) {
      // Envoi de la requête AJAX pour ajouter un like à l'image
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Mise à jour du compteur de likes
          var response = JSON.parse(this.responseText);
          document.getElementById("like-counter").innerHTML = response.likes;
          document.getElementById("dislike-counter").innerHTML = response.dislikes;
        }
      };
      xhttp.open("POST", "like.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id + "&value=1");
    }

    function dislikeImage(id) {
      // Envoi de la requête AJAX pour ajouter un dislike à l'image
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Mise à jour du compteur de dislikes
          var response = JSON.parse(this.responseText);
          document.getElementById("like-counter").innerHTML = response.likes;
          document.getElementById("dislike-counter").innerHTML = response.dislikes;
        }
      };
      xhttp.open("POST", "like.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id + "&value=-1");
    }
  </script>

  <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 9,
        spaceBetween: 15,
        slidesPerGroup: 9,
        loop: false,
        loopFillGroupWithBlank: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });
    </script>