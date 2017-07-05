<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>List of Task</title>
  <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <?php
  require 'db.php';
  ?>

  <div class="hidden_list">
    <div class="title_of_table">
      <img class="notebook"src="notebook.png">
      <button class="button_delete_list"><img class="delete" src="basket.png"></button>
      <button class="button_change_title"><img class="pen" src="pen.png"></button>
    </div>
    <div class="input_area">
      <img class="logo_of_add" src="plus.png">
      <form class="add" action="index.html" method="post">
        <input class="record" type="text"><input class="add_record" type="submit" value="Добавить цель">
      </form>
    </div>
    <table>
      <tbody>
      </tbody>
    </table>
  </div>
  <div class="div_hidden_record">
<table>
    <tr class="hidden_record">
      <th></th>
      <input class="id_of_record" type="hidden" name="id_of_record" value="<?php echo $rows['id'] ?>">
      <th class="recording_cell"><?php echo $rows['Record'] ?></th>
      <th>
        <button class="button_delete_record"><img class="basket-black" src="basket-black.png"></button>
        <button class="button_change_record"><img class="pen-black" src="pen-black.png"></button>
  </tr>
</table>
  </div>

  <div class="area_for_list">
    <div class="Title"><h1>Простые заметки на каждый день</h1></div>
    <?php
    $query_to_list = $pdo->query('SELECT * FROM List_table');
    foreach ($query_to_list as $rows) : ;
    ?>
    <div class="list">
      <div class="title_of_table">
        <img class="notebook"src="notebook.png">
        <?php echo "<h5>" . $rows['Title'] ."</h5>"   ?>
        <button class="button_delete_list"><img class="delete" src="basket.png"></button>
        <button class="button_change_title"><img class="pen" src="pen.png"></button>
      </div>
      <div class="input_area">
        <img class="logo_of_add" src="plus.png">
        <form class="add" action="index.html" method="post">
          <input type="hidden" name="id_of_list" class="id_of_list" value="<?php echo $rows['id'] ?>">
          <input class="record" type="text"><input class="add_record" type="submit" value="Добавить цель">
        </form>
      </div>
      <table>
        <tbody>
          <?php
          $id = $rows['id'];
          $query = $pdo->query("SELECT * FROM Record_table WHERE id_of_list = '$id'");
          foreach($query as $rows) : ;
          ?>
          <tr>
            <th></th>
            <input class="id_of_record" type="hidden" name="id_of_record" value="<?php echo $rows['id'] ?>">
            <th class="recording_cell"><?php echo $rows['Record'] ?></th>
            <th>
              <button class="button_delete_record"><img class="basket-black" src="basket-black.png"></button>
              <button class="button_change_record"><img class="pen-black" src="pen-black.png"></button>
            </th>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endforeach; ?>
</div>


<form id="area_add_list" action="index.html" method="post">
  <input class="name_of_list" type="text">
  <button class="button_add_list" type="submit" action="db.php">
    <img class="logo_of_add_list" src="plus.png">Добавить список задач
  </button>
</form>
</body>
</html>
