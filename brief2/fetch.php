
<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=brief2', 'root', '');

// Vérification si la variable 'limit' existe et n'est pas vide
$limit = 0;
if (isset($_GET['limit']) && !empty($_GET['limit'])) {
    $limit = intval($_GET['limit']);
}

// Vérification si la variable 'types' existe et n'est pas vide
$filter = '';
if (isset($_GET['types']) && !empty($_GET['types'])) {
  $filter = $_GET['types'];
  // Préparation de la requête SQL pour récupérer les images avec un filtre et une limite
  $stmt = $pdo->prepare("SELECT * FROM images WHERE categorie = :types LIMIT :limit, 1");
  $stmt->bindParam(':types', $filter);
  $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
} else {
  // Préparation de la requête SQL pour récupérer les images avec une limite
  $stmt = $pdo->prepare("SELECT * FROM images LIMIT :limit, 1");
  $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
}

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['selectedValue'])) {
  // Récupération de la valeur sélectionnée dans la liste déroulante
  $selectedValue = $_POST['selectedValue'];

  // Requête SQL pour récupérer les données de la base de données en fonction de la valeur sélectionnée
  $sql = "SELECT * FROM images WHERE products = :selectedValue";
   
  $result = $pdo->prepare($sql);
  $result->bindParam(':selectedValue', $selectedValue);
  $result->execute();

  // Affichage des données récupérées
  if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
        }
    }
  } else {
      echo "Aucun résultat trouvé.";
  }
}

// Fermeture de la connexion à la base de données
$pdo = null;
?>
