<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="REFRESH" CONTENT="19;URL=inicio.html"> 
<title>Escala de 5 Mejores Cobradores</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 1350px;
	height: 750px;
	z-index: 1;
	background-image: url(images/pagina%20wep/blue-abstract-waves-wallpaper-hd.jpg);
}
#apDiv2 {
	position: absolute;
	width: 985px;
	height: 642px;
	z-index: 1;
	left: 183px;
	top: 104px;
}
#apDiv3 {
	position: absolute;
	width: 1350px;
	height: 103px;
	z-index: 2;
}
.CSS1 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 36px;
	color: #FFF;
}
#apDiv4 {
	position: absolute;
	width: 390px;
	height: 218px;
	z-index: 3;
	left: 823px;
	top: 154px;
}
#apDiv5 {
	position: absolute;
	width: 200px;
	height: 114px;
	z-index: 4;
	left: 777px;
	top: 243px;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 4;
	left: 989px;
	top: 502px;
}
</style>
</head>

<body background="images/fondo pantalla.jpg">
	<?php
	$arreglo1 = array();
	$arreglo2 = array();
	$nombre	  = array();
	$a = 0;
	include ("conexion.php");
	$query = oci_parse($conn,$recaudacion);ociexecute($query,OCI_DEFAULT);
        while(($row = oci_fetch_array($query,OCI_NUM)) != FALSE){
			$arreglo1[$a] = $row[0];
			$arreglo2[$a] = $row[1];
			$nombre[$a]	  = $row[2];
			$a = $a + 1;
		}
		$a = $a-1;
		if($a<25){
			while($a<25){
		$arreglo1[$a] = 'comodin';
		$arreglo2[$a] = 0;	
		$a = $a+1;
			}
		}
	?>
    

  <div id="apDiv2">
  
    <table width="985" border="0">
      <tr>
        <td><img src="usuario/<?php echo $arreglo1[0]?>.jpg" width="150" height="125" />
		  <div style="text-align: center;color: ghostwhite;font-size: 24px"><strong><?php echo $nombre[0]?></strong></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><img src="usuario/<?php echo $arreglo1[1]?>.jpg" width="150" height="120" />
		  <div style="text-align: center;color: ghostwhite;font-size: 24px"><strong><?php echo $nombre[1]?></strong></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><img src="usuario/<?php echo $arreglo1[2]?>.jpg" width="150" height="120" />
		  <div style="text-align: center;color: ghostwhite;font-size: 24px"><strong><?php echo $nombre[2]?></strong></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><img src="usuario/<?php echo $arreglo1[3]?>.jpg" width="150" height="120" />
		  <div style="text-align: center;color: ghostwhite;font-size: 24px"><strong><?php echo $nombre[3]?></strong></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><img src="usuario/<?php echo $arreglo1[4]?>.jpg" width="150" height="120" />
		  <div style="text-align: center;color: ghostwhite;font-size: 24px"><strong><?php echo $nombre[4]?></strong></div></td>
      </tr>
    </table>
  </div>
  <div id="apDiv3">
    <h1 align="center" class="CSS1">ESCALA DE  MEJORES 5 COBRADORES ACTUALES</h1>
  </div>
  <div id="apDiv4"><img src="images/aplausos.gif" width="500" height="220" alt="vegeta" /></div>
</body>
</html>