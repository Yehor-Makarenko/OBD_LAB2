<?php 
$title = 'Query 1';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>
  <h1>Запит 1</h1>
  <h2>Знайти касирів, що працюють у відділенні з заданим номером</h2>
  <form action="query1.php" method="post" class="query">
    <input type="text" name="value" placeholder="Номер відділення">
    <input type="submit" value="Знайти">
  </form>

  <?php
    $value = $_POST['value'];
    $result = $mysql->query("SELECT * 
      FROM `cashiers` INNER JOIN `departments` ON `cashiers`.department_id = `departments`.id
      WHERE `departments`.department_number = '$value'");
    
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

    $cashier = $result->fetch_assoc();

    while ($cashier != null) {
      echo('
        <tr>
          <td>' . $cashier['id'] . '</td>
          <td>' . $cashier['department_id'] . '</td>
          <td>' . $cashier['ipn'] . '</td>
          <td>' . $cashier['name'] . '</td>
          <td>' . $cashier['contract_number'] . '</td>
          <td>' . $cashier['date_of_birth'] . '</td>
          <td></td> 
        </tr>    
      ');
      
      $cashier = $result->fetch_assoc();
    }

    $mysql->close();

    echo('</table>');
  ?>
</body>
</html>