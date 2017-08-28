<?php 

$conectID = odbc_connect("intranet2","intranet2" ,"intranet2");


$sql1="SELECT  IDPABELLON,NOMPABELLON, COUNT(IDEST)EST FROM DIAS_CAMA_OCUPADO
WHERE IDEST IN (2,7,8,9,10)
AND FECHA>='01/06/2017 00:00:00' AND FECHA<'01/07/2017 00:00:00'
--AND IDPABELLON='1'
GROUP BY IDPABELLON, NOMPABELLON
ORDER BY 1"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));

 ?>





<graph showNames='1'  decimalPrecision='0' formatnumberscale="0">
<?php    while(odbc_fetch_row($result1))
          {
			$item3=odbc_result($result1,2);
			$item4=odbc_result($result1,3); ?>
   <set name='<?php echo $item3; ?>' value='<?php echo $item4; ?>'/>
	

    <?php } ?>
</graph>

