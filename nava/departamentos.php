<?php
error_reporting(1);
session_start();

if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
require("../Conexion.php");
$objeto = new Conexion();

if ( isset($_POST['btnAgregar']) ){
	 
	$Tabla = 'dep';
	$pass = utf8_decode( htmlspecialchars( addslashes( $_POST['inpConAg'] ) ) );
	$Datos = array (
		0 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpDep'] ) ) ),
		1 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpSoli'] ) ) ),
	);
	$Campos = array (
		0 => "departamento",
		1 => "Solicitador",
		
	);
	$objeto->Insertar($Tabla, $Datos, $Campos);
	echo '<script type="text/javascript">alert("Agregado correctamente")</script>';
	header("Location: departamentos.php");
}else if(isset($_GET['idEliminar']))
         {
         	$Instruccion = "delete from dep where id = '".$_GET["idEliminar"]."'";
	$editar = $objeto->Buscar_Instruccion($Instruccion);
      }

elseif ( isset($_GET["idModificar"]) )
{
	$Instruccion =  "select * from dep where id = '".$_GET["idModificar"]."'";
	$editar = $objeto->Buscar_Instruccion($Instruccion);
}

if ( isset($_POST['btnModificar']) )
{
	 
	$Tabla = 'dep';
	$Datos = array (
		0 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpDep'] ) ) ),
		1 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpSoli'] ) ) ),
		
	);
	$Campos = array (
		0 => "departamento",
		1 => "Solicitador",

	);
	$Where = array(
		0 => 'id = "'.$_POST['inpIdEd'].'"',
	);

	$Cambios = '';
	for ($i=0; $i < count($Datos); $i++) {
		if ( $Cambios == '' && $Datos[$i] != '' ) {
			$Cambios .= $Campos[$i]." = '".$Datos[$i]."'";
		}
		elseif ( $Datos[$i] != '' ) {
			$Cambios .= ", ".$Campos[$i]." = '".$Datos[$i]."'";
		}
	}
	$Condicion = '';
	for ($i=0; $i < count($Where); $i++) {
		if ( $i == 0 ) {
			$Condicion .= $Where[$i];
		}
		else {
			$Condicion .= " and ".$Where[$i];
		}
	}
	$Instruccion = "UPDATE $Tabla SET $Cambios where $Condicion";
	$objeto->Buscar_Instruccion($Instruccion);

	echo '<script type="text/javascript">alert("Modificado correctamente")</script>';
	header("Location: departamentos.php");
}

