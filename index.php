<?php

require('database.php');
initMigration($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Simple Crud</title>
</head>
<body>
  <a href="create.php">Create User</a>
  <a href="read.php?show=all">Show All Users</a>
</body>
</html>