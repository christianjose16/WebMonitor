<?php
	
//. Crear conexión a la Base de Datos
$conexion = mysql_connect("localhost","root","");
if (!$conexion) {
die("Fallo la conexión a la Base de Datos: " . mysql_error());
}
class targetpoint{
public $tp_id;
public $tp_url;
public $tp_type;
public $tp_status;
public $tp_last_request;
public $tp_last_result;

public function Insertar_targetpoint(){
//. Seleccionar la Base de Datos a utilizar
$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
if (!$seleccionar_bd) {
die("Fallo la selección de la Base de Datos: " . mysql_error());
}
//. Tomar los campos provenientes del Formulario
 $tp_id= $_POST['id_form'];
 $tp_url= $_POST['url_form'];
 $tp_type= $_POST['type_form'];
 $tp_status= $_POST['status_form'];
 $tp_last_request= $_POST['lastrequest_form'];
 $tp_last_result= $_POST['lastresult_form'];


// Insertar campos en la Base de Datos 
$insertar = mysql_query("INSERT INTO targetpoint (tp_id, tp_url,tp_type,tp_status,tp_last_request,tp_last_result)
VALUES ('{$tp_id}', '{$$tp_url}', '{$tp_type}','{ $tp_status}','{$tp_last_request}''{$tp_last_result}'", $conexion);

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
	$id_eliminar = $_POST['$tp_id'];
	$sqlEliminar = mysql_query("DELETE FROM targetpoint WHERE tp_id = $tp_id", $conexion) or die(mysql_error());
	// enviamos un mensage de exito
	$mensaje =  "El registro a sido eliminado";
	// si no ha sido enviado el formulario aun
	// recogemos el ID
	// del registro a eliminar
	// via $_GET
	
	$sql = mysql_query("SELECT * FROM tragetpoint WHERE tp_id = $tp_id", $conexion) or die(mysql_error());
	$row = mysql_fetch_array($sql);
	// advertimos
	$mensaje =  "¿Está seguro que quiere eliminar el usuario?";
	
	mysql_close($conexion);
	}//cierra metodo Elimianar
	
				public function Buscar_targetpoint(){
					$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
						if (!$seleccionar_bd) {
						die("Fallo la selección de la Base de Datos: " . mysql_error());
						}
					
				$sql= mysql_query("SELECT * FROM targetpoint WHERE tp_id=$tp_id", $conexion) or die(mysql_error());
				
				}
				public function Actualizar_targetpoint(){
				$sql=mysql_query("UPDATE targetpoint SET tp_id='$tp_id',tp_url= '$tp_url', tp_type= '$tp_type',tp_status= '$tp_status',tp_last_request= '$tp_last_request',tp_last_result= '$tp_last_result' where tp_id='$tp_id'", $conexion) or die(mysql_error());
				$Mensaje="Registro actualizado correctamente";
				
				mysql_close($conexion);
				
							}//cierra metodo Actualizar		
}// cierra clase targetpoint
?>