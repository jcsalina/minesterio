<?php
    session_start();

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
                    <h1>Reportes</h1>
                    <small>Lista de Reportes</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index.html"><i class="pe-7s-home"></i> Inicio</a></li>
                        <li class="active">Reportes</li>
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
                                    <a class="btn btn-success" href="paciente_registrar.php"> <i class="fa fa-plus"></i> Nueva Reporte 1</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <span>Reporte 1</span>
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
                                    <?php include 'paciente_registrar_form.php';?>
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
    
    <?php include 'principal_scripts.php';?>
</body>

</html>