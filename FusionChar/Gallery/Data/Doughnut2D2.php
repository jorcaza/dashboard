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
AND (tffchi < '01/07/2017')

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

?>





<graph showNames='1'  showLegend= '0'  decimalPrecision='0'>
<?php    while (odbc_fetch_row($result21)) { 
	//var_dump($valor);
    $valorpai=odbc_result($result21,1); //valor admisiones procedimientos abiertos
    //var_dump($valorpai);
	$valorpa=(int)$valorpai;
	$mes=odbc_result($result21,2);
	$ano=odbc_result($result21,3);
	$totalmesproc2=odbc_result($result21,1);
?>


   <set name='<?php

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

        ?>' value='<?php echo $totalmesproc2; ?>'/>
	

    <?php } ?>
</graph>

