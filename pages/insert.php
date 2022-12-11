<?php
$page = $_POST['page'];
$table = $_POST['table'];

$mysql = new mysqli('localhost', 'root', '', 'bank');

if ($table == 'departments') {
  $department_number = $_POST['department_number'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $mysql->query("INSERT INTO `$table` (`department_number`, `address`, `phone`) 
  VALUES ('$department_number', '$address', '$phone')");
} else if ($table == 'bosses' || $table == 'economists' || $table == 'cashiers') {
  $department_id = $_POST['department_id'];
  $ipn = $_POST['ipn'];
  $name = $_POST['name'];
  $contract_number = $_POST['contract_number'];
  $date_of_birth = $_POST['date_of_birth'];

  $mysql->query("INSERT INTO `$table` (`department_id`, `ipn`, `name`, `contract_number`, `date_of_birth`) 
  VALUES ('$department_id', '$ipn', '$name', '$contract_number', '$date_of_birth')");
} else if ($table == 'clients') {
  $ipn = $_POST['ipn'];
  $name = $_POST['name'];
  $contract_number = $_POST['contract_number'];
  $card_account_number = $_POST['card_account_number'];
  $date_of_birth = $_POST['date_of_birth'];

  $mysql->query("INSERT INTO `$table` (`ipn`, `name`, `contract_number`, `card_account_number`, `date_of_birth`) 
  VALUES ('$ipn', '$name', '$contract_number', '$card_account_number', '$date_of_birth')");
} else if ($table == 'banking products') {
  $boss_id = $_POST['boss_id'];
  $economist_id = $_POST['economist_id'];
  $client_id = $_POST['client_id'];
  $contract_number = $_POST['contract_number'];
  $sum = $_POST['sum'];
  $type = $_POST['type'];
  $term = $_POST['term'];
  $date_of_creation = $_POST['date_of_creation'];

  echo("INSERT INTO `$table` (`boss_id`, `economist_id`, `client_id`, `contract_number`, `sum`, `type`, `term`, `date_of_creation`) 
  VALUES ('$boss_id', '$economist_id', '$client_id', '$contract_number', '$sum', '$type', '$term', '$date_of_creation')");
  $mysql->query("INSERT INTO `$table` (`boss_id`, `economist_id`, `client_id`, `contract_number`, `sum`, `type`, `term`, `date_of_creation`) 
  VALUES ('$boss_id', '$economist_id', '$client_id', '$contract_number', '$sum', '$type', '$term', '$date_of_creation')");
} else if ($table == "settlement operations") {
  $cashier_id = $_POST['cashier_id'];  
  $client_id = $_POST['client_id'];
  $contract_number = $_POST['contract_number'];
  $sum = $_POST['sum'];
  $type = $_POST['type'];  
  $date_of_creation = $_POST['date_of_creation'];

  $mysql->query("INSERT INTO `$table` (`cashier_id`, `client_id`, `contract_number`, `sum`, `type`, `date_of_creation`) 
  VALUES ('$cashier_id', '$client_id', '$contract_number', '$sum', '$type', '$date_of_creation')");
}

$mysql->close();
header('Location: ./' . $page);
?>