<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Rechercher un Utilisateur</title>
</head>
<body>
<form action= "<?php echo $_SERVER['PHP_SELF']?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Rechercher un Utilisateur</b></legend>
<table>
<tbody>
<tr> <td>Login: </td>
<td><input type="text" name="Login" size="50" maxlength="40" /></td>
</tr>
<tr> <td>Pass: </td>
<td><input type="password" name="Pass" size="30" maxlength="25" /></td>
</tr>
<tr><td>Envoyer</td><td><input type="submit" name="" value="OK"/></td> </tr>
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
$requete="SELECT id_user AS 'Code utilisateur',Login,
Pass  FROM user WHERE lower(Login)
LIKE'%$Login%' AND Pass LIKE'%$Pass%'"; 
$idcom=connexpdo('db_commerce','myparam');
$result=$idcom->prepare($requete); 
$result->execute();
if(!$result) 
{
echo "Lecture impossible";
}
else
{
$nbcol=$result->columnCount();
$nbart=$result->rowCount();
if($nbart==0)
{
echo "<h3>Il n'y a aucun utilisateur correspondant au login : $Login</h3>";
exit;
}
$ligne=$result->fetch(PDO::FETCH_ASSOC); // Tableau associatif
$titres=array_keys($ligne);
$ligne=array_values($ligne);
// print_r($titres);
echo "<h3>Il y a $nbart utilisateur(s) correspondant au Login : $Login</h3>";
// Affichage des titres du tableau
echo "<table border=\"1\"> <tr>";
foreach($titres as $val)
{
echo "<th>", htmlentities($val) ,"</th>";
}
echo "</tr>";
// Affichage des valeurs du tableau
do
{
echo "<tr>";
foreach($ligne as $donnees)
{
echo "<td>",$donnees,"</td>";
}
echo "</tr>";
}
while($ligne=$result->fetch(PDO::FETCH_NUM));
}
echo "</table>";
$result->closeCursor();
$idcom=null;
}
?>
</body>
</html>