<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php
	$user = "RDV";
	$pass = "rdv.2018";
	$db = "10.100.10.10:1521/NEGOSERV";
        	$conn = oci_pconnect($user, $pass, $db);
	if (!$conn){
		echo "Conexion es invalida".var_dump(ocierror());
		die();	
	}
	
	//CANTIDAD DE GESTIONES DIARIAS
	
	$sql1="select user_ins usuario,count(*) cantidad,(select SUBSTR(u.user_name, 1, INSTR(u.user_name, ' ') - 1) from negoserv.usuarios u where u.user_key = user_ins)nombre from
(select user_ins,cliente,fecha from negoserv.cob_gestiones where fecha=to_char(sysdate,'dd/mm/yyyy') group by user_ins,cliente,fecha)a where user_ins in
(select usu from negoserv.gestor_grupo g where g.supervisor='HDV')
group by user_ins order by cantidad desc";
		
		
		$sql3 = "SELECT cobrador,monto,f_dia_habil,
(select SUBSTR(u.user_name, 1, INSTR(u.user_name, ' ') - 1) from negoserv.usuarios u where u.user_key = cobrador)nombre FROM
(select cobrador,round(monto,0)monto,f_dia_habil from
(select aa.cobrador,sum(monto) as monto,negoserv.f_dia_habil from   
(select 
       (select max(t.cobrador) from credmae_tasa t where t.mae_key = cc.his_key) as cobrador,
       cc.his_key,
       case when cc.his_aplic = 'D6' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti+cc.his_honorarios+cc.his_gastos_administrativos)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            when cc.his_aplic = 'D7' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti+cc.his_honorarios+cc.his_gastos_administrativos)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            else (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti) end as monto
from credhist cc
where trunc(cc.his_fecha) =  trunc(negoserv.f_dia_habil)
union all
select 
       (select c.user_key from negoserv.usuarios c where c.user_key=(select max(tt.cobrador) from negoserv.adjmae_tasa tt where trim(tt.mae_key) = substr(x.mov_key,1,9))) as cobrador,
       substr(x.mov_key,1,9),
       case when x.mov_moneda = 'USD' then (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto+x.mov_punitorio+x.mov_notificacion)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
                        else (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto) end as monto
from negoserv.adjmovi x where x.mov_fecha = trunc(f_dia_habil)) aa--1324000
group by aa.cobrador 
order by 2 desc)z where cobrador in (select usu from negoserv.gestor_grupo t where t.estado='3'))Z ORDER BY MONTO DESC";

	$sql4 = "SELECT * FROM
