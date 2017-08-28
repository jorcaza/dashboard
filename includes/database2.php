<?php

class conexion
{

//declaramos las variables privadas de entrada al  servidor

  private $host="intranet2";
  private $usuario="intranet2";
  private $clave="intranet2";
#====================================================================#
/*metodo para conectar a la base de datos*/

public function conectar()
{
   if(!isset($this->conexion)){
    $this->conexion = (odbc_connect($this->host, $this->usuario,$this->clave)) or die(odbc_error() );
}
}
#====================================================================#
//metodo para realizar consultas
public function consultare($var)
{
$resultado= odbc_exec($this->conexion,$var);
if(!$resultado){
  echo 'odbc Error : ' . odbc_error();
  exit;
  }
  return $resultado;

}

#========================================================================#
  /* METODO PARA CERRAR LA CONEXION A LA BASE DE DATOS*/
 public function desconectar()
 {
  odbc_close( $this->conexion );
  echo 'Conexion a ['.$this->name.'] : Terminado ';
 }

}

//
class Usuario extends conexion
{

function __construct()
{
  $this->conectar();
}

function consul_param()
{

$busc008=$this->consultare("SELECT COUNT(idemp) AS total FROM maeempleado");
$row008=odbc_fetch_array($busc008);
return $row008;
}

}


 ?>