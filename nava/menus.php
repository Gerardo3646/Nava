
<?php
error_reporting(1);
session_start();

 
if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
 

  
 ?> 
<nav id="nav">
<?php if( $_SESSION['usuario_tipo'] == 3){ ?>

    <ul> 
        <li><a href="apoyos.php"  class="active">Agregar apoyos</a></li>
        <li><a href="ayudas.php" >Agregar ayudas</a></li>
        <li class="dropdown">      
                <a href="#" class="dropbtn " >Agregar Beneficiario</a>
                <div class="dropdown-content">
                    <a href="beneficiarios_agregar.php"> Agregar </a>
                    <a href="beneficiarios_consultar.php"> Consultar </a>
                    <a href="evidencias.php"> Evidencias </a>
                </div> 
        </li>
        <li><a href="../calendario/index.php">Calendario</a></li>
        <li><a href="cerrar.php" >Cerrar sesi&oacute;n</a></li>
    </ul>
<?php }elseif( $_SESSION['usuario_tipo'] == 2){?>

	<ul> 
        <li><a href="departamentos.php"  class="active">Agregar departamentos</a></li>
        <li><a href="apoyos.php"  >Agregar apoyos</a></li>
        <li><a href="ayudas.php" >Agregar ayudas</a></li>
        
        <li class="dropdown">      
                <a href="#" class="dropbtn " >Agregar Beneficiario</a>
                <div class="dropdown-content">
                    <a href="beneficiarios_agregar.php"> Agregar </a>
                    <a href="beneficiarios_consultar.php"> Consultar </a>
                    <a href="evidencias.php"> Evidencias </a>
                </div> 
        </li> 
        <li><a href="../calendario/index.php">Calendario</a></li>
        <li><a href="cerrar.php" >Cerrar sesi&oacute;n</a></li>
    </ul>
<?php }else{ ?>

    <ul>
        <li><a href="usuarios.php"  class="active">Agregar Usuarios </a></li>
        <li><a href="departamentos.php">Agregar departamentos</a></li>
        <li><a href="apoyos.php" >Agregar apoyos</a></li>
        <li><a href="ayudas.php" >Agregar ayudas</a></li>
        
        <li class="dropdown">      
                <a href="#" class="dropbtn " >Agregar Beneficiario</a>
                <div class="dropdown-content">
                    <a href="beneficiarios_agregar.php"> Agregar </a>
                    <a href="beneficiarios_consultar.php"> Consultar </a>
                    <a href="evidencias.php"> Evidencias </a>
                </div> 
        </li> 
        <li><a href="../calendario/index.php">Calendario</a></li>
        <li><a href="cerrar.php" >Cerrar sesi&oacute;n</a></li>
    </ul>
<?php }?>
</nav>

