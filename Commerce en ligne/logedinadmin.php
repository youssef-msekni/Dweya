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
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/medicine.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Bienvenue Administrateur  <br>
                      <span>
                      <?php
                    echo $_SESSION["Login"]; ?>
                      </span>

                    </h1>
                    <p>
                      Vous pouvez ajouter des produits ou consulter les formulaires du contact 
                    </p>
                    <div>
                      <a href="AjouterMedicament.php">
                        Ajouter produit
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
            
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/medicine.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Welcome Administrator <br>
                      <span>
                      <?php
                    echo $_SESSION["Login"]; ?>
                      </span>

                    </h1>
                    <p>
                    You can add products or consult the contact forms 
                    </p>
                    <div>
                      <a href="AjouterMedicament.php">
                        Add product
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>


    </section>
    <!-- end slider section -->
 
<?php
include("connexion.php");
$idcom=connexpdo('db_commerce','myparam');
if(!empty($_POST['nom']))  
{
$id_contact="\N"; 
$nom=$idcom->quote($_POST['nom']); 
$prenom=$idcom->quote($_POST['prenom']); 
$email=$idcom->quote($_POST['email']); 
$tele=$idcom->quote($_POST['tele']); 
$sujet=$idcom->quote($_POST['sujet']); 
$message=$idcom->quote($_POST['message']); 
        
// Requête SQL
$sql = "INSERT INTO message_contact (nom,prenom,email,tele,sujet,message) VALUES (:nom,:prenom,:email,:tele,:sujet,:message)";
$reqprep= $idcom->prepare($sql);
$reqprep->bindValue(':nom', $nom,PDO::PARAM_STR);
$reqprep->bindValue(':prenom', $prenom,PDO::PARAM_STR); 
$reqprep->bindValue(':email', $email,PDO::PARAM_STR); 
$reqprep->bindValue(':tele', $tele,PDO::PARAM_STR); 
$reqprep->bindValue(':sujet', $sujet,PDO::PARAM_STR); 
$reqprep->bindValue(':message', $message,PDO::PARAM_STR); 
$reqprep->execute();
echo "Vous êtes enregistré";
}
?>

  <!-- end contact section -->

 

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