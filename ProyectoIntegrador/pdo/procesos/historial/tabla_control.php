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
                                        ON control.paciente_id = paciente.id");
    //                                WHERE paciente.cedula_persona=:cedula_persona OR paciente.cedula_madre=:cedula_persona OR paciente.cedula_padre=:cedula_persona");
    // $control_lista->bindParam(":cedula_persona", $cedula);
    $control_lista->execute();
    


    if($control_lista->rowCount()>=1) {
        while($fila=$control_lista->fetch()){


            if (isset($fila["BCG"])) {            $checkbox_BCG = "checked='checked' value='1' onclick='return false'";            } else { $checkbox_BCG = "value='0'"; }              
            if (isset($fila["HBO"])) {            $checkbox_HBO = "checked='checked' value='1' onclick='return false'";            } else { $checkbox_HBO = "value='0'"; }              
            if (isset($fila["rotavirus1"])) {     $checkbox_rotavirus1 = "checked='checked' value='1' onclick='return false'";     } else { $checkbox_rotavirus1 = "value='0'"; }       
            if (isset($fila["rotavirus2"])) {     $checkbox_rotavirus2 = "checked='checked' value='1' onclick='return false'";     } else { $checkbox_rotavirus2 = "value='0'"; }       
            if (isset($fila["pentavalente1"])) {  $checkbox_pentavalente1 = "checked='checked' value='1' onclick='return false'";  } else { $checkbox_pentavalente1 = "value='0'"; }    
            if (isset($fila["pentavalente2"])) {  $checkbox_pentavalente2 = "checked='checked' value='1' onclick='return false'";  } else { $checkbox_pentavalente2 = "value='0'"; }    
            if (isset($fila["pentavalente3"])) {  $checkbox_pentavalente3 = "checked='checked' value='1' onclick='return false'";  } else { $checkbox_pentavalente3 = "value='0'"; }    
            if (isset($fila["poliomielitis1"])) { $checkbox_poliomielitis1 = "checked='checked' value='1' onclick='return false'"; } else { $checkbox_poliomielitis1 = "value='0'"; }   
            if (isset($fila["poliomielitis2"])) { $checkbox_poliomielitis2 = "checked='checked' value='1' onclick='return false'"; } else { $checkbox_poliomielitis2 = "value='0'"; }   
            if (isset($fila["poliomielitis3"])) { $checkbox_poliomielitis3 = "checked='checked' value='1' onclick='return false'"; } else { $checkbox_poliomielitis3 = "value='0'"; }   
            if (isset($fila["neumococo1"])) {     $checkbox_neumococo1 = "checked='checked' value='1' onclick='return false'";     } else { $checkbox_neumococo1 = "value='0'"; }       
            if (isset($fila["neumococo2"])) {     $checkbox_neumococo2 = "checked='checked' value='1' onclick='return false'";     } else { $checkbox_neumococo2 = "value='0'"; }       
            if (isset($fila["neumococo3"])) {     $checkbox_neumococo3 = "checked='checked' value='1' onclick='return false'";     } else { $checkbox_neumococo3 = "value='0'"; }       
            if (isset($fila["SR"])) {             $checkbox_SR = "checked='checked' value='1' onclick='return false'";             } else { $checkbox_SR = "value='0'"; }               
            if (isset($fila["SRP"])) {            $checkbox_SRP = "checked='checked' value='1' onclick='return false'";            } else { $checkbox_SRP = "value='0'"; }              
            if (isset($fila["varicela"])) {       $checkbox_varicela = "checked='checked' value='1' onclick='return false'";       } else { $checkbox_varicela = "value='0'"; }         
            if (isset($fila["FA"])) {             $checkbox_FA = "checked='checked' value='1' onclick='return false'";             } else { $checkbox_FA = "value='0'"; }               
            if (isset($fila["OPV"])) {            $checkbox_OPV = "checked='checked' value='1' onclick='return false'";            } else { $checkbox_OPV = "value='0'"; }              
            if (isset($fila["Influenza"])) {      $checkbox_Influenza = "checked='checked' value='1' onclick='return false'";      } else { $checkbox_Influenza = "value='0'"; }    
  

            $tabla = "<tr>";
            $tabla .= "<td><input type='checkbox' id='BCG' name='BCG' value='" . $fila["BCG"] . "' " . $checkbox_BCG . "></td>";
            $tabla .= "<td><input type='checkbox' id='HBO' name='HBO' value='" . $fila["HBO"] . "' " . $checkbox_HBO . "></td>";
            $tabla .= "<td><input type='checkbox' id='rotavirus1' name='rotavirus1' value='" . $fila["rotavirus1"] . "' " . $checkbox_rotavirus1 . "></td>";
            $tabla .= "<td><input type='checkbox' id='rotavirus2' name='rotavirus2' value='" . $fila["rotavirus2"] . "' " . $checkbox_rotavirus2 . "></td>";
            $tabla .= "<td><input type='checkbox' id='pentavalente1' name='pentavalente1' value='" . $fila["pentavalente1"] . "' " . $checkbox_pentavalente1 . "></td>";
            $tabla .= "<td><input type='checkbox' id='pentavalente2' name='pentavalente2' value='" . $fila["pentavalente2"] . "' " . $checkbox_pentavalente2 . "></td>";
            $tabla .= "<td><input type='checkbox' id='pentavalente3' name='pentavalente3' value='" . $fila["pentavalente3"] . "' " . $checkbox_pentavalente3 . "></td>";
            $tabla .= "<td><input type='checkbox' id='poliomielitis1' name='poliomielitis1' value='" . $fila["poliomielitis1"] . "' " . $checkbox_poliomielitis1 . "></td>";
            $tabla .= "<td><input type='checkbox' id='poliomielitis2' name='poliomielitis2' value='" . $fila["poliomielitis2"] . "' " . $checkbox_poliomielitis2 . "></td>";
            $tabla .= "<td><input type='checkbox' id='poliomielitis3' name='poliomielitis3' value='" . $fila["poliomielitis3"] . "' " . $checkbox_poliomielitis3 . "></td>";
            $tabla .= "<td><input type='checkbox' id='neumococo1' name='neumococo1' value='" . $fila["neumococo1"] . "' " . $checkbox_neumococo1 . "></td>";
            $tabla .= "<td><input type='checkbox' id='neumococo2' name='neumococo2' value='" . $fila["neumococo2"] . "' " . $checkbox_neumococo2 . "></td>";
            $tabla .= "<td><input type='checkbox' id='neumococo3' name='neumococo3' value='" . $fila["neumococo3"] . "' " . $checkbox_neumococo3 . "></td>";
            $tabla .= "<td><input type='checkbox' id='SR' name='SR' value='" . $fila["SR"] . "' " . $checkbox_SR . "></td>";
            $tabla .= "<td><input type='checkbox' id='SRP' name='SRP' value='" . $fila["SRP"] . "' " . $checkbox_SRP . "></td>";
            $tabla .= "<td><input type='checkbox' id='varicela' name='varicela' value='" . $fila["varicela"] . "' " . $checkbox_varicela . "></td>";
            $tabla .= "<td><input type='checkbox' id='FA' name='FA' value='" . $fila["FA"] . "' " . $checkbox_FA . "></td>";
            $tabla .= "<td><input type='checkbox' id='OPV' name='OPV' value='" . $fila["OPV"] . "' " . $checkbox_OPV . "></td>";
            $tabla .= "<td><input type='checkbox' id='Influenza' name='Influenza' value='" . $fila["Influenza"] . "' " . $checkbox_Influenza . "></td>";

            $tabla .= "</tr><tr>";

            // Fechas
            $tabla .= "";
            if (isset($fila["BCG"])) {              $tabla .= "<td>" . $fila["BCG"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["HBO"])) {              $tabla .= "<td>" . $fila["HBO"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["rotavirus1"])) {       $tabla .= "<td>" . $fila["rotavirus1"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["rotavirus2"])) {       $tabla .= "<td>" . $fila["rotavirus2"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["pentavalente1"])) {    $tabla .= "<td>" . $fila["pentavalente1"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["pentavalente2"])) {    $tabla .= "<td>" . $fila["pentavalente2"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["pentavalente3"])) {    $tabla .= "<td>" . $fila["pentavalente3"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["poliomielitis1"])) {   $tabla .= "<td>" . $fila["poliomielitis1"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["poliomielitis2"])) {   $tabla .= "<td>" . $fila["poliomielitis2"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["poliomielitis3"])) {   $tabla .= "<td>" . $fila["poliomielitis3"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["neumococo1"])) {       $tabla .= "<td>" . $fila["neumococo1"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["neumococo2"])) {       $tabla .= "<td>" . $fila["neumococo2"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["neumococo3"])) {       $tabla .= "<td>" . $fila["neumococo3"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["SR"])) {               $tabla .= "<td>" . $fila["SR"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["SRP"])) {              $tabla .= "<td>" . $fila["SRP"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["varicela"])) {         $tabla .= "<td>" . $fila["varicela"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["FA"])) {               $tabla .= "<td>" . $fila["FA"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["OPV"])) {              $tabla .= "<td>" . $fila["OPV"] . "</td>"; } else { $tabla .= "<td></td>"; }
            if (isset($fila["Influenza"])) {        $tabla .= "<td>" . $fila["Influenza"] . "</td>"; } else { $tabla .= "<td></td>"; }
           
            $tabla .= "</tr>";

            echo $tabla;
           
        }
    } else {
        echo $tabla_sin_datos;
        echo "aaaa";
    }
} else {
    echo $tabla_sin_datos;
}