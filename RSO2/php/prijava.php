<?php
session_start();

    require_once 'db.php';

    if ($db->connect_error) {
        die("Povezava ni uspela: " . $db->connect_error);
    }

 
    $email = $_POST['email'];
    $geslo = $_POST['geslo'];


    $sql = "SELECT * FROM clani_drustvo 
            WHERE email = '$email' AND geslo = '$geslo' 
            limit 1";
    $rezultat=($db->query($sql));

    if ($user = $rezultat->fetch_assoc()) {
        $_SESSION['user'] = $user;

        $_SESSION["ima_kljuc"]=$user["ima_kljuc"];
        if ($user["je_admin"]) {
            $_SESSION['is_admin'] = true;
        } else {
            $_SESSION['is_admin'] = false;
        }
        header("Location:../php/rezervacija_treninga.php");
    } 
    else {
        echo "<p>Vstop ni dovoljen. Uporabnik ni najden.</p>";
    }

$db->close();
?>
