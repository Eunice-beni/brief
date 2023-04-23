<?php

// Connexion à la base de données MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brief2";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Vérifie si des données ont été envoyées via le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Récupère les données du formulaire
        $type = $_POST["types"];
        $titre = $_POST["titre"];
        $description = $_POST["description"];
        $date = date("Y-m-d H:i:s"); // récupère la date et l'heure actuelles
        $image = $_FILES["image"]["name"];
        $image_temp = $_FILES["image"]["tmp_name"];
    
        // Déplace l'image dans le dossier souhaité
        move_uploaded_file($image_temp, "images/" . $image);
    
        // Insère les données dans la table MySQL
        $sql = "INSERT INTO images (types, titre, description, date, image) VALUES ('$type', '$titre', '$description', '$date', '$image')";

        if(isset($_POST['type']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['date']) && isset($_POST['image'])) {
            $type = $_POST['types'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $date = $_POST['date'];

            // Insérer les données dans la base de données
        } else {
            // Afficher un message d'erreur ou rediriger l'utilisateur vers la page précédente
        }
    
        if (mysqli_query($conn, $sql)) {
            echo "Données insérées avec succès dans la base de données.";
        } else {
            echo "Erreur d'insertion de données: " . mysqli_error($conn);
        }
}

// Ferme la connexion à la base de données MySQL
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout d'une image dans une base de données MySQL</title>
</head>
<body>

    <h2>Ajouter une image à la base de données MySQL</h2>

    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <a href="index.php">Affichage</a>
        <!-- <label for="titre">Titre :</label> -->
        <input type="text" name="titre" required><br><br>
        <!-- <label for="description">Description :</label> -->
        <textarea name="description" required></textarea><br><br>
        <!-- <label for="image">Image :</label> -->
        <input type="file" name="image" required><br><br>
        <select name="types" id="type">
            <option value="rest">restaurant</option>
            <option value="recette">recette</option>
            <option value="retour d’expérience">retour d’expérience</option>
            <option value="conseil">conseil</option>

         </select>
        <input type="submit" value="Envoyer">
    </form>

</body>
</html>
