<?php
//Establece el error de validación como flag
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $cedula_persona = mysqli_real_escape_string($con, $_POST['cedula_persona']);
	$nombre         = mysqli_real_escape_string($con, $_POST['nombre']);
	$apellido       = mysqli_real_escape_string($con, $_POST['apellido']);
	$correo         = mysqli_real_escape_string($con, $_POST['correo']);
	$direccion      = mysqli_real_escape_string($con, $_POST['direccion']);
	$telefono       = mysqli_real_escape_string($con, $_POST['telefono']);
	$usuario        = mysqli_real_escape_string($con, $_POST['usuario']);
	$clave          = mysqli_real_escape_string($con, $_POST['clave']);
	
	// Nombre sólo puede contener caracteres alfabéticos y espacio (esto varia sgun requerimiento)
	// if (!preg_match("/^[a-zA-Z ]+$/",$usuario)) {
	// 	$error = true;
	// 	$usuario_error = "El nombre debe contener solo caracteres del alfabeto y espacio.";
	// }
    // if(strlen($cedula_persona) < 10) {
	// 	$error                  = true;
	// 	$cedula_persona_error   = "La cedula debe tener un mínimo de 10 caracteres.";
	// }
	// if(strlen($clave) < 1) {
	// 	$error = true;
	// 	$clave_error = "La contraseña debe tener un mínimo de 6 caracteres.";
	// }

    $query      = mysqli_query($con, "INSERT INTO persona(cedula, nombre, apellido, correo, direccion, telefono) VALUES('" . $cedula_persona . "', '" . $nombre . "', '" . $apellido . "', '" . $correo . "', '" . $direccion . "', '" . $telefono . "' )");
    $query2     = mysqli_query($con, "INSERT INTO empleado(cedula_persona, usuario, clave, estado, cargo_id) VALUES('" . $cedula_persona . "', '" . $usuario . "', '" . $clave . "', '1', '2' )");

	//if (!$error) {
		if($query) {
			//$successmsg = "¡Registrado exitosamente! <a href='login.php'>Click here to Login</a>";
            $query2;
            $successmsg = '
			  <div class="alert alert-success alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>EXITO!</strong> ¡Registrado exitosamente!
			  </div>
			  ';
		} else {
			//$errormsg = "Error de registro. Vuelve a intentarlo más tarde.";
			$errormsg = '
			<div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> Verifique sus datos.
			</div>
			';
		}
	//}
}
?>
<!-- Notificaciones -->
<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
<!-- EO / Notificaciones -->

<form class="col-sm-12" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
    <div class="col-sm-6 form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese Apellido" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Cédula</label>
        <input type="number" name="cedula_persona" id="cedula_persona" class="form-control" placeholder="Ingrese Número de Cédula" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Correo</label>
        <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingrese Correo Electrónico" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese Dirección" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Teléfono</label>
        <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Ingrese Teléfono" value="">
    </div>
    
    <div class="col-sm-6 form-group">
        <label>Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese Nombre Usuario" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Contraseña</label>
        <input type="password" name="clave" id="clave" class="form-control" placeholder="Ingrese Contraseña" value="">
    </div>

    
    <!-- Botonera -->
    <div class="col-sm-12 reset-button">
        <a href="#" class="btn btn-warning">Limpiar</a>
        <input type="submit" name="signup" id="signup" value="Guardar" class="btn btn-success" />
    </div>
    <!-- EO / Botonera -->
</form>
                           