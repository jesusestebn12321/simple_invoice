<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/avatar_2x.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          	<?php 
          		echo $full_name_user;
          	?>
          	
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ</li>
        <li class="<?php if($widget_active['inicio']==true ){echo 'active';}?> ">
          	<a href="inicio.php">
            	<i class="fa fa-dashboard"></i> <span>Inicio</span>
           	</a>
        </li>
        
        <li class="treeview <?php if($widget_active['facturas']==true ){echo 'active';}?>">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Facturas</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="facturas.php"><i class="fa fa-circle-o"></i> Lista de Facturas</a></li>
            <li><a href="nueva_factura.php"><i class="fa fa-circle-o"></i> Nueva Factura</a></li>
          </ul>
        </li>

        <li class="<?php if($widget_active['producto']==true ){echo 'active';}?>">
          <a href="stock.php">
            <i class="fa fa-barcode"></i> <span>Productos</span>
          </a>
        </li>

        <li class="treeview <?php if($widget_active['compra']==true ){echo 'active';}?>">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Compras</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="compras_historial.php"><i class="fa fa-circle-o"></i>Historial de Compras</a></li>
            <li><a href="nueva_compra.php"><i class="fa fa-circle-o"></i>Nueva Compras</a>
          </ul>
        </li>

        <li class="<?php if($widget_active['cliente']==true ){echo 'active';}?>">
          <a href="clientes.php">
            <i class="fa fa-user"></i>
            <span>Clientes</span>
          </a>
        </li>

        <li class="<?php if($widget_active['usuario']==true ){echo 'active';}?>">
          <a href="usuarios.php">
            <i class="fa fa-users"></i> <span>Usuarios</span>
          </a>
        </li>

        <li class="<?php if($widget_active['categoria']==true ){echo 'active';}?>">
          <a href="categorias.php">
            <i class="fa fa-list"></i> <span>Categorias</span>
          </a>
        </li>

        <li class="<?php if($widget_active['configuracion']==true ){echo 'active';}?>">
          <a href="perfil.php">
            <i class="fa fa-gears"></i> <span>Configuración</span>
          </a>
        </li>

        <li>
          <a href="login.php?logout">
            <i class="fa fa-power-off"></i> <span>Salir</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>