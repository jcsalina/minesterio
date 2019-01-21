
<?php if (isset($_SESSION['usr_id'])) { ?>
<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image pull-left">
                <img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <h4>Bienveindo</h4>
                <p>Usuario</p>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="index.php"><i class="fa fa-hospital-o"></i><span>Principal</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-md"></i><span>Usuarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="empleado_registrar.php">Registrar Usuario</a></li>
                    <li><a href="empleado_lista.php">Lista Usuarios</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>Pacientes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="paciente_registrar.php">Registrar Paciente</a></li>
                    <li><a href="paciente_lista.php">Lista Pacientes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="historial.php">
                    <i class="fa fa-history"></i><span>Historial</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Stock Productos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="stock_insumos.php">Insumos</a></li>
                    <li><a href="stock_vacunas.php">Vacunas</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i><span>Cita Medica</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="citamedica_registrar.php">Registrar Cita</a></li>
                    <li><a href="citamedica_lista.php">Lista Citas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i><span>Campaña</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="campana_registrar.php">Registrar Campaña</a></li>
                    <li><a href="campana_lista.php">Lista Campañas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="consultas.php">
                    <i class="fa fa-file-text"></i><span>Consultas</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i><span>Reportes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="reporte1.php">Reporte 1</a></li>
                    <li><a href="reporte2.php">Reporte 2</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar -->

    </div>
</aside>
<?php } ?>