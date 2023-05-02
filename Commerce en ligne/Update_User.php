<?php
if(empty($_POST['code'])){header("Location:saisiemodif.php");} 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Modifiez vos coordonnées</title>
</head>
<body>
<?php
include('connexion.php');
$idcom=connexpdo('db_commerce','myparam');
if(!isset($_POST['modif'])) 
{
$code=(integer)$_POST['code']; 
// Requête SQL
$requete=$idcom->prepare("SELECT * FROM user WHERE id_user='$code' "); 
$requete->execute();
$result=$idcom->query("SELECT * FROM user WHERE id_user='$code' ");
$coord=$result->fetch(PDO::FETCH_NUM); 
// Création du formulaire complété avec les données existantes 
echo "<form action= \"". $_SERVER['PHP_SELF']."\" method=\"post\"enctype=
\"application/x-www-form-urlencoded\">";
echo "<fieldset>";
echo "<legend><b>Modifiez vos coordonnées</b></legend>";
echo "<table>";
echo "<tr><td>Login : </td><td><input type=\"text\" name=\"Login\" size=\"50\"
maxlength=\"40\" value=\"$coord[1]\"/> </td></tr>";
echo "<tr><td>Pass : </td><td><input type=\"text\" name=\"Pass\" size=\"30\"
maxlength=\"25\" value=\"$coord[2]\"/></td></tr>";
echo "<tr><td>Role : </td><td><input type=\"text\" name=\"Role\" size=\"50\"
maxlength=\"20\" value=\"$coord[3]\"/></td></tr>";
echo "<tr><td><input type=\"reset\" value=\"Effacer\"></td> <td><input type=
\"submit\" name=\"modif\" value=\"Enregistrer\"></td></tr></table>";
echo "</fieldset>";
echo "<input type=\"hidden\" name=\"code\" value=\"$code\"/>"; 
echo "</form>";
$result->closeCursor();
$idcom=null;
}
elseif(isset($_POST['Login'])&& isset($_POST['Pass'])&& isset($_POST['Role'])) 
{
// ENREGISTREMENT
$Login=$idcom->quote($_POST['Login']);
$Pass=$idcom->quote($_POST['Pass']);
$Role=$idcom->quote($_POST['Role']);
$code=(integer)$_POST['code'];
// Requête SQL
$requete="UPDATE user SET Login=$Login,Pass=$Pass,Role=$Role  WHERE id_user=$code"; 
$result=$idcom->exec($requete);

if($result!=1) 
{
echo "<script type=\"text/javascript\">
alert('Erreur : ".$idcom->errorCode()."')</script>"; 
}
else
{
echo "<script type=\"text/javascript\"> 
alert('Vos modifications sont enregistrées');
window.location='Update_User.php';
</script>"; 
}
$reqprep->closeCursor();
$idcom=null;
}
else
{
echo "Modifiez vos coordonnées !";
}
?>
</body>
</html>