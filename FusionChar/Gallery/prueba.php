<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Clínica los Rosales S.A</title>
<link rel="stylesheet" href="../Contents/Style.css" type="text/css" />
<script language="JavaScript" src="../JSClass/FusionCharts.js"></script>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.Estilo2 {font-size: 14px}
.Estilo3 {font-weight: bold; font-family: Arial, Helvetica, sans-serif;}
-->
</style>
</head>
<body>
<p>
  <?php 
$conectID = odbc_connect("intranet2","intranet2" ,"intranet2");
if (!$conectID)	{exit("<strong>Ocurrio un error tratando de conectarse con la base de datos.</strong>");}	
/*$sql1="select nomindi from ufmedicion where idvariable=$idvariable"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$iduf=odbc_result($result1,1);*/
 ?></p>
<table width="98%" border="0" cellspacing="0" cellpadding="3" align="center">
<?php 
$resp= "select idvariable from ufmedicion where iduf=1 and activo=1 order by idvariable";
$result=odbc_exec($conectID,$resp)or die(exit("Error en odbc_exec"));
while(odbc_fetch_row($result))
 {
  $idvariable=odbc_result($result,1);
?>  
  <tr>
    <td valign="top" class="text" align="center">
    <?php    
$sql1="select nomindi from ufmedicion where idvariable=$idvariable"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$iduf=odbc_result($result1,1);
?></p>
<table width="840" border="0" align="center">
  <tr>
    <td width="193"><img src="logo_clinica.JPG" width="193" height="71"></td>
    <td><div align="center" class="Estilo2"><span class="Estilo3"><?php echo $iduf; ?>
      </span>
    </div>
    <div align="center" class="Estilo1"></div></td>
  </tr>
</table>
    </td>
  </tr>
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv<?php echo $idvariable; ?>" align="center">FusionCharts.</div>  
	<script type="text/javascript">
		   var chart = new FusionCharts("../Charts/FCF_MSColumn3D.swf", "ChartId", "800", "450");
		   chart.setDataURL("Data/Col3DLineDY.php?var1=<?php echo $idvariable; ?>");		   
		   chart.render("chartdiv<?php echo $idvariable; ?>");
    </script>    </td>
  </tr>
<?php }?>  
  <tr>
    <td valign="top" class="text" align="center">&nbsp;</td>
  </tr>
  <tr> 
    <td valign="top" class="text" align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
