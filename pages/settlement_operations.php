<?php 
$title = 'Settlement Operations';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>

  <div class="insert-window" id="insert-window">
    <form action="insert.php" method="post">
      <input style="display: none" type="text" value="settlement_operations.php" name="page">
      <input style="display: none" type="text" value="settlement operations" name="table">            
      <input type="text" name="cashier_id" placeholder="ID Касира">
      <input type="text" name="client_id" placeholder="ID Клієнта">      
      <input type="text" name="contract_number" placeholder="№ Договору">
      <input type="text" name="sum" placeholder="Сума коштів">
      <input type="text" name="type" placeholder="Тип">      
      <input type="date" name="date_of_creation" placeholder="Дата надання">
      <input type="submit" value="Додати">
    </form>
  </div>

  <div class="update-window" id="update-window">
    <form action="update.php" method="post">
      <input style="display: none" type="text" value="settlement_operations.php" name="page">
      <input style="display: none" type="text" value="settlement operations" name="table">      
      <input type="text" name="cashier_id" placeholder="ID Касира">
      <input type="text" name="client_id" placeholder="ID Клієнта">
      <input type="text" name="name" placeholder="Назва поля">
      <input type="text" name="value" placeholder="Нове значення">
      <input type="submit" value="Змінити">
    </form>
  </div>

  <h1>Розрахункові Операції</h1>

  <div class="buttons">
    <button id="insert">Додати</button>
    <button id="update">Змінити</button>
  </div>
  <?php
    $result = $mysql->query("SELECT * FROM `settlement operations`");

    echo('
    <table>
      <tr>
        <th>ID Касира</th>
        <th>ID Клієнта</th>
        <th>№ Договору</th>
        <th>Сума коштів</th>
        <th>Тип</th>
        <th>Дата надання</th>
      </tr>    
    ');

    $settlement_operation = $result->fetch_assoc();

    while ($settlement_operation != null) {
      echo('
        <tr>          
          <td>' . $settlement_operation['cashier_id'] . '</td>
          <td>' . $settlement_operation['client_id'] . '</td>
          <td>' . $settlement_operation['contract_number'] . '</td>
          <td>' . $settlement_operation['sum'] . '</td>
          <td>' . $settlement_operation['type'] . '</td>          
          <td>' . $settlement_operation['date_of_creation'] . '</td>
          <td><form action="./delete.php" method="post">
          <input style="display: none" type="text" value="settlement_operations.php" name="page">
          <input style="display: none" type="text" value="settlement operations" name="table">          
          <input style="display: none" type="text" value="' . $settlement_operation['cashier_id'] . '" name="cashier_id">
          <input style="display: none" type="text" value="' . $settlement_operation['client_id'] . '" name="client_id">
          <input type="submit" value="Видалити">
          </form></td> 
        </tr>    
      ');
      
      $settlement_operation = $result->fetch_assoc();
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