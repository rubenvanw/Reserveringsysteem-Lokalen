<?php

$datum = $_GET["datum"];
$lokaal = $_GET["lokaal"];

require "connect.php";

$sql = "SELECT lesuur FROM reservaties WHERE datum='{$datum}' AND lokaal='{$lokaal}'";
$result = $database->query($sql);

while ($all = $result->fetch(PDO::FETCH_ASSOC)) {
  if(!$all){
    echo "geen resultaat";
} else{
    foreach ($all as $lesuur) {
        echo $lesuur . "/";
    }
}

}
?>