<?php
// Uključi datoteku za povezivanje na bazu podataka
require_once('database/db_connect.php');

// Proveri da li je forma poslata
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proveri da li su svi potrebni podaci poslati iz forme
    if (isset($_POST["name"]) && isset($_POST["price"]) && isset($_FILES["img"]) &&
        isset($_POST["ingredient_1"]) && isset($_POST["ingredient_2"]) &&
        isset($_POST["ingredient_3"]) && isset($_POST["ingredient_4"]) &&
        isset($_POST["ingr_price_1"]) && isset($_POST["ingr_price_2"]) &&
        isset($_POST["ingr_price_3"]) && isset($_POST["ingr_price_4"])) {

        // Prihvati vrednosti poslate iz forme
        $name = $_POST["name"];
        $price = number_format($_POST["price"], 2, '.', ''); 
        $ingredient_1 = $_POST["ingredient_1"];
        $ingredient_2 = $_POST["ingredient_2"];
        $ingredient_3 = $_POST["ingredient_3"];
        $ingredient_4 = $_POST["ingredient_4"];
        $ingr_price_1 = $_POST["ingr_price_1"];
        $ingr_price_2 = $_POST["ingr_price_2"];
        $ingr_price_3 = $_POST["ingr_price_3"];
        $ingr_price_4 = $_POST["ingr_price_4"];

        // Provera da li ukupna cena sastojaka ne prelazi cenu jela
        $totalIngredientsPrice = $ingr_price_1 + $ingr_price_2 + $ingr_price_3 + $ingr_price_4;
        if ($totalIngredientsPrice > $price) {
            session_start();
            $_SESSION['upload_error'] = "Ukupna cijena sastojaka ne smije biti veća od cijene jela.";
            header("Location: add_meal.php");
            exit();
        }


        // Provera da li je slika upload-ovana bez greške
        if ($_FILES["img"]["error"] == UPLOAD_ERR_OK) {
            // Provera formata slike
            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            $fileExtension = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedFormats)) {
                session_start();
                $_SESSION['upload_error'] = "Dozvoljeni formati slika su JPG, JPEG, PNG i GIF.";
                header("Location: add_meal.php");
                exit();
            } else {
                // Provera veličine slike (npr. manje od 2 MB)
                if ($_FILES["img"]["size"] > 2 * 1024 * 1024) { // 2 MB u bajtovima
                    session_start();
                    $_SESSION['upload_error'] = "Slika je prevelika. Maksimalna dozvoljena veličina je 2 MB.";
                    header("Location: add_meal.php");
                    exit();
                } else {
                    // Slika je u redu, možete je obraditi
                    // Upload slike
                    $target_dir = "media/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $newFileName = uniqid() . '_' . time() . '.' . $imageFileType;
                    $target_file = $target_dir . $newFileName;
                    
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        // Ako je slika uspešno uploadovana, unesi podatke u bazu
                        $sql = "INSERT INTO meals (name, price, ingredient_1, ingredient_2, ingredient_3, ingredient_4, ingr_price_1, ingr_price_2, ingr_price_3, ingr_price_4, img) 
                                VALUES ('$name', $price, '$ingredient_1', '$ingredient_2', '$ingredient_3', '$ingredient_4', '$ingr_price_1', '$ingr_price_2', '$ingr_price_3', '$ingr_price_4', '$target_file')";
                        
                        if ($conn->query($sql) === TRUE) {
                            $response['success'] = true;
                            session_start();
                            $_SESSION['upload_success'] = true;

                            header("Location: add_meal.php");
                            exit(); 
                        } else {
                            session_start();
                            $_SESSION['upload_error'] = "Greška prilikom dodavanja jela.";
                            header("Location: add_meal.php");
                            exit();
                        }
                    } else {
                        session_start();
                        $_SESSION['upload_error'] = "Došlo je do greške prilikom upload-a slike.";
                        header("Location: add_meal.php");
                        exit();
                    }
                }
            }
        } else {
            session_start();
            $_SESSION['upload_error'] = "Došlo je do greške prilikom upload-a slike.";
            header("Location: add_meal.php");
            exit();
        }
    } else {
        session_start();
        $_SESSION['upload_error'] = "Svi potrebni podaci nisu dostavljeni.";
        header("Location: add_meal.php");
        exit();              
    }
}

// Zatvori konekciju na bazu podataka
$conn->close();
?>
