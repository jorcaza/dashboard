
<?php
//$query="select cama,hisckey2,hiscsec,msreso,dospre from medidos1 where mpcodp='".$_POST['cod_banda']."' and hisckey2='1301974' and msposx='1'";
$bandera=$_POST['cod_ps']; 
if($bandera<>''){

if ($bandera==1){
?>
<style>
	body {

    background-image: url('http://intranet:81/intranet/siinfo/RESOURCES/images/logo-bg.png');
    background-repeat: no-repeat;
    background-size: 70%;
    background-attachment: fixed;
    background-position: 0% 100%;
 
}
</style>
<div class="col-md-8 col-md-offset-2">
<table class="table table-condensed table-striped">
<thead>
<tr>
<th>Mes</th>
<th>Año</th>
<th align="right">Procedimiento</th>

</tr>
</thead>
<tbody>
<?php 

$actual = date('m'."/".'y');
$actual2='01/'.$actual;

//$f1='01/'.$fech2.'
$conectID1 = odbc_connect("prueba5","prueba1" ,"123456");
$query="select sum(TFVaTp)PROCE,MONTH(TFFchI),year(TFFchI)
from tmpfac a inner join tmpfac1 b
on a.tfcedu = b.tfcedu
AND A.TMCTVING=B.TMCTVING
AND TFNITP NOT IN ('345','346','347')
AND B.TFEstaAnu1 <> 'S'
AND B.TFPTpoTrn <> 'H'
AND (tffchi < '$actual2')
--AND (tffchi >= '01/02/17' AND
--tffchi<= '27/02/17')
and tfNITP not like ('P%')
AND a.TFcedu not in ('89140998122101',
'89140998122201',
'89140998122202',
'89140998122203',
'89140998122301','123')
AND TFCCODPAB not in (80)
and tfmeni not like ('M%')
group by MONTH(TFFchI),year(TFFchI)
order by 3,2";
$result21=odbc_exec($conectID1,$query)or die(exit("Error en odbc_exec"));
$totalmesproc2=0;
?>


<?php while (odbc_fetch_row($result21)) { 
	//var_dump($valor);
    $valorpai=odbc_result($result21,1); //valor admisiones procedimientos abiertos
    //var_dump($valorpai);
	$valorpa=(int)$valorpai;
	$mes=odbc_result($result21,2);
	$ano=odbc_result($result21,3);
	

//admisiones procedimientos estancia
$querype="select sum(TFVaTp)proce2
from tmpfac a,tmpfac1 b,maeemp d, CAPBAS E, MAEPAB1 C
where a.tfcedu = b.tfcedu
and c.mpnumc = a.tfccodcam
AND A.TFCEDU=E.MPCEDU
AND B.TFCEDU=E.MPCEDU
AND A.TMCTVING=B.TMCTVING
AND B.TFEstaAnu1 <> 'S'
AND B.TFPTpoTrn <> 'H'
and MONTH(TFFchI)='$mes' and year(TFFchI)='$ano'
--AND (tffchi >= '01/02/17 00:00:00' AND
 	--tffchi<= '27/02/17 23:59:59')
and tfNITP not like ('P%')
and mennit=TFNITP
AND a.TFcedu not in ('89140998122101',
'89140998122201',
'89140998122202',
'89140998122203',
'89140998122301', '123')
AND TFNITP NOT IN ('345','346','347')
AND TFCCODPAB not in (80)";
$result22=odbc_exec($conectID1,$querype)or die(exit("Error en odbc_exec"));
$valorpei=odbc_result($result22,1); //valor admisiones procedimientos estancia
$valorpe=(int)$valorpei;

$totalmesproci=$valorpa-$valorpe; //valor admision abierta - admision con estancia (procedimientos)
$totalmesproc=number_format($totalmesproci,0,',','.');
$totalmesproc2=$totalmesproci+$totalmesproc2;
?>

<tr>
<td> 
       <?php

        switch ($mes) {
    case 1:
        echo "Enero";
        break;
    case 2:
        echo "Febrero";
        break;
	case 3:
        echo "Marzo";
        break;
    case 4:
        echo "Abril";
        break;
    case 5:
        echo "Mayo";
        break;
   case 6:
        echo "Junio";
        break;
    case 7:
        echo "Julio";
        break;
    case 8:
        echo "Agosto";
        break;
	case 9:
        echo "Septiembre";
        break;
    case 10:
        echo "Octubre";
        break;
    case 11:
        echo "Noviembre";
        break;
	case 12:
        echo "Diciembre";
        break;
}

        ?>
        

</td>
<td><?php echo $ano; ?></td>
<td align="right"><?php echo '$ '.$totalmesproc ?></td>

<?php } //termina consultas PROCEDIMIENTOS 

?>


</tr>
<tr class="danger">
<td colspan="2">Total Procedimientos</td>
<td align="right"><strong><?php echo '$ '.number_format($totalmesproc2,0,',','.'); ?></strong></td>
	

</tr>

</tbody>
</table>
</div>
<?php odbc_close($conectID1);
}
elseif ($bandera==2) //si elige suministros
{
	
 ?>

<div class="col-md-8 col-md-offset-2">
<table class="table table-condensed table-striped">
<thead>
<tr>
<th>Mes</th>
<th>Año</th>
<th align="right">Suministro</th>

</tr>
</thead>
<tbody>
<?php
//$query="select cama,hisckey2,hiscsec,msreso,dospre from medidos1 where mpcodp='".$_POST['cod_banda']."' and hisckey2='1301974' and msposx='1'";
$actual = date('m'."/".'y');
$actual2='01/'.$actual;

$conectID1 = odbc_connect("prueba5","prueba1" ,"123456");
$query="select sum(TFVaTs)SUMI,MONTH(TFFchI),year(TFFchI)
from tmpfac a,tmpfac2 b
where a.tfcedu = b.tfcedu
AND A.TMCTVING=B.TMCTVING
AND TFNITS NOT IN ('345','346','347')
AND B.TFEstaAnu2 <> 'S'
AND B.TFSTpoTrn <> 'H'
AND (tffchi < '$actual2')
--AND (tffchi >= '01/02/17' AND
--tffchi<= '27/02/17')
and tfNITS not like ('P%')
AND a.TFcedu not in ('89140998122101',
'89140998122201',
'89140998122202',
'89140998122203',
'89140998122301','123')
AND TFCCODPAB not in (80)
group by MONTH(TFFchI),year(TFFchI)
order by 3,2";
$result21=odbc_exec($conectID1,$query)or die(exit("Error en odbc_exec"));
$totalmessumi2=0;
?>


<?php while (odbc_fetch_row($result21)) { 
	//var_dump($valor);
    $valorpai=odbc_result($result21,1); //valor admisiones procedimientos abiertos
    //var_dump($valorpai);
	$valorpa=(int)$valorpai;
	$mes=odbc_result($result21,2);
	$ano=odbc_result($result21,3);

//admisiones procedimientos estancia
$querype="select sum(TFVaTs)SUMI,MONTH(TFFchI),year(TFFchI)
from tmpfac a,tmpfac2 b,maeemp d, CAPBAS E, MAEPAB1 C
where a.tfcedu = b.tfcedu
and c.mpnumc = a.tfccodcam
AND A.TFCEDU=E.MPCEDU
AND B.TFCEDU=E.MPCEDU
AND A.TMCTVING=B.TMCTVING
AND B.TFEstaAnu2 <> 'S'
AND B.TFSTpoTrn <> 'H'
and MONTH(TFFchI)='$mes' and year(TFFchI)='$ano'
--AND (tffchi >= '01/02/17' AND
--tffchi<= '27/02/17')
and tfNITS not like ('P%')
and mennit=tfnits
AND a.TFcedu not in ('89140998122101',
'89140998122201',
'89140998122202',
'89140998122203',
'89140998122301','123')
AND TFNITS NOT IN ('345','346','347')
AND TFCCODPAB not in (80)
group by MONTH(TFFchI),year(TFFchI)
order by 3,2";
$result22=odbc_exec($conectID1,$querype)or die(exit("Error en odbc_exec"));
$valorpei=odbc_result($result22,1); //valor admisiones procedimientos estancia
$valorpe=(int)$valorpei;

$totalmesproci=$valorpa-$valorpe; //valor admision abierta - admision con estancia (procedimientos)
$totalmesproc=number_format($totalmesproci,0,',','.');
$totalmessumi2=$totalmesproci+$totalmessumi2;


?>

<tr>

<td> 
       <?php

        switch ($mes) {
    case 1:
        echo "Enero";
        break;
    case 2:
        echo "Febrero";
        break;
	case 3:
        echo "Marzo";
        break;
    case 4:
        echo "Abril";
        break;
    case 5:
        echo "Mayo";
        break;
   case 6:
        echo "Junio";
        break;
    case 7:
        echo "Julio";
        break;
    case 8:
        echo "Agosto";
        break;
	case 9:
        echo "Septiembre";
        break;
    case 10:
        echo "Octubre";
        break;
    case 11:
        echo "Noviembre";
        break;
	case 12:
        echo "Diciembre";
        break;
}

        ?>
        

</td>
<td><?php echo $ano; ?></td>
<td align="right"><?php echo '$ '.$totalmesproc ?></td>

<?php } //termina consultas SUMINISTROS

?>


</tr>
<tr class="info">

<td colspan="2">Total Suministros</td>
<td align="right"><strong><?php echo '$ '.number_format($totalmessumi2,0,',','.'); ?></strong></td>
	

</tr>

</tbody>
</table>
</div>
<?php odbc_close($conectID1);} }

?>
