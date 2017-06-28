<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src='main.js'></script>
</head>
<body>
  <?php
  require 'db.php';
  ?>
  <form id="form1" method="post" action="index.php"
  <p>Введите данные для клонирования pug</p>
  <input type="text" name="name">
  <input type="text" name="color">
  <input type="submit" value="Клонировать мопсика">

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
