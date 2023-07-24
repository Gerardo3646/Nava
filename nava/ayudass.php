<?php
error_reporting(1);
session_start();

if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
require("../Conexion.php");
$objeto = new Conexion();

$Departamentos = $objeto->Buscar_Instruccion("select * from dep where estatus = 'Activo'");

if (isset($_POST["btnAgregar"])) {
	$Tabla = 'ayudas';
	$conteo = $objeto->Buscar_Instruccion("select * from ayudas");
	$nueva = "ayuda".(count($conteo)+1);
	$Campos = "";
	for ($i=1; $i <= (int)$_POST['inpCanAg']; $i++) {
		if ($i == (int)$_POST['inpCanAg']) {
			$Campos .=  utf8_decode( htmlspecialchars( addslashes( $_POST['inpNomAg'.$i] ) ) );
		}
		else {
			$Campos .=  utf8_decode( htmlspecialchars( addslashes( $_POST['inpNomAg'.$i] ) ) )."|";
		}
	}
	$Tipo = "";
	for ($i=1; $i <= (int)$_POST['inpCanAg']; $i++) {
		if ($i == (int)$_POST['inpCanAg']) {
			$Tipo .=  utf8_decode( htmlspecialchars( addslashes( $_POST['inpTipAg'.$i] ) ) );
		}
		else {
			$Tipo .=  utf8_decode( htmlspecialchars( addslashes( $_POST['inpTipAg'.$i] ) ) )."|";
		}
	}
	$Datos = array (
		0 => $nueva." - ".utf8_decode( htmlspecialchars( addslashes( $_POST['inpApoAg'] ) ) ),
		1 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpDepAg'] ) ) ),
		2 => utf8_decode( htmlspecialchars( addslashes( $_POST['inpCanAg'] ) ) ),
		3 => $Campos,
		4 => $Tipo,
		5 => $_SESSION["Campo0"],
	);
	$Campos = array (
		0 => "ayuda",
		1 => "idDep",
		2 => "cantidad",
		3 => "campos",
		4 => "tipo",
		5 => "admin",
	);
	$objeto->Insertar($Tabla, $Datos, $Campos);

	$conteo = $objeto->Buscar_Instruccion("select * from ayudas");

	$create = "";
	for ($i=1; $i <= (int)$_POST['inpCanAg']; $i++) {
		$create .= "campo$i varchar(255)";
		if ($i != (int)$_POST['inpCanAg']) {
			$create .= ", ";
		}
	}

	$objeto->Buscar_Instruccion("CREATE TABLE ".$nueva." (id int AUTO_INCREMENT PRIMARY KEY, beneficiario varchar(150),".$create.", estatus varchar(100) default 'Activo', admin int)");

	echo '<script type="text/javascript">alert("Agregado correctamente")</script>';

}
elseif ( isset($_GET['idDesactivar']) )
{
	$Tabla = 'ayudas';
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
}
elseif ( isset($_GET['idActivar']) )
{
	$Tabla = 'ayudas';
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
}

if ( $_POST["inpBus2"] != "" ) {
	$Instruccion =  "SELECT ayudas.id, concat(admin.nombres,' ',admin.apellidos), ayudas.ayuda, dep.departamento, ayudas.estatus FROM ayudas INNER JOIN dep on dep.id = ayudas.idDep inner join admin on admin.id = ayudas.admin where ayudas.ayuda like '%".$_POST["inpBus1"]."%' and ayudas.estatus = '".$_POST["inpBus2"]."'";
}
else {
	$Instruccion =  "SELECT ayudas.id, concat(admin.nombres,' ',admin.apellidos), ayudas.ayuda, dep.departamento, ayudas.estatus FROM ayudas INNER JOIN dep on dep.id = ayudas.idDep inner join admin on admin.id = ayudas.admin where ayudas.ayuda like '%".$_POST["inpBus1"]."%'";
}

