<?php
  require('database.php');

  // create new user
  if($_GET["show"] == "all") {
    try{
      $statement = $pdo->prepare(
        'SELECT * FROM users;'
      );
      $statement->execute();

      $results = $statement->fetchAll(PDO::FETCH_OBJ);
      echo "Read from table users</br>";
    }catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage()."</h4>";
    }
  }; 
  
    if($_GET["show"] == "one" && isset($_GET["id"])) {
      $id = $_GET["id"];
     try{
      $statement = $pdo->prepare(
        'SELECT * FROM users where id = :id;'
      );
      $statement->execute(["id" => $id]);

      $results = $statement->fetchAll(PDO::FETCH_OBJ);
      echo "Read from table users</br>";
    }catch(PDOException $e){
      echo "<h4 style='color: red;'>".$e->getMessage()."</h4>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <table>
    <tr>
      <th>id</th>
      <th>first_name</th>
      <th>last_name</th>
      <th>age</th>
      <th>edit</th>
      <th>delete</th>
    </tr>
   <?php foreach($results as $user) { ?>
    <tr>
      <td><?php echo $user->id; ?></td>
      <td><?php echo $user->first_name; ?></td>
      <td><?php echo $user->last_name; ?></td>
      <td><?php echo $user->age; ?></td>
      <td><a href="/update.php?id=<?php echo $user->id; ?>">edit</a></td>
      <td><a href="/delete.php?id=<?php echo $user->id; ?>" onclick="confirm();">delete</a></td>
     <h1><?php echo $user->first_name; ?></h1>
    </tr>
  
  <?php } ?>
  </table>
</body>
</html>