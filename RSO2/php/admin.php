

<?php
    session_start();
    require_once 'db.php'; // Vključi povezavo na bazo

    $user = $_SESSION['user'];

    // Obdelava zahtevkov za dodajanje/brisanje članov
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add'])) {
            $email = $_POST['email'];
            $ime = $_POST['ime'];
            $priimek = $_POST['priimek'];
            $geslo = $_POST['geslo'];
            $je_admin = $_POST['je_admin'];
            $ima_kljuc = $_POST['ima_kljuc'];
            // Dodaj člana v bazo
            $stmt = $db->prepare("INSERT INTO clani_drustvo (email, ime, priimek, geslo, je_admin, ima_kljuc) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssii", $email, $ime, $priimek, $geslo, $je_admin, $ima_kljuc);
            $stmt->execute();
        }
        if (isset($_POST['delete'])) {
            $email = $_POST['email'];
            // Izbriši člana iz baze glede na email
            $stmt = $db->prepare("DELETE FROM clani_drustvo WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
        }
    }

    // Pridobi vse člane iz baze
    $result = $db->query("SELECT * FROM clani_drustvo");
?>

<!-- -------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <title>Admin nadzorna plošča</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/admin_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="header">
        <div class="naslov">
            <h1>Dobrodošli, Admin <?php echo ($user['ime']); ?>!</h1>
        </div>
    </div>
    <div class="main">
        <div>
            <div>
                <h2 style="margin-top:30px;font-size:30px;text-align:center; border: 2px; padding: 5px; border-radius: 10px; background-color:#77CDFF;">Seznam članov</h2>
                <table border="1" style="margin-bottom: 30px;">
                    <tr style="background-color: white; text-align:center;">
                        <th>Email</th>
                        <th>Ime</th>
                        <th>Priimek</th>
                        <th>Geslo</th>
                        <th>Je admin</th>
                        <th>Ima ključ</th>
                        <th>Akcija</th>
                    </tr><br><br>
                    <?php while ($row = $result->fetch_assoc()) { ?>

                        <tr style="background-color: white; text-align:center;">
                            <td style='padding:5px 10px 5px 10px'><?php echo htmlspecialchars($row['email']); ?></td>
                            <td style='padding:5px 10px 5px 10px'><?php echo htmlspecialchars($row['ime']); ?></td>
                            <td style='padding:5px 10px 5px 10px'><?php echo htmlspecialchars($row['priimek']); ?></td>
                            <td style='padding:5px 10px 5px 10px'><?php echo htmlspecialchars($row['geslo']); ?></td>
                            <td style='padding:5px 10px 5px 10px'><?php echo htmlspecialchars($row['je_admin']); ?></td>
                            <td style='padding:5px 10px 5px 10px'><?php echo htmlspecialchars($row['ima_kljuc']); ?></td>
                            <td style='padding:5px 10px 5px 10px'>
                                <form method="post">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <button type="submit" name="delete">Izbriši člana</button>
                                </form>
                            </td>
                        </tr>
                        
                    <?php } ?>
                </table>
            </div>
            <div>
                <h2 style="font-size:30px;text-align:center; border: 2px; padding: 10px; border-radius: 10px; background-color:#77CDFF;margin-bottom:15px;">Dodaj novega člana</h2>
                <form method="post">
                    <input type="email" name="email" placeholder="email" required><br>
                    <input type="text" name="ime" placeholder="ime" required><br>
                    <input type="text" name="priimek" placeholder="priimek" required><br>
                    <input type="password" name="geslo" placeholder="geslo" required><br>
                    <input type="text" name="ima_kljuc" placeholder="ali ima uporabnik kljuc?"><br>
                    <input type="text" name="je_admin" placeholder="ali bo uporabnik admin, ali ne?"><br>
                    <button type="submit" name="add">Dodaj člana</button>
                </form>
            </div>
        </div>
    </div>
    <div class="nazaj">
    <a href="../php/rezervacija_treninga.php"><button style="font-size:20px; padding: 10px 20px 10px 20px;" type="button" class="btn btn-lg btn-primary" >Nazaj</button></a>
    </div>
</body>
</html>

