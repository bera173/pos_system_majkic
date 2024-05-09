<?php
require_once('database/db_connect.php');

if(isset($_POST['meal_id'])) {
    $meal_id = $_POST['meal_id'];

    $sql_meal = "SELECT * FROM meals WHERE id = $meal_id";
    $result_meal = $conn->query($sql_meal);

    if ($result_meal->num_rows > 0) {
        // Dohvatanje reda podataka o jelu
        $row_meal = $result_meal->fetch_assoc();

        // Izvlačenje potrebnih podataka o jelu
        $meal_name = $row_meal['name'];
        $meal_img = $row_meal['img'];
        $ingr_1 = $row_meal['ingredient_1'];
        $ingr_2 = $row_meal['ingredient_2'];
        $ingr_3 = $row_meal['ingredient_3'];
        $ingr_4 = $row_meal['ingredient_4'];
        $ingr_prc_1 = $row_meal['ingr_price_1'];
        $ingr_prc_2 = $row_meal['ingr_price_2'];
        $ingr_prc_3 = $row_meal['ingr_price_3'];
        $ingr_prc_4 = $row_meal['ingr_price_4'];
        $meal_price = $row_meal['price'];

        // Provera da li postoji jelo sa istim imenom u korpi
        $sql_check_cart = "SELECT * FROM cart WHERE meal_name = '$meal_name'";
        $result_check_cart = $conn->query($sql_check_cart);

        if ($result_check_cart->num_rows > 0) {
            // Ako postoji, povećaj quantity za 1
            $sql_update_cart = "UPDATE cart SET quantity = quantity + 1 WHERE meal_name = '$meal_name'";
            if ($conn->query($sql_update_cart) !== TRUE) {
                // Ukoliko dođe do greške prilikom ažuriranja, možemo je prijaviti u logove, ali nećemo ispisivati poruku
                error_log("Greška prilikom ažuriranja količine jela u korpi: " . $conn->error);
            }
        } else {
            // Ako ne postoji, dodaj novo jelo u korpu
            $sql_cart = "INSERT INTO cart (meal_name, meal_img, ingr_1, ingr_2, ingr_3, ingr_4, ingr_prc_1, ingr_prc_2, ingr_prc_3, ingr_prc_4, meal_price, quantity) 
                         VALUES ('$meal_name', '$meal_img', '$ingr_1', '$ingr_2', '$ingr_3', '$ingr_4', '$ingr_prc_1', '$ingr_prc_2', '$ingr_prc_3', '$ingr_prc_4', '$meal_price', 1)";
            if ($conn->query($sql_cart) !== TRUE) {
                // Ukoliko dođe do greške prilikom dodavanja, možemo je prijaviti u logove, ali nećemo ispisivati poruku
                error_log("Greška prilikom dodavanja jela u korpu: " . $conn->error);
            }
        }
    } else {

    }
} else {

}


$conn->close();
?>
