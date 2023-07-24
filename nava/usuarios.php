<?php
error_reporting(1);
session_start();


 
if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
require("../Conexion.php");
$objeto = new Conexion();

if ( isset($_POST['btnAgregar']) ){
	 
	$Tabla = 'admin';
	$pass = utf8_decode( htmlspecialchars( addslashes( $_POST['inpConAg'] ) ) );
	$Datos = array (
		0 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpNomAg'] ) ) ),
		1 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpApeAg'] ) ) ),
		2 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpUseAg'] ) ) ),
		3 => password_hash($pass, PASSWORD_DEFAULT, array("cost"=>15)),
		4 => utf8_decode( htmlspecialchars( addslashes( $_POST['inptipousuario'] ) ) ),
	);
	$Campos = array (
		0 => "nombres",
		1 => "apellidos",
		2 => "usuarios",
		3 => "contrasena",
		4 => "idtipusu",
	);
	$objeto->Insertar($Tabla, $Datos, $Campos);
	echo '<script type="text/javascript">alert("Agregado correctamente")</script>';
	header("Location: usuarios.php");
}elseif ( isset($_GET['idDesactivar']) )
{
	$Tabla = 'admin';
	$Datos = array (
		0 => 'Inactivo',
	);
	$Campos = array (
		0 => "estatus",
	);
	$Where = array(
		0 => 'id = "'.$_GET['idDesactivar'].'"',
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
	echo '<script type="text/javascript">alert("Usuario desactivado correctamente")</script>';
	header("Location: usuarios.php");
}elseif ( isset($_GET['idActivar']) )
{
	$Tabla = 'admin';
	$Datos = array (
		0 => 'Activo',
	);
	$Campos = array (
		0 => "estatus",
	);
	$Where = array(
		0 => 'id = "'.$_GET['idActivar'].'"',
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
	echo '<script type="text/javascript">alert("Usuario activado correctamente")</script>';
	header("Location: usuarios.php");
}elseif ( isset($_GET["idModificar"]) )
{
	$Instruccion =  "select * from admin where id = '".$_GET["idModificar"]."'";
	
	//$Instruccion =  "select a.*,tu.descripcion from admin a,tipo_usuario tu where a.idtipusu=tu.idtipusu and  a.id = '".$_GET["idModificar"]."'";
	$editar = $objeto->Buscar_Instruccion($Instruccion);
}

if ( isset($_POST['btnModificar']) )
{
	 
	$Tabla = 'admin';
	$Datos = array (
		0 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpNomEd'] ) ) ),
		1 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpApeEd'] ) ) ),
		2 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpUseEd'] ) ) ),
		3 => utf8_decode( htmlspecialchars( addslashes( $_POST['estado'] ) ) ),
		4 => utf8_decode( htmlspecialchars( addslashes( $_POST['inptipousuario'] ) ) ),
	);
	$Campos = array (
		0 => "nombres",
		1 => "apellidos",
		2 => "usuarios",
		3 => "estatus",
		4 => "idtipusu",
	);
	if ($_POST['inpConEd'] != "") {
		$pass = utf8_decode( htmlspecialchars( addslashes( $_POST['inpConEd'] ) ) );
		$Datos[] = password_hash($pass, PASSWORD_DEFAULT, array("cost"=>15));
		$Campos[] = "contrasena";
	}
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
	header("Location: usuarios.php");
}

$sql_tipousuario = $objeto->Buscar_Instruccion("select * from tipo_usuario order by descripcion");
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

                                <?php if ( !isset($_GET["idModificar"]) ): 
								//if ( !(isset($_POST["btnAg"])) && !(isset($_POST["btnBu"])) && !(isset($_POST["btnAgregar"])) && !(isset($_POST["btnBuscar"])) && !(isset($_GET["idDesactivar"])) && !(isset($_GET["idActivar"])) && !(isset($_GET["idModificar"])) ): ?>
									<section align="center">
										<h2>Registrar Usuarios</h2>

									</section>
                                    <section align="center">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row gtr-uniform">

												<div class="col-6">
                                                    <input type="text" name="inpNomAg" id="inpNomAg" placeholder="Nombres" onkeypress="return longitud(this, 100) && validar(event,'letras','áéíóú ')" />
                                                </div>
												<div class="col-6">
                                                    <input type="text" name="inpApeAg" id="inpApeAg" placeholder="Apellidos" onkeypress="return longitud(this, 100) && validar(event,'letras','áéíóú ')" />
                                                </div>

												<div class="col-4">
                                                   <select name="inptipousuario" id="inptipousuario"> 
                                                   <option value="">- Tipo Usuario -</option>
                                                   <?php foreach ($sql_tipousuario as $rs_tipousuario){ ?>
                                                   <option value="<?php echo $rs_tipousuario['idtipusu']; ?>"><?php echo $rs_tipousuario['descripcion']; ?></option>
                                                   
                                                   <?php } ?>
                                                   </select>
                                                </div>
												<div class="col-4">
                                                    <input type="text" name="inpUseAg" id="inpUseAg" placeholder="Usuario" onkeypress="return longitud(this, 100) && validar(event,'ambos','')" autocomplete="off" />
                                                </div>
												<div class="col-4">
                                                    <input type="password" name="inpConAg" id="inpConAg" placeholder="Contraseña" onkeypress="return longitud(this, 100) && validar(event,'ambos','')" autocomplete="off" />
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
                                    <form method="post" action="usuarios.php"> 
                                        
                                    </form>
                                    
										<?php
										
										
                                        if ( isset($_POST['btnBuscar']) ){
											$nombre	=	$_POST['inpBus1'];
											$estado	=	$_POST['inpBus2'];
											
											if($nombre != ""){
												$FilNombre=" and concat(a.nombres,' ',apellidos) like '".$nombre."%'";
											}
											if($estado != ""){
												$FilEstado="and a.estatus='".$estado."'";
											}else{
												$FilEstado="";
											}
											$Instruccion =  "select a.*,tu.descripcion from admin a,tipo_usuario tu where a.idtipusu=tu.idtipusu and a.nombres <> '' ".$FilNombre." ".$FilEstado;
										}else{
											$Instruccion =  "select a.*,tu.descripcion from admin a,tipo_usuario tu where a.idtipusu=tu.idtipusu and a.nombres <> '' ";	
										}
										 
										$DatosBuscados = $objeto->Buscar_Instruccion($Instruccion);
                                        ?>

												<section align="center">
										<h2>Buscar</h2>
										<form method="post" action="usuarios.php">
											<div class="row gtr-uniform">
                                                <div class="col-3 col-12-xsmall">
													<input type="text" name="inpBus1" id="inpBus1" placeholder="Nombre Apellidos" value="<?php echo $_POST["inpBus1"]; ?>" />
												</div>
                                                <div class="col-3">
													<select name="inpBus2" id="inpBus2">
														<option value="">- Ambos -</option>
														<option value="Activo" <?php if ($_POST["inpBus2"] == "Activo") { echo "selected"; } ?> >Activos</option>
														<option value="Inactivo" <?php if ($_POST["inpBus2"] == "Inactivo") { echo "selected"; } ?> >Inactivos</option>
													</select>
												</div>
                                                <div class="col-3">
                                                	 <ul class="actions">
													<input id="btnBuscar" name="btnBuscar" type="submit" value="Buscar" class="primary" />
												</ul>
												</div>
                                                <div class="col-3">
                                                    <ul class="actions">
                        								<li><a href="usuarios.php" class="button">Volver</a></li>
                        							</ul>
                                                </div>
											</div>

                                            <br><br>
											
                                            <div class="table-wrapper">
    											<table class="alt">
    												<thead>
    													<tr>
    														<td>ID</td>
    														<td>Nombres</td>
                                                            <td>Apellidos</td>
                                                            <td>Usuario</td>
															<td>Estatus</td>
															<td>Tipo</td>
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
															<td><?php echo $renglon[5]; ?></td>
															<td><?php echo $renglon['descripcion']; ?></td>
											              	<td>
                                                            <button type="button"><a href="usuarios.php?idModificar=<?php echo $renglon[0]; ?>">Modificar</a></button>
											              	 
															<?php if ( $renglon[5] == "Activo" and $renglon[0] != "1" ){ ?>
																<button type="button" style="background-color:#F00 !important; color:#FFF !important;"><a href="usuarios.php?idDesactivar=<?php echo $renglon[0]; ?>">Desactivar</a></button>
															<?php } ?>
															<?php if ( $renglon[5] != "Activo" ){ ?>
																<button type="button"  style="background-color:#008040 !important; color:#FFF !important;"><a href="usuarios.php?idActivar=<?php echo $renglon[0]; ?>">Activar</a></button>
															<?php } ?>
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

                                <?php if ( isset($_POST["btnBu"]) || isset($_POST["btnBuscar"]) || isset($_GET["idDesactivar"]) || isset($_GET["idActivar"]) ): ?>
                                    
                                <?php endif; ?>

								<?php if ( isset($_GET["idModificar"]) ): ?>
                                    <section align="center">
                                        <h2>Modificar</h2>
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row gtr-uniform">

												<div class="col-12" style="display:none">
                                                    <input type="text" name="inpIdEd" id="inpIdEd" placeholder="Id" value="<?php echo $editar[0][0]; ?>" />
                                                </div>

												<div class="col-6">
                                                    <input type="text" name="inpNomEd" id="inpNomEd" placeholder="Nombres" onkeypress="return longitud(this, 100) && validar(event,'letras','áéíóú ')" value="<?php echo $editar[0][1]; ?>" />
                                                </div>
												<div class="col-6">
                                                    <input type="text" name="inpApeEd" id="inpApeEd" placeholder="Apellidos" onkeypress="return longitud(this, 100) && validar(event,'letras','áéíóú ')"
													value="<?php echo $editar[0][2]; ?>" />
                                                </div>

												<div class="col-6">
                                                    <input type="text" name="inpUseEd" id="inpUseEd" placeholder="Usuario" onkeypress="return longitud(this, 100) && validar(event,'ambos','')" value="<?php echo $editar[0][3]; ?>" />
                                                </div>
												<div class="col-6">
                                                    <input type="password" name="inpConEd" id="inpConEd" placeholder="Contrase&ntilde;a" onkeypress="return longitud(this, 100) && validar(event,'ambos','')"  />
                                                </div>
                                                <?php if(abs($_GET["idModificar"]) != 1){?>
                                                <div class="col-3">
                                                   <select name="inptipousuario" id="inptipousuario"> 
                                                   <option value="">- Tipo Usuario -</option>
                                                   <?php 
												   foreach ($sql_tipousuario as $rs_tipousuario){ 
												   $idtipusu	=	abs($rs_tipousuario['idtipusu']);
												   
												   if($idtipusu == $editar[0][6]){$SelTipUsu="selected";}else{$SelTipUsu="";}
												   ?>
                                                   <option <?=$SelTipUsu?> value="<?php echo $idtipusu; ?>"><?php echo $rs_tipousuario['descripcion']; ?></option>
                                                   
                                                   <?php } ?>
                                                   </select>
                                                </div>
                                                <div class="col-3">
                                                    <select name="estado" id="estado"> 
                                                    <option value="Activo"  <?php if(trim($editar[0][5]) == 'Activo'){echo "selected";} ?> >Activo</option>
                                                    <option value="Inactivo" <?php if(trim($editar[0][5]) == 'Inactivo'){echo "selected";} ?>>Inactivo</option>
                                                    </select>
                                                </div>
												<?php }else{
													?>
                                                    <input type="hidden" name="estado" id="estado"   value="Activo" />
                                                    <?php
													} ?>
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
	 tipo = document.getElementById('inptipousuario')
	 nom = document.getElementById('inpNomAg')
	 ape = document.getElementById('inpApeAg')
	 use = document.getElementById('inpUseAg')
	 con = document.getElementById('inpConAg')
	
	if ( sinEspacios(tipo.value) == "" ) {
	 	tipo.focus()
		alert("Seleccione el tipo de usuario.")
		return false
	 }
	 if ( sinEspacios(nom.value) == "" ) {
	 	nom.focus()
		alert("Llene el campo de nombre.")
		return false
	 }
	 else if ( sinEspacios(ape.value) == "" ) {
	 	ape.focus()
		alert("Llene el campo de apellidos.")
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
	 tipo = document.getElementById('inptipousuario')
	 nom = document.getElementById('inpNomEd')
	 ape = document.getElementById('inpApeEd')
	 use = document.getElementById('inpUseEd')
	 con = document.getElementById('inpConEd')

	if ( sinEspacios(tipo.value) == "" ) {
	 	tipo.focus()
		alert("Seleccione el tipo de usuario.")
		return false
	 }
	 if ( sinEspacios(nom.value) == "" ) {
	 	nom.focus()
		alert("Llene el campo de nombre.")
		return false
	 }
	 else if ( sinEspacios(ape.value) == "" ) {
	 	ape.focus()
		alert("Llene el campo de apellidos.")
		return false
	 }
	 else if ( sinEspacios(use.value) == "" ) {
	 	use.focus()
		alert("Llene el campo de usuario.")
		return false
	 }
 }
 </script>
