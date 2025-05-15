
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class=  "nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>      
    </ul>  
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu CARRITO TABLA-->
      <li class="nav-item dropdown" id="cont-cart-list2" style="display:none">
        <img src="../img/carrito.png" class="imagen-carrito nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span id='contador2' class='contador badge badge-pill badge-danger'>X</span>
        </img>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <table class="table table-hover text-nowrap p-0">
          <thead class="table-success">
              <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Concentracion</th>
                <th>Adicional</th>
                <th>Precio</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody id="listado-carrito2"></tbody>
          </table>
          <div class="dropdown-divider"></div>
          <a id="procesar-carrito" class="btn btn-danger btn-block" href="#">Ir a carrito</a>
          <a id="vaciar-carrito" class="btn btn-primary btn-block" href="#">Vaciar carrito</a>
        </div>
      </li>
      <!-- Fin Dropdown Menu CARRITO TABLA-->

      <!-- Dropdown Menu CARRITO LISTA-->
      <li class="nav-item dropdown" id="cont-cart-list" style="display:none">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="fas fa-cart-arrow-down fa-2x"></i>
          <span id='contador' class="badge badge-danger navbar-badge"></span>
        </a>
        <div  class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <div  class="media">  
            <table class="table table-hover table-sm text-nowrap p-0">
              <tbody id="listado-carrito"></tbody>
            </table>
          </div>
          <div class="dropdown-divider m-1"></div>
          <div>  
            <a id="procesar-carrito" class="btn btn-danger btn-block" href="#">Ir a carrito</a>
            <a id="vaciar-carrito" class="btn btn-primary btn-block" href="#">Vaciar carrito</a>
          </div>  
        </div>
      </li>
      <!-- Fin Dropdown Menu CARRITO LISTA-->
            
      <li class="nav-item">
        <a class="nav-link" href="../controlador/Logout.php"><i class="fas fa-sign-out-alt"> Salir</i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../vista/adm_catalogo.php" class="brand-link">
      <img src="../img/logolibre.png"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ULibreSoft</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="Avatarnav" src="../img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre_us'];?></a>
          <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario']?>" >
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <?php if ($_SESSION['id_tipo_us']==3) { ?>
          <li class="nav-header">Almacen</li>
          <li class="nav-item">
            <a href="adm_productos.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>Gestion productos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="adm_producto.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>Gestion producto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="adm_atributos.php" class="nav-link">
              <i class="nav-icon fas fa-vials"></i>
              <p>Gestion atributos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="adm_lote.php" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>Gestion lote</p>
            </a>
          </li>
          <?php } ?>

          <li class="nav-header">Compras</li>
          <?php if ($_SESSION['id_tipo_us']==1 || $_SESSION['id_tipo_us']==3) { ?>
          <li class="nav-item">
            <a href="adm_proveedores.php" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>Gestion proveedores</p>
            </a>
          </li>
          <?php } ?>

          <?php if ($_SESSION['id_tipo_us']==2 || $_SESSION['id_tipo_us']==3) { ?>
          <li class="nav-item">
            <a href="adm_clientes.php" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Gestion clientes</p>
            </a>
          </li>
          <?php } ?>

          <li class="nav-header">Usuarios</li>
          
          <li class="nav-item">
            <a href="editar_datos_personales.php" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>Datos Personales</p>
            </a>
          </li>

          <?php if ($_SESSION['id_tipo_us']==3) { ?>
          <li class="nav-item">
            <a href="adm_usuario.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Gestión Usuario</p>
            </a>
          </li>
          <?php } ?>
          
          <li class="nav-item">
            <a href="../controlador/Logout.php" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Salir</p>
            </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>