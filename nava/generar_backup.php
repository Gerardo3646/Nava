<?php
error_reporting(1);
session_start();

if ( !(isset($_SESSION["Campo0"])) ) {
	header("location: index.php");
}
require("../Conexion.php");
$objeto = new Conexion();
 
function backupDatabaseTables($dbHost,$dbUsername,$dbPassword,$dbName,$NameBackup,$tables = '*'){
    //connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    //get all of the tables
    if($tables == '*'){
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while($row = $result->fetch_row()){
            $tables[] = $row[0];
        }
    }else{
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }

    //loop through the tables
    foreach($tables as $table){
        $result = $db->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        $return .= "DROP TABLE $table;";

        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= chr(13).chr(13)."".$row2[1].";".chr(13).chr(13).chr(10);

        for($i = 0; $i < $numColumns; $i++){
            while($row = $result->fetch_row()){
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++){
                    $row[$j] = addslashes($row[$j]);
                    //$row[$j] = ereg_replace("n","n",$row[$j]);
					//$row[$j] = preg_replace("n","n",$row[$j]);
                    if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                    if ($j < ($numColumns-1)) { $return.= ','; }
                }
                $return .= ");".chr(13).chr(10);
            }
        }

        $return .= chr(13).chr(13).chr(13);
    }

    //save file
    //$handle = fopen('backups/db-backup-'.time().'.sql','w+'); 
	$handle = fopen('backups/'.$NameBackup.'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
}
     
 
if (isset($_POST["btnGen"])){
 
	$inpDesBackup			=	trim($_POST['inpDesBackup']);
	 
	backupDatabaseTables('localhost','root','','pruebamx2',$inpDesBackup."-".date("YmdHis")); 
	echo '<script type="text/javascript">alert("Backup generado correctamente");window.location.href = "generar_backup.php";</script>';
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
										<h2>Generar Backup</h2> 
									</section>
                                    <section align="center">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row gtr-uniform">

                                            	<div class="col-6">
                                                    <input type="text" name="inpDesBackup" id="inpDesBackup" value="<?php echo $_POST["inpDesBackup"]; ?>"  onkeypress="return longitud(this, 150) && validar(event,'letras','áéíóú ')" placeholder="Nombre del Backup" />
                                                </div> 
                                              
                                              <!--  <div class="row gtr-uniform">-->
                                                	
												<?php   
												if ( isset($_SESSION['Campo0']) ):
												 ?>
                                                    <div class="col-3"> 
                                                    <input  name="btnGen" id="btnGen" type="submit" value="Generar" class="primary"   />
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
    													  <td>Backup</td>
    													  <td>Acciones</td>
    													</tr>
    												</thead>
    												<tbody>
														<?php 
														$FilBen=0;  
														$thefolder = "backups/";
														if ($handler = opendir($thefolder)) {
														while (false !== ($file = readdir($handler))) {
															
														
														if($file != "." and $file != ".."){
															$FilBen++;
														?>
											            <tr>
                                                            <td><?php echo $FilBen;?></td>
                                                            <td><?php echo $file; ?></td>
                                                            <td>
                                                             
                                                            <a href="backups/<?php echo $file; ?>" target="_blank" ><input style="background-color:#008040 !important; color:#FFF !important;" type="button" value="Descargar"></a>  
                                                           
                                                            </td>
											            </tr>
											            <?php 
														}
															}
															closedir($handler);
															}

														 ?>
    												</tbody>
    											</table>
                                                
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
	 nom = document.getElementById('inpDesBackup')
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
