<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
<title>Cobros del dia</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="REFRESH" content="19;cobros3.php" />
</head>
<body background="images/fondo pantalla.jpg">
</head>
	<div class="row justify-content-center mb-5">
			<div class="col-auto">
				<h1 class="text-white mt-5">COBROS DEL DIA TODOS LOS GESTORES</h1>
			</div>
	</div>
<div align="center">
	 <?php
         $arreglo1 = Array();
         $arreglo2 = array();
		 $arreglo3 = Array();
		 $arreglo4 = array();
		 $arreglo5 = array();
         $a = 0;
         
         $d = 0;
         $e = 1;
         $f = 2;
         $h = 3;
         $i = 4;
		 $j = 5;
		 $monto = 0;
		 $suma = 0;
		 
	include ("conexion.php");
	$query = oci_parse($conn,$sql20);ociexecute($query,OCI_DEFAULT);
        //$var[];
        //$con;
        while (($row = oci_fetch_array($query,OCI_NUM)) != FALSE) {
            $arreglo1[$a] = $row[0];
            $arreglo2[$a] = $row[1];
            $arreglo3[$a] = $row[2];
			$arreglo4[$a] = $row[3];
			$arreglo5[$a] = $row[4];
            $a = $a+1;
			$monto = $monto+$row[1];
			$suma = $row[3];
        }
        $g = ceil($a/6);
		if(empty($arreglo1[0])){
			echo "<font size='+6' color='#FF0000'><b>NO HAY DATOS A MOSTRAR</b></font>";
		}else{
        echo "<table border='3' id='tab' style='color:#FFF'>\n";
        for ($index = 0; $index < $g; $index++) {
            echo "<tr>";
            if(!empty($arreglo1[$d])){
            echo "<td><img src='usuario/".$arreglo1[$d].".jpg' border='3' width='75' height='75'>
			<div style='text-align: center; font-weight: bold;'>$arreglo5[$d]</div></td>";
            //echo "<td>" . $arreglo1[$d]  . "</td>";
            echo "<td><FONT SIZE=6><b>" . number_format($arreglo2[$d])  . "</b></FONT></td>";
           // echo "<td>" . $arreglo3[$d]  . "</td>";

            }
            if(!empty($arreglo1[$e])){
            echo "<td><img src='usuario/".$arreglo1[$e].".jpg' border='3' width='75' height='75'>
			<div style='text-align: center; font-weight: bold;'>$arreglo5[$e]</div></td>";
            //echo "<td>" . $arreglo1[$e]  . "</td>";
            echo "<td><FONT SIZE=6><b>" . number_format($arreglo2[$e])  . "</b></FONT></td>";
           // echo "<td>" . $arreglo3[$e]  . "</td>";
            }
            if(!empty($arreglo1[$f])){
            echo "<td><img src='usuario/".$arreglo1[$f].".jpg' border='3' width='75' height='75'>
			<div style='text-align: center; font-weight: bold;'>$arreglo5[$f]</div></td>";
            //echo "<td>" . $arreglo1[$f]  . "</td>";
            echo "<td><FONT SIZE=6><b>" . number_format($arreglo2[$f])  . "</b></FONT></td>";
            //echo "<td>" . $arreglo3[$f]  . "</td>\t" ."<br>\n";
            }
            if(!empty($arreglo1[$h])){
            echo "<td><img src='usuario/".$arreglo1[$h].".jpg' border='3' width='75' height='75'>
			<div style='text-align: center; font-weight: bold;'>$arreglo5[$h]</div></td>";
            //echo "<td>" . $arreglo1[$f]  . "</td>";
            echo "<td><FONT SIZE=6><b>" . number_format($arreglo2[$h])  . "</b></FONT></td>";
            //echo "<td>" . $arreglo3[$f]  . "</td>\t" ."<br>\n";
            }
            if(!empty($arreglo1[$i])){
            echo "<td><img src='usuario/".$arreglo1[$i].".jpg' border='3' width='75' height='75'>
			<div style='text-align: center; font-weight: bold;'>$arreglo5[$i]</div></td>";
            //echo "<td>" . $arreglo1[$f]  . "</td>";
            echo "<td><FONT SIZE=6><b>" . number_format($arreglo2[$i])  . "</b></FONT></td>";
            //echo "<td>" . $arreglo3[$f]  . "</td>\t" ."<br>\n";
            }
			if(!empty($arreglo1[$j])){
            echo "<td><img src='usuario/".$arreglo1[$j].".jpg' border='3' width='75' height='75'>
			<div style='text-align: center; font-weight: bold;'>$arreglo5[$j]</div></td>";
            //echo "<td>" . $arreglo1[$f]  . "</td>";
            echo "<td><FONT SIZE=6><b>" . number_format($arreglo2[$j])  . "</b></FONT></td>";
            //echo "<td>" . $arreglo3[$f]  . "</td>\t" ."<br>\n";
            }
            $d = $d+6;
            $e = $e+6;
            $f = $f+6;
            $h = $h+6;
            $i = $i+6;
			$j = $i+6;
}
echo "</table>";
		echo "<h1 style='text-align: center;color:#FFF'>MONTO TOTAL COBRADO: " . number_format($monto) . "</h1>";
		echo "<h1 style='text-align: center;color:#FFF'>Fecha:" . $arreglo3[$g] . "--------Total Acumulado: " . number_format($suma) . "</h1>";
		}
	oci_free_statement($query);
	oci_close($conn);
	
?>
</div>
</body>
</html>