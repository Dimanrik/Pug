<?php
$host = '127.0.0.1';
$db   = 'Pugs';
$user = 'root';
$pass = '';
$charset = 'utf8';
$name = $_POST['name'];
$color = $_POST['color'];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if (isset($_POST['name'])&&isset($_POST['color']))
{
  $sql = "INSERT INTO database_of_pug_clones (Name, Color) VALUES (:name, :color)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['name'=> $name, 'color'=>$color]);
}
?>
