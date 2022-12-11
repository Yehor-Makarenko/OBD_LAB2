<?php 
$title = 'Query 3';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>
  <h1>Запит 3</h1>
  <h2>Знайти клієнтів, яких обслуговував касир з ID, відмінним від вказаного</h2>
  <form action="query3.php" method="post" class="query">
    <input type="text" name="value" placeholder="ПІБ економіста">
    <input type="submit" value="Знайти">
  </form>

  <?php
    $value = $_POST['value'];
    $result = $mysql->query("SELECT DISTINCT `clients`.id, `clients`.ipn, `clients`.name, `clients`.contract_number, `clients`.card_account_number, `clients`.date_of_birth
      FROM `clients` INNER JOIN `settlement operations` ON `clients`.id = `settlement operations`.client_id
      WHERE `settlement operations`.cashier_id != '$value'");
    
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