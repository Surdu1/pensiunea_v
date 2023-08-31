<?php
require_once 'database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cabana = $_POST["cab"];
    $camera = $_POST["cam"];
    $sql = "DELETE FROM pret_normal";
    $stmt= $pdo->prepare($sql);
    $stmt->execute();
    $sql = "INSERT INTO pret_normal (camera, cabana) VALUES (?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$camera,$cabana]);
    header("Location: /");
}
?>