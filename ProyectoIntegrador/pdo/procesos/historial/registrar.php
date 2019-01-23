<?php
$fecha_hora_now = date('Y-m-d H:i:s');
$fecha_now = date('Y-m-d');

function contar_citas_de_fecha($fecha_consulta) {
    $pdo2 = new PDO('mysql:host=localhost;dbname=proyectoministerio','root','');
    $consultar_numero_citas = $pdo2->prepare("SELECT COUNT(*)
                                             FROM agendamiento
                                             WHERE fecha_cita =".$fecha_consulta)->fetchColumn();
    //$consultar_numero_citas->bindParam(":fecha_consulta", $fecha_consulta);
    //$numero_citas = $consultar_numero_citas->execute();
    return $consultar_numero_citas;
};

function agendar_nueva_cita($paciente_id, $fecha_cita) {
    $pdo2 = new PDO('mysql:host=localhost;dbname=proyectoministerio','root','');
    $agendamiento = $pdo2->prepare("INSERT INTO agendamiento(paciente_id, fecha_cita, estado)
                                   VALUES (:paciente_id, :fecha_agendamiento, 'Agendada')");
    $agendamiento->bindParam(":paciente_id", $paciente_id);
    $agendamiento->bindParam(":fecha_agendamiento", $fecha_cita);

    if($agendamiento->execute()) {
        $successmsg_historial = "¡Cita Medica Agendada con exito!";
    } else {
        $errormsg_historial = "Error al registrar cita medica";
        print_r ($agendamiento->errorInfo()); // Developer Mode
    }
}


if (isset($_POST['submit_historial'])) {
    // __________________ HISTORIAL __________________
    $fecha       = $fecha_hora_now;
    $empleado_id = $_SESSION['id'];
    $paciente_id = $paciente_id;
    
    
    $registrar_historial = $pdo->prepare("INSERT INTO historial(paciente_id, empleado_id, fecha)
                                          VALUES (:paciente_id, :empleado_id, :fecha)");
    $registrar_historial->bindParam(":paciente_id", $paciente_id);
    $registrar_historial->bindParam(":empleado_id", $empleado_id);
    $registrar_historial->bindParam(":fecha", $fecha);
    // __________________ EO / HISTORIAL __________________
    
    // __________________ COTROL __________________
    $BCG            = isset($_POST["BCG"]) ? $fecha_now : NULL;
    $HBO            = isset($_POST["HBO"]) ? $fecha_now : NULL;
    $rotavirus1     = isset($_POST["rotavirus1"]) ? $fecha_now : NULL;
    $rotavirus2     = isset($_POST["rotavirus2"]) ? $fecha_now : NULL;
    $pentavalente1  = isset($_POST["pentavalente1"]) ? $fecha_now : NULL;
    $pentavalente2  = isset($_POST["pentavalente2"]) ? $fecha_now : NULL;
    $pentavalente3  = isset($_POST["pentavalente3"]) ? $fecha_now : NULL;
    $poliomielitis1 = isset($_POST["poliomielitis1"]) ? $fecha_now : NULL;
    $poliomielitis2 = isset($_POST["poliomielitis2"]) ? $fecha_now : NULL;
    $poliomielitis3 = isset($_POST["poliomielitis3"]) ? $fecha_now : NULL;
    $neumococo1     = isset($_POST["neumococo1"]) ? $fecha_now : NULL;
    $neumococo2     = isset($_POST["neumococo2"]) ? $fecha_now : NULL;
    $neumococo3     = isset($_POST["neumococo3"]) ? $fecha_now : NULL;
    $SR             = isset($_POST["SR"]) ? $fecha_now : NULL;
    $SRP            = isset($_POST["SRP"]) ? $fecha_now : NULL;
    $varicela       = isset($_POST["varicela"]) ? $fecha_now : NULL;
    $FA             = isset($_POST["FA"]) ? $fecha_now : NULL;
    $OPV            = isset($_POST["OPV"]) ? $fecha_now : NULL;
    $Influenza      = isset($_POST["Influenza"]) ? $fecha_now : NULL;
    
    $actualizar_control = $pdo->prepare("UPDATE control
                                         SET BCG=:BCG, 
                                             HBO=:HBO, 
                                             rotavirus1=:rotavirus1, 
                                             rotavirus2=:rotavirus2, 
                                             pentavalente1=:pentavalente1, 
                                             pentavalente2=:pentavalente2, 
                                             pentavalente3=:pentavalente3, 
                                             poliomielitis1=:poliomielitis1, 
                                             poliomielitis2=:poliomielitis2, 
                                             poliomielitis3=:poliomielitis3, 
                                             neumococo1=:neumococo1, 
                                             neumococo2=:neumococo2, 
                                             neumococo3=:neumococo3, 
                                             SR=:SR, 
                                             SRP=:SRP, 
                                             varicela=:varicela, 
                                             FA=:FA, 
                                             OPV=:OPV, 
                                             Influenza=:Influenza 
                                         WHERE paciente_id=:paciente_id");
    $actualizar_control->bindParam(":paciente_id", $paciente_id);
    $actualizar_control->bindParam(":BCG", $BCG);
    $actualizar_control->bindParam(":HBO", $HBO);
    $actualizar_control->bindParam(":rotavirus1", $rotavirus1);
    $actualizar_control->bindParam(":rotavirus2", $rotavirus2);
    $actualizar_control->bindParam(":pentavalente1", $pentavalente1);
    $actualizar_control->bindParam(":pentavalente2", $pentavalente2);
    $actualizar_control->bindParam(":pentavalente3", $pentavalente3);
    $actualizar_control->bindParam(":poliomielitis1", $poliomielitis1);
    $actualizar_control->bindParam(":poliomielitis2", $poliomielitis2);
    $actualizar_control->bindParam(":poliomielitis3", $poliomielitis3);
    $actualizar_control->bindParam(":neumococo1", $neumococo1);
    $actualizar_control->bindParam(":neumococo2", $neumococo2);
    $actualizar_control->bindParam(":neumococo3", $neumococo3);
    $actualizar_control->bindParam(":SR", $SR);
    $actualizar_control->bindParam(":SRP", $SRP);
    $actualizar_control->bindParam(":varicela", $varicela);
    $actualizar_control->bindParam(":FA", $FA);
    $actualizar_control->bindParam(":OPV", $OPV);
    $actualizar_control->bindParam(":Influenza", $Influenza);
    // __________________ EO / COTROL __________________

    // __________________ AGENDAMIENTO __________________
    $fecha_nueva = strtotime ( '+1 month' , strtotime ( $fecha_now ) ) ;
    $fecha_nueva = date ( 'Y-m-j' , $fecha_nueva );
    $citas_agendadas = contar_citas_de_fecha($fecha_nueva);
    
    $paciente_id = $paciente_id;
    // __________________ EO / AGENDAMIENTO __________________
    

    if($registrar_historial->execute()) {
        $successmsg_historial = "¡Historial guardado con exito!";
    } else {
        $errormsg_historial = "Error al registrar historial";$errormsg_historial = "Error al registrar historial";
        print_r ($registrar_historial->errorInfo()); // Developer Mode
    }


    if($actualizar_control->execute()) {
        $successmsg_historial = "¡Control guardado con exito!";
        
        if($registrar_historial->execute()) {
            $successmsg_historial = "¡Historial guardado con exito!";

            //if ($citas_agendadas <= 1) { // Validar maximo de citas por MES
            if (1) { // Validar maximo de citas por MES
                agendar_nueva_cita($paciente_id, $fecha_nueva);
            } else {
                $errormsg_historial = "No existe espacio en la agenda ";

                $fecha_nueva2 = strtotime ( '+1 day' , strtotime ( $fecha_now ) ) ;
                $fecha_nueva2 = date ( 'Y-m-j' , $fecha_nueva2 );

                agendar_nueva_cita($paciente_id, $fecha_nueva2);
            }

            header('Location: '.$_SERVER['REQUEST_URI']);
        } else {
            $errormsg_historial = "Error al registrar historial";
            print_r ($registrar_historial->errorInfo()); // Developer Mode
        }
        
        header('Location: '.$_SERVER['REQUEST_URI']);

    } else {
        $errormsg_historial = "Error al registrar control";
        print_r ($actualizar_control->errorInfo()); // Developer Mode
        // $errormsg_historial = '
        // <div class="alert alert-danger alert-dismissable fade in">
        //     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        //     <strong>Error!</strong> Verifique sus datos.
        // </div>
        // ';
    }
}
?>