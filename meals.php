<?php
// Uključi datoteku za povezivanje na bazu podataka
require_once('database/db_connect.php');

// Izvrši SQL upit za selektovanje jela
$sql = "SELECT * FROM meals";
$result = $conn->query($sql);

// Proveri da li ima rezultata
if ($result->num_rows > 0) {
    // Iteriraj kroz svaki red rezultata
    while($row = $result->fetch_assoc()) {
        // Prikazi informacije o jelu u formatu 3x3
        echo "<div class='meal' id='" . $row["id"] . "' onclick='addToCart(" . $row["id"] . ")'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Cijena: " . $row["price"] . " KM</p>";
        echo "<img src='" . $row["img"] . "' alt='" . $row["name"] . "'>";
        echo "</div>";
    }
} else {
    echo "Nema rezultata.";
}

?>


