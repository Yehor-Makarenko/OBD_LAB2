<?php
$page = $_POST['page'];
$table = $_POST['table'];

if ($table == 'banking products') {
  $boss_id = $_POST['boss_id'];
  $economist_id = $_POST['economist_id'];
  $client_id = $_POST['client_id'];

  $mysql = new mysqli('localhost', 'root', '', 'bank');
  $mysql->query("DELETE FROM `$table` WHERE `boss_id` = '$boss_id' AND `economist_id` = '$economist_id' AND `client_id` = '$client_id'");
  $mysql->close();
  header('Location: ./' . $page);
}

if ($table == 'settlement operation') {
  $cashier_id = $_POST['cashier_id'];
  $client_id = $_POST['client_id'];

  $mysql = new mysqli('localhost', 'root', '', 'bank');
  $mysql->query("DELETE FROM `$table` WHERE `cashier_id` = '$cashier_id' AND `client_id` = '$client_id'");
  $mysql->close();
  header('Location: ./' . $page);
}

$id = $_POST['id'];

$mysql = new mysqli('localhost', 'root', '', 'bank');
$mysql->query("DELETE FROM `$table` WHERE `id` = '$id'");
$mysql->close();
header('Location: ./' . $page);
?>