(select * from
(select aa.cobrador,sum(monto) as monto,negoserv.f_dia_habil from   
(select 
       (select max(t.cobrador) from credmae_tasa t where t.mae_key = cc.his_key) as cobrador,
       cc.his_key,
       case when cc.his_aplic = 'D6' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            when cc.his_aplic = 'D7' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            else (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti) end as monto
from credhist cc
where cc.his_fecha = negoserv.f_dia_habil
union all
select 
       (select c.user_key from negoserv.usuarios c where c.user_key=(select max(tt.cobrador) from negoserv.adjmae_tasa tt where trim(tt.mae_key) = substr(x.mov_key,1,9))) as cobrador,
       substr(x.mov_key,1,9),
       case when x.mov_moneda = 'USD' then (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
                        else (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto) end as monto
from negoserv.adjmovi x where x.mov_fecha =negoserv.f_dia_habil) aa--1324000
group by aa.cobrador 
order by 2 desc)z where cobrador in (select usu from negoserv.gestor_grupo t where t.estado='3'))Z ORDER BY MONTO DESC";

	$sql5 = "SELECT * FROM
(select super,round(monto,0)monto from
(select 'COBRA' super,SUM(MONTO) as monto from
(select * from
(select aa.cobrador,sum(monto) as monto,negoserv.f_dia_habil from   
(select 
       (select max(t.cobrador) from credmae_tasa t where t.mae_key = cc.his_key) as cobrador,
       cc.his_key,
       case when cc.his_aplic = 'D6' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            when cc.his_aplic = 'D7' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            else (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti) end as monto
from credhist cc
where cc.his_fecha = negoserv.f_dia_habil
union all
select 
       (select c.user_key from negoserv.usuarios c where c.user_key=(select max(tt.cobrador) from negoserv.adjmae_tasa tt where trim(tt.mae_key) = substr(x.mov_key,1,9))) as cobrador,
       substr(x.mov_key,1,9),
       case when x.mov_moneda = 'USD' then (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
                        else (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto) end as monto
from negoserv.adjmovi x where x.mov_fecha =negoserv.f_dia_habil) aa--1324000
group by aa.cobrador order by 2 desc)z where cobrador in(select usu from negoserv.gestor_grupo t where t.estado='1')))
UNION ALL
(select 'OROKUISES' super,SUM(MONTO) as monto from
(select * from
(select aa.cobrador,sum(monto) as monto,negoserv.f_dia_habil from   
(select 
       (select max(t.cobrador) from credmae_tasa t where t.mae_key = cc.his_key) as cobrador,
       cc.his_key,
       case when cc.his_aplic = 'D6' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            when cc.his_aplic = 'D7' then (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
            else (cc.his_capita+cc.his_intere+cc.his_morato+cc.his_actos+cc.his_puni+cc.his_noti) end as monto
from credhist cc
where cc.his_fecha = negoserv.f_dia_habil
union all
select 
       (select c.user_key from negoserv.usuarios c where c.user_key=(select max(tt.cobrador) from negoserv.adjmae_tasa tt where trim(tt.mae_key) = substr(x.mov_key,1,9))) as cobrador,
       substr(x.mov_key,1,9),
       case when x.mov_moneda = 'USD' then (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto)*(select c.coti_venta from negoserv.cotizaciones c where c.coti_key = 01)
                        else (x.mov_capita+x.mov_intere+x.mov_mora+x.mov_acto) end as monto
from negoserv.adjmovi x where x.mov_fecha =negoserv.f_dia_habil) aa--1324000
group by aa.cobrador order by 2 desc)z where cobrador in (select usu from negoserv.gestor_grupo t where t.estado='3'))))Z ORDER BY MONTO DESC";

	$sql6 =  "select aa.cobrador,count(*) T,TRUNC(SYSDATE, 'MM') primerdia,f_fechus,
	(select SUBSTR(user_name, 1, INSTR(user_name, ' ') - 1) from negoserv.usuarios u where u.user_key = cobrador)nombre
	from 
(select 
       t.cobrador as cobrador,
       x.mae_key
from credmae x, credmae_tasa t where x.mae_fecanc between (select TRUNC(SYSDATE, 'MM') as PRIMER_DIA_DEL_MES from dual) and trunc(f_fechus) and x.mae_cancel ='1'
and x.mae_key = t.mae_key) aa where cobrador in (select usu from negoserv.gestor_grupo g where g.supervisor='HDV')
group by aa.cobrador
order by 2 desc";
    /*$sql6 = "SELECT * FROM
(select * from
(select aa.cobrador,count(*) T,TRUNC(SYSDATE, 'MM') primerdia,f_fechus from 
(select 
       t.cobrador as cobrador,
       x.mae_key
from credmae x, credmae_tasa t where x.mae_fecanc between (select TRUNC(SYSDATE, 'MM') as PRIMER_DIA_DEL_MES from dual) and f_fechus and x.mae_cancel ='1'
and x.mae_key = t.mae_key) aa
group by aa.cobrador
order by 2 desc)z where cobrador in(select usu from negoserv.gestor_grupo t where t.estado='1'))Z ORDER BY T DESC";*/

	$sql7 = "SELECT * FROM
(select * from
(select aa.cobrador,count(*) T,TRUNC(SYSDATE, 'MM') primerdia,f_fechus from 
(select 
       t.cobrador as cobrador,
       x.mae_key
from credmae x, credmae_tasa t where x.mae_fecanc between (select TRUNC(SYSDATE, 'MM') as PRIMER_DIA_DEL_MES from dual) and f_fechus and x.mae_cancel ='1'
and x.mae_key = t.mae_key) aa
group by aa.cobrador
order by 2 desc)z where cobrador in(select usu from negoserv.gestor_grupo t where t.estado='3'))Z ORDER BY T DESC";

	$sql20="select cobrador,sum(total_cobrado) monto,f_dia_habil,negoserv.pkg_rdv.f_cobro_total_cobrado suma,(select SUBSTR(u.user_name, 1, INSTR(u.user_name, ' ') - 1) from negoserv.usuarios u where u.user_key = cobrador)nombre  from
(select * from
(select substr(c.mov_key,1,11) as operacion,
  sum(c.mov_capita+c.mov_intere+c.mov_morato+c.mov_actos+c.mov_notifi+c.mov_puni+c.mov_gastos_administrativos+c.mov_honorarios) as total_cobrado from negoserv.credmovi c where c.mov_fecha = f_fechus and c.mov_ahorro !='D' group by substr(c.mov_key,1,11))a
  left join
  (select mae_key,cobrador from negoserv.credmae_tasa)b
  on a.operacion=b.mae_key)a where a.cobrador in (select usu from negoserv.gestor_grupo g where g.supervisor='HDV') group by cobrador order by monto desc";

	$sql21="select  cobrador,sum(total_cobrado)cobro,
	(select SUBSTR(u.user_name, 1, INSTR(u.user_name, ' ') - 1) from negoserv.usuarios u where u.user_key = cobrador)nombre from
(select cobrador,total_cobrado from
(select substr(c.mov_key,1,11) as operacion,
  sum(c.mov_capita+c.mov_intere+c.mov_morato+c.mov_actos+c.mov_notifi+c.mov_puni+c.mov_gastos_administrativos+c.mov_honorarios) as total_cobrado from negoserv.credmovi c where c.mov_fecha = f_fechus group by substr(c.mov_key,1,11))a
  left join
  (select mae_key,cobrador from negoserv.credmae_tasa)b
  on a.operacion=b.mae_key
  union all
select cobrador,cobro from
(select h.his_key,
       case  when h.his_moneda='PYG' then
  sum(h.his_capita)+sum(h.his_intere)+sum(h.his_morato)+sum(h.his_actos)+sum(h.his_puni)+sum(h.his_noti)+sum(h.his_honorarios)+sum(h.his_gastos_administrativos)
       when h.his_moneda='USD' then
         (sum(h.his_capita)+sum(h.his_intere)+sum(h.his_morato)+sum(h.his_actos)+sum(h.his_puni)+sum(h.his_noti)+sum(h.his_honorarios)+sum(h.his_gastos_administrativos))*(select coti_compra from negoserv.cotizaciones co where co.coti_key='01') end as cobro
   from negoserv.credhist  h where h.his_revers != 1 and h.his_viadi != 'D'
and trunc(h.his_fecha) between trunc(sysdate, 'mm') and trunc(last_day(sysdate)) group by h.his_key, h.his_fecha,his_moneda)a
left join
  (select mae_key,cobrador from negoserv.credmae_tasa)b
  on a.his_key=b.mae_key)a where cobrador in (select usu from negoserv.gestor_grupo g where g.supervisor='HDV') group by cobrador order by cobro desc";

$recaudacion = "select  cobrador gestor,sum(total_cobrado)total,(select SUBSTR(u.user_name, 1, INSTR(u.user_name, ' ') - 1) from negoserv.usuarios u where u.user_key = cobrador)nombre from
(select cobrador,total_cobrado from
(select substr(c.mov_key,1,11) as operacion,
  sum(c.mov_capita+c.mov_intere+c.mov_morato+c.mov_actos+c.mov_notifi+c.mov_puni+c.mov_gastos_administrativos+c.mov_honorarios) as total_cobrado from negoserv.credmovi c where c.mov_fecha = f_fechus group by substr(c.mov_key,1,11))a
  left join
  (select mae_key,cobrador from negoserv.credmae_tasa)b
  on a.operacion=b.mae_key
  union all
select cobrador,cobro from
(select h.his_key,
       case  when h.his_moneda='PYG' then
  sum(h.his_capita)+sum(h.his_intere)+sum(h.his_morato)+sum(h.his_actos)+sum(h.his_puni)+sum(h.his_noti)+sum(h.his_honorarios)+sum(h.his_gastos_administrativos)
       when h.his_moneda='USD' then
         (sum(h.his_capita)+sum(h.his_intere)+sum(h.his_morato)+sum(h.his_actos)+sum(h.his_puni)+sum(h.his_noti)+sum(h.his_honorarios)+sum(h.his_gastos_administrativos))*(select coti_compra from negoserv.cotizaciones co where co.coti_key='01') end as cobro
   from negoserv.credhist  h where h.his_revers != 1 and h.his_viadi != 'D'
and trunc(h.his_fecha) between trunc(sysdate, 'mm') and trunc(last_day(sysdate)) group by h.his_key, h.his_fecha,his_moneda)a
left join
  (select mae_key,cobrador from negoserv.credmae_tasa)b
  on a.his_key=b.mae_key)a where cobrador in (select usu from negoserv.gestor_grupo g where g.supervisor='HDV') group by cobrador order by total desc
";

$cumples="SELECT TO_CHAR(sysdate, 'MM') From Dual";


?>
</body>
</html>