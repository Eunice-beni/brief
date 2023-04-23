<?php 
$pdo = new PDO('mysql:host=localhost;dbname=brief2;charset=utf8', 'root', '');

?>
<div class="swiper mySwiper" >
<div class="swiper-wrapper">
<?php
// Récupération des données de l'image correspondante
$sql = "SELECT * FROM images ORDER BY titre DESC LIMIT 10";
$stmt = $pdo->query($sql);
if ($stmt->rowCount() > 0) {
?> 

<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" type="text/css" href="style_css.css" />
<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1,maximum-scale=1"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
	<script src="carrousel.js"></script>

<style>
    .swiper {
		  width: 100%;
		  height:  20%;
  
		}
  
		 .swiper-slide {
		  
		  font-size: 18px;
		  background: #fff;
		   margin: 5px;
	  padding: 10px;
	  display: flex;
	  border-radius: 50px;   
	  border: 0.5px solid skyblue;
	   width: 170px;
	  height: 55px; 
        
		  /* Center slide text vertically */
		 /* display: -webkit-box;
		  display: -ms-flexbox;
		  display: -webkit-flex;
		  display: flex;
		  -webkit-box-pack: center;
		  -ms-flex-pack: center;
		  -webkit-justify-content: center;
		  justify-content: center;
		  -webkit-box-align: center;
		  -ms-flex-align: center;
		  -webkit-align-items: center;
		  align-items: center;  */
		}
   
  /*fin caroussel*/
  
		 .div_text_scroll {
			  font-size: 15px;
			  width: 100px;
			  height: 50px;
			  margin-left: 6px;
			  margin-bottom: -8px;
		  }
		  .img_scroll {
			  
			  width: 60px;
			  height: 50px;
			  border-radius: 50%;
			  margin -left: 0;
		  }
    </style>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <!-- <div style="display:inline;"> -->
	<!-- <div class="swiper-wrapper"> -->
    <div class="swiper-slide">
      <img class="img_scroll" src="images/<?=$row["image"]?>" alt="image" style="width: 40px;height: 40px;border-radius: 50%;margin-left: 0;">
      <div class="div_text_scroll" style=' font-size: 12px;width: 100px;height: 50px;margin-left: 6px;margin-bottom: -6px;line-height:10px;'><?=$row["titre"]?></div>
      </div>
      <?php }
             }
            ?> 
             </div>
	  </div>
      <!-- les fleches -->
      <div class="swiper-button-next" style=""></div>
      <div class="swiper-button-prev" style=""></div>
      <div class="swiper-pagination"></div>
	  <!-- </div>
	  </div> -->
	  </div>
	  <!-- </div> -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 10,
        spaceBetween: 1,
        slidesPerGroup: 10,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          prevEl: ".swiper-button-prev",
          nextEl: ".swiper-button-next",
        },
      });
    </script>
    </body>
    </html>