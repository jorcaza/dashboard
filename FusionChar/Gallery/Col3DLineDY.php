<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cl�nica los Rosales S.A</title>
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
body {
    padding-top: 40px;
    padding-bottom: 40px;
    height: 100%;
    background-image: url('http://intranet:81/intranet/siinfo/interconsultas/images/logo-bg.png');
    background-repeat: no-repeat;
    background-size: 70%;
    background-attachment: fixed;
    background-position: 0% 100%;
  background-color: #FFF;
}



</style>
</head>
<body>
<p>
<?php 
$idvariable=$_GET['var2'];
 $a�o=$_GET['var3'];
$conectID = odbc_connect("intranet2","intranet2" ,"intranet2");
if (!$conectID)	{exit("<strong>Ocurrio un error tratando de conectarse con la base de datos.</strong>");}	
$sql1="select nomindi, unid from ufmedicion where idvariable=$idvariable"; 
$result1=odbc_exec($conectID,$sql1)or die(exit("Error en odbc_exec"));
$iduf=odbc_result($result1,1);
$unid=odbc_result($result1,2);
?>
</p>
<table width="840" border="0" align="center">
  <tr>
    <td width="193"><img src="http://intranet:81/intranet/siinfo/RESOURCES/images/logoclinica2.png" width="193" height="71"></td>
    <td><div align="center" class="Estilo2"><span class="Estilo3"><?php echo $iduf.' ('.$unid.')'.' - '.$a�o; ?>
      </span>
    </div>
    <div align="center" class="Estilo1"></div></td>
  </tr>
</table>
<table width="98%" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts.
            
</div>
    <script type="text/javascript">
		   var chart = new FusionCharts("../Charts/FCF_MSColumn3D.swf", "ChartId", "700", "350");
		   chart.setDataURL("Data/Col3DLineDY.php?var1=<?php echo $idvariable.$a�o; ?>&var2=<?php echo $a�o; ?>");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr>
  <tr>
    <td valign="top" class="text" align="center">&nbsp;</td>
  </tr>
  <tr> 
    <td valign="top" class="text" align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
