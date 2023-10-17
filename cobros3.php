<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Acumulado de Cobros</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="REFRESH" content="19;cancel.php">
    <style>
        body {
            background-image: url('images/fondo pantalla.jpg');
            color: #FFF;
            font-size: 16px;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 0px solid #FFF;
            padding: 10px;
            text-align: center;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto p-0 text-center">
                <h1>COBROS ACUMULADOS DEL MES TODOS LOS GESTORES</h1>
            </div>
        </div>
        <div align="center">
            <?php
            include("conexion.php");
            $query = oci_parse($conn, $sql21);
            oci_execute($query, OCI_DEFAULT);
            $arreglo1 = [];
            $arreglo2 = [];
            $arreglo4 = [];
            $monto = 0;

            while (($row = oci_fetch_array($query, OCI_NUM)) != FALSE) {
                $arreglo1[] = $row[0];
                $arreglo2[] = $row[1];
                $arreglo4[] = $row[2];
                $monto += $row[1];
            }
            oci_free_statement($query);
            oci_close($conn);

            $numRegistros = count($arreglo1);
            $numColumnas = 6;
            $numFilas = ceil($numRegistros / $numColumnas);

            if ($numRegistros == 0) {
                echo "<h1>NO HAY DATOS A MOSTRAR</h1>";
            } else {
                echo "<table>";
                for ($fila = 0; $fila < $numFilas; $fila++) {
                    echo "<tr>";
                    for ($col = 0; $col < $numColumnas; $col++) {
                        $indice = $fila * $numColumnas + $col;
                        if ($indice < $numRegistros) {
                            echo "<td>";
                            echo "<img src='usuario/" . $arreglo1[$indice] . ".jpg' alt='Usuario' width='125' height='125'><br>";
                            echo "<div style='font-size: 18px;'><strong>" . $arreglo4[$indice] . "</strong></div>";
							echo "<strong style='font-size: 18px;'>" . number_format($arreglo2[$indice]) . "</strong>";

                            echo "</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "<h1>MONTO TOTAL COBRADO: " . number_format($monto) . "</h1>";
            }
            ?>
        </div>
    </div>
</body>
</html>
