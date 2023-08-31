<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_SESSION['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    try{
        require_once './database.php';
        $query = "SELECT password FROM cont WHERE username = :username";
        $stmt = $pdo -> prepare($query);
        $stmt -> bindParam(':username', $username);
        $stmt -> execute();
        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $verificare = password_verify($password,$results[0]['password']);
        if($verificare){
            $_SESSION['username'] = $username;
        }
        $pdo = null;
        $stmt = null;
        header("Location: ./dashbord.php");
    }catch(Exception $e){
        die($e->getMessage());
    }
}else{
    header("Location: ../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p></p>
</body>
</html>