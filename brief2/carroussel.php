<?php 
include "connexion.php";
?>
<div class="swiper mySwiper" >
<div class="swiper-wrapper">
		<?php
$sql = "SELECT * FROM pub ORDER BY datep DESC LIMIT 10";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?> 

<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" type="text/css" href="style_css.css" />
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1,maximum-scale=1"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
	<script src="carrousseljs.js"></script>

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
<?php while($row = mysqli_fetch_assoc($result)) { ?>
    <!-- <div style="display:inline;"> -->
	<!-- <div class="swiper-wrapper"> -->
    <div class="swiper-slide">
      <img class="img_scroll" src="<?=$row["lienimage"]?>" alt="image" style="width: 40px;height: 40px;border-radius: 50%;margin-left: 0;">
      <div class="div_text_scroll" style=' font-size: 12px;width: 100px;height: 50px;margin-left: 6px;margin-bottom: -6px;line-height:10px;'><?=$row["tp"]?><br></div>
      </div>
    
    
   
    <?php }
	
	}
	  ?>
	  </div>
	  </div>
      <!-- les fleches -->
      <div class="swiper-button-next" style="height: 80px;width: 50px; color: black; background-color: white;font-weight: bold;margin-top: -160px;margin-right: 0;"></div>
      <div class="swiper-button-prev" style="height: 80px;width: 50px;color: black; background-color: white;font-weight: bold;margin-top: -160px;"></div>
      <!--<div class="swiper-pagination"></div>-->
	  <!-- </div>
	  </div> -->
	  </div>
	  </div>
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
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    </body>
    </html>