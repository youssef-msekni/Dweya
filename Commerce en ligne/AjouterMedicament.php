<?php
                    session_start();
                    
                    ?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Dweya</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <div class="top_contact-container">
          <div class="tel_container">
            <a href="">
              <img src="images/telephone-symbol-button.png" alt=""> Appeler : +216 50 394 352
            </a>
          </div>
          <div class="social-container">
            <a href="">
              <img src="images/fb.png" alt="" class="s-1">
            </a>
            <a href="">
              <img src="images/twitter.png" alt="" class="s-2">
            </a>
            <a href="">
              <img src="images/instagram.png" alt="" class="s-3">
            </a>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="logedinadmin.php">
            <img src="images/logo.png" alt="">
            <span>
              Dweya
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center w-100 justify-content-between">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="logedinadmin.php">Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Baseform.php"> Formulaire de Conntact </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="AjouterMedicament.php">Ajouter Medicaments </a>
                </li>
                
              </ul>
              
              <div class="login_btn-contanier ml-0 ml-lg-5" >
                <a href="logoutadmin.php">
                  <img src="images/user.png" alt="">
                  <span>
                   <?php
                    echo $_SESSION["Login"]; ?>
                  </span>
                </a>
              </div>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
    
 
<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Cordonnées de Produit:</b></legend>
<table>
<tr><td>design : </td><td><input type="text" name="design" size="40" maxlength="30"/>
</td></tr>
<tr><td>prix : </td><td><input type="text" name="prix" size="40" maxlength="30"
/></td></tr>
<tr><td>categorie : </td><td><input type="text" name="categorie" size="40" maxlength="30"
/></td></tr>
<tr><td>Lien de  l'image : </td><td><input type="text" name="image" size="40" maxlength="50"
/></td></tr>

<tr>
<td><input type="reset" value="Effacer"></td>
<td><input type="submit" value="Envoyer"></td>
</tr>
</table>
</fieldset>
</form>
<?php
include("connexion.php");
$idcom=connexpdo('db_commerce','myparam');
if(!empty($_POST['design'])&& !empty($_POST['prix'])&& !empty($_POST['categorie'])&& !empty($_POST['image'])) 
{
$id_article="\N"; 
$design=($_POST['design']); 
$prix=($_POST['prix']); 
$categorie=($_POST['categorie']); 
$image=($_POST['image']);
 
$requete="INSERT INTO article
VALUES(:id_article,:design,:prix,:categorie,:image)";
 $reqprep= $idcom->prepare($requete);
 $reqprep->bindparam(':id_article',$id_article,PDO::PARAM_INT); 
 $reqprep->bindParam(':design',$design,PDO::PARAM_STR); 
 $reqprep->bindparam(':prix', $prix,PDO::PARAM_STR); 
 $reqprep->bindparam(':categorie', $categorie,PDO::PARAM_STR);
 $reqprep->bindparam(':image', $image,PDO::PARAM_STR);
 $reqprep->execute();
if(!$reqprep=1) 
{
$mess_erreur=$idcom->errorInfo();
echo "Insertion impossible, code", $idcom->errorCode(),$mess_erreur[2];
echo "<script type=\"text/javascript\">
alert('Erreur : ".$idcom->errorCode()."')</script>";
}
else
{
echo "<script type=\"text/javascript\">
alert('Vous êtes enregistré. Votre numéro d'article est : ". $idcom->lastInsertId()."')</script>"; 
//$reqprep->closeCursor();
$idcom=null;
}
}
else {echo "<br><br><h3>Formulaire à compléter !</h3>";}
?>

  <!-- end contact section -->

 

  <!-- footer section -->
  <br><br><br><br><br><br><br><br><br><br><br>
  <section class="container-fluid footer_section">
    <p>
      &copy; 2022 Tous droits réservés, Crée par Youssef Msakni
      
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
  <script type="text/javascript">
    $(".owl-2").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,

      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
</body>

</html>