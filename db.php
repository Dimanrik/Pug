<?php
$host = '127.0.0.1';
$db = 'Todo';
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

if ($_POST['record']!==null)
{
  $sql = "INSERT INTO Record_table (id_of_list, Record) VALUES (:id_of_list, :record)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id_of_list'=>$_POST['id_of_list'], 'record'=>$_POST['record']]);

  $last_id  = $pdo->lastInsertId();
  $query = $pdo->query("SELECT * FROM Record_table WHERE id = '$last_id'");
  $last_record = $query->fetch();
  echo json_encode(['id'=>$last_record['id'], id_of_list=>$last_record['id_of_list'], 'Record'=>$last_record['Record']]);
}

if($_POST['name_of_list'] !== null)
{
  $sql = "INSERT INTO List_table (Title) VALUES (:title)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['title'=>$_POST['name_of_list']]);

  $last_id  = $pdo->lastInsertId();
  $query = $pdo->query("SELECT * FROM List_table WHERE id = '$last_id'");
  $last_record = $query->fetch();
  echo json_encode(['id'=>$last_record['id'],  'Title'=>$last_record['Title']]);
}

if($_POST['change_name_list'] !== null)
{
  $sql = "UPDATE List_table SET Title=? WHERE id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['change_name_list'], $_POST['id_of_list']]);
}

if($_POST['id_for_delete_list']!=="")
{
  $sql = "DELETE from List_table where id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['id_for_delete_list']]);

  $sql = $sql = "DELETE from Record_table where id_of_list=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['id_for_delete_list']]);
}

if($_POST['id_for_delete_record']!=="")
{
  $sql = "DELETE FROM Record_table where id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['id_for_delete_record']]);
}

if($_POST['record_for_change']!=="" && $_POST["id_of_record"]!=="")
{
  $sql = "UPDATE Record_table SET Record=? where id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['record_for_change'], $_POST['id_of_record']]);
}

if($_POST['id_of_record_for_checked']!=="")
{
  $sql = "UPDATE Record_table SET Checked=? where id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['checked'], $_POST['id_of_record_for_checked']]);
}
 ?>
