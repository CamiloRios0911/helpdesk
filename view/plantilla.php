<?php
session_start();
//Si la sesion existe permita cerrarla
if ($_SESSION['id_tipo_us']==1 || $_SESSION['id_tipo_us']==3) {
    $titulo_pag='Administrador Catalogo';
    include_once 'layouts/header.php';
    include_once 'layouts/nav.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $titulo_pag;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $titulo_pag;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include_once 'layouts/footer.php';
}
//Sino redirecciona al login
else{
    header('location: ../vista/login.php');    
}
?>
<script src="../js/nav.js"></script>