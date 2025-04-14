


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/oblika.css">
    <meta charset="utf-8">
    <title>Strelsko društvo Gorjanci - Rezervacije</title>
    <style>
        table { 
            border-collapse: collapse; width: 100%; 
        }
        th, td { 
            padding: 10px; text-align: center; border: 1px solid #ddd; 
        }
        th { 
            background-color: #333; color: white; 
        }
        td.available { 
            background-color: rgb(207, 142, 142); cursor: pointer; 
        }
        td.reserved { 
            background-color: #f38c96; color: white; 
        }
        td.available:hover {
            background-color: rgb(54, 142, 168);
        }
    </style>
</head>
<header>
    <header>
        <div class="zgornji2">
            SD Gorjanci - Odprti termini za treninge
        </div>

        <nav class="drugi">
            <ul>
                <li><a href="../html/domaca_stran.html">Domov</a></li>
                <li><a href="../html/Novice.html">Novice</a></li>
                <li><a href="../html/Tekmovanja.html">Tekmovanja</a></li>
                <li><a href="../html/Društvo.html">Društvo</a></li>
                <li><a href="../html/Kontakt.html">Kontakt</a></li>
                
                <?php
                    session_start();
                    array_keys($_SESSION);
                    if($_SESSION["is_admin"]){
                        echo '<li><a style="color:#66b2ff;" href="../php/admin.php">Admin stran</a></li>';
                    }
                ?>

            </ul> 
        </nav>

    </header>
<body>
    
    <table>
        <tr>
            <th>Ura</th>
            <th>Ponedeljek</th>
            <th>Torek</th>
            <th>Sreda</th>
            <th>Četrtek</th>
            <th>Petek</th>
            <th>Sobota</th>
            <th>Nedelja</th>
        </tr>

        <?php
            $termini =      array("ponedeljek" => array(7 => true, 8 => true, 9 => true, 10 => true, 11 => true, 12 => true, 13 => true, 14 => true, 15 => true, 16 => true, 17 => true, 18 => true, 19 => true, 20 => true),
                                "torek"      => array(7 => true, 8 => true, 9 => true, 10 => true, 11 => true, 12 => true, 13 => true, 14 => true, 15 => true, 16 => true, 17 => true, 18 => true, 19 => true, 20 => true),
                                "sreda"      => array(7 => true, 8 => true, 9 => true, 10 => true, 11 => true, 12 => true, 13 => true, 14 => true, 15 => true, 16 => true, 17 => true, 18 => true, 19 => true, 20 => true),
                                "cetrtek"    => array(7 => true, 8 => true, 9 => true, 10 => true, 11 => true, 12 => true, 13 => true, 14 => true, 15 => true, 16 => true, 17 => true, 18 => true, 19 => true, 20 => true),
                                "petek"      => array(7 => true, 8 => true, 9 => true, 10 => true, 11 => true, 12 => true, 13 => true, 14 => true, 15 => true, 16 => true, 17 => true, 18 => true, 19 => true, 20 => true),
                                "sobota"     => array(7 => true, 8 => true, 9 => true, 10 => true, 11 => true, 12 => true, 13 => true, 14 => true, 15 => true, 16 => true, 17 => true, 18 => true, 19 => true, 20 => true),
                                "nedelja"    => array(7 => true, 8 => true, 9 => true, 10 => true, 11 => true, 12 => true, 13 => true, 14 => true, 15 => true, 16 => true, 17 => true, 18 => true, 19 => true, 20 => true)); 
            require_once 'db.php';
            $query = "SELECT zacetna_ura, dan from zasedeni_termini";
            $zasedeni_termini = $db->query($query);
            while($termin = $zasedeni_termini->fetch_assoc()) {
                $termini[$termin["dan"]][$termin["zacetna_ura"]] = false;
            }
            for($i=7; $i < 21; $i++) {
                $j = $i + 1;
                echo "<tr>
                        <td>$i:00-$j:00</td>
                        <td style='background-color:".($termini["ponedeljek"][$i] ? "#f38c96" : "#66FF66")."' class='available'>   <a style='text-decoration:none; color:black;' href='rezerviraj.php?dan=ponedeljek&ura=$i'>".($termini["ponedeljek"][$i] ? "Zaprto" : "Odprto")."</a></td>
                        <td style='background-color:".($termini["torek"][$i] ? "#f38c96" : "#66FF66")."' class='available'>        <a style='text-decoration:none; color:black;' href='rezerviraj.php?dan=torek&ura=$i'>".($termini["torek"][$i] ? "Zaprto" : "Odprto")."          </a></td>
                        <td style='background-color:".($termini["sreda"][$i] ? "#f38c96" : "#66FF66")."' class='available'>        <a style='text-decoration:none; color:black;' href='rezerviraj.php?dan=sreda&ura=$i'>".($termini["sreda"][$i] ? "Zaprto" : "Odprto")."          </a></td>
                        <td style='background-color:".($termini["cetrtek"][$i] ? "#f38c96" : "#66FF66")."' class='available'>      <a style='text-decoration:none; color:black;' href='rezerviraj.php?dan=cetrtek&ura=$i'>".($termini["cetrtek"][$i] ? "Zaprto" : "Odprto")."      </a></td>
                        <td style='background-color:".($termini["petek"][$i] ? "#f38c96" : "#66FF66")."' class='available'>        <a style='text-decoration:none; color:black;' href='rezerviraj.php?dan=petek&ura=$i'>".($termini["petek"][$i] ? "Zaprto" : "Odprto")."          </a></td>
                        <td style='background-color:".($termini["sobota"][$i] ? "#f38c96" : "#66FF66")."' class='available'>       <a style='text-decoration:none; color:black;' href='rezerviraj.php?dan=sobota&ura=$i'>".($termini["sobota"][$i] ? "Zaprto" : "Odprto")."        </a></td>
                        <td style='background-color:".($termini["nedelja"][$i] ? "#f38c96" : "#66FF66")."' class='available'>      <a style='text-decoration:none; color:black;' href='rezerviraj.php?dan=nedelja&ura=$i'>".($termini["nedelja"][$i] ? "Zaprto" : "Odprto")."      </a></td>";
            }    
        ?>

    </table>
</body>
</html>

