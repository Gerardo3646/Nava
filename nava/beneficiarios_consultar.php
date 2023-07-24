<?php
error_reporting(1);
session_start();

if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
$_SESSION['s_menu'] = 'beneficario';
require("../Conexion.php");
$objeto = new Conexion();
 

$Instruccion =  "SELECT apoyos.id, apoyos.apoyo, dep.departamento, apoyos.estatus FROM apoyos INNER JOIN dep on dep.id = apoyos.idDep where apoyos.apoyo like '%".$_POST["inpBus1"]."%' and apoyos.idDep = ".$_POST["inpBus2"]." and apoyos.estatus = 'Activo'";


$DesBenef	=	$_POST['inpBen'];
$IdApoAyu	=	$_POST['inpApoAyu'];

 

if($DesBenef != ""){$FilDesBenef="and b.nombres like '".$DesBenef."%'";}else{$FilDesBenef="";}
if($IdApoAyu != ""){
	$ArrIdApoAyu	=	explode("|",$IdApoAyu); 
	$FilIdApoAyu="and b.tipo='".$ArrIdApoAyu[0]."' and b.idBen =".$ArrIdApoAyu[1]."";
}else{$FilIdApoAyu="";}

$query_beneficiarios="
select b.*,u.usuarios 
from  beneficiarios b, admin u
where
b.admin=u.id  
".$FilDesBenef."
".$FilIdApoAyu."
";
$rs_beneficiarios = $objeto->Buscar_Instruccion($query_beneficiarios);
   
 
  
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
 									<?php if ( !isset($_GET["datos"]) ){ ?>
									<section align="center">
										<h2>Consultar Beneficiarios</h2> 
									</section>
                                    <section align="center">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row gtr-uniform">

                                            	<div class="col-6">
                                                    <input type="text" name="inpBen" id="inpBen" value="<?php echo $_POST["inpBen"]; ?>"  onkeypress="return longitud(this, 150) && validar(event,'letras','áéíóú ')" placeholder="Nombre del Beneficiario" />
                                                </div> 
                                              <div class="col-3">
                                                <select  name="inpApoAyu" id="inpApoAyu"   >
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
                                              <!--  <div class="row gtr-uniform">-->
                                                	
												<?php   
												if ( isset($_SESSION['Campo0']) ):
												 ?>
                                                    <div class="col-3"> 
                                                    <input  name="btnBen" id="btnBen" type="submit" value="Buscar" class="primary"   />
                                                    </div>
                                                     
												<?php endif; ?>
                                               <!-- </div>-->
                                            </div>
                                            
                                          <br>
                                          <br>
                                          <div class="table-wrapper">
    											<table class="alt">
    												<thead>
    													<tr>
    													  <td>N&ordm;</td>
    													  <td>Tipo</td>
    													  <td>Beneficiario</td>
                                                            <td>Agregado por</td>
															<td>Apoyo / Ayuda</td>
															<td>Acciones</td>
    													</tr>
    												</thead>
    												<tbody>
														<?php 
														$FilBen=0;
														foreach ($rs_beneficiarios as $rs_beneficiarios_rows){ 
														$FilBen++;
														$idBen	=	$rs_beneficiarios_rows["idBen"];
														if(trim($rs_beneficiarios_rows["tipo"]) == 'Apoyo'){
															$query_apoyo=" select apoyo from apoyos where id=".$idBen;
															$rs_apoyo = $objeto->Buscar_Instruccion($query_apoyo);
															$tipoapoayu	=	$rs_apoyo[0]["apoyo"];
														}elseif(trim($rs_beneficiarios_rows["tipo"]) == 'Ayuda'){
															$query_ayuda=" select ayuda from ayudas where id=".$idBen;
															$rs_ayuda = $objeto->Buscar_Instruccion($query_ayuda);
															$tipoapoayu	=	$rs_ayuda[0]["ayuda"];
														}
														
	 

														?>
											            <tr>
                                                            <td><?php echo $FilBen;?></td>
                                                            <td><?php echo $rs_beneficiarios_rows["tipo"]; ?></td>
                                                            <td><?php echo $rs_beneficiarios_rows["nombres"]; ?></td>
                                                            <td><?php echo $rs_beneficiarios_rows["usuarios"]; ?></td>
                                                            <td><?php echo $tipoapoayu; ?></td>
                                                            <td>
                                                            <a href="beneficiarios_consultar.php?datos=<?php echo $rs_beneficiarios_rows[0]; ?>"><input type="button" value="Informaci&oacute;n"></a>
                                                            <a style="display:none" href="beneficiarios.php?beneficiario=<?php echo $rs_beneficiarios_rows[0]; ?>"><input type="button" value="Entregas"></a>
                                                            <?php if ( $rs_beneficiarios_rows["estatus"] == "Activo" ): ?>
                                                            <a style="display:none" href="beneficiarios.php?idDesactivar=<?php echo $rs_beneficiarios_rows[0]; ?>"><input type="button" value="Desactivar"></a>
                                                            <?php endif; ?>
                                                            <?php if ( $rs_beneficiarios_rows["estatus"] != "Activo" ): ?>
                                                            <a style="display:none" href="beneficiarios.php?idActivar=<?php echo $rs_beneficiarios_rows[0]; ?>"><input type="button" value="Activar"></a>
                                                            <?php endif; ?>
                                                            </td>
											            </tr>
											            <?php } ?>
    												</tbody>
    											</table>
                                                
                                          </div>
                                      </form>
                                        
                                    </section>
                                    <?php  
									}else{ 
									$beneficiario	=	abs($_GET["datos"]);
									$query_beneficiario =  "select b.*,a.usuarios 
									from beneficiarios b, admin a 
									where 
									b.admin=a.id
									and b.id=".$beneficiario;	
									$rs_beneficiario = $objeto->Buscar_Instruccion($query_beneficiario);
									
									$tipo		=	trim($rs_beneficiario[0]['tipo']); 
									$nombres	=	trim($rs_beneficiario[0]['nombres']); 
									$usuarios	=	trim($rs_beneficiario[0]['usuarios']); 
									$evidencia	=	trim($rs_beneficiario[0]['evidencia']); 
									if($evidencia != ""){$estado_evidencia="Si";}else{$estado_evidencia="No";}
									
									$query_beneficiario_det =  "select  * 
									from beneficiarios_detalle 
									where  
									idben=".$beneficiario;	
									$rs_beneficiario_det = $objeto->Buscar_Instruccion($query_beneficiario_det);
									
									
									?>
                                    <section align="center">
										<h2>Beneficiario <?php echo $tipo;?> : <?php echo $nombres;?> </h2> 
									</section>
                                    <section align="center">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="row gtr-uniform">
                                             <div class="col-6">
                                           	 	Agregado por : <?php echo $usuarios;?>
                                             </div>
                                             <div class="col-6">
                                           	 	Evidencia : <?php echo $estado_evidencia;?>
                                             </div>
                                             <div class="col-6">
                                             
                                             </div>
                                             <div class="col-6">
                                             <a href="beneficiarios_consultar.php"><input type="button" value="Volver"></a>
                                             </div>
                                             <div class="col-12">
                                           	 	 <table class="alt">
                                                    <thead>
                                                        <tr>
                                                            <td>N&ordm;</td>
                                                            <td>Descripci&oacute;n</td> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
														$FilBenDet=0;
                                                        foreach ($rs_beneficiario_det as $rs_beneficiario_det_rows){ 
															$FilBenDet++;
															$campo 		=	$rs_beneficiario_det_rows['campo'];
															$imagen	 	=	$rs_beneficiario_det_rows['imagen'];
														?>
                                                        <tr>
                                                        	<td><?php echo $FilBenDet;?></td>
                                                            <td>
															
															<?php 
															if($campo != ""){
															echo $campo;
															}else{
															?>
                                                            <img width="76" height="77" src="<?php echo $imagen;?>">
                                                            <?php } ?>
                                                            </td> 
                                                        </tr>
                                                        <?php
														}
														?>
                                                    </tbody>
    											</table>
                                             </div>
                                         </div>
                                    </form>
                                    </section>
 									<?php }  ?>
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
