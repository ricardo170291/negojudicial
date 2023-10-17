<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="REFRESH" content="19;escalera.php" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dormidos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body,td,th {
	font-size: 24px;
}
#apDiv1 {
	position: absolute;
	width: 236px;
	height: 246px;
	z-index: 1;
	left: 26px;
	top: 186px;
}
</style>
</head>
<body background="images/hechizos con fuego.gif">
<!--<div id="apDiv1"><img src="images/guason.gif" width="235" height="245" /></div>-->
<!--<embed src="sonidos/Efecto de sonido sirena policia.mp3" width="12" height="12"></embed>-->

</body>
	
<audio autoplay loop>
	<source src="sonidos/sirena.mp3">
	Tu navegador  no  es  compatible con html5
</audio>
	
<h1 align="center" style="color:#FFF">GESTORES FUERA DE LINEA MAS DE 25 MINUTOS</h1>
<div align="center" >
<?php
$arreglo1 = array();
$arreglo2 = array();
$nombre	  = array();
$color = array();
$a = 0;
include("conexmysql.php");
$result = $mysqli->query($query2);

while($row = $result->fetch_array())
{
$rows[] = $row;
}

foreach($rows as $row)
{
$arreglo1[$a]= $row[0];
$arreglo2[$a]= $row[1];
$nombre[$a]	 = $row[2];

if ($arreglo2[$a]>=360) {
                $color[$a] = '#FF0000';
            }
            if ($arreglo2[$a]<360 and $arreglo2[$a]>=240) {
                $color[$a] = '#FF0000';
            }
            if ($arreglo2[$a]<240) {
                $color[$a] = '#FF0000';
            }

$a = $a+1;
}?><table border="3"><tr><?php
if(empty($arreglo1[0])){
	header("refresh:0; url='escalera.php'");
}
if(!empty($arreglo1[0])){
            echo "<td bgcolor='" . $color[0] . "'><img src='interno/".$arreglo1[0].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[0]</div></td>";
            echo "<td bgcolor='" . $color[0] . "'><FONT SIZE=7><b>" . $arreglo2[0]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[1])){
            echo "<td bgcolor='" . $color[1] . "'><img src='interno/".$arreglo1[1].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[1]</div></td>";
            echo "<td bgcolor='" . $color[1] . "'><FONT SIZE=7><b>" . $arreglo2[1]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[2])){
            echo "<td bgcolor='" . $color[2] . "'><img src='interno/".$arreglo1[2].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[2]</div></td>";
            echo "<td bgcolor='" . $color[2] . "'><FONT SIZE=7><b>" . $arreglo2[2]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[3])){
            echo "<td bgcolor='" . $color[3] . "'><img src='interno/".$arreglo1[3].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[3]</div></td>";
            echo "<td bgcolor='" . $color[3] . "'><FONT SIZE=7><b>" . $arreglo2[3]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[4])){
            echo "<td bgcolor='" . $color[4] . "'><img src='interno/".$arreglo1[4].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[4]</div></td>";
            echo "<td bgcolor='" . $color[4] . "'><FONT SIZE=7><b>" . $arreglo2[4]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[5])){
            echo "<td bgcolor='" . $color[5] . "'><img src='interno/".$arreglo1[5].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[5]</div></td>";
            echo "<td bgcolor='" . $color[5] . "'><FONT SIZE=7><b>" . $arreglo2[5]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[6])){
            echo "<td bgcolor='" . $color[6] . "'><img src='interno/".$arreglo1[6].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[6]</div></td>";
            echo "<td bgcolor='" . $color[6] . "'><FONT SIZE=7><b>" . $arreglo2[6]  . "</b></FONT></td>";
            
        }?></tr><tr><?php
