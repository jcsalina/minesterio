<?php
$tabla_sin_datos =  "<tr>".
                        "<td colspan='19'>No hay datos</td>".
                    "</tr>";
$cedula_persona = "";


if(isset($_GET['cedula'])){
    $cedula = $_GET['cedula'];
    $cedula_persona = $cedula;
    // Reset List
    if($cedula == "") {
        header("Location: lista.php");
    }
        $control_lista=$pdo->prepare("  SELECT *
                        FROM control
                        LEFT JOIN paciente 
                            ON control.paciente_id = paciente.id 
                        WHERE paciente.cedula_persona=:cedula_persona OR paciente.cedula_madre=:cedula_persona OR paciente.cedula_padre=:cedula_persona");
        $control_lista->bindParam(":cedula_persona", $cedula);
        $control_lista->execute();
        $valores_control = $control_lista->fetchAll();

        $BCG            = isset($_POST["BCG"]);
        $HBO            = isset($_POST["HBO"]);
        $rotavirus1     = isset($_POST["rotavirus1"]);
        $rotavirus2     = isset($_POST["rotavirus2"]);
        $pentavalente1  = isset($_POST["pentavalente1"]);
        $pentavalente2  = isset($_POST["pentavalente2"]);
        $pentavalente3  = isset($_POST["pentavalente3"]);
        $poliomielitis1 = isset($_POST["poliomielitis1"]);
        $poliomielitis2 = isset($_POST["poliomielitis2"]);
        $poliomielitis3 = isset($_POST["poliomielitis3"]);
        $neumococo1     = isset($_POST["neumococo1"]);
        $neumococo2     = isset($_POST["neumococo2"]);
        $neumococo3     = isset($_POST["neumococo3"]);
        $SR             = isset($_POST["SR"]);
        $SRP            = isset($_POST["SRP"]);
        $varicela       = isset($_POST["varicela"]);
        $FA             = isset($_POST["FA"]);
        $OPV            = isset($_POST["OPV"]);
        $Influenza      = isset($_POST["Influenza"]);

        // Valores de Control
        $control_BCG;
        $control_HBO;
        $control_rotavirus1;
        $control_rotavirus2;
        $control_pentavalente1;
        $control_pentavalente2;
        $control_pentavalente3;
        $control_poliomielitis1;
        $control_poliomielitis2;
        $control_poliomielitis3;
        $control_neumococo1;
        $control_neumococo2;
        $control_neumococo3;
        $control_SR;
        $control_SRP;
        $control_varicela;
        $control_FA;
        $control_OPV;
        $control_Influenza;

        foreach( $valores_control as $row ) {
            $control_BCG            = $row["BCG"];
            $control_HBO            = $row["HBO"];
            $control_rotavirus1     = $row["rotavirus1"];
            $control_rotavirus2     = $row["rotavirus2"];
            $control_pentavalente1  = $row["pentavalente1"];
            $control_pentavalente2  = $row["pentavalente2"];
            $control_pentavalente3  = $row["pentavalente3"];
            $control_poliomielitis1 = $row["poliomielitis1"];
            $control_poliomielitis2 = $row["poliomielitis2"];
            $control_poliomielitis3 = $row["poliomielitis3"];
            $control_neumococo1     = $row["neumococo1"];
            $control_neumococo2     = $row["neumococo2"];
            $control_neumococo3     = $row["neumococo3"];
            $control_SR             = $row["SR"];
            $control_SRP            = $row["SRP"];
            $control_varicela       = $row["varicela"];
            $control_FA             = $row["FA"];
            $control_OPV            = $row["OPV"];
            $control_Influenza      = $row["Influenza"]; 
    
        }




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
        if (is_null($control_BCG)) {
            $actualizar_control->bindParam(":BCG", $BCG);
        } else {
            $actualizar_control->bindParam(":BCG", $control_BCG);
        }
    
        if (is_null($control_HBO)) {
            $actualizar_control->bindParam(":HBO", $HBO);
        } else {
            $actualizar_control->bindParam(":HBO", $control_HBO);
        }
    
        if (is_null($control_rotavirus1)) {
            $actualizar_control->bindParam(":rotavirus1", $rotavirus1);
        } else {
            $actualizar_control->bindParam(":rotavirus1", $control_rotavirus1);
        }
    
        if (is_null($control_rotavirus2)) {
            $actualizar_control->bindParam(":rotavirus2", $rotavirus2);
        } else {
            $actualizar_control->bindParam(":rotavirus2", $control_rotavirus2);
        }
    
        if (is_null($control_pentavalente1)) {
            $actualizar_control->bindParam(":pentavalente1", $pentavalente1);
        } else {
            $actualizar_control->bindParam(":pentavalente1", $control_pentavalente1);
        }
    
        if (is_null($control_pentavalente2)) {
            $actualizar_control->bindParam(":pentavalente2", $pentavalente2);
        } else {
            $actualizar_control->bindParam(":pentavalente2", $control_pentavalente2);
        }
    
        if (is_null($control_pentavalente3)) {
            $actualizar_control->bindParam(":pentavalente3", $pentavalente3);
        } else {
            $actualizar_control->bindParam(":pentavalente3", $control_pentavalente3);
        }
    
        if (is_null($control_poliomielitis1)) {
            $actualizar_control->bindParam(":poliomielitis1", $poliomielitis1);
        } else {
            $actualizar_control->bindParam(":poliomielitis1", $control_poliomielitis1);
        }
    
        if (is_null($control_poliomielitis2)) {
            $actualizar_control->bindParam(":poliomielitis2", $poliomielitis2);
        } else {
            $actualizar_control->bindParam(":poliomielitis2", $control_poliomielitis2);
        }
    
        if (is_null($control_poliomielitis3)) {
            $actualizar_control->bindParam(":poliomielitis3", $poliomielitis3);
        } else {
            $actualizar_control->bindParam(":poliomielitis3", $control_poliomielitis3);
        }
    
        if (is_null($control_neumococo1)) {
            $actualizar_control->bindParam(":neumococo1", $neumococo1);
        } else {
            $actualizar_control->bindParam(":neumococo1", $control_neumococo1);
        }
    
        if (is_null($control_neumococo2)) {
            $actualizar_control->bindParam(":neumococo2", $neumococo2);
        } else {
            $actualizar_control->bindParam(":neumococo2", $control_neumococo2);
        }
    
        if (is_null($control_neumococo3)) {
            $actualizar_control->bindParam(":neumococo3", $neumococo3);
        } else {
            $actualizar_control->bindParam(":neumococo3", $control_neumococo3);
        }
    
        if (is_null($control_SR)) {
            $actualizar_control->bindParam(":SR", $SR);
        } else {
            $actualizar_control->bindParam(":SR", $control_SR);
        }
    
        if (is_null($control_SRP)) {
            $actualizar_control->bindParam(":SRP", $SRP);
        } else {
            $actualizar_control->bindParam(":SRP", $control_SRP);
        }
    
        if (is_null($control_varicela)) {
            $actualizar_control->bindParam(":varicela", $varicela);
        } else {
            $actualizar_control->bindParam(":varicela", $control_varicela);
        }
    
        if (is_null($control_FA)) {
            $actualizar_control->bindParam(":FA", $FA);
        } else {
            $actualizar_control->bindParam(":FA", $control_FA);
        }
    
        if (is_null($control_OPV)) {
            $actualizar_control->bindParam(":OPV", $OPV);
        } else {
            $actualizar_control->bindParam(":OPV", $control_OPV);
        }
    
        if (is_null($control_Influenza)) {
            $actualizar_control->bindParam(":Influenza", $Influenza);
        } else {
            $actualizar_control->bindParam(":Influenza", $control_Influenza);
        }    

} else {
    echo $tabla_sin_datos;
}