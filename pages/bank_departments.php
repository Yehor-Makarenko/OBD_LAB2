<?php 
$title = 'Bank Departments';
require './header.php';
?>

<body>
  <a href="../index.php" class="home">На головну</a>
  <div class="insert-window" id="insert-window">
    <form action="insert.php" method="post">
      <input style="display: none" type="text" value="bank_departments.php" name="page">
      <input style="display: none" type="text" value="departments" name="table">      
      <input type="text" name="department_number" placeholder="№ Відділення">
      <input type="text" name="address" placeholder="Адреса">
      <input type="text" name="phone" placeholder="Телефон">
      <input type="submit" value="Додати">
    </form>
  </div>

  <div class="update-window" id="update-window">
    <form action="update.php" method="post">
      <input style="display: none" type="text" value="bank_departments.php" name="page">
      <input style="display: none" type="text" value="departments" name="table">
      <input type="text" name="id" placeholder="ID">
      <input type="text" name="name" placeholder="Назва поля">
      <input type="text" name="value" placeholder="Нове значення">
      <input type="submit" value="Змінити">
    </form>
  </div>
  <h1>Відділення Банку</h1>
  <div class="buttons">
    <button id="insert">Додати</button>
    <button id="update">Змінити</button>
  </div>
  <?php
    $result = $mysql->query("SELECT * FROM `departments`");

    echo('
    <table>
      <tr>
        <th>ID</th>
        <th>№ Відділення</th>
        <th>Адреса</th>
        <th>Телефон</th>
      </tr>    
    ');

    $department = $result->fetch_assoc();

    while ($department != null) {
      echo('
        <tr>
          <td>' . $department['id'] . '</td>
          <td>' . $department['department_number'] . '</td>
          <td>' . $department['address'] . '</td>
          <td>' . $department['phone'] . '</td>
          <td><form action="./delete.php" method="post">
          <input style="display: none" type="text" value="bank_departments.php" name="page">
          <input style="display: none" type="text" value="departments" name="table">
          <input style="display: none" type="text" value="' . $department['id'] . '" name="id">
          <input type="submit" value="Видалити">
          </form></td>          
        </tr>    
      ');
      
      $department = $result->fetch_assoc();
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