<script>
function nombremes($mes){
 setlocale(LC_TIME, 'spanish');  
 $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
 return $nombre;
 </script>
<graph xAxisName='Products' yAxisName='Sales' caption='Cumulative Sales' subCaption='( 2004 to 2006 )' 
 decimalPrecision='0' rotateNames='1' numDivLines='3' numberPrefix='$' showValues='0' formatNumberScale='0'>
<categories>


}
<?php 
$actual = date('m'."/".'y');
$actual2='01/'.$actual;

//$f1='01/'.$fech2.'
$conectID1 = odbc_connect("prueba5","prueba1" ,"123456");
$query="select sum(TFVaTp)PROCE,DATENAME(month, TFFchI ) AS Mes,year(TFFchI)
from tmpfac a inner join tmpfac1 b
on a.tfcedu = b.tfcedu
AND A.TMCTVING=B.TMCTVING
AND TFNITP NOT IN ('345','346','347')
AND B.TFEstaAnu1 <> 'S'
AND B.TFPTpoTrn <> 'H'
AND (tffchi < '01/07/2017')
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
group by DATENAME(month, TFFchI ),year(TFFchI)
order by 3,2";
$result21=odbc_exec($conectID1,$query)or die(exit("Error en odbc_exec"));

?>


<?php while (odbc_fetch_row($result21)) { 
	//var_dump($valor);
    $valorpai=odbc_result($result21,1); //valor admisiones procedimientos abiertos
    //var_dump($valorpai);
	$valorpa=(int)$valorpai;
	$mes=odbc_result($result21,2);
	$ano=odbc_result($result21,3);
	
	
}
?>

<category name="<?php echo $ano; ?>" />
</categories>

	<dataset seriesName="<?php echo $mes; ?>" color='AFD8F8' showValues='0'>
		<set value="<?php echo $valorpa; ?>" />

	</dataset>

</graph>

 ?>



