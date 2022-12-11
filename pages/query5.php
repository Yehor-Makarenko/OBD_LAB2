<?php 
$title = 'Query 5';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>
  <h1>Запит 5</h1>
  <h2>Знайти касирів, які обслужили більше вказаного числа клієнтів</h2>
  <form action="query5.php" method="post" class="query">
    <input type="text" name="value" placeholder="Число клієнтів">
    <input type="submit" value="Знайти">
  </form>

  <?php
    $value = $_POST['value'];
    $result = $mysql->query("SELECT * FROM `cashiers`
    WHERE `cashiers`.id IN
    (SELECT `cashiers`.id
      FROM `cashiers` INNER JOIN `settlement operations` ON `settlement operations`.cashier_id = `cashiers`.id
      GROUP BY `cashiers`.id
      HAVING COUNT(*) > $value)");
    
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