$DatosBuscados = $objeto->Buscar_Instruccion($Instruccion);
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

                                <?php if ( !(isset($_POST["btnAg"])) && !(isset($_POST["btnBu"])) && !(isset($_POST["btnContinuar"])) && !(isset($_POST["btnBuscar"])) && !(isset($_GET["idDesactivar"])) && !(isset($_GET["idActivar"])) ): ?>
									<section align="center">
										<h2>Ayudas</h2>
										<form method="post" action="ayudas.php">
											<div class="row gtr-uniform">
                                                <div class="col-6">
													<input name="btnAg" type="submit" value="Agregar" class="primary" />
												</div>
                                                <div class="col-6" >
													<input name="btnBu" type="submit" value="Buscar" />
												</div>
											</div>
										</form>
									</section>
                                <?php endif; ?>

                                <?php if ( isset($_POST["btnAg"]) || isset($_POST["btnContinuar"]) ): ?>
                                    <section align="center">
                                        <h2>Agregar ayuda</h2>
										<label>El nombre del beneficiario es obligatorio en todas las ayudas y es colocado automaticamente.</label>
                                        <form method="post" action="ayudas.php">
                                            <div class="row gtr-uniform" id="campos">
                                                <div class="col-6">
                                                    <input type="text" name="inpApoAg" id="inpApoAg" value="<?php echo $_POST["inpApoAg"]; ?>" onkeypress="return longitud(this, 100) && validar(event,'ambos','áéíóú ')" placeholder="Nombre de la ayuda" />
                                                </div>
                                                <div class="col-6">
                                                    <select name="inpDepAg" id="inpDepAg" >
                                                        <option value="">- Departamento -</option>
                                                        <?php foreach ($Departamentos as $key): ?>
                                                        	<option value="<?php echo $key[0]; ?>" <?php if($_POST["inpDepAg"] == $key[0]) { echo "selected"; } ?>>- <?php echo $key[1]; ?> -</option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" name="inpCanAg" id="inpCanAg" placeholder="Cantidad de campos" value="<?php echo $_POST["inpCanAg"]; ?>" onkeypress="return longitud(this, 2) && validar(event,'numeros','')" <?php if(isset($_POST["inpCanAg"])){echo "readonly";} ?>/>
                                                </div>
												<?php if (isset($_POST["inpCanAg"])): ?>
													<?php for ($i=1; $i <= (int)$_POST["inpCanAg"]; $i++): ?>
														<div class="col-6">
		                                                    <input type="text" name="<?php echo "inpNomAg".$i; ?>" id="<?php echo "inpNomAg".$i; ?>" placeholder="<?php echo "Nombre de campo ".$i; ?>" onkeypress="return longitud(this, 100) && validar(event,'ambos','áéíóú ')" />
		                                                </div>
														<div class="col-6">
															<select id="<?php echo "inpTipAg".$i; ?>" name="<?php echo "inpTipAg".$i; ?>">
																<option value="">- Tipo -</option>
																<option value="Letra y numero">- Letra y numero -</option>
																<option value="Textos">- Textos -</option>
																<option value="Numeros">- Numeros -</option>
																<option value="Imagen">- Imagen -</option>
															</select>
														</div>
													<?php endfor; ?>
												<?php endif; ?>


												<?php if (isset($_POST["btnContinuar"])): ?>
													<div class="col-6">
		                                            	<input name="btnAgregar" type="submit" value="Agregar" class="primary" onclick="return agregar()" />
		                                            </div>
												<?php endif; ?>
												<?php if (!(isset($_POST["btnContinuar"]))): ?>
													<div class="col-6">
		                                                <input name="btnContinuar" type="submit" value="Continuar" class="primary" onclick="return continuar()" />
		                                            </div>
												<?php endif; ?>

	                                            <div class="col-6">
	                                                <ul class="actions">
	                                                    <li><a href="ayudas.php" class="button">Volver</a></li>
	                                                </ul>
	                                            </div>

                                            </div>
                                        </form>
                                    </section>
                                <?php endif; ?>

                                <?php if ( isset($_POST["btnBu"]) || isset($_POST["btnBuscar"]) || isset($_GET["idDesactivar"]) || isset($_GET["idActivar"]) ): ?>
									<section align="center">
										<h2>Buscar</h2>
										<form method="post" action="#">
											<div class="row gtr-uniform">
                                                <div class="col-3 col-12-xsmall">
													<input type="text" name="inpBus1" id="inpBus1" placeholder="Ayuda" value="<?php echo $_POST["inpBus1"]; ?>" />
												</div>
                                                <div class="col-3">
													<select name="inpBus2" id="inpBus2">
														<option value="">- Ambos -</option>
														<option value="Activo" <?php if ($_POST["inpBus2"] == "Activo") { echo "selected"; } ?> >Activos</option>
														<option value="Inactivo" <?php if ($_POST["inpBus2"] == "Inactivo") { echo "selected"; } ?> >Inactivos</option>
													</select>
												</div>
                                                <div class="col-3">
													<input id="btnBuscar" name="btnBuscar" type="submit" value="Buscar" class="primary" />
												</div>
                                                <div class="col-3">
                                                    <ul class="actions">
                        								<li><a href="ayudas.php" class="button">Volver</a></li>
                        							</ul>
                                                </div>
											</div>

                                            <br><br>

                                            <div class="table-wrapper">
    											<table class="alt">
    												<thead>
    													<tr>
															<td>Agregado por</td>
    														<td>Apoyo</td>
                                                            <td>Departamento</td>
															<td>Estatus</td>
                                                            <td>Acciones</td>
    													</tr>
    												</thead>
    												<tbody>
														<?php foreach ($DatosBuscados as $renglon){ ?>
											            <tr>
											              	<td><?php echo $renglon[1]; ?></td>
															<td><?php echo $renglon[2]; ?></td>
											              	<td><?php echo $renglon[3]; ?></td>
															<td><?php echo $renglon[4]; ?></td>
											              	<td>
															<?php if ( $renglon[4] == "Activo" ): ?>
																<a href="ayudas.php?idDesactivar=<?php echo $renglon[0]; ?>"><input type="button" value="Desactivar"></a>
															<?php endif; ?>
															<?php if ( $renglon[4] != "Activo" ): ?>
																<a href="ayudas.php?idActivar=<?php echo $renglon[0]; ?>"><input type="button" value="Activar"></a>
															<?php endif; ?>
															</td>
											            </tr>
											            <?php } ?>
    												</tbody>
    											</table>

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
const continuar = () => {
	apo = document.getElementById('inpApoAg')
	dep = document.getElementById('inpDepAg')
	can = document.getElementById('inpCanAg')

	if (sinEspacios(apo.value) == "") {
		alert("Llene el campo de nombre de la ayuda.")
		apo.focus()
		return false;
	} else if (sinEspacios(dep.value) == "") {
		alert("Seleccione un departamento.")
		dep.focus()
		return false;
	} else if (sinEspacios(can.value) == "") {
		alert("Llene el campo de cantidad de campos.")
		can.focus()
		return false;
	}
	else if (sinEspacios(can.value) == "0" || sinEspacios(can.value) == "00") {
		alert("La cantidad de campos no puede ser 0.")
		can.focus()
		return false;
	}
}
const agregar = () => {
	can = document.getElementById('inpCanAg')
	for (var i = 1; i <= parseInt(can.value); i++) {
		if (sinEspacios(document.getElementById('inpNomAg'+i).value) == "") {
			alert("Llene el nombre de campo numero "+i)
			document.getElementById('inpNomAg'+i).focus()
			return false;
		} else if (sinEspacios(document.getElementById('inpTipAg'+i).value) == "") {
			alert("Llene el tipo de campo numero "+i)
			document.getElementById('inpTipAg'+i).focus()
			return false;
		}
	}
}

</script>
