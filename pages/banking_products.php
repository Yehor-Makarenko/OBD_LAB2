<?php 
$title = 'Banking Products';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>

  <div class="insert-window" id="insert-window">
    <form action="insert.php" method="post">
      <input style="display: none" type="text" value="banking_products.php" name="page">
      <input style="display: none" type="text" value="banking products" name="table">      
      <input type="text" name="boss_id" placeholder="ID Начальника">
      <input type="text" name="economist_id" placeholder="ID Економіста">
      <input type="text" name="client_id" placeholder="ID Клієнта">      
      <input type="text" name="contract_number" placeholder="№ Договору">
      <input type="text" name="sum" placeholder="Сума коштів">
      <input type="text" name="type" placeholder="Тип">
      <input type="date" name="term" placeholder="Термін">
      <input type="date" name="date_of_creation" placeholder="Дата надання">
      <input type="submit" value="Додати">
    </form>
  </div>

  <div class="update-window" id="update-window">
    <form action="update.php" method="post">
      <input style="display: none" type="text" value="banking_products.php" name="page">
      <input style="display: none" type="text" value="banking products" name="table">
      <input type="text" name="boss_id" placeholder="ID Начальника">
      <input type="text" name="economist_id" placeholder="ID Економіста">
      <input type="text" name="client_id" placeholder="ID Клієнта">
      <input type="text" name="name" placeholder="Назва поля">
      <input type="text" name="value" placeholder="Нове значення">
      <input type="submit" value="Змінити">
    </form>
  </div>

  <h1>Банківські продукти</h1>

  <div class="buttons">
    <button id="insert">Додати</button>
    <button id="update">Змінити</button>
  </div>
  <?php
    $result = $mysql->query("SELECT * FROM `banking products`");

    echo('
    <table>
      <tr>
        <th>ID Начальника</th>
        <th>ID Економіста</th>
        <th>ID Клієнта</th>
        <th>№ Договору</th>
        <th>Сума коштів</th>
        <th>Тип</th>
        <th>Термін</th>      
        <th>Дата надання</th>      
      </tr>    
    ');

    $banking_product = $result->fetch_assoc();

    while ($banking_product != null) {
      echo('
        <tr>
          <td>' . $banking_product['boss_id'] . '</td>
          <td>' . $banking_product['economist_id'] . '</td>
          <td>' . $banking_product['client_id'] . '</td>
          <td>' . $banking_product['contract_number'] . '</td>
          <td>' . $banking_product['sum'] . '</td>
          <td>' . $banking_product['type'] . '</td>
          <td>' . $banking_product['term'] . '</td>
          <td>' . $banking_product['date_of_creation'] . '</td>
          <td><form action="./delete.php" method="post">
          <input style="display: none" type="text" value="banking_products.php" name="page">
          <input style="display: none" type="text" value="banking products" name="table">
          <input style="display: none" type="text" value="' . $banking_product['boss_id'] . '" name="boss_id">
          <input style="display: none" type="text" value="' . $banking_product['economist_id'] . '" name="economist_id">
          <input style="display: none" type="text" value="' . $banking_product['client_id'] . '" name="client_id">
          <input type="submit" value="Видалити">
          </form></td> 
        </tr>    
      ');
      
      $banking_product = $result->fetch_assoc();
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