<?php
    $id = $_GET['id'];
        require_once('db.php');

    $sql = "DELETE FROM RSO_users WHERE id=$id";

    if($db->query($sqli)) {
        header('location: index.php');
    }
    else {
        echo "napaka pri brisanju uporabnika";
        echo "<a href='index.php'>Nazaj</a>";
    }
    

?>