if(!empty($arreglo1[7])){
            echo "<td bgcolor='" . $color[7] . "'><img src='interno/".$arreglo1[7].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[7]</div></td>";
            echo "<td bgcolor='" . $color[7] . "'><FONT SIZE=7><b>" . $arreglo2[7]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[8])){
            echo "<td bgcolor='" . $color[8] . "'><img src='interno/".$arreglo1[8].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[8]</div></td>";
            echo "<td bgcolor='" . $color[8] . "'><FONT SIZE=7><b>" . $arreglo2[8]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[9])){
            echo "<td bgcolor='" . $color[9] . "'><img src='interno/".$arreglo1[9].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[9]</div></td>";
            echo "<td bgcolor='" . $color[9] . "'><FONT SIZE=7><b>" . $arreglo2[9]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[10])){
            echo "<td bgcolor='" . $color[10] . "'><img src='interno/".$arreglo1[10].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[10]</div></td>";
            echo "<td bgcolor='" . $color[10] . "'><FONT SIZE=7><b>" . $arreglo2[10]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[11])){
            echo "<td bgcolor='" . $color[11] . "'><img src='interno/".$arreglo1[11].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[11]</div></td>";
            echo "<td bgcolor='" . $color[11] . "'><FONT SIZE=7><b>" . $arreglo2[11]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[12])){
            echo "<td bgcolor='" . $color[12] . "'><img src='interno/".$arreglo1[12].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[12]</div></td>";
            echo "<td bgcolor='" . $color[12] . "'><FONT SIZE=7><b>" . $arreglo2[12]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[13])){
            echo "<td bgcolor='" . $color[13] . "'><img src='interno/".$arreglo1[13].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[13]</div></td>";
            echo "<td bgcolor='" . $color[13] . "'><FONT SIZE=7><b>" . $arreglo2[13]  . "</b></FONT></td>";
            
        }?></tr><tr><?php
if(!empty($arreglo1[14])){
            echo "<td bgcolor='" . $color[14] . "'><img src='interno/".$arreglo1[14].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[14]</div></td>";
            echo "<td bgcolor='" . $color[14] . "'><FONT SIZE=7><b>" . $arreglo2[14]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[15])){
            echo "<td bgcolor='" . $color[15] . "'><img src='interno/".$arreglo1[15].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[15]</div></td>";
            echo "<td bgcolor='" . $color[15] . "'><FONT SIZE=7><b>" . $arreglo2[15]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[16])){
            echo "<td bgcolor='" . $color[16] . "'><img src='interno/".$arreglo1[16].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[16]</div></td>";
            echo "<td bgcolor='" . $color[16] . "'><FONT SIZE=7><b>" . $arreglo2[16]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[17])){
            echo "<td bgcolor='" . $color[17] . "'><img src='interno/".$arreglo1[17].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[17]</div></td>";
            echo "<td bgcolor='" . $color[17] . "'><FONT SIZE=7><b>" . $arreglo2[17]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[18])){
            echo "<td bgcolor='" . $color[18] . "'><img src='interno/".$arreglo1[18].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[18]</div></td>";
            echo "<td bgcolor='" . $color[18] . "'><FONT SIZE=7><b>" . $arreglo2[18]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[19])){
            echo "<td bgcolor='" . $color[19] . "'><img src='interno/".$arreglo1[19].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[19]</div></td>";
            echo "<td bgcolor='" . $color[19] . "'><FONT SIZE=7><b>" . $arreglo2[19]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[20])){
            echo "<td bgcolor='" . $color[20] . "'><img src='interno/".$arreglo1[20].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[20]</div></td>";
            echo "<td bgcolor='" . $color[20] . "'><FONT SIZE=7><b>" . $arreglo2[20]  . "</b></FONT></td>";
            
        }?></tr><tr><?php
if(!empty($arreglo1[21])){
            echo "<td bgcolor='" . $color[21] . "'><img src='interno/".$arreglo1[21].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[21]</div></td>";
            echo "<td bgcolor='" . $color[21] . "'><FONT SIZE=7><b>" . $arreglo2[21]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[22])){
            echo "<td bgcolor='" . $color[22] . "'><img src='interno/".$arreglo1[22].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[22]</div></td>";
            echo "<td bgcolor='" . $color[22] . "'><FONT SIZE=7><b>" . $arreglo2[22]  . "</b></FONT></td>";
            
        }
if(!empty($arreglo1[23])){
            echo "<td bgcolor='" . $color[23] . "'><img src='interno/".$arreglo1[23].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[23]</div></td>";
            echo "<td bgcolor='" . $color[23] . "'><FONT SIZE=7><b>" . $arreglo2[23]  . "</b></FONT></td>";
            
        }
		if(!empty($arreglo1[24])){
            echo "<td bgcolor='" . $color[24] . "'><img src='interno/".$arreglo1[24].".jpg' border='3' width='125' height='125'><div style='text-align: center; font-weight: bold;'>$nombre[24]</div></td>";
            echo "<td bgcolor='" . $color[24] . "'><FONT SIZE=7><b>" . $arreglo2[24]  . "</b></FONT></td>";
            
        }
		
		?></tr></table>
</div>

</html>