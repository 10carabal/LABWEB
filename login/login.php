<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Para no mostrar errores visuales en la pagina
ini_set("display_errors", "on");

//iniciar protocolos de sesion
session_start();

//para que la hora y fecha sean las locales
//date_default_timezone_set("America/bogota");
//setlocale(LC_ALL,"es_ES");

//Pedir archivo que se encarga de manejar la conexion con la base de datos
require '../database.php';

oci_commit($conn);



$message = '';
//verificamos si no estan vacios los campos
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$usuario = $request->usuario;
$password = $request->password;


///var_dump($email);
//exit();
//$_POST = json_decode(file_get_contents(('php://input'), true));
if (!empty($usuario) && !empty($password)) {
	//Capturamos datos
	$idUsuario = ($usuario);

	$password = ($password);
	//$_SESSION["idUsuario"] = $_POST["usuario"];

	//echo ($idUsuario);
	//echo ($password);

	if (autenticacionLDAP($idUsuario, $password) == true) {
		//sql para tomar datos del perfil

		echo $message = "BIENVENIDOOOO";
		echo ($idUsuario);
		echo ($password);


		$sql1 = "
	 		select PERFIL_ID_PERFIL
			from perfil_has_usuario
			where USUARIO_IDUSUARIO = :id_usuario
	 ";

		$stid6 = oci_parse($conn, $sql1);

		//Guardamos las variables

		oci_bind_by_name($stid6, ':id_usuario', $idUsuario);

		oci_execute($stid6);

		//capturamos los datos del perfil
		while (($row = oci_fetch_array($stid6, OCI_BOTH)) != false) {
			$data[] = $_SESSION['user_perfil'] = $row[0];
			header('Content-Type: application/x-www-form-urlencoded');
			echo json_encode($data);
			//echo json_encode($idUsuario);
			//echo json_encode($password);


		}

		if (oci_execute($stid6) === false) {
			echo $message = "No se encontró un perfil asociado al usuario, intenta de nuevo o ponte en contacto con el administrador";
			oci_rollback($conn);

			session_destroy();
		}
	} else {
		echo $message = "No se encontró usuario y/o contraseña, intenta nuevamente";
	}
} else {
	echo $message = 'Por favor completar los datos para el inicio de sesión';
}



/**
 * Función que permite realizar la validación del usuario y contraseña en el directorio activo de la universidad
 * @param idUsuario - Número de identificación del usuario a validar.
 * @param password - Contraseña registrada en el sistema.
 * @return boolean Devuelve true si el usuario y contraseña corresponden, false en el caso contrario
 */
function autenticacionLDAP($idUsuario, $password)
{
	$ldap_dn = "cn=$idUsuario,ou=users,dc=usc,dc=edu,dc=co";
	$ldap_password = $password;
	$ldap_con = ldap_connect("172.16.96.54", 389);
	ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
	$resultado = @ldap_bind($ldap_con, $ldap_dn, $ldap_password);

	/* Parámetros de configuración LDAP pruebas:

LDAP_HOSTS=172.16.96.54
# LDAP_PORT=636
LDAP_PORT=389
LDAP_BASE_DN="ou=users,dc=usc,dc=edu,dc=co"
LDAP_USERNAME="cn=administrator,dc=usc,dc=edu,dc=co"
LDAP_LOGGING=false
LDAP_LOGIN=false
LDAP_AUTO_CONNECT=false
LDAP_LOGIN_FALLBACK=true
LDAP_PASSWORD_SYNC=true
LDAP_USER_ATTRIBUTE=cn
LDAP_ACCOUNT_SUFFIX=",ou=users,dc=usc,dc=edu,dc=co"
LDAP_ACCOUNT_PREFIX="cn="
LDAP_PASSWORD=test

 */
	return $resultado;
	//return true;
}