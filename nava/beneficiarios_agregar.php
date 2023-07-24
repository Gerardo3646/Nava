<?php
error_reporting(1);
session_start();

if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
$_SESSION['s_menu'] = 'beneficario';
require("../Conexion.php");
$objeto = new Conexion();

if (isset($_GET["seleccionar"])) {
	$_SESSION["apo"] = $_GET["seleccionar"];
	$tipox			 = $_GET["tipo"];
	if($tipox == 'apoyos'){
		$apoyo = $objeto->Buscar_Instruccion("select apoyo as descripcion,campos,tipo from apoyos where id = '".$_GET["seleccionar"]."'");
	}else{
		$apoyo = $objeto->Buscar_Instruccion("select ayuda as descripcion,campos,tipo from ayudas where id = '".$_GET["seleccionar"]."'");	
	}
}
elseif (isset($_SESSION["apo"])) {
	$apoyo = $objeto->Buscar_Instruccion("select * from apoyos where id = '".$_SESSION["apo"]."'");
}

if (isset($_POST["btnGuardar"])){
	
	$beneficiario	=	trim($_POST['inpBen']);
	$totcamp		=	abs($_POST['totcamp']);
	//$idben			=	abs($_POST['idben']);
	$tipapoayu		=	trim($_POST['inpApoAyu']);
	$arrtipapoayu	=	explode("|",$tipapoayu);
	$tipo			=	$arrtipapoayu[0];
	$idben			=	$arrtipapoayu[1];
	$iddepartamento	=	abs($_POST['inpDep']);
	
	


	$Tabla = 'beneficiarios'; 
	$Datos = array (
		0 => utf8_decode( htmlspecialchars( addslashes( $beneficiario ) ) ),
		1 => utf8_decode( htmlspecialchars( addslashes( $tipo ) ) ),
		2 => utf8_decode( htmlspecialchars( addslashes( $idben ) ) ),
		3 => utf8_decode( htmlspecialchars( addslashes( abs($_SESSION['usuario_id'])  ) ) ),
	);
	$Campos = array (
		0 => "nombres",
		1 => "tipo",
		2 => "idBen",
		3 => "admin",
	);
	$ultidben =	$objeto->Insertar($Tabla, $Datos, $Campos);
	
	$TablaDet = 'beneficiarios_detalle'; 
	$CamposDet = array (
			0 => "idben",
			1 => "campo",
			2 => "imagen",
			3 => "estatus",
		);
	$ForCampo=0;
	for($f1=0;$f1<$totcamp;$f1++){
		$ForCampo++; 
		$campoinp	=	$_POST['Campo'.$ForCampo];
		$tipodetinp	=	$_POST['tipodet'.$ForCampo]; 
		
		if ($tipodetinp == "Imagen")  {
				move_uploaded_file($_FILES['Campo'.$ForCampo]["tmp_name"], "images/".$_FILES['Campo'.$ForCampo]["name"] ); 
				$campo	=	"";	
				$imagen	=	"images/".$_FILES['Campo'.$ForCampo]["name"];
		}else{
			$campo	=	$campoinp;	
			$imagen	=	"";	
		}
		
		$DatosDet = array (
			0 => utf8_decode( htmlspecialchars( addslashes( $ultidben ) ) ),
			1 => utf8_decode( htmlspecialchars( addslashes( $campo ) ) ),
			2 => utf8_decode( htmlspecialchars( addslashes( $imagen) ) ),
			3 => utf8_decode( htmlspecialchars( addslashes( 'Activo'  ) ) ),
		);
			
		$objeto->Insertar($TablaDet, $DatosDet, $CamposDet);
		unset($DatosDet);
	} 
	echo '<script type="text/javascript">alert("Agregado correctamente");;window.location.href = "beneficiarios_agregar.php";</script>';
	//header("Location: beneficiarios_agregar.php");
     
	/*$conteo = $objeto->Buscar_Instruccion("select * from apoyos");
	for ($i=1; $i <= count($conteo); $i++) {
		$ben = $objeto->Buscar_Instruccion("select * from apoyo$i where beneficiario = '".$_POST["inpBen"]."' and estatus = 'Activo'");
		if (count($ben) == 1) {
			$reg = false;
				break;
		}
		else {
			$reg = true;
		}
	}
	if ($reg) {
		$ti = explode(" - ",$apoyo[0][1]);
		$Tabla = $ti[0];

		$Datos[0] = utf8_decode( htmlspecialchars( addslashes( $_POST['inpBen'] ) ) );
		$Campos[0] = "beneficiario";
		$ti = explode("|",$apoyo[0][5]);
		for ($i=0; $i < $apoyo[0][3]; $i++) {
			if ($ti[$i] != "Imagen") {
				$Datos[($i + 1)] = utf8_decode( htmlspecialchars( addslashes( $_POST['Campo'.$i] ) ) );
			}
			elseif ($ti[$i] == "Imagen")  {
				move_uploaded_file($_FILES['Campo'.$i]["tmp_name"], "images/".$_FILES['Campo'.$i]["name"] );
				$Datos[($i + 1)] = "images/".$_FILES['Campo'.$i]["name"];
			}
			$Campos[($i + 1)] = 'campo'.($i+1);
		}
		$Datos[] = $_SESSION["Campo0"];
		$Campos[] = "admin";
		$objeto->Insertar($Tabla, $Datos, $Campos);
		echo '<script type="text/javascript">alert("Agregado correctamente")</script>';
	}
	else {
		echo '<script type="text/javascript">alert("El beneficiario ya a sido registrado anteriormente")</script>';
	}*/
}
elseif (isset($_POST["btnBen"])) {
	$_SESSION["tbl"] = $_POST['inpBen2'];
}
elseif ( isset($_GET['idDesactivar']) )
{
	$Tabla = $_SESSION["tbl"];
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
	$Tabla = $_SESSION["tbl"];
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


$Instruccion =  "SELECT apoyos.id, apoyos.apoyo, dep.departamento, apoyos.estatus FROM apoyos INNER JOIN dep on dep.id = apoyos.idDep where apoyos.apoyo like '%".$_POST["inpBus1"]."%' and apoyos.idDep = ".$_POST["inpBus2"]." and apoyos.estatus = 'Activo'";


$DesBusApoAyu	=	$_POST['inpBus1'];
$DepBusApoAyu	=	$_POST['inpBus2'];

if($DesBusApoAyu != ""){$FilDesBusApoAyu="and descripcion like '".$DesBusApoAyu."%'";}else{$FilDesBusApoAyu="";}
if($DepBusApoAyu != ""){$FilDepBusApoAyu="and idDep =".$DepBusApoAyu."";}else{$FilDepBusApoAyu="";}

$Instruccion="
select * from 
(
(select 'ayudas' as tipox,ay.id,ay.ayuda as descripcion,ay.idDep,ay.cantidad,ay.campos,ay.tipo,ay.admin,ay.estatus,d.departamento
from ayudas ay, dep d
where
ay.idDep=d.id
and ay.estatus = 'Activo')

union all 

(select 'apoyos' as tipox,ap.id,ap.apoyo as descripcion,ap.idDep,ap.cantidad,ap.campos,ap.tipo,ap.admin,ap.estatus,d.departamento
from apoyos ap, dep d
where
ap.idDep=d.id
and ap.estatus = 'Activo')
) ayuapo
where
estatus = 'Activo'
".$FilDesBusApoAyu."
".$FilDepBusApoAyu."
";
$DatosBuscados = $objeto->Buscar_Instruccion($Instruccion);

$Departamentos = $objeto->Buscar_Instruccion("select * from dep where estatus = 'Activo'");

$Bene = $objeto->Buscar_Instruccion("select * from apoyos");

$BusBen = $objeto->Buscar_Instruccion("select 
".$_SESSION["tbl"].".*, concat(admin.nombres,' ',admin.apellidos) 
from ".$_SESSION["tbl"]." inner join admin on admin.id = ".$_SESSION["tbl"].".admin 
where 
beneficiario like '%".$_POST["inpBen1"]."%'");

if ( isset($_GET["beneficiario"]))
{
	$_SESSION["beneficiario"] = $_GET["beneficiario"];
}
if ( isset($_POST["btnReg"]) )
{
	$Tabla = "registros";
	$Campos[0] = "idBen";
	$Campos[1] = "tabla";
	$Campos[2] = "admin";
	$Datos[0] = $_SESSION["beneficiario"];
	for ($i=0; $i < count($Bene); $i++) {
		$ti = explode(" - ",$Bene[$i][1]);
		if($_SESSION["tbl"] == $ti[0]) { $Datos[1] = $ti[0]; }
	}
	$Datos[2] = $_SESSION["Campo0"];
	$objeto->Insertar($Tabla, $Datos, $Campos);
}
$BusReg = $objeto->Buscar_Instruccion("SELECT concat(admin.nombres,' ',admin.apellidos), ".$_SESSION["tbl"].".beneficiario,registros.tabla, registros.fecha FROM `registros` INNER JOIN ".$_SESSION["tbl"]." on registros.idBen = ".$_SESSION["tbl"].".id inner join admin on admin.id = registros.admin WHERE registros.idBen = '".$_SESSION["beneficiario"]."' and registros.tabla = '".$_SESSION["tbl"]."' order by registros.fecha desc");

$BusDat = $objeto->Buscar_Instruccion("select * from ".$_SESSION["tbl"]." where id = '".$_GET["datos"]."'");


$query_departamento =  "select * from dep order by departamento";	
$rs_departamento = $objeto->Buscar_Instruccion($query_departamento);


 
$Departamento	=	abs($_POST['inpDep']);
if($Departamento != 0){$FilDep="and idDep=".$Departamento;}else{$FilDep="";}
$query_apoyoayuda="
select * from 
(
(select 'Ayuda' as tipox,ay.id,ay.ayuda as descripcion,ay.idDep,ay.cantidad,ay.campos,ay.tipo,ay.admin,ay.estatus,d.departamento
from ayudas ay, dep d
where
ay.idDep=d.id
and ay.estatus = 'Activo')

union all 

(select 'Apoyo' as tipox,ap.id,ap.apoyo as descripcion,ap.idDep,ap.cantidad,ap.campos,ap.tipo,ap.admin,ap.estatus,d.departamento
from apoyos ap, dep d
where
ap.idDep=d.id
and ap.estatus = 'Activo')
) ayuapo
where
estatus = 'Activo' 
".$FilDep."
";
$rs_apoyoayuda = $objeto->Buscar_Instruccion($query_apoyoayuda);
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Nava</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?rand=<?php echo rand(0,99999)?>" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <style>
 
</style>
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
 
									<section align="center">
										<h2>Agregar Beneficiario</h2> 
									</section>
                                    <section align="center">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                            <div class="row gtr-uniform">

                                            	<div class="col-6">
                                                    <input type="text" name="inpBen" id="inpBen" value="<?php echo $_POST["inpBen"]; ?>"  onkeypress="return longitud(this, 150) && validar(event,'letras','áéíóú ')" placeholder="Nombre del Beneficiario" />
                                                </div>

                                                <div class="col-6">
                                                    <select name="inpDep" id="inpDep" onChange="submit()" >
                                                        <option value="">- Todos -</option>
                                                        <?php 
														
														foreach ($rs_departamento as $rs_departamento_row){ 
														   
														?>
                                                        	<option value="<?php echo $rs_departamento_row[0]; ?>" <?php if($_POST["inpDep"] == $rs_departamento_row[0]) { echo "selected"; } ?>><?php echo $rs_departamento_row[1]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                <select  name="inpApoAyu" id="inpApoAyu"  onChange="submit()">
                                                <option value="">- Ayuda / Apoyo -</option>
                                                <?php 
												foreach ($rs_apoyoayuda as $rs_apoyoayuda_rows){ 
													$tipox 			=	$rs_apoyoayuda_rows['tipox'];
													$descripcionx 	=	$rs_apoyoayuda_rows['descripcion'];
													$idx		  	= 	$rs_apoyoayuda_rows['id'];
													$indexx			=	$tipox."|".$idx;
													if($indexx == trim($_POST['inpApoAyu'])){$SelApoAyu="selected";}else{$SelApoAyu="";}
													echo '<option '.$SelApoAyu.' value="'.$indexx.'">'.$tipox." : ".$descripcionx.'</option>';
												}
												?>
                                                </select>
                                                     
                                                </div>
												  
                                                <?php //,campos,tipo
												
												$urlapoyoayuda	=	$_POST['inpApoAyu'];
												if($urlapoyoayuda != ""){
												$arrapoyoayuda	=	explode("|",$urlapoyoayuda);
												if($arrapoyoayuda[0] == 'Apoyo'){
													$query_apoyoayuda =  "select * from apoyos where id=".$arrapoyoayuda[1];
												}else{
													$query_apoyoayuda =  "select * from ayudas where id=".$arrapoyoayuda[1];
												}
												 
												$rs_apoyoayuda = $objeto->Buscar_Instruccion($query_apoyoayuda);

													
												$no = explode("|",$rs_apoyoayuda[0]['campos']);
												$ti = explode("|",$rs_apoyoayuda[0]['tipo']);
												$ForCampo=0;
												for ($i=0; $i < count($no); $i++) :
												$ForCampo++;
												?>
												<?php if ( $ti[$i] == "Letra y numero" ): ?>
													<div class="col-12">
														<input type="text" name="<?php echo 'Campo'.$ForCampo; ?>" id="<?php echo 'Campo'.$ForCampo; ?>" onkeypress="return longitud(this, 250) && validar(event,'ambos','áéíóú ')" placeholder="<?php echo $no[$i] ?>" required />
														<input name="tipodet<?php echo $ForCampo;?>" id="tipodet<?php echo $ForCampo;?>" type="hidden" value="<?php echo $ti[$i];?>">
													</div>
												<?php endif; ?>
													<?php if ( $ti[$i] == "Textos" ): ?>
														<div class="col-12">
															<input type="text" name="<?php echo 'Campo'.$ForCampo; ?>" id="<?php echo 'Campo'.$ForCampo; ?>" onkeypress="return longitud(this, 250) && validar(event,'letras','áéíóú ')" placeholder="<?php echo $no[$i] ?>" required />
															<input name="tipodet<?php echo $ForCampo;?>" id="tipodet<?php echo $ForCampo;?>" type="hidden" value="<?php echo $ti[$i];?>">
														</div>
													<?php endif; ?>
													<?php if ( $ti[$i] == "Numeros" ): ?>
														<div class="col-12">
															<input type="text" name="<?php echo 'Campo'.$ForCampo; ?>" id="<?php echo 'Campo'.$ForCampo; ?>" onkeypress="return longitud(this, 250) && validar(event,'numeros','')" placeholder="<?php echo $no[$i] ?>" required />
															<input name="tipodet<?php echo $ForCampo;?>" id="tipodet<?php echo $ForCampo;?>" type="hidden" value="<?php echo $ti[$i];?>">
														</div>
													<?php endif; ?>
													<?php if ( $ti[$i] == "Imagen" ): ?>
														<div class="col-6">
															<input type="file" name="<?php echo 'Campo'.$ForCampo; ?>" id="<?php echo 'Campo'.$ForCampo; ?>" onchange="imagen('<?php echo 'Campo'.$ForCampo; ?>','<?php echo "img".$ForCampo ?>','f')" required>
															<input name="tipodet<?php echo $ForCampo;?>" id="tipodet<?php echo $ForCampo;?>" type="hidden" value="<?php echo $ti[$i];?>">
														</div>
														<div class="col-6">
															<label for="txtImg1" title="<?php echo $no[$i] ?>" id="<?php echo "img".$ForCampo ?>"><img id="I1" src="images/pic01.jpg" width="150px" height="100px"></label>
														</div>
														
													<?php endif; ?>
												<?php endfor; ?>
                                                <?php } ?> 
                                                <!--  <div class="row gtr-uniform">-->
                                                	
												<?php //if ($_SESSION["Campo0"] == "1"):
												
												if ( isset($_SESSION['Campo0']) ):
												 ?>
                                                    <div class="col-12">
                                                    <input name="totcamp" id="totcamp" type="hidden" value="<?php echo count($ti);?>">
                                                    <input  name="btnGuardar" id="btnGuardar" type="submit" value="Guardar" class="primary" onclick="return guardar()" />
                                                    </div>
                                                     
												<?php endif; ?>
                                               <!-- </div>-->
                                            </div>
                                            
                                          
                                        </form>
                                    </section>
                                 
 
                            </section>

					</div>

			</div>

            <script type="text/javascript">

            </script>

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
	 nom = document.getElementById('inpBen')
	 ape = document.getElementById('inpDep')
	 use = document.getElementById('inpApoAyu')
	// con = document.getElementById('inpConAg')

	 if ( sinEspacios(nom.value) == "" ) {
	 	nom.focus()
		alert("Llene el campo de beneficiario.")
		return false
	 } 
	 else if ( sinEspacios(use.value) == "" ) {
	 	use.focus()
		alert("Seleccione el apoyo/ayuda.")
		return false
	 }
	 
 }
const imagen = (input,div,funcion) => {
    let fileInput = document.getElementById(input);
    let filePath = fileInput.value;
    let allowedExtensions = /(.jpg|.jpeg|.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        document.getElementById(div).innerHTML = '<img width="150px" height="100px" src="images/pic01.jpg"/>';
        alert('Porfavor seleccione archivos conla siguiente extensión .jpeg/.jpg/.png');
        fileInput.value = '';
        return false;
    }else{
        if (fileInput.files && fileInput.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(div).innerHTML = '<img width="150px" height="100px" src="'+e.target.result+'"/>';
                if (funcion == 'f') {
                    cambioImagen(input)
                }
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>
