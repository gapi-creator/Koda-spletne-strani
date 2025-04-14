<?php
session_start();

// Pridobi ime uporabnika iz seje
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dobrodošli</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Dobrodošli, <?php echo ($user['ime']); ?></h1>
    <p>Dobrodošli na spletni strani Strelsko Društvo Gorjanci.</p>
</body>
</html>
