<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if(!empty($_GET)){
    require_once('db.php');

    $email=$_GET['email'];
    $ime=$_GET['ime'];
    $priimek=$_GET['priimek'];
    $geslo=$_GET['geslo'];
    $ima_kljuc=$_GET["ima_kljuc"];
    $je_admin=$_GET["je_admin"];


    $sql="insert into clani_drustvo (email, ime, priimek, geslo, ima_kljuc, je_admin) values ('$email', '$ime', '$priimek', '$geslo', $ima_kljuc, $je_admin)";

    if($db->query($sql))
        echo("vnos uspesen");
    else    
        echo("napaka");
    }
?>



<form>
    <input type="text" name="eamil" placeholder="eamil"><br>
    <input type="text" name="ime" placeholder="ime"><br>
    <input type="email" name="priimek" placeholder="priimek"><br>
    <input type="password" name="geslo" placeholder="geslo"><br>
    <input type="text" name="ima_kljuc" placeholder="ali ima uporabnik kljuc?"><br>
    <input type="text" name="je_admin" placeholder="ali bo uporabnik admin, ali ne?"><br>
    <input type="submit">
</form>


</body>
</html>