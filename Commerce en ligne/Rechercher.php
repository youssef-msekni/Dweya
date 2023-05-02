<?php
session_start();
include("exemple16.2.php");
$idcom=connexobjet('db_commerce','myparam');
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

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <div class="top_contact-container">
          <div class="tel_container">
            <a href="">
              <img src="images/telephone-symbol-button.png" alt=""> Call : +216 50 394 352
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
          <a class="navbar-brand" href="loggedin.php">
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
                  <a class="nav-link" href="loggedin.php">Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="aboutlogged.php"> A Propos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="medicinelogged.php"> Medicaments </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buy.php"> Boutique</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="newslogged.php"> Nouveautés </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Formulairelogged.php">Nous Contacter</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Rechercher.php">Rechercher Un Produit</a>
                </li>
              </ul>
              
              <div class="login_btn-contanier ml-0 ml-lg-5">
                <a href="logout.php">
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
  </div>
<!-- Recherche section -->
  
<section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="custom_heading-container ">
          <h2>
          RECHERCHER
          </h2>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>

<div class="bord">
<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
Rechercher un article <input type="text" name="motcle" size="30" maxlength="256" />
 Catégorie : 
 <select name="categorie" size="1">
 <option value=""> Toutes</option>
 <option value="Medicaments"> Medicaments</option>
 <option value="Vitamines"> Vitamines</option>
 <option value="Suppliments"> Suppliments</option>
 
 </select>
 Trier par : Description <input type="radio" name="tri" value="design" checked="checked" /> 
	prix : <input type="radio" name="tri" value="prix" />&nbsp;&nbsp;
	<input type="submit" name="envoi" value=" Rechercher " />
</fieldset>
</form>
<div>
<?php

if(isset($_POST['envoi']))
{
//Récupération des saisies
$motcle= ($_POST['motcle']!="")?$_POST['motcle']:"e";
$categorie= $_POST['categorie'];
$tri= $_POST['tri'];
//Création de la requète
$requete = "SELECT id_article,design,prix FROM article WHERE ";
if($motcle) $requete.=" design LIKE '%$motcle%' ";
if($categorie !="") $requete.=" AND categorie='$categorie' ";
$requete.=" ORDER BY $tri";
$result=$idcom->query($requete);

$nbart=$result->num_rows;
echo "<h3>Il y a $nbart articles répondant à votre recherche</h3>";
echo "<h3>Commandez un article à la fois</h3>";

while($tab = $result->fetch_assoc())
{
 echo"<form action=\"Panier.php\" method=\"post\">";
 echo "<div class=\"bord\"><b>",$tab['design'] ,"</b><br /> Prix unitaire : ",$tab['prix'] ," Dt <br /> Référence : ",$tab['id_article'],"  <br /> Choisir la quantité : 
 <input type=\"text\" name=\"quantite\" size=\"2\" maxlength=\"2\" value=\"0\"/> <input type=\"submit\" value=\"Commander\" />  
 <input type=\"hidden\" name=\"id_article\" value=\"",$tab['id_article'],"\" /> 
 <input type=\"hidden\" name=\"prix_unit\" value=\"",$tab['prix'],"\" /><input type=\"hidden\" name=\"design\" value=\"",$tab['design'],"\" /></div>";
echo"</form>";
  }
}
?>
</div>
</div>
</section>
  <!-- end Rechcerche section -->
   <!-- info section -->
   <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h4>
              Contact
            </h4>
            <div class="box">
              <div class="img-box">
                <img src="images/telephone-symbol-button.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  +216 50 394 352
                </h6>
              </div>
            </div>
            <div class="box">
              <div class="img-box">
                <img src="images/email.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                y.msekni49@gmail.com
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_menu">
            <h4>
              Menu
            </h4>
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="loggedin.php">Acceuil <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutlogged.php"> A propos </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="medicinelogged.php"> Medicaments </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buy.php"> Boutique </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info_news">
            <h4>
              
            BULLETIN
            </h4>
            <form action="">
              <input type="text" placeholder="Enter Your email">
              <div class="d-flex justify-content-center justify-content-end mt-3">
                <button>
                S'abonner
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end info section -->

  <!-- footer section -->
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