if ( isset($_POST['btnEliminar']) )
{
	 
	$Tabla = 'dep';
	$Datos = array (
		0 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpDep'] ) ) ),
		1 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpSoli'] ) ) ),
		
	);
	$Campos = array (
		0 => "departamento",
		1 => "Solicitador",

	);
	$Where = array(
		0 => 'id = "'.$_POST['inpIdEd'].'"',
	);

	$Cambios = '';
	for ($i=0; $i < count($Datos); $i++) {
		if ( $Cambios == '' && $Datos[$i] != '' ) {
			$Cambios .= $Campos[$i]." = '".$Datos[$i]."'";
		}
		elseif ( $Datos[$i] != '' ) {
			$Cambios .= ", ".$Campos[$i]." = '".$Datos[$i]."'";
		}
	}
	$Condicion = '';
	for ($i=0; $i < count($Where); $i++) {
		if ( $i == 0 ) {
			$Condicion .= $Where[$i];
		}
		else {
			$Condicion .= " and ".$Where[$i];
		}
	}
	$Instruccion = "UPDATE $Tabla SET $Cambios where $Condicion";
	$objeto->Buscar_Instruccion($Instruccion);

	echo '<script type="text/javascript">alert("Eliminado correctamente")</script>';
	header("Location: departamentos.php");
}


 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Nava</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?rand=<?php echo rand(0,99999)?>" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

                <!-- Nav -->
					<?php include("menus.php");?>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">

                                <?php if ( !isset($_GET["idModificar"]) || isset($_GET["idEliminar"]) ): 
								//if ( !(isset($_POST["btnAg"])) && !(isset($_POST["btnBu"])) && !(isset($_POST["btnAgregar"])) && !(isset($_POST["btnBuscar"])) && !(isset($_GET["idDesactivar"])) && !(isset($_GET["idActivar"])) && !(isset($_GET["idModificar"])) ): ?>
									<section align="center">
										<h2>Registrar Departamento</h2>

									</section>
                                    <section align="center">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row gtr-uniform">

												<div class="col-12">
                                                    <input type="text" name="inpDep" id="inpDep" placeholder="Nombre del departamento" onkeypress="return longitud(this, 100) && validar(event,'ambos','áéíóú ')" />
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" name="inpSoli" id="inpSoli" placeholder="Nombre del Solicitador" onkeypress="return longitud(this, 100) && validar(event,'ambos','áéíóú ')" />
                                                </div>
                                                
                                                <!--  <div class="row gtr-uniform">-->
												<?php if ($_SESSION["Campo0"]): ?>
                                                    <div class="col-12">
                                                    <input  name="btnAgregar" type="submit" value="Agregar" class="primary" onclick="return guardar()" />
                                                    </div>
                                                <?php endif; ?>
                                               <!-- </div>-->
                                            </div>
                                            
                                          
                                        </form>
                                    </section>
                                    <form method="post" action="departamentos.php"> 
                                        
                                    </form>
                                    
										<?php
										
										
                                        if ( isset($_POST['btnBuscar']) ){
											$dep	=	$_POST['inpBus1'];
											$estado	=	$_POST['inpBus2'];
											
											if($dep != ""){
												$FilNombre=" and concat(departamento) like '".$dep."%'";
											}
											if($estado != ""){
												$FilEstado="and estatus='".$estado."'";
											}else{
												$FilEstado="";
											}
											$Instruccion =  "select * from dep where departamento <> '' ".$FilNombre." ".$FilEstado;
										}else{
											$Instruccion =  "select * from dep where departamento <> '' ";	
										}
										 
										$DatosBuscados = $objeto->Buscar_Instruccion($Instruccion);
                                        ?>

												<section align="center">
										<h2>Buscar</h2>
										<form method="post" action="departamentos.php">
											<div class="row gtr-uniform">
                                                <div class="col-9 col-12-xsmall">
													<input type="text" name="inpBus1" id="inpBus1" placeholder="Departamento" value="<?php echo $_POST["inpBus1"]; ?>" />
												</div>
                                                
                                                <div class="col-3">
                                                	 <ul class="actions">
													<input id="btnBuscar" name="btnBuscar" type="submit" value="Buscar" class="primary" />
												</ul>
												</div>
                                             
											</div>

                                            <br><br>
											
                                            <div class="table-wrapper">
    											<table class="alt">
    												<thead>
    													<tr>
    														<td>ID</td>
    														<td>Departamento</td>
    														<td>Solicitado Por</td>
															<td>Estatus</td>
                                                            <td>Acciones</td>
    													</tr>
    												</thead>
    												<tbody>
														<?php foreach ($DatosBuscados as $renglon){ ?>
											            <tr>
															<td><?php echo $renglon[0]; ?></td>
											              	<td><?php echo $renglon[1]; ?></td>
											              	<td><?php echo $renglon[2]; ?></td>
															<td><?php echo $renglon[3]; ?></td>
											              	<td>
                                                            <button type="button"><a href="departamentos.php?idModificar=<?php echo $renglon[0]; ?>">Modificar</a></button>
											              	 
															<button type="button" style="background-color:#F00 !important; color:#FFF !important;"><a href="departamentos.php?idEliminar=<?php echo $renglon[0]; ?>">Eliminar</a></button>
															</td>
											            </tr>
											            <?php } ?>
    												</tbody>
    											</table>
											</div>
										</form>
									</section>

                                               
											</div>
										</form>
                                <?php  endif; ?>

                                <?php if ( isset($_POST["btnBu"]) || isset($_POST["btnBuscar"]) || isset($_POST["btnEliminar"]) ): ?>
                                    
                                <?php endif; ?>

								<?php if ( isset($_GET["idModificar"]) ): ?>
                                    <section align="center">
                                        <h2>Modificar</h2>
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row gtr-uniform">

												<div class="col-12" style="display:none">
                                                    <input type="text" name="inpIdEd" id="inpIdEd" placeholder="Id" value="<?php echo $editar[0][0]; ?>" />
                                                </div>

												<div class="col-12">
                                                    <input type="text" name="inpDep" id="inpDep" placeholder="Nombre departamento" onkeypress="return longitud(this, 100) && validar(event,'ambos','áéíóú ')" value="<?php echo $editar[0][1]; ?>" />
                                                </div>

                                                <div class="col-12">
                                                    <input type="text" name="inpSoli" id="inpSoli" placeholder="Nombre del solicitador" onkeypress="return longitud(this, 100) && validar(event,'ambos','áéíóú ')" value="<?php echo $editar[0][2]; ?>" />
                                                </div>


											
                                              
                                                <div class="col-6">
                                                    <input name="btnModificar" type="submit" value="Modificar" class="primary" onclick="return modificar()" /> <input name="btnRegresar" type="submit" value="Regresar" class="primary"   />
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </section>
                                <?php endif; ?>

                            </section>

					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

 <script type="text/javascript">
 const validar = (e,tipo,otros) => {
	 key = e.keyCode || e.which;
	 tecla = String.fromCharCode(key).toLowerCase();
	 if ( tipo == "letras" )
	 {
		 letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
	 }
	 else if( tipo == "numeros" )
	 {
		 letras = "1234567890";
	 }
	 else if( tipo == "ambos" )
	 {
		 letras = "1234567890áéíóúabcdefghijklmnñopqrstuvwxyz";
	 }
	 letras = letras+otros

	 especiales = "8-37-39-46";

	 tecla_especial = false
	 for(let i in especiales){
		 if(key == especiales[i]){
			 tecla_especial = true;
			 break;
		 }
	 }

	 if(letras.indexOf(tecla)==-1 && !tecla_especial){
		 return false;
	 }
 }
 const longitud = (campo, longitudMaxima) => {
     try {
         if (campo.value.length > (longitudMaxima - 1))
             return false;
         else
             return true;
     } catch (e) {
         return false;
     }
 }
 const sinEspacios = (str) => {
     let cadena = '';
     let arrayString = str.split(' ');
     for (let i = 0; i < arrayString.length; i++)
     {
         if (arrayString[i] != "")
         {
             cadena += arrayString[i];
         }
     }
     return cadena;
 }
 const guardar = () => {
	 dep = document.getElementById('inpDep')
	 soli = document.getElementById('inpSoli')
	 if ( sinEspacios(dep.value) == "" ) {
	 	dep.focus()
		alert("Llene el campo de nombre departamento.")
		return false
	 }
	 else if ( sinEspacios(soli.value) == "" ) {
	 	soli.focus()
		alert("Llene el campo del solicitador.")
		return false
	 }
	 else if ( sinEspacios(use.value) == "" ) {
	 	use.focus()
		alert("Llene el campo de usuario.")
		return false
	 }
	 else if ( sinEspacios(con.value) == "" ) {
	 	con.focus()
		alert("Llene el campo de contraseña.")
		return false
	 }
 }
 const modificar = () => {
	 dep = document.getElementById('inpDep')
	 soli = document.getElementById('inpSoli')

	 if ( sinEspacios(dep.value) == "" ) {
	 	dep.focus()
		alert("Llene el campo de nombre del departamento.")
		return false
	 }
	 else if ( sinEspacios(soli.value) == "" ) {
	 	soli.focus()
		alert("Llene el campo del solicitador.")
		return false
	 }
	 else if ( sinEspacios(use.value) == "" ) {
	 	use.focus()
		alert("Llene el campo de usuario.")
		return false
	 }
 }
 </script>
