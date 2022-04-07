<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Result from DB</title>
</head>

<body>
  <style>
    a {
      text-decoration: none;
    }

    a.active {
      text-decoration: underline;
    }
  </style>
  <?php


  require "connect_db.php";

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $notesOnPage = 3;
  $from = ($page - 1) * $notesOnPage;
  $sql_count = mysqli_query($link, "SELECT COUNT(*) as count  FROM users");
  $count = mysqli_fetch_assoc($sql_count)['count'];
  $pagesCount = ceil($count / $notesOnPage);

  $sql = mysqli_query($link, "SELECT * FROM users LIMIT $from,$notesOnPage");

  while (($record = mysqli_fetch_assoc($sql))) {
    $users[] = $record;
  }
  ?>


  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th>id</th>
        <th>user_name</th>
        <th>email</th>
        <th>subject</th>
        <th>message</th>
        <th>gender</th>
        <th>device</th>
        <th>pathtofile</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <th><?php echo $user["id"] ?></th>
          <td><?php echo $user["user_name"] ?></td>
          <td><?php echo $user["email"] ?></td>
          <td><?php echo $user["subject"] ?></td>
          <td><?php echo $user["message"] ?></td>
          <td><?php echo $user["gender"] ?></td>
          <td><?php echo $user["device"] ?></td>
          <td><?php echo __DIR__ . DIRECTORY_SEPARATOR . $user["pathTOfile"] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <p><a href="index.php" class="btn btn-warning">Contact Us</a></p>
  <?php

  if ($page > 1) {
    $pageToLeft = $page - 1;
    echo "<a href='?page=$pageToLeft'> << </a>";
  }

  for ($i = 1; $i <= $pagesCount; $i++) {
    if ($page == $i) {
      echo "<a href='?page=$i' class='active'> $i </a>";
    } else {
      echo "<a href ='?page=$i'> $i </a>";
    }
  }

  if ($page != $pagesCount) {
    $pageToRight = $page + 1;
    echo "<a href = '?page=$pageToRight'> >> </a>";
  } ?>

</body>

</html>