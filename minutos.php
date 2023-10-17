<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <title>MINUTOS DE LLAMADAS SALIENTES DEL DIA</title>
    <style>
         body {
            background: url('images/fondo pantalla.jpg');
        }

        table {
            color: #FFF;
            border-collapse: collapse;
            width: 75%;
        }

        td {
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            color: #FFF;
            margin: 0;
            padding: 10px;
        }
    </style>
</head>

<body background="images/fondo pantalla.jpg">
    <div class="m-0 row justify-content-center">
        <div class="col-auto mt-3 text-center">
            <h1 class="text-white">MINUTOS DE LLAMADAS SALIENTES DEL DIA</h1>
        </div>
    </div>
    <div align="center">
        <?php
        $arreglo1 = array();
        $arreglo2 = array();
        $nombre = array();
        $color = array();
        $a = 0;
        include("conexmysql.php");
        $result = $mysqli->query($query1);

        while ($row = $result->fetch_array()) {
            $arreglo1[] = $row[0];
            $arreglo2[] = $row[1];
            $nombre[] = $row[2];

            if ($arreglo2[$a] >= 360) {
                $color[$a] = '#00FF00';
            } elseif ($arreglo2[$a] < 360 && $arreglo2[$a] >= 240) {
                $color[$a] = '#FFFF00';
            } else {
                $color[$a] = '#FF0000';
            }

            $a++;
        }

        if (!empty($arreglo1)) {
            echo '<table cellspacing="0">'; // Agrega cellspacing="0" para asegurar que no haya espacio adicional entre las celdas
            for ($i = 0; $i < count($arreglo1); $i++) {
                if ($i % 6 == 0) {
                    echo '<tr>'; // Comienza una nueva fila para cada 6 columnas
                }
                echo '<td class="table-cell" bgcolor="' . $color[$i] . '">';
                echo '<img src="interno/' . $arreglo1[$i] . '.jpg" width="125" height="125" alt="' . $nombre[$i] . '">';
                echo '<div style="text-align: center; font-weight: bold;">' . $nombre[$i] . '</div>';
                echo '<div><span style="font-size: 20px;"><b>' . $arreglo2[$i] . '</b></span></div>';
                echo '</td>';
                if ($i % 6 == 5 || $i == count($arreglo1) - 1) {
                    echo '</tr>'; // Cierra la fila después de cada 6 columnas o en la última columna
                }
            }
            echo '</table>';
        } else {
            echo "<font size='+6' color='#FF0000'><b>NO HAY DATOS A MOSTRAR</b></font>";
        }
        ?>
    </div>
    <?php
    $time = time();
    echo date("H:i:s", $time);
    $hora = date("H:i:s", $time);
    if ($hora > '08:00:00' && $hora < '12:00:00' || $hora > '14:00:00' && $hora < '18:00:00') {
        header('refresh:19;dormidos2.php');
    } else {
        header('refresh:19;dormidos.php');
    }
    ?>
</body>

</html>
