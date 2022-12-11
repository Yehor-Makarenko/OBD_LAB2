<?php
$page = $_POST['page'];
$table = $_POST['table'];
$name = $_POST['name'];
$value = $_POST['value'];

switch ($name) {
  case '№ Відділення':
    $name = 'department_number';
    break;
  case 'Адреса':
    $name = 'address';
    break;
  case 'Телефон':    
    $name = 'phone';
    break;
  case 'ID відділення':    
    $name = 'department_id';
    break;
  case 'ІПН':
    $name = 'ipn';
    break;
  case 'ПІБ':
    $name = 'name';
    break;
  case '№ Трудового договору':
    $name = 'contract_number';
    break;
  case 'Дата народження':
    $name = 'date_of_birth';
    break;
  case '№ Договору':
    $name = 'contract_number';
    break;
  case '№ Особового карткового рахунку':
    $name = 'card_account_number';
    break;
  case 'Сума коштів':
    $name = 'sum';
    break;
  case 'Тип':
    $name = 'type';
    break;
  case 'Термін':
    $name = 'term';
    break;
  case 'Дата надання':
    $name = 'date_of_creation';
    break;
}

if ($table == 'banking products') {
  $boss_id = $_POST['boss_id'];
  $economist_id = $_POST['economist_id'];
  $client_id = $_POST['client_id'];

  $mysql = new mysqli('localhost', 'root', '', 'bank');
  $mysql->query("UPDATE `$table` SET `$name`='$value' WHERE `boss_id` = '$boss_id' AND `economist_id` = '$economist_id' AND `client_id` = '$client_id'");
  $mysql->close();
  header('Location: ./' . $page);
}

if ($table == 'settlement operations') {
  $cashier_id = $_POST['cashier_id'];
  $client_id = $_POST['client_id'];

  $mysql = new mysqli('localhost', 'root', '', 'bank');
  $mysql->query("UPDATE `$table` SET `$name`='$value' WHERE `cashier_id` = '$cashier_id' AND `client_id` = '$client_id'");
  $mysql->close();
  header('Location: ./' . $page);
}

$id = $_POST['id'];

$mysql = new mysqli('localhost', 'root', '', 'bank');
$mysql->query("UPDATE `$table` SET `$name`='$value' WHERE `id` = '$id'");
$mysql->close();
header('Location: ./' . $page);
?>