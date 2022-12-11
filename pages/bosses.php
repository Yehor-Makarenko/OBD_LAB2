<?php 
$title = 'Bosses';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>

  <div class="insert-window" id="insert-window">
    <form action="insert.php" method="post">
      <input style="display: none" type="text" value="bosses.php" name="page">
      <input style="display: none" type="text" value="bosses" name="table">      
      <input type="text" name="department_id" placeholder="ID Відділення">
      <input type="text" name="ipn" placeholder="ІПН">
      <input type="text" name="name" placeholder="ПІБ">
      <input type="text" name="contract_number" placeholder="№ Трудового договору">
      <input type="date" name="date_of_birth" placeholder="Дата народження">
      <input type="submit" value="Додати">
    </form>
  </div>

  <div class="update-window" id="update-window">
    <form action="update.php" method="post">
      <input style="display: none" type="text" value="bosses.php" name="page">
      <input style="display: none" type="text" value="bosses" name="table">
      <input type="text" name="id" placeholder="ID">
      <input type="text" name="name" placeholder="Назва поля">
      <input type="text" name="value" placeholder="Нове значення">
      <input type="submit" value="Змінити">
    </form>
  </div>

  <h1>Начальники</h1>
  <div class="buttons">
    <button id="insert">Додати</button>
    <button id="update">Змінити</button>
  </div>
  <?php
    $result = $mysql->query("SELECT * FROM `bosses`");

    echo('
    <table>
      <tr>
        <th>ID</th>
        <th>ID Відділення</th>
        <th>ІПН</th>
        <th>ПІБ</th>
        <th>№ Трудового договору</th>
        <th>Дата народження</th>
      </tr>    
    ');

    $boss = $result->fetch_assoc();

    while ($boss != null) {
      echo('
        <tr>
          <td>' . $boss['id'] . '</td>
          <td>' . $boss['department_id'] . '</td>
          <td>' . $boss['ipn'] . '</td>
          <td>' . $boss['name'] . '</td>
          <td>' . $boss['contract_number'] . '</td>
          <td>' . $boss['date_of_birth'] . '</td>
          <td><form action="./delete.php" method="post">
          <input style="display: none" type="text" value="bosses.php" name="page">
          <input style="display: none" type="text" value="bosses" name="table">
          <input style="display: none" type="text" value="' . $boss['id'] . '" name="id">
          <input type="submit" value="Видалити">
          </form></td>   
        </tr>    
      ');
      
      $boss = $result->fetch_assoc();
    }

    $mysql->close();

    echo('</table>');
  ?>

  <script>
    const editButton = document.getElementById("update");
    const updateWindow = document.getElementById("update-window");
    const insertButton = document.getElementById("insert");
    const insertWindow = document.getElementById("insert-window");

    editButton.onclick = () => {
      updateWindow.style.display = "block";
    };

    insertButton.onclick = () => {
      insertWindow.style.display = "block";
    }
  </script>
</body>
</html>