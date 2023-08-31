<?php
require_once 'database.php';
$sql = 'SELECT * FROM pret_normal';
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
$data = $stmt -> fetchAll();
if($data){
$pret = new stdClass();
$pret -> camera = $data[0]['camera'];
$pret -> cabana = $data[0]['cabana'];
$sql = 'SELECT * FROM preturi';
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
$data = $stmt -> fetchAll();
$newinceput = date("d.m.Y", strtotime($data[0]["inceput"]));
$newfinal = date("d.m.Y", strtotime($data[0]["final"]));
$pret -> inceput = $data[0]["inceput"];
$pret -> final = $data[0]["final"];
$pret -> camera_special = $data[0]['camera'];
$pret -> cabana_special = $data[0]['cabana'];
$pret -> special = "Pe perioada " . $newinceput . " - ". $newfinal  ." rezervarea pentru o camera este ". $data[0]["camera"] ."lei/zi si pentru toata pensiunea ". $data[0]["cabana"] ."lei/zi";
$myJSON = json_encode($pret);
echo $myJSON;
}
?>