<?php
    session_start();

    if(isset($_SESSION['usr_id'])!="") {
        //header("Location: index.php");
    } else {
        header("Location: login.php");
    }

    include_once 'database/dbconnect.php';

    // Conectar con PDO
    $pdo = new PDO('mysql:host=localhost;dbname=proyectoministerio', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'principal_head.php';?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php include 'principal_header.php';?>
        <!-- =============================================== -->
        <!-- Menu Principal -->
        <?php include 'principal_menu.php';?>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon">
                    <i class="pe-7s-box1"></i>
                </div>
                <div class="header-title">
                    <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <h1>Empleados</h1>
                    <small>Lista de Empleados</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index.html"><i class="pe-7s-home"></i> Inicio</a></li>
                        <li class="active">Empleados</li>
                        <li class="active">Consultar</li>
                    </ol>
                </div>
            </section>
            <!-- EO / Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group">
                                    <a class="btn btn-success" href="empleado_registrar.php"> <i class="fa fa-plus"></i> Nuevo empleado</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="success">
                                            <tr>
                                                <th>Cédula</th>
                                                <th>Usuario</th>
                                                <th>Clave</th>
                                                <th>Estado</th>
                                                <th>Cargo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $empleados = "SELECT * FROM empleado";
                                                $stmt_empleados = $pdo->query( $empleados );

                                                foreach ($stmt_empleados as $row) {
                                                    $dropdown =     "<tr>".
                                                                        "<td>" . $row['cedula_persona'] . "</td>".
                                                                        "<td>" . $row['usuario'] . "</td>".
                                                                        "<td>" . "********" . "</td>".
                                                                        "<td>" . $row['estado'] . "</td>".
                                                                        "<td>" . $row['cargo_id'] . "</td>".
                                                                        "<td>" .
                                                                            "<button type='button' class='btn btn-info btn-xs' data-toggle='modal' data-target='#modal_editar'><i class='fa fa-pencil'></i>" .
                                                                            "</button>" .
                                                                            "<button type='button' class='btn btn-danger btn-xs' data-toggle='modal' onclick='eliminar_registro(" . $row['id'] . ")'><i class='fa fa-trash-o'></i>" .
                                                                            "</button>" .
                                                                        "</td>" .
                                                                    "</tr>";
                                                    echo $dropdown;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Paginacion -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->

            <!-- Modal Principal-->
            <div id="modal_editar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Editar</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-body">
                                    <!-- Form Registrar Empleado -->
                                    <?php include 'empleado_registrar_form.php';?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- EO / Modal Principal-->
        </div> 
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- Custom Script -->
    <script type="text/javascript">
        function eliminar_registro(id) {
            if (confirm("¿Está seguro de eliminar el usuario?")) {
                alert("Usuario eliminado");
                
                $.ajax({
                    type: 'POST',
                    url: 'empleado_eliminar.php',
                    dataType: 'text',
                    data: {id_registro: id},


                }).done(function(text){
                        //alert(text);
                    
                    // success: function (obj, textstatus) {
                    //     console.log("Ajax 2");
                    //     if( !('error' in obj) ) {
                    //         resultado = obj.result;
                    //         console.log(resultado)
                    //         location.reload();
                    //     }
                    //     else {
                    //         console.log("Ajax 3");
                    //         console.log(obj.error);
                    //     }
                    // }
                    location.reload();
                });
                
            } else {
                console.log("Cancelado")
            }
        }
    </script>
    
    <?php include 'principal_scripts.php';?>
</body>

</html>