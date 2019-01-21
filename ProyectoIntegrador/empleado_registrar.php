<?php
    session_start();

    if(isset($_SESSION['usr_id'])!="") {
        //header("Location: index.php");
    } else {
        header("Location: login.php");
    }

    include_once 'database/dbconnect.php';

    //Establece el error de validación como flag
    $error = false;
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
                    <small>Registrar Empleado</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index.html"><i class="pe-7s-home"></i> Inicio</a></li>
                        <li class="active">Empleados</li>
                        <li class="active">Registrar</li>
                    </ol>
                </div>
            </section>
            <!-- EO / Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- Form controls -->
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="empleado_lista.php"> <i class="fa fa-list"></i> Lista de Empleados </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- Form Registrar Empleado -->
                                <?php include 'empleado_registrar_form.php';?>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div> 
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    
    <?php include 'principal_scripts.php';?>
</body>

</html>