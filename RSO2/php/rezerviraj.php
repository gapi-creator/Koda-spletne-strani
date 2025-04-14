<?php
    session_start();
    echo $_GET["dan"].$_GET["ura"];
    require_once 'db.php';
    $query= "SELECT * FROM zasedeni_termini WHERE dan='$_GET[dan]' and zacetna_ura=$_GET[ura]";
    echo $_SESSION["ima_kljuc"];
    if ($_SESSION["ima_kljuc"]) {
        if (!$db->query($query)->fetch_assoc()) {
            $query = "INSERT INTO zasedeni_termini VALUES (null, $_GET[ura], '$_GET[dan]')";
            $db->query($query);
        }
        else {
            $query = "DELETE FROM zasedeni_termini WHERE dan='$_GET[dan]' and zacetna_ura=$_GET[ura]";
            $db->query($query);
        }
    }
    header("Location: rezervacija_treninga.php");
?>