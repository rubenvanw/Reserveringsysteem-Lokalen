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
            <h1>OVERZICHT</h1>
        </header>
        <?php
        require "connect.php";
        $statement = $database->query("SELECT * FROM reservaties ORDER BY datum ASC");
        //maak een tabel
        echo "<div class='tableContainer'>";
        echo "<table border='1px' class='table'>";

        //eerst de headers van de tabel
        echo "<tr>
                 <th>ID</th>
                 <th>Studentnummer</th>
                 <th>Datum</th>
                 <th>Lokaal</th>
                 <th>Uren</th>
                 <th>Lesuur</th>
                 </tr>";

        //zolang er items uit te lezen zijn...
        while ($row = $statement->fetch()) {

            //toon de gegevens van het item
            echo "<tr id='row'>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["studentnummer"] . "</td>";
            echo "<td>" . $row["datum"] . "</td>";
            echo "<td>" . $row["lokaal"] . "</td>";
            echo "<td>" . $row["uren"] . "</td>";
            echo "<td>" . $row["lesuur"] . "</td>";
            echo "<td><a href='verwijder.php?id={$row["id"]}'>VERWIJDER</a></td>";
            echo "</tr>";
        }

        //sluit de tabel af
        echo "</table>";
        echo "</div>";
        // echo "<div class='buttonContainer'>";
        // echo "<button onclick='vorige()'>VORIGE</button>";
        // echo "<button onclick='volgende()'>VOLGENDE</button>";
        // echo "</div>";
        echo "<a href='index.php'>RESERVEER</a>";
        ?>
    </div>
    <script>
        // let rows = document.querySelectorAll("#row");
        // let displayLimit = 3;
        // let foo;

        // for (x = 0; x < displayLimit; x++) {
        //     rows[x].style.display = "table-row";
        // }

        // function volgende() {
        //     console.log("volgende")
        //     start = displayLimit;
        //     displayLimit += 3;
        //     for (x = start; x < displayLimit; x++) {
        //         if (x < rows.length) {
        //             rows[x].style.display = "table-row";
        //         } else if(x > rows.length){
        //             return false;
        //         }
        //     }
        //     for (y = 0; y < start; y++) {
        //         rows[y].style.display = "none";
        //     }


        // }

        // function vorige() {
        //     console.log("vorige");

        // }
    </script>
</body>

</html>