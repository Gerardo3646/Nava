<?php
error_reporting(1);
session_start();

if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
require("../Conexion.php");
$objeto = new Conexion();
 
 
    
 
if (isset($_POST["btnGuardarEnv"])){

	$beneficiario	=	abs($_POST['inpidben']);
	$inpimg			=	trim($_POST['inpimg']);
	$inpfec			=	trim($_POST['inpfec']);
	 
	 
	move_uploaded_file($_FILES['inpimg']["tmp_name"], "images/".$_FILES['inpimg']["name"] );  
	$imagen	=	"images/".$_FILES['inpimg']["name"];
	
	$update_beneficiarios=" update beneficiarios set evidencia='".$imagen."',fecha_evidencia='".$inpfec."',usuario_evidencia=".abs($_SESSION['usuario_id']) ."
	where id=".$beneficiario;
	$rs_beneficiarios = $objeto->Buscar_Instruccion($update_beneficiarios);
	echo '<script type="text/javascript">alert("Evidencia agregado correctamente");window.location.href = "evidencias.php";</script>';
}

$Instruccion =  "SELECT apoyos.id, apoyos.apoyo, dep.departamento, apoyos.estatus FROM apoyos INNER JOIN dep on dep.id = apoyos.idDep where apoyos.apoyo like '%".$_POST["inpBus1"]."%' and apoyos.idDep = ".$_POST["inpBus2"]." and apoyos.estatus = 'Activo'";


$DesBenef	=	$_POST['inpBen'];
$IdApoAyu	=	$_POST['inpApoAyu'];

 

if($DesBenef != ""){$FilDesBenef="and b.nombres like '".$DesBenef."%'";}else{$FilDesBenef="";}
if($IdApoAyu != ""){
	$ArrIdApoAyu	=	explode("|",$IdApoAyu); 
	$FilIdApoAyu="and b.tipo='".$ArrIdApoAyu[0]."' and b.idBen =".$ArrIdApoAyu[1]."";
}else{$FilIdApoAyu="";}

$idbenurl	=	abs($_GET["datos"]); 
if($idbenurl != 0){$FilBenUrl=" and b.id=".$idbenurl;}else{$FilBenUrl="";}

$query_beneficiarios="
select b.*,u.usuarios 
from  beneficiarios b, admin u
where
b.admin=u.id  
".$FilDesBenef."
".$FilIdApoAyu."
".$FilBenUrl."
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
 									
                                    <?php if ( !(isset($_GET["datos"]))  ){ ?>
									<section align="center">
										<h2>Agregar Evidencias</h2> 
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
														$idbenx	=	$rs_beneficiarios_rows["id"];
														$idBen	=	$rs_beneficiarios_rows["idBen"];
														$evidencia	=	trim($rs_beneficiarios_rows["evidencia"]);
														
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
                                                            
                                                            <?php if($evidencia != ""){?> 
                                                            <a href="evidencias.php?tipo=view&datos=<?php echo $idbenx; ?>" ><input style="background-color:#008040 !important; color:#FFF !important;" type="button" value="Ver Evidencia"></a>
                                                            <?php }else{ ?>
                                                            <a href="evidencias.php?tipo=add&datos=<?php echo $idbenx; ?>"><input type="button" value="Agregar Evidencia"></a>
                                                            <?php } ?>
                                                           
                                                            </td>
											            </tr>
											            <?php } ?>
    												</tbody>
    											</table>
                                                
                                          </div>
                                      </form>
                                        
                                    </section>
                                 	 <?php }else{ 
									 
									 //view add
									 
									 ?>
                                     <section align="center">
										<h2>Evidencia: <?php echo $rs_beneficiarios[0]["tipo"]." - ".$rs_beneficiarios[0]["nombres"];?></h2> 
									</section>
                                    <section align="center">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                            <div class="row gtr-uniform">
 				<?php if($_GET['tipo'] == 'add'){ ?>
                <div class="col-3">
                <input type="date" name="inpfec" id="inpfec" value="<?php echo $_POST["inpfec"]; ?>"  placeholder="Ingrese fecha"   />
                </div> 
                <div class="col-6">
                <input type="file" name="inpimg" id="inpimg" onchange="imagen('<?php echo 'inpimg'; ?>','<?php echo "img1" ?>','f')" required>
                
                </div> 
                <div class="col-3">
                <label for="txtImg1"  id="<?php echo "img1" ?>"><img id="I1" src="images/pic01.jpg" width="150px" height="100px"></label>
                </div>
                <?php }else{ ?>
                <div class="col-6">
                <?php echo "Fecha : ".$rs_beneficiarios[0]["fecha_evidencia"];?>
                </div>  
                <div class="col-6">
                <label for="txtImg1"  id="<?php echo "img1" ?>"><img id="I1" src="<?php echo $rs_beneficiarios[0]["evidencia"];?>" width="150px" height="100px"></label>
                </div>
                <?php }  ?>
                                              <!--  <div class="row gtr-uniform">-->
                                                	
												<?php   
												if ( isset($_SESSION['Campo0']) ):
												 ?>
                                                    <div class="col-12"> 
                                                    <?php if($_GET['tipo'] == 'add'){ ?>
                                                    <input  name="btnGuardarEnv" id="btnGuardarEnv" type="submit" value="Guardar" class="primary"   />
                                                    <?php } ?>
                                                    <input name="inpidben" id="inpidben" type="hidden" value="<?php echo $_GET["datos"];?>">
                                                    <a href="evidencias.php"><input type="button" value="Volver"></a>
                                                           
                                                    </div>
                                                     
												<?php endif; ?>
                                               <!-- </div>-->
                                            </div>
                                            
                                          <br>
                                          <br>
                                           
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
