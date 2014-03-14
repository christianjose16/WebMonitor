<?php
	
//. Crear conexión a la Base de Datos
$conexion = mysql_connect("localhost","root","");
if (!$conexion) {
die("Fallo la conexión a la Base de Datos: " . mysql_error());
}
class Users{
public $us_id;
public $us_f_Name;
public $us_S_Name;
public $us_f_Iname;
public $us_s_Iname;
public $us_Type;
public $us_pass;
public $us_status;
public $us_email;
 

public function InsertarUsers(){
//. Seleccionar la Base de Datos a utilizar
$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
if (!$seleccionar_bd) {
die("Fallo la selección de la Base de Datos: " . mysql_error());
}
//. Tomar los campos provenientes del Formulario

$us_id = $_POST['id_form'];
$us_f_Name= $_POST['F_Name_form'];
$us_s_Name= $_POST['s_Name_form'];
$us_f_Iname = $_POST['f_iName_form'];
$us_s_Iname = $_POST['s_iName_form'];
$us_Type = $_POST['Type_form'];
$us_pass= $_POST['pass_form'];
$us_status = $_POST['status_form'];
$us_email = $_POST['email_form'];
// Insertar campos en la Base de Datos 
$insertar = mysql_query("INSERT INTO users (us_id, us_f_name, us_s_name,us_f_Iname,us_s_Iname,us_type,us_pass,us_status,us_email)
VALUES ('{$us_id}', '{$us_f_name}', '{$us_s_name}','{$us_f_Iname}','{$us_s_Iname}','{$us_type}','{$us_pass}','{$us_status}','{$us_email}'", $conexion);


if (!$insertar) {
die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
}
//. Cerrar conexión a la Base de Datos
mysql_close($conexion);
}

	public function Eliminarusers(){
		$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
	if (!$seleccionar_bd) {
	die("Fallo la selección de la Base de Datos: " . mysql_error());
	}
		// creamos la consulta
	// que eliminara el registro
	// que viene via $_POST
	$id_eliminar = $_POST['$us_ud'];
	$sqlEliminar = mysql_query("DELETE FROM users WHERE us_id = $us_id", $conexion) or die(mysql_error());
	// enviamos un mensage de exito
	$mensaje =  "El registro a sido eliminado";
	// si no ha sido enviado el formulario aun
	// recogemos el ID
	// del registro a eliminar
	// via $_GET
	
	$sql = mysql_query("SELECT * FROM users	WHERE us_id = $us_id", $conexion) or die(mysql_error());
	$row = mysql_fetch_array($sql);
	// advertimos
	$mensaje =  "¿Está seguro que quiere eliminar el usuario?";
	
	mysql_close($conexion);
	}//cierra metodo Elimianar
	
				public function Buscar_Users(){
					$seleccionar_bd = mysql_select_db("monitor de servicios", $conexion);
						if (!$seleccionar_bd) {
						die("Fallo la selección de la Base de Datos: " . mysql_error());
						}
					
				$sql= mysql_query("SELECT * FROM users WHERE us_id=$Us_Id", $conexion) or die(mysql_error());
				
				}
				public function Actualizar_users(){
				$sql=mysql_query("UPDATE users SET us_id='$us_id', us_f_name= '$us_f_name', us_s_name= '$us_s_name',us_f_Iname=''$us_f_Iname,us_s_Iname='$us_s_Iname',us_type='$us_type',us_pass='$us_pass',us_status=' $us_status',us_email='$us_email' where us_id='$us_id'", $conexion) or die(mysql_error());
				$Mensaje="Registro actualizado correctamente";
				
				mysql_close($conexion);
				
							}//cierra metodo Buscar
				
}// cierra clase users
?>