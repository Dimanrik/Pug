<?php
$host = '127.0.0.1';
$db   = 'Pugs';
$user = 'root';
$pass = '';
$charset = 'utf8';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if ($_POST['name']!==null & $_POST['color']!==null)
{
  $sql = "INSERT INTO database_of_pug_clones (Name, Color) VALUES (:name, :color)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['name'=> $_POST['name'], 'color'=> $_POST['color']]);
  $id = $pdo->lastInsertId();
  $query = $pdo->query("SELECT * FROM database_of_pug_clones where id = '$id'");
  $last_record = $query->fetch();
  echo json_encode(['id'=> $last_record['id'], 'name'=>$last_record['Name'], 'color'=>$last_record['Color']]);
}

?>
