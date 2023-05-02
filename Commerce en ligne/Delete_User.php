<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Supprimer un Utilisateur</title>
</head>
<body>
<form action= "<?php echo $_SERVER['PHP_SELF']?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Supprimer un Utilisateur</b></legend>
<table>
<tbody>
<tr> <td>Login: </td>
<td><input type="text" name="Login" size="50" maxlength="40" /></td>
</tr>
<tr> <td>Pass: </td>
<td><input type="password" name="Pass" size="30" maxlength="25" /></td>
</tr>
<tr><td>Supprimer</td><td><input type="submit" name="" value="OK"/></td> </tr>
</tbody>
</table>
</fieldset>
</form>
<?php
if(!empty($_POST ['Login'])&& !empty($_POST ['Pass'])) 
{
include("connexion.php");
$Login=strtolower($_POST ['Login']); 
$Pass=($_POST ['Pass']); 
// Requête SQL
$reqPass=($_POST['Pass']=="tous")?"":"AND Pass='$Pass'"; 
$requete="DELETE FROM `user` WHERE lower(Login)
LIKE'%$Login%' AND Pass LIKE'%$Pass%'"; 
$idcom=connexpdo('db_commerce','myparam');
$result=$idcom->prepare($requete); 
$result->execute();

if(!$result) 
{
echo "Suppresion impossible";
}
else 
{
$nbcol=$result->columnCount();
$nbart=$result->rowCount();
if($nbart==0)
{echo "<h3>L'utilisateur  $Login est supprimé</h3>";

exit;
}
echo "<h3>Il n'y a aucun utilisateur correspondant au login : $Login</h3>";



}
echo "</table>";
$result->closeCursor();
$idcom=null;
}
?>
</body>
</html>