<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONSULTAS</title>
</head>

<body>
<?php
$mysqli = new mysqli("10.100.10.110", "rdv", "sesamo", "asteriskcdrdb");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//EQUIPO DE LUCERO
$query = "SELECT src,COUNT(*) cantidad,(SELECT upper(SUBSTRING_INDEX(u.`nombre`, ' ', 1)) 
FROM internos u WHERE u.interno=src)nombre FROM
(SELECT * FROM cdr WHERE src IN(SELECT INTERNO FROM internos WHERE grupo=2) AND
DATE(calldate) = CURRENT_DATE AND disposition = 'ANSWERED' AND LENGTH(dst)>4)z GROUP BY src ORDER BY CANTIDAD DESC";
//EQUIPO DE YOLANDA
$contac2 = "select src,count(*) cantidad from
(select * from cdr where src in(SELECT INTERNO FROM permisos WHERE grupo=2) and
date(calldate) = current_date and disposition = 'ANSWERED' and LENGTH(dst)>4)z group by src ORDER BY CANTIDAD DESC";

$query1 = "SELECT src,ROUND((SUM(t)/60),0) MIN,(SELECT UPPER(SUBSTRING_INDEX(u.`nombre`, ' ', 1)) 
FROM internos u WHERE u.interno=src)nombre
 FROM(SELECT src,(duration)t FROM cdr WHERE src IN(SELECT INTERNO FROM internos where grupo=2) AND
DATE(calldate) = CURRENT_DATE AND disposition = 'ANSWERED' AND LENGTH(dst)>4)c GROUP BY src ORDER BY MIN DESC";

$min2 = "select src,round((sum(t)/60),0) min from(select src,(duration)t from cdr where src in(SELECT INTERNO FROM permisos WHERE grupo=2) and
date(calldate) = current_date and disposition = 'ANSWERED' and LENGTH(dst)>4)c group by src order by min desc";

$dif = "SELECT * FROM
((SELECT 'cobra' equipo,round((sum(duration)/60),0) AS dur FROM cdr WHERE src in(SELECT INTERNO FROM permisos WHERE grupo=2) AND DATE(calldate) = current_date
AND disposition = 'ANSWERED' AND LENGTH(dst)>4)
UNION all
(SELECT 'orokuises' equipo,round((sum(duration)/60),0) AS dur FROM cdr WHERE src in(SELECT INTERNO FROM permisos WHERE grupo=2) AND DATE(calldate) = current_date
AND disposition = 'ANSWERED' AND LENGTH(dst)>4))z ORDER BY dur desc";

$query2 = "SELECT src,diferencia,(SELECT UPPER(SUBSTRING_INDEX(u.`nombre`, ' ', 1)) 
FROM internos u WHERE u.interno=src)nombre FROM
(SELECT * FROM
(SELECT SRC,TIMESTAMPDIFF(MINUTE , calldate, CURRENT_TIMESTAMP) AS diferencia FROM
(SELECT MAX(CALLDATE) D,SRC S FROM cdr WHERE  DATE(CALLDATE) = CURRENT_DATE AND src IN(SELECT INTERNO FROM internos WHERE grupo = 2) AND LENGTH(dst)>4 GROUP BY SRC)A
LEFT JOIN
(SELECT calldate,src FROM cdr WHERE DATE(calldate)=CURRENT_DATE)B ON D=CALLDATE AND s = SRC)Z WHERE DIFERENCIA > 25 ORDER BY diferencia DESC)a
WHERE src NOT IN(SELECT * FROM permitidos)
";
?>
</body>
</html>