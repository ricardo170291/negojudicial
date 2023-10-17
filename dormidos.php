<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="REFRESH" content="19;escalera.php" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GESTORES FUERA DE MAS DE 25 MINUTOS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
    body, td, th {
        font-size: 24px;
    }
    h1 {
        color: #FFF;
        text-align: center;
    }
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
    }
    td {
        border: 3px solid #000;
        text-align: center;
        vertical-align: middle;
    }
    img {
        width: 125px;
        height: 125px;
        border: 3px solid #000;
    }
</style>
</head>
<body background="images/hechizos con fuego.gif">
    <h1>GESTORES FUERA DE MAS DE 25 MINUTOS</h1>
    <table>
        <?php
        $arreglo1 = array();
        $arreglo2 = array();
        $nombre   = array();
        $color    = array();
        $a        = 0;
        include("conexmysql.php");
        $result = $mysqli->query($query2);

        while ($row = $result->fetch_array()) {
            $arreglo1[] = $row[0];
            $arreglo2[] = $row[1];
            $nombre[]   = $row[2];

            if ($arreglo2[$a] >= 360) {
                $color[$a] = '#FF0000';
            } elseif ($arreglo2[$a] < 360 && $arreglo2[$a] >= 240) {
                $color[$a] = '#FF0000';
            } else {
                $color[$a] = '#FF0000';
            }

            if ($a % 6 == 0) {
                echo '<tr>';
            }

            echo "<td bgcolor='" . $color[$a] . "'><img src='interno/" . $arreglo1[$a] . ".jpg' alt='" . $nombre[$a] . "' /><br />$nombre[$a]<br /><b>$arreglo2[$a]</b></td>";

            if ($a % 6 == 5 || $a == count($arreglo1) - 1) {
                echo '</tr>';
            }

            $a++;
        }

        if (empty($arreglo1[0])) {
            header("refresh:0; url='escalera.php'");
        }
        ?>
    </table>
</body>
</html>
