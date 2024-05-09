<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj jelo</title>
    <link rel="stylesheet" href="add_meal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['upload_success']) && $_SESSION['upload_success']) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Jelo uspješno dodato!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        $_SESSION['upload_success'] = false;
    }
?>
<?php
    if (isset($_SESSION['upload_error'])) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Greška!',
                text: '{$_SESSION['upload_error']}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>";
    }
    unset($_SESSION['upload_error']);
?>
    <section class="menu">
        <h1>DODAJ JELO</h1>
        <form action="upload_meal.php" id="meal_form" method="post" enctype="multipart/form-data">
            <label for="name">Naziv jela:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="ingredient_1">Sastojak 1:</label><br>
            <input type="text" id="ingredient_1" name="ingredient_1" required>

            <label for="ingr_price_1">Cijena sastojka 1:</label><br>
            <input type="number" id="ingr_price_1" name="ingr_price_1" step="0.01" required><br><br>
            
            <label for="ingredient_2">Sastojak 2:</label><br>
            <input type="text" id="ingredient_2" name="ingredient_2" required>

            <label for="ingr_price_2">Cijena sastojka 2:</label><br>
            <input type="number" id="ingr_price_2" name="ingr_price_2" step="0.01" required><br><br>
            
            <label for="ingredient_3">Sastojak 3:</label><br>
            <input type="text" id="ingredient_3" name="ingredient_3" required>

            <label for="ingr_price_3">Cijena sastojka 3:</label><br>
            <input type="number" id="ingr_price_3" name="ingr_price_3" step="0.01" required><br><br>
            
            <label for="ingredient_4">Sastojak 4:</label><br>
            <input type="text" id="ingredient_4" name="ingredient_4" required>

            <label for="ingr_price_4">Cijena sastojka 4:</label><br>
            <input type="number" id="ingr_price_4" name="ingr_price_4" step="0.01" required><br><br>
            
            <label for="price">Cijena:</label><br>
            <input type="number" id="price" name="price" step="0.01" required><br><br>
            
            <label for="slika">Slika jela:</label><br>
            <input type="file" id="img" name="img" required><br><br>
            
            <input type="submit" value="Dodaj jelo">
        </form>
    </section>
<script src="add_meal.js"></script>
</body>
</html>
