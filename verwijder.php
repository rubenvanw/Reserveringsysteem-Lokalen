<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<body>
   <div class="container">
      <header>
         <h1></h1>
      </header>
      <?php

      require "connect.php";

      $id = $_GET["id"];

      $sql = "DELETE FROM reservaties WHERE id=?";
      $statement = $database->prepare($sql);
      $statement->execute([$id]);

      echo "Reservatie verwijderd.";
      echo "<a href='overzicht.php'>overzicht</a>";

      header("location: https://85748.ict-lab.nl/Minor%20Algemeen/digitalsignage_opdracht2/overzicht.php");
      ?>
   </div>
</body>

</html>