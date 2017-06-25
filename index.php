<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <?php
  require 'dbconnection.php';
  ?>
  <p>Введите данные для клонирования pug</p>
  <form action="" method="post">
    <input type="text" name="name">
    <input type="text" name="color">
    <input type="submit"  value="Клонировать">
    <br>

    <table>
          <table border="1" width="700px">
      <tbody>
        <tr>
          <th>ID</th>
          <th>Имя мопсика</th>
          <th>Окраска</th>
        </tr>

          <?php
          $query = $pdo->query('SELECT * FROM database_of_pug_clones');
          foreach ($query as $rows)
          { echo "<tr><th>".$rows['id'];
            echo "<th>".$rows['Name'];
            echo "<th>".$rows['Color'] . "</tr>";
          }
          ?>
        </tbody>
      </table>
        </form>
      </body>
      </html>
