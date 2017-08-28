<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script>
    function mostrarInfo(cod){
        if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }else{// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById("datos").innerHTML=xmlhttp.responseText;
            }else{ 
                document.getElementById("datos").innerHTML='Cargando...';
            }
        }
        xmlhttp.open("POST","proceso.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("cod_ps="+cod);
    }
</script>

<style>


#mdialTamanio{
  width: 80% !important;
}

</style>

</head>
<body>
<div class="container">

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="mdialTamanio" >
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Total por facturar Meses Anteriores</h4>

            </div>

            <div class="modal-body">




<select onchange="mostrarInfo(this.value)" class="form-control">
<option value="">Seleccionar</option>
<option value="1">Procedimientos</option>
<option value="2">Suministros</option>
</select>
<div id="datos"></div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</div>
</body>
</html>