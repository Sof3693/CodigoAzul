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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">



    <title>Hospital | Cambiar contraseña del del médico</title>
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
                    <input type="text" placeholder="Search...">
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
                <li><a href="../medicos/mostrar.php">Listado de los médicos</a></li>
                <li class="divider">></li>
                <li><a href="#" class="active">Cambiar contraseña del médico</a></li>
            </ul>
           
           <!-- multistep form -->
<?php 
require '../../backend/bd/Conexion.php';
 $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT * FROM doctor  WHERE idodc= '$id';");
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
    <h1>Cambiar contraseña del médico</h1>
    <?php include_once '../../backend/php/upd_pass_doctor.php' ?>
   <br>
    <hr>

    <label for="psw"><b>Nombre y apellidos del médico</b></label><span class="badge-warning">*</span>
    <input type="text"  placeholder="ejm: Juan Raul" value="<?php echo $d->nodoc; ?>  &nbsp; <?php echo $d->apdoc; ?>"  name="named" readonly required>
    <input type="hidden" name="midp" value="<?php echo $d->idodc; ?>">

    <label for="psw"><b>Nueva contraseña</b></label><span class="badge-warning">*</span>
    <input type="password" placeholder="*******"  name="mepasne" required>


    <hr>
   
   <button type="submit" name="upd_pass_doctor" class="registerbtn">Guardar</button>
  </div>
  
</form>
<?php endforeach; ?>
  
    <?php else:?>
      <p class="alert alert-warning">No hay datos</p>
    <?php endif; ?>

        </main>
        <!-- MAIN -->
    </section>
    <script src="../../backend/js/jquery.min.js"></script>


    <!-- NAVBAR -->
    
    <script src="../../backend/js/script.js"></script>
    <script src="../../backend/js/multistep.js"></script>
    <script src="../../backend/js/vpat.js"></script>
    

   
</body>
</html>


