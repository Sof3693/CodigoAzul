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

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">




    <title>Hospital | Nuevos laboratorios</title>
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
                <li><a href="laboratiorios.php">Listado de los laboratorios</a></li>
                 <li class="divider">></li>
                <li><a href="#" class="active">Nuevos laboratorios</a></li>
            </ul>
           
<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off" onsubmit="return validacion()">
  <div class="containerss">
    <h1>Nueva laboratorios</h1>
   
    <div class="alert-danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Importante!</strong> Es importante rellenar los campos con &nbsp;<span class="badge-warning">*</span>
</div>
    <hr>

    <label for="email"><b>Nombre del laboratorio</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: Radiografia" name="labname" required>

   

    <hr>
   
    <button type="submit" name="add_laboratory" class="registerbtn">Guardar</button>
  </div>
  
</form>

        </main>
        <!-- MAIN -->
    </section>
    
    <!-- NAVBAR -->
    <script src="../../backend/js/jquery.min.js"></script>
    
    <script src="../../backend/js/script.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 <?php include_once '../../backend/php/add_laboratory.php' ?>
</body>
</html>


