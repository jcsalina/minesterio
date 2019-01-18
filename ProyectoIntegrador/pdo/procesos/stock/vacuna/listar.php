<?php
    $insumos_lista=$pdo->prepare("SELECT * 
                                    FROM vacuna 
                                    ");
    $insumos_lista->execute();
    

    if($insumos_lista->rowCount()>=1) {
        while($fila=$insumos_lista->fetch(PDO::FETCH_ASSOC)){

            if($fila['estado']=='1') {
                $estado_display = "Activo";
            } else {
                $estado_display = "Inactivo";
            }

            $tabla_valor = "<tr>".
                                "<td>" . $fila['nombre'] . "</td>".
                                "<td>" . $fila['tipo'] . "</td>".
                                "<td>" . $estado_display . "</td>".
                                "<td>" .
                                    "<a class='btn btn-info btn-xs' href='registrar.php?id=" . $fila['id'] . "'>" .
                                        "<i class='fa fa-pencil'></i>" .
                                    "</a>" .
                                    "<a class='btn btn-danger btn-xs' href='lista.php?id=" . $fila['id'] . "'>" .
                                        "<i class='fa fa-trash-o'></i>" .
                                    "</a>" .
                                "</td>" .
                            "</tr>";

            echo $tabla_valor;
        }
    } else {
        echo    "<tr>".
                    "<td colspan='4'>No hay datos</td>".
                "</tr>";
    }