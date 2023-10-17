<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="REFRESH" content="19;cobros2.php" />
    <title>Cobros del día Anterior</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/fondo pantalla.jpg');
            color: #FFF;
        }
        .container {
            margin-top: 5%;
        }
        .row {
            margin-bottom: 20px;
        }
        .table-cell {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-cell img {
            border: 3px solid #FFF;
            width: 100px;
            height: 100px;
        }
        .total {
            text-align: center;
            color: #FFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <h1 class="text-white mt-5">COBRANZAS DEL DÍA ANTERIOR</h1>
            </div>
        </div>
        <div class="row">
            <?php
            include("conexion.php");
            $query = oci_parse($conn, $sql3);
            oci_execute($query, OCI_DEFAULT);
            $monto = 0;

            $count = 0;
            while (($row = oci_fetch_array($query, OCI_NUM)) != FALSE) {
                echo "<div class='col-md-2 table-cell'>";
                echo "<img src='usuario/" . $row[0] . ".jpg' alt='Usuario' /><br><strong>" . $row[3] . "</strong><br><strong>" . number_format($row[1]) . "</strong>";
                echo "</div>";

                $count++;
                if ($count % 6 == 0) {
                    echo "</div><div class='row'>";
                }

                $monto += $row[1];
            }
            oci_free_statement($query);
            oci_close($conn);
            ?>
        </div>
        <h1 class="total">MONTO TOTAL COBRADO: <?php echo number_format($monto); ?></h1>
        <h1 class="total">Fecha: <?php echo $row[2]; ?></h1>
    </div>
</body>
</html>
