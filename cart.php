<?php
// Uključi datoteku za povezivanje na bazu podataka
require_once('database/db_connect.php');

// Izvrši SQL upit za selektovanje jela iz korpe
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Prikazi jela iz korpe
    while($row = $result->fetch_assoc()) {
        echo "<div class='cart-item'>";
        echo "<img src='" . $row["meal_img"] . "' alt='" . $row["meal_name"] . "'><br>";
        echo "<h1>" . $row["meal_name"] . "</h>";
        echo "<h1>" . $row["meal_price"] . " KM</h1>"; // Cena jela
        echo "<h2>Sastojci:</h2>"; // Naslov za sastojke
        echo "<ul>"; // Lista sastojaka
        echo "<li>" . $row["ingr_1"] . " - " . $row["ingr_prc_1"] . " KM</li>"; // Sastojak 1
        echo "<li>" . $row["ingr_2"] . " - " . $row["ingr_prc_2"] . " KM</li>"; // Sastojak 2
        echo "<li>" . $row["ingr_3"] . " - " . $row["ingr_prc_3"] . " KM</li>"; // Sastojak 3
        echo "<li>" . $row["ingr_4"] . " - " . $row["ingr_prc_4"] . " KM</li>"; // Sastojak 4
        echo "</ul>"; // Kraj liste sastojaka
        echo "<p>Količina: " . $row["quantity"] . "</p>";
        // Dodajemo button za uklanjanje sa odgovarajućim meal_id
        echo "<button onclick='removeFromCart(" . $row["id"] . ")'>Ukloni</button>";
        echo "</div>";
    }
} else {
    echo "<p>Nema dodanih jela.</p>";
}

// Zatvori konekciju na bazu podataka
$conn->close();
?>

