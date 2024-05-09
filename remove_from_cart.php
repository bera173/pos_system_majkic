<?php
require_once('database/db_connect.php');

if(isset($_POST['cart_id'])) {
    $cart_id = $_POST['cart_id'];

    $sql_remove = "DELETE FROM cart WHERE id = $cart_id";

    if ($conn->query($sql_remove) === TRUE) {
        echo "Stavka je uspešno uklonjena iz korpe!";
    } else {
        echo "Greška prilikom uklanjanja stavke iz korpe: " . $conn->error;
    }
} else {
    echo "Nije primljen ID stavke u korpi.";
}

$conn->close();
?>
