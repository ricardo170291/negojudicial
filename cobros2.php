<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Cobros del día</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="REFRESH" content="19; cobros3.php">
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
        <div class="col-auto">
            <h1>COBROS DEL DÍA TODOS LOS GESTORES</h1>
        </div>
    </div>
    <div align="center">
        <?php
        include("conexion.php");
        $query = oci_parse($conn, $sql20);
        oci_execute($query, OCI_DEFAULT);
        $arreglo1 = [];
        $arreglo2 = [];
        $arreglo3 = [];
        $arreglo5 = [];
        $monto = 0;
        $suma = 0;

        while ($row = oci_fetch_array($query, OCI_NUM)) {
            $arreglo1[] = $row[0];
            $arreglo2[] = $row[1];
            $arreglo3[] = $row[2];
            $arreglo5[] = $row[4];
            $monto += $row[1];
            $suma = $row[3];
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
                        echo "<div>" . $arreglo5[$indice] . "</div>";
                        echo "<strong>" . number_format($arreglo2[$indice]) . "</strong>";
                        echo "</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<h1>MONTO TOTAL COBRADO: " . number_format($monto) . "</h1>";
            echo "<h1>Fecha: " . $arreglo3[$numFilas - 1] . " - Total Acumulado: " . number_format($suma) . "</h1>";
        }
        ?>
    </div>
</div>
</body>
</html>
