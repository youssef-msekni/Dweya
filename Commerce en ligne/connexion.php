
<?php
function connexpdo($base,$param)
{
include_once($param.".inc.php"); 
$dsn="mysql:host=localhost;dbname=db_commerce";
$user="root";
$pass='';
try
{
$idcom = new PDO($dsn,$user,$pass); 
return $idcom;
}
catch(PDOException $except) 
{
echo"Échec de la connexion",$except->getMessage(); 
return FALSE;
exit();
}
}
?>

