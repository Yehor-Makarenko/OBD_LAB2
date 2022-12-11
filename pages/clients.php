<?php 
$title = 'Clients';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>

  <div class="insert-window" id="insert-window">
    <form action="insert.php" method="post">
      <input style="display: none" type="text" value="clients.php" name="page">
      <input style="display: none" type="text" value="clients" name="table">      
      <input type="text" name="ipn" placeholder="ІПН">
      <input type="text" name="name" placeholder="ПІБ">
      <input type="text" name="contract_number" placeholder="№ Договору">
      <input type="text" name="card_account_number" placeholder="№ Особового карткового рахунку">
      <input type="date" name="date_of_birth" placeholder="Дата народження">
      <input type="submit" value="Додати">
    </form>
  </div>

  <div class="update-window" id="update-window">
    <form action="update.php" method="post">
      <input style="display: none" type="text" value="clients.php" name="page">
      <input style="display: none" type="text" value="clients" name="table">
      <input type="text" name="id" placeholder="ID">
      <input type="text" name="name" placeholder="Назва поля">
      <input type="text" name="value" placeholder="Нове значення">
      <input type="submit" value="Змінити">
    </form>
  </div>

  <h1>Клієнти</h1>

  <div class="buttons">
    <button id="insert">Додати</button>
    <button id="update">Змінити</button>
  </div>
  <?php
    $result = $mysql->query("SELECT * FROM `clients`");

    echo('
    <table>
      <tr>
        <th>ID</th>
        <th>ІПН</th>
        <th>ПІБ</th>
        <th>№ Договору</th>
        <th>№ Особового карткового рахунку</th>
        <th>Дата народження</th>
      </tr>    
    ');

    $client = $result->fetch_assoc();

    while ($client != null) {
      echo('
        <tr>
          <td>' . $client['id'] . '</td>
          <td>' . $client['ipn'] . '</td>
          <td>' . $client['name'] . '</td>
          <td>' . $client['contract_number'] . '</td>
          <td>' . $client['card_account_number'] . '</td>
          <td>' . $client['date_of_birth'] . '</td>
          <td><form action="./delete.php" method="post">
          <input style="display: none" type="text" value="clients.php" name="page">
          <input style="display: none" type="text" value="clients" name="table">
          <input style="display: none" type="text" value="' . $client['id'] . '" name="id">
          <input type="submit" value="Видалити">
          </form></td> 
        </tr>    
      ');
      
      $client = $result->fetch_assoc();
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