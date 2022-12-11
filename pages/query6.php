<?php 
$title = 'Query 6';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>
  <h1>Запит 6</h1>
  <h2>Знайти касирів, які обслужили тих же клієнтів, що і касир з вказаним ID, і, можливо, ще інших</h2>
  <form action="query6.php" method="post" class="query">
    <input type="text" name="value" placeholder="ID касира">
    <input type="submit" value="Знайти">
  </form>

  <?php
    $value = $_POST['value'];
    $result = $mysql->query("SELECT *
    FROM `cashiers` AS X
    WHERE X.id != '${value}' AND NOT EXISTS
    (SELECT * 
    FROM `settlement operations` AS Y
    WHERE Y.cashier_id = '${value}' AND NOT EXISTS
    (SELECT *
    FROM `settlement operations`
    WHERE `settlement operations`.cashier_id = X.id AND `settlement operations`.client_id = Y.client_id
    ))");
    
    if ($value == '') {      
      $result = $mysql->query("SELECT * FROM `clients` WHERE 1 = 0");
    }
    
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
          <td></td> 
        </tr>    
      ');
      
      $client = $result->fetch_assoc();
    }

    $mysql->close();

    echo('</table>');
  ?>
</body>
</html>