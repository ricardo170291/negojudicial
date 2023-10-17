<!DOCTYPE html>
<html lang="es">
<head>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ranking de Operaciones Canceladas</title>
    <style>
        body {
            background: url('images/fondo pantalla.jpg');
        }

        table {
            color: #FFF;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            padding: 20px;
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
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-auto p-0">
                <h1>RANKING DE OPERACIONES CANCELADAS</h1>
            </div>
        </div>

        <div align="center">
            <?php
            $arreglo1 = Array();
            $arreglo2 = array();
            $arreglo3 = array();
            $arreglo4 = array();
            $arreglo5 = array();
            $a = 0;

            include("conexion.php");
            $query = oci_parse($conn, $sql6);
            ociexecute($query, OCI_DEFAULT);

            while (($row = oci_fetch_array($query, OCI_NUM)) != FALSE) {
                $arreglo1[$a] = $row[0];
                $arreglo2[$a] = $row[1];
                $arreglo3[$a] = $row[2];
                $arreglo4[$a] = $row[3];
                $arreglo5[$a] = $row[4];
                $a = $a + 1;
            }
            oci_free_statement($query);
            oci_close($conn);

            $numRegistros = count($arreglo1);
            $numColumnas = 7;
            $numFilas = ceil($numRegistros / $numColumnas);

            if ($numRegistros == 0) {
                echo "<h1 style='font-size: 24px; color: #FF0000;'>NO HAY DATOS A MOSTRAR</h1>";
            } else {
                echo "<table border='3'>\n";
                for ($fila = 0; $fila < $numFilas; $fila++) {
                    echo "<tr>";
                    for ($col = 0; $col < $numColumnas; $col++) {
                        $indice = $fila * $numColumnas + $col;
                        if ($indice < $numRegistros) {
                            echo "<td>";
                            echo "<img src='usuario/" . $arreglo1[$indice] . ".jpg' border='3' width='125' height='125'>";
                            echo "<div style='font-size: 24px;'>" . $arreglo5[$indice] . "</div>";
							echo "<div style='font-size: 24px;'>" . number_format($arreglo2[$indice]) . "</div>";
                            echo "</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "<h1>Fecha desde: " . $arreglo3[0] . " Fecha hasta: " . $arreglo4[0] . "</h1>";
            }
            ?>
			<?php
				header("refresh:5")
			?>
			<?php
				header("refresh:19; url='contactado.php'");
			?>
        </div>
    </div>
</body>
</html>
