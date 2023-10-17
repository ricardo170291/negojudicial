<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <META HTTP-EQUIV="REFRESH" CONTENT="19;URL=cobros1.php"> 
    <title>Gestiones</title>
    <style>
        body {
            background: url('images/fondo pantalla.jpg');
        }
        table {
        }
        td {
            padding: 20px;
        }
    </style>
</head>
<body class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h1 class="text-white mt-5">RANKING DE GESTIONES DIARIAS</h1>
        </div>
    </div>
    <div align="center">
        <table border="3">
            <tr>
                <?php
                $arreglo1 = Array();
                $arreglo2 = array();
                $arreglo3 = array();
                $color = array();
                $a = 0;

                include("conexion.php");
                $query = oci_parse($conn, $sql1);
                oci_execute($query, OCI_DEFAULT);

                while (($row = oci_fetch_array($query, OCI_NUM)) != FALSE) {
                    $arreglo1[$a] = $row[0];
                    $arreglo2[$a] = $row[1];
                    $arreglo3[$a] = $row[2];

                    // Asignar colores según criterio
                    if ($arreglo2[$a] >= 90) {
                        $color[$a] = '#00FF00';
                    } elseif ($arreglo2[$a] < 90 && $arreglo2[$a] >= 50) {
                        $color[$a] = '#FFFF00';
                    } else {
                        $color[$a] = '#FF0000';
                    }

                    $a++;
                }

                // Definir el número de columnas por fila
                $numColumnasPorFila = 6;

                for ($i = 0; $i < $a; $i++) {
                    // Comienza una nueva fila después de cada $numColumnasPorFila elementos
                    if ($i % $numColumnasPorFila == 0) {
                        echo '</tr><tr>';
                    }

                    echo "<td bgcolor='" . $color[$i] . "'>";
                    echo "<img src='usuario/" . $arreglo1[$i] . ".jpg' border='3' width='125' height='125'>";
                    echo "<div style='text-align: center; font-weight: bold;'>$arreglo3[$i]</div>";
                    echo "<div style='text-align: center; font-weight: bold; font-size: 24px;'>$arreglo2[$i]</div>";
                    echo "</td>";
                }

                oci_free_statement($query);
                oci_close($conn);
                ?>
            </tr>
        </table>
    </div>
</body>
</html>


