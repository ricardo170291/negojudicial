<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="REFRESH" content="19;minutos.php" />
    <title>Contactados</title>
    <style>
        .table-cell {
            border: 0px solid #000;
            width: 150px;
            height: 150px;
            text-align: center;
            vertical-align: middle;
            padding: 25px; /* Añade espacio interno a las celdas */
        }

        .table-cell img {
            width: 125px;
            height: 125px;
        }
    </style>
</head>
<body background="images/fondo pantalla.jpg">
    <div class="m-0 row justify-content-center">
        <div class="col-auto p-5 text-center">
            <h1 class="text-white">LLAMADAS EFECTIVAS SALIENTES DEL DIA</h1>
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
        $result = $mysqli->query($query);

        while ($row = $result->fetch_array()) {
            $arreglo1[] = $row[0];
            $arreglo2[] = $row[1];
            $nombre[] = $row[2];

            if ($arreglo2[$a] >= 90) {
                $color[$a] = '#00FF00';
            } elseif ($arreglo2[$a] < 90 && $arreglo2[$a] >= 50) {
                $color[$a] = '#FFFF00';
            } else {
                $color[$a] = '#FF0000';
            }

            $a++;
        }

        if (empty($arreglo1)) {
            echo "<font size='+6' color='#FF0000'><b>NO HAY DATOS A MOSTRAR</b></font>";
        } else {
            echo '<table>';
            $filas = count($arreglo1);
            $columnas = 6;
            $filasPorColumna = ceil($filas / $columnas);
            $contador = 0;

            for ($i = 0; $i < $filasPorColumna; $i++) {
                echo '<tr>';
                for ($j = 0; $j < $columnas; $j++) {
                    if ($contador < $filas) {
                        echo '<td class="table-cell" bgcolor="' . $color[$contador] . '">';
                        echo '<img src="interno/' . $arreglo1[$contador] . '.jpg" width="125" height="125" alt="' . $nombre[$contador] . '">';
                        echo '<div style="font-weight: bold;">' . $nombre[$contador] . '</div>';
                        echo '<div><span style="font-size: 20px;"><b>' . $arreglo2[$contador] . '</b></span></div>';
                        echo '</td>';
                        $contador++;
                    } else {
                        echo '<td class="table-cell"></td>'; // Celda vacía para completar la columna
                    }
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
</body>
</html>
