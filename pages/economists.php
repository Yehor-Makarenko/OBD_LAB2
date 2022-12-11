<?php 
$title = 'Economists';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>

  <div class="insert-window" id="insert-window">
    <form action="insert.php" method="post">
      <input style="display: none" type="text" value="economists.php" name="page">
      <input style="display: none" type="text" value="economists" name="table">  
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
      <input style="display: none" type="text" value="economists.php" name="page">
      <input style="display: none" type="text" value="economists" name="table">
      <input type="text" name="id" placeholder="ID">
      <input type="text" name="name" placeholder="Назва поля">
      <input type="text" name="value" placeholder="Нове значення">
      <input type="submit" value="Змінити">
    </form>
  </div>

  <h1>Економісти</h1>

  <div class="buttons">
    <button id="insert">Додати</button>
    <button id="update">Змінити</button>
  </div>
  <?php
    $result = $mysql->query("SELECT * FROM `economists`");

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

    $economist = $result->fetch_assoc();

    while ($economist != null) {
      echo('
        <tr>
          <td>' . $economist['id'] . '</td>
          <td>' . $economist['department_id'] . '</td>
          <td>' . $economist['ipn'] . '</td>
          <td>' . $economist['name'] . '</td>
          <td>' . $economist['contract_number'] . '</td>
          <td>' . $economist['date_of_birth'] . '</td>
          <td><form action="./delete.php" method="post">
          <input style="display: none" type="text" value="economists.php" name="page">
          <input style="display: none" type="text" value="economists" name="table">
          <input style="display: none" type="text" value="' . $economist['id'] . '" name="id">
          <input type="submit" value="Видалити">
          </form></td> 
        </tr>    
      ');
      
      $economist = $result->fetch_assoc();
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