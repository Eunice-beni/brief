<?php
// Connexion à la base de données MySQL
$pdo = new PDO('mysql:host=localhost;dbname=brief2;charset=utf8', 'root', '');

// Vérification si la variable 'limit' existe et n'est pas vide
if (isset($_GET['limit']) && !empty($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 0;
}

// Vérification si la variable 'filter' existe et n'est pas vide
if (isset($_GET['request']) && !empty($_GET['request'])) {
  $filter = $_GET['request'];
  var_dump($filter); // Ajouter cette ligne pour déboguer
  // Préparation de la requête SQL pour récupérer les images avec un filtre et une limite
  $stmt = $pdo->prepare("SELECT * FROM images WHERE types = $filter LIMIT :limit, 10");
  $stmt->bindParam(':types', $filter);
  $stmt->bindParam(':limit', intval($limit), PDO::PARAM_INT); // Correction de la limite
} else {
  // Préparation de la requête SQL pour récupérer les images avec une limite
  $stmt = $pdo->prepare("SELECT * FROM images LIMIT :limit, 10");
  $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
}

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si des images ont été trouvées
if (!empty($rows)) {
    // Boucle pour afficher chaque image
    foreach ($rows as $row) {
        ?>
        <div class="container">
          <div class="record" style="">
            <a style=" text-decoration: none;"  href="affichage.php?id=<?php echo $row['id']; ?>">
              <img src="images/<?php echo $row['image']; ?>" alt="">
              <div class="espace">
                <p style="color: #000; text-decoration: none;" ><?php echo $row['titre']; ?></p>
              <?php// echo $row['date']; ?>
              </div>
            </a>
          </div>
        </div>
        <?php
    }
} else {
    // Si aucune image n'a été trouvée
 
}
?>
