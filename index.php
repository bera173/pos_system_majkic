<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moj prvi HTML dokument</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
</head>
<body>
    <section class="menu">
        <h1>MENI</h1>
        <section class="meals">
            <?php
                include 'meals.php'
            ?>
        </section>
    </section>
    <section class="cart">
        <h1>RAČUN</h1>
        <?php
            include 'cart.php'
        ?>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
<audio id="myAudio" src="media/barcode.mp3"></audio>
</body>
</html>
