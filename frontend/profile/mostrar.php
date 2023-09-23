<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../login.php');

    $id=$_SESSION['id'];
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../../backend/img/ico.svg">





    <title>Hospital | Mi perfil</title>
</head>
<body>
    
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../admin/escritorio.php" class="brand"><i class='bx bxs-heart icon'></i> Hospital</a>
        <ul class="side-menu">
            <li><a href="../admin/escritorio.php" ><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
            <li class="divider" data-text="main">Panel</li>

            <li>
                <a href="#"><i class='bx bxs-user icon' ></i> Pacientes <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../pacientes/mostrar.php" >Lista de pacientes</a></li>
                    <li><a href="../pacientes/historial.php">Historial de los pacientes</a></li>
                    <li><a href="../pacientes/documentos.php">Documentos</a></li>
                   
                </ul>
            </li>

            <li>
                <a href="#"><i class='bx bxs-briefcase icon' ></i> Médicos <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../medicos/mostrar.php">Lista de médicos</a></li>
                    <li><a href="../recursos/enfermera.php">Enfermera</a></li>
                    <li><a href="../medicos/historial.php">Historial de los médicos</a></li>
                   
                </ul>
            </li>
            <li>
                <a href="#"><i class='bx bxs-cog icon' ></i> Ajustes<i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../ajustes/mostrar.php">Ajustes</a></li>
                    <li><a href="../ajustes/base.php">Base de datos</a></li>
                    
                </ul>
            </li>

            <li><a href="../acerca/mostrar.php" class="active"><i class='bx bxs-info-circle icon' ></i> Acerca de</a></li>
          
           
        </ul>
       

    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar' ></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Buscar...">
                    <i class='bx bx-search icon' ></i>
                </div>
            </form>
            
           
            <span class="divider"></span>
            <div class="profile">
                <img src="https://img.freepik.com/free-psd/3d-icon-social-media-app_23-2150049569.jpg?w=740&t=st=1695479929~exp=1695480529~hmac=49d85c5481af915232c3e3f6176d9793cd354ae0db69677f1c165dd87ae9b258https://img.freepik.com/free-psd/3d-icon-social-media-app_23-2150049569.jpg?w=740&t=st=1695479929~exp=1695480529~hmac=49d85c5481af915232c3e3f6176d9793cd354ae0db69677f1c165dd87ae9b258" alt="">
                <ul class="profile-link">
                    <li><a href="../profile/mostrar.php"><i class='bx bxs-user-circle icon' ></i> Perfil</a></li>
                    
                    <li>
                     <a href="../salir.php"><i class='bx bxs-log-out-circle' ></i> Salir</a>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <h1 class="title">Bienvenido <?php echo '<strong>'.$_SESSION['username'].'</strong>'; ?></h1>
            <ul class="breadcrumbs">
                <li><a href="../admin/escritorio.php">Home</a></li>
               
                 <li class="divider">></li>
                <li><a href="#" class="active">Mi perfil</a></li>
            </ul>
    <?php 
require_once('../../backend/bd/Conexion.php');
$sentencia = $connect->prepare("SELECT * FROM users;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
     ?>
     <?php if(count($data)>0):?> 
     <?php foreach($data as $d):?>      
<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off" onsubmit="return validacion()">
  <div class="containerss">
    <h1>Mi perfil</h1>
   
    <hr>
    <br>

    <label for="email"><b>Usuario del perfil</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->username ?>" placeholder="ejm: admin01" name="prouser" required>
    <input type="hidden" name="proid" value="<?php echo $d->id ?>">

    <label for="email"><b>Nombre del perfil</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->name ?>" placeholder="ejm: admin" name="proname" required>

    <label for="email"><b>Correo del perfil</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->email ?>" placeholder="ejm: admin@gmail.com" name="proema" required>

   

    <hr>
   
    <button type="submit" name="upd_profile" class="registerbtn">Guardar</button>
  </div>
</form>
 <?php endforeach; ?>
 <?php else:?>
  
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <strong>Danger!</strong> No hay datos.
    </div>
    <?php endif; ?>


<div class="content-data">
      <?php 

$sentencia = $connect->prepare("SELECT * FROM users;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
     ?>
     <?php if(count($data)>0):?> 
     <?php foreach($data as $e):?>   
   <form method="POST"  enctype="multipart/form-data">
    <div class="containerss">
         <h1>Actualizar contraseña</h1>
         <br>
    <label for="email"><b>Nueva contraseña</b></label><span class="badge-warning">*</span>
    <input type="password" placeholder="ejm: ******" name="newpass" required>
    <input type="hidden" name="newid" value="<?php echo $d->id ?>">
    </div>
       <hr>
   
    <button type="submit" name="upd_profile_pass" class="registerbtn">Guardar</button>
   </form>
    <?php endforeach; ?>
 <?php else:?>
  
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <strong>Danger!</strong> No hay datos.
    </div>
    <?php endif; ?>
</div>

        </main>
        <!-- MAIN -->
    </section>
    
    <!-- NAVBAR -->
    <script src="../../backend/js/jquery.min.js"></script>
    
    <script src="../../backend/js/script.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 <?php include_once '../../backend/php/upd_profile.php' ?>
  <?php include_once '../../backend/php/upd_pass.php' ?>
</body>
</html>


