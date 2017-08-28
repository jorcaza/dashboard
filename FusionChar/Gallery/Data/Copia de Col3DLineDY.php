<?php 
$idindica=$_GET['var1'];
$año=date(Y);
$mes = date("n")-1;
if ($mes==0)
{$mes=12;}
$año = '20'.date("y");
if ($mes==12)
{$año=$año-1;}
$conectID = odbc_connect("intranet2","intranet2" ,"intranet2");
if (!$conectID)	{exit("<strong>Ocurrio un error tratando de conectarse con la base de datos.</strong>");}	
$sql1="select iduf from ufmedicion where idvariable=$idindica"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$iduf=odbc_result($result1,1);
$sql1="select nomuf from ufuncionales where iduf=$iduf"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$nomuf=odbc_result($result1,1);
$sql1="select unid, rangmax, nomindi from ufmedicion where idvariable=$idindica"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$unid=odbc_result($result1,1);
$rango=odbc_result($result1,2);
$indicador=odbc_result($result1,3);
//enero
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=1 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=1 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$enero=odbc_result($result1,1);
}	
else 
{
	$enero=0;
}
//febrero
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=2 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=2 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$febrero=odbc_result($result1,1);
}	
else 
{
	$febrero=0;
}
//marzo
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=3 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=3 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$marzo=odbc_result($result1,1);
}	
else 
{
	$marzo=0;
}
//abril
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=4 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=4 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$abril=odbc_result($result1,1);
}	
else 
{
	$abril=0;
}
//mayo
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=5 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=5 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$mayo=odbc_result($result1,1);
}	
else 
{
	$mayo=0;
}
//junio
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=6 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=6 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$junio=odbc_result($result1,1);
}	
else 
{
	$junio=0;
}
//julio
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=7 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=7 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$julio=odbc_result($result1,1);
}	
else 
{
	$julio=0;
}
//agosto
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=8 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=8 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$agosto=odbc_result($result1,1);
}	
else 
{
	$agosto=0;
}
//septiembre
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=9 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=9 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$septiembre=odbc_result($result1,1);
}	
else 
{
	$septiembre=0;
}
//octubre
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=10 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=10 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$octubre=odbc_result($result1,1);
}	
else 
{
	$octubre=0;
}
//noviembre
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=11 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=11 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$noviembre=odbc_result($result1,1);
}	
else 
{
	$noviembre=0;
}
//diciembre
$sql1="select count(valor) from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=12 and año=$año"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$cant=odbc_result($result1,1);
if($cant > 0)
{
	$sql1="select valor from ufvalindi where iduf=$iduf and idindica=$idindica and tipo=3 and mes=12 and año=$año"; 
	$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
	$diciembre=odbc_result($result1,1);
}	
else 
{
	$diciembre=0;
}
?>
<graph caption='' PYAxisName='<?php echo $unid; ?>' SYAxisName='Rango Maximo'
 numberPrefix='' showvalues='1'  numDivLines='6' formatNumberScale='0' decimalPrecision='2'
anchorSides='10' anchorRadius='5' anchorBorderColor='009900'>
<categories>
<category name='Ene' />
<category name='Feb' />
<category name='Mar' />
<category name='Abr' />
<category name='May' />
<category name='Jun' />
<category name='Jul' />
<category name='Ago' />
<category name='Sep' />
<category name='Oct' />
<category name='Nov' />
<category name='Dic' />
</categories>
<dataset seriesName='' color='1A50B8' showValues='1' >
<set value='<?php echo $enero ?>' color='8BBA00'/> 
<set value='<?php echo $febrero ?>' color='F6BD0F' /> 
<set value='<?php echo $marzo ?>' color='008ED6' /> 
<set value='<?php echo $abril ?>' color='8BBA00' /> 
<set value='<?php echo $mayo ?>' color='F6BD0F'/> 
<set value='<?php echo $junio ?>' color='008ED6'/> 
<set value='<?php echo $julio ?>' color='8BBA00' /> 
<set value='<?php echo $agosto ?>' color='F6BD0F'/> 
<set value='<?php echo $septiembre ?>' color='008ED6' /> 
<set value='<?php echo $octubre ?>' color='8BBA00'/> 
<set value='<?php echo $noviembre ?>' color='F6BD0F'/> 
<set value='<?php echo $diciembre ?>' color='008ED6'/> 
</dataset>
<dataset seriesName='' color='FFFF00' showValues='0' parentYAxis='S'>
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
<set value='<?php echo $rango; ?>' />
</dataset>
</graph>