<?php
// Récupération de l'identifiant de l'image et de la valeur du like ou du dislike depuis la requête POST
$id = $_POST['id'];
$value = $_POST['value'];

// Connexion à la base de données MySQL
$pdo = new PDO('mysql:host=localhost;dbname=brief2;charset=utf8', 'root', '');

// Insertion du like ou du dislike dans la base de données
$stmt = $pdo->prepare("INSERT INTO likes (image_id, value) VALUES (:id, :value)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':value', $value);
$stmt->execute();

// Récupération du nombre total de likes et de dislikes pour cette image
$stmt2 = $pdo->prepare("SELECT COUNT(*) as nb_likes FROM likes WHERE image_id = :id AND value = 1");
$stmt2->bindParam(':id', $id);
$stmt2->execute();
$likes = $stmt2->fetch(PDO::FETCH_ASSOC)['nb_likes'];

$stmt3 = $pdo->prepare("SELECT COUNT(*) as nb_dislikes FROM likes WHERE image_id = :id AND value = -1");
$stmt3->bindParam(':id', $id);
$stmt3->execute();
$dislikes = $stmt3->fetch(PDO::FETCH_ASSOC)['nb_dislikes'];

// Renvoi du nombre total de likes et de dislikes au format JSON
$response = array('likes' => $likes, 'dislikes' => $dislikes);
echo json_encode($response);
?>
