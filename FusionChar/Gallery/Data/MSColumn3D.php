<graph xaxisname='Continent' yaxisname='Export' hovercapbg='DEDEBE' hovercapborder='889E6D' rotateNames='0' yAxisMaxValue='100' numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' decimalPrecision='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC' caption='Global Export' subcaption='In Millions Tonnes per annum pr Hectare' >

<?php

$actual = date('m'."/".'y');
$actual2='01/'.$actual;

//$f1='01/'.$fech2.'
$conectID1 = odbc_connect("prueba5","prueba1" ,"123456");
$query="select sum(TFVaTp)PROCE,year(TFFchI)
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
group by year(TFFchI)
order by 2";
$result21=odbc_exec($conectID1,$query)or die(exit("Error en odbc_exec"));
$totalmesproc2=0;
?>


<?php while (odbc_fetch_row($result21)) { 
   //var_dump($valor);
    $valorpai=odbc_result($result21,1); //valor admisiones procedimientos abiertos
    //var_dump($valorpai);
   $valorpa=(int)$valorpai;
      $ano=odbc_result($result21,2);
  
?>
  <categories font='Arial' fontSize='11' fontColor='000000'>
      <category name='<?php echo $ano ?>'/>

   </categories>
<?php  
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
and year(TFFchI)='$ano'
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

  <dataset seriesname='Rice' color='249f9b'>
      <set value='$totalmesproc2' />
   </dataset>


<?php } //termina consultas PROCEDIMIENTOS 

?>


 
 

</graph>