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
    
	$fecha_nacimiento = mysqli_real_escape_string($con, $_POST['fecha_nacimiento']);
	$sexo_id        = mysqli_real_escape_string($con, $_POST['sexo_id']);
    $cedula_padre   = mysqli_real_escape_string($con, $_POST['cedula_padre']);
    $nombre_padre   = mysqli_real_escape_string($con, $_POST['nombre_padre']);
    $cedula_madre   = mysqli_real_escape_string($con, $_POST['cedula_madre']);
    $nombre_madre   = mysqli_real_escape_string($con, $_POST['nombre_madre']);
    $etnia_id       = mysqli_real_escape_string($con, $_POST['etnia_id']);
    $nacionalidad_id = mysqli_real_escape_string($con, $_POST['nacionalidad_id']);
	$captacion_id   = mysqli_real_escape_string($con, $_POST['captacion_id']);
	$pertenencia_distrito = mysqli_real_escape_string($con, $_POST['pertenencia_distrito']);
	
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
    $query2     = mysqli_query($con, "INSERT INTO paciente(cedula_persona, fecha_nacimiento, sexo_id, cedula_padre, nombre_padre, cedula_madre, nombre_madre, etnia_id, nacionalidad_id, captacion_id, pertenencia_distrito) VALUES('" . $cedula_persona . "', '". $fecha_nacimiento ."', '". $sexo_id ."', '". $cedula_padre ."', '". $nombre_padre ."', '". $cedula_madre ."', '". $nombre_madre ."', '". $etnia_id ."', '". $nacionalidad_id ."', '". $captacion_id ."', '". $pertenencia_distrito ."' )");

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
    
    <!-- ___________________________________________ -->

    <div class="col-sm-6 form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Ingrese Fecha de Nacimiento" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Sexo</label>
        <?php
            $generos = "SELECT * FROM sexo";
            $stmt_generos = $pdo->query( $generos );


            $dropdown = "<select name='sexo_id' class='form-control'>";
            foreach ($stmt_generos as $row) {
                $dropdown .= "\r\n<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            $dropdown .= "\r\n</select>";
            echo $dropdown;
        ?>
    </div>
    <div class="col-sm-6 form-group">
        <label>Cédula Padre</label>
        <input type="number" name="cedula_padre" id="cedula_padre" class="form-control" placeholder="Ingrese Cédula Padre" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Nombre Padre</label>
        <input type="text" name="nombre_padre" id="nombre_padre" class="form-control" placeholder="Ingrese Nombre Padre" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Cédula Madre</label>
        <input type="number" name="cedula_madre" id="cedula_madre" class="form-control" placeholder="Ingrese Cédula Madre" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Nombre Madre</label>
        <input type="text" name="nombre_madre" id="nombre_madre" class="form-control" placeholder="Ingrese Nombre Madre" value="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Etnia</label>
        <?php
            $etnias = "SELECT * FROM etnia";
            $stmt_etnias = $pdo->query( $etnias );


            $dropdown = "<select name='etnia_id' class='form-control'>";
            foreach ($stmt_etnias as $row) {
                $dropdown .= "\r\n<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            $dropdown .= "\r\n</select>";
            echo $dropdown;
        ?>
    </div>
    <div class="col-sm-6 form-group">
        <label>Nacionalidad</label>
        <?php
            $nacionalidades = "SELECT * FROM nacionalidad";
            $stmt_nacionalidades = $pdo->query( $nacionalidades );


            $dropdown = "<select name='nacionalidad_id' class='form-control'>";
            foreach ($stmt_nacionalidades as $row) {
                $dropdown .= "\r\n<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            $dropdown .= "\r\n</select>";
            echo $dropdown;
        ?>
    </div>
    <div class="col-sm-6 form-group">
        <label>Captación</label>
        <?php
            $captaciones = "SELECT * FROM captacion";
            $stmt_captaciones = $pdo->query( $captaciones );


            $dropdown = "<select name='captacion_id' class='form-control'>";
            foreach ($stmt_captaciones as $row) {
                $dropdown .= "\r\n<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            $dropdown .= "\r\n</select>";
            echo $dropdown;
        ?>
    </div>
    <div class="col-sm-6 form-group">
        <label>Pertenencia a Distrito</label>
        <select name="pertenencia_distrito" id="pertenencia_distrito" class="form-control">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>

    
    <!-- Botonera -->
    <div class="col-sm-12 reset-button">
        <a href="#" class="btn btn-warning">Limpiar</a>
        <input type="submit" name="signup" id="signup" value="Guardar" class="btn btn-success" />
    </div>
    <!-- EO / Botonera -->
</form>
                           