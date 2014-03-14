<?php
	
//. Crear conexión a la Base de Datos
$conexion = mysql_connect("localhost","root","");
if (!$conexion) {
die("Fallo la conexión a la Base de Datos: " . mysql_error());
}
class devices{
public $de_id;
public $de_us_id;
public $de_status;

 

public function Insertar_devices(){
//. Seleccionar la Base de Datos a utilizar
$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
if (!$seleccionar_bd) {
die("Fallo la selección de la Base de Datos: " . mysql_error());
}
//. Tomar los campos provenientes del Formulario

$de_id = $_POST['id_form'];
$de_us_id= $_POST['de_us_form'];
$de_status = $_POST['status_form'];

// Insertar campos en la Base de Datos 
$insertar = mysql_query("INSERT INTO devices (de_id, de_us_id,de_status)
VALUES ('{$de_id}', '{$de_us_id}',{$de_status}'", $conexion);


if (!$insertar) {
die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}
//. Cerrar conexión a la Base de Datos
mysql_close($conexion);
}

	public function Eliminar_devices(){
		$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
	if (!$seleccionar_bd) {
	die("Fallo la selección de la Base de Datos: " . mysql_error());
	}
		// creamos la consulta
	// que eliminara el registro
	// que viene via $_POST
	$id_eliminar = $_POST['$de_id'];
	$sqlEliminar = mysql_query("DELETE FROM devices WHERE de_id = $de_id", $conexion) or die(mysql_error());
	// enviamos un mensage de exito
	$mensaje =  "El registro a sido eliminado";
	// si no ha sido enviado el formulario aun
	// recogemos el ID
	// del registro a eliminar
	// via $_GET
	
	$sql = mysql_query("SELECT * FROM devices	WHERE de_id = $de_id", $conexion) or die(mysql_error());
	$row = mysql_fetch_array($sql);
	// advertimos
	$mensaje =  "¿Está seguro que quiere eliminar el usuario?";
	
	mysql_close($conexion);
	}//cierra metodo Elimianar
	
				public function Buscar_devices(){
					$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
						if (!$seleccionar_bd) {
						die("Fallo la selección de la Base de Datos: " . mysql_error());
						}
					
				$sql= mysql_query("SELECT * FROM devices WHERE de_id=$de_id", $conexion) or die(mysql_error());
				
				}
				public function Actualizar_devices(){
				$sql=mysql_query("UPDATE devices SET de_id='$de_id', de_us_id= '$de_us_id', de_estatus='$de_estatus' where de_id='$de_id'", $conexion) or die(mysql_error());
				$Mensaje="Registro actualizado correctamente";
				
				mysql_close($conexion);
				
							}//cierra metodo Actualizar
				
}// cierra clase usuario
?>