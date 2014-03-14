<?php
	
//. Crear conexión a la Base de Datos
$conexion = mysql_connect("localhost","root","");
if (!$conexion) {
die("Fallo la conexión a la Base de Datos: " . mysql_error());
}
class logs{
public $lo_fecha;
public $lo_tp_id;
public $lo_us_id;
public $lo_de_id;

public function Insertarlog(){
//. Seleccionar la Base de Datos a utilizar
$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
if (!$seleccionar_bd) {
die("Fallo la selección de la Base de Datos: " . mysql_error());
}
//. Tomar los campos provenientes del Formulario

$lo_fecha = $_POST['fecha_form'];
$lo_tp_id= $_POST['tp_id_form'];
$lo_us_id= $_POST['us_id_form'];
$lo_de_id = $_POST['de_id_form'];


// Insertar campos en la Base de Datos 
$insertar = mysql_query("INSERT INTO users (lo_fecha, lo_tp_id,lo_us_id)
VALUES ('{$lo_fecha}', '{$lo_tp_id}', '{$lo_us_id}','{$lo_de_id}'", $conexion);

if (!$insertar) {
die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}
//. Cerrar conexión a la Base de Datos
mysql_close($conexion);
}

	public function Eliminarlogs(){
		$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
	if (!$seleccionar_bd) {
	die("Fallo la selección de la Base de Datos: " . mysql_error());
	}
		// creamos la consulta
	// que eliminara el registro
	// que viene via $_POST
	$id_eliminar = $_POST['$lo_tp_id'];
	$sqlEliminar = mysql_query("DELETE FROM log WHERE lo_tp_id = $lo_tp_id", $conexion) or die(mysql_error());
	// enviamos un mensage de exito
	$mensaje =  "El registro a sido eliminado";
	// si no ha sido enviado el formulario aun
	// recogemos el ID
	// del registro a eliminar
	// via $_GET
	
	$sql = mysql_query("SELECT * FROM log	WHERE lo_tp_id = $lo_tp_id", $conexion) or die(mysql_error());
	$row = mysql_fetch_array($sql);
	// advertimos
	$mensaje =  "¿Está seguro que quiere eliminar el usuario?";
	
	mysql_close($conexion);
	}//cierra metodo Elimianar
	
				public function Buscar_log(){
					$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
						if (!$seleccionar_bd) {
						die("Fallo la selección de la Base de Datos: " . mysql_error());
						}
					
				$sql= mysql_query("SELECT * FROM log WHERE lo_fecha=$lo_fecha", $conexion) or die(mysql_error());
				
				}
				public function Actualizar_log(){
				$sql=mysql_query("UPDATE log SET lo_fecha='$lo_fecha', lo_tp_id= '$lo_tp_id', lo_us_id= '$lo_de_id' where lo_tp_id='$lo_tp_id'", $conexion) or die(mysql_error());
				$Mensaje="Registro actualizado correctamente";
				
				mysql_close($conexion);
				
							}//cierra metodo Actualizar
				
}// cierra clase log
?>