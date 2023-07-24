<?php

$mysqlDatabaseName ='pruebamx2';
$mysqlUserName ='root';
$mysqlPassword ='';
$mysqlHostName ='localhost';
$mysqlExportPath ='pruebamx2'.date("Ymd").'.sql';


$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' --password="' .$mysqlPassword .'" ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command,$output,$worked);
switch($worked){
case 0:
echo 'La base de datos <b>' .$mysqlDatabaseName .'</b> se ha almacenado correctamente en la siguiente ruta '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 1:
echo 'Se ha producido un error al exportar <b>' .$mysqlDatabaseName .'</b> a '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 2:
echo 'Se ha producido un error de exportación, compruebe la siguiente información: <br/><br/><table><tr><td>Nombre de la base de datos:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>Nombre de usuario MySQL:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>Contraseña MySQL:</td><td><b>NOTSHOWN</b></td></tr><tr><td>Nombre de host MySQL:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
break;
}



/**
 * @function    backupDatabaseTables
 * @author      CodexWorld
 * @link        http://www.codexworld.com
 * @usage       Backup database tables and save in SQL file
 */
function backupDatabaseTables($dbHost,$dbUsername,$dbPassword,$dbName,$tables = '*'){
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

        $return .= "nn".$row2[1].";nn";

        for($i = 0; $i < $numColumns; $i++){
            while($row = $result->fetch_row()){
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++){
                    $row[$j] = addslashes($row[$j]);
                    //$row[$j] = ereg_replace("n","n",$row[$j]);
					$row[$j] = preg_replace("n","n",$row[$j]);
                    if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                    if ($j < ($numColumns-1)) { $return.= ','; }
                }
                $return .= ");n";
            }
        }

        $return .= "nnn";
    }

    //save file
    $handle = fopen('backups/db-backup-'.time().'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
}

backupDatabaseTables('localhost','root','','pruebamx2');

?>