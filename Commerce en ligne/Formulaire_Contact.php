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
              <img src="images/telephone-symbol-button.png" alt=""> Appeler: +216 50 394 352
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
          <a class="navbar-brand" href="index.php">
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
                  <a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> A propos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="medicine.php"> Medicaments </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Connexion_User.php"> Boutique </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="news.php"> Nouveautés </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Formulaire_Contact.php">Nous Contacter</a>
                </li>
              </ul>
              
              <div class="login_btn-contanier ml-0 ml-lg-5">
                <a href="Connexion_User.php">
                  <img src="images/user.png" alt="">
                  <span>
                    Connexion
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


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="custom_heading-container ">
          <h2>
          DEMANDER UN RAPPEL
          </h2>
        </div>
      </div>
    </div>
    <div class="container layout_padding2">
      <div class="row">
        <div class="col-md-5">
          <div class="form_contaier">
            <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post" 
enctype="application/x-www-form-urlencoded">
              <div class="form-group">
                <label for="exampleInputName1"  >Nom: </label>
                <input name="nom" type="text" class="form-control" id="exampleInputName1">
              </div>
              <div class="form-group">
                <label for="exampleInputNumber1" >Prénom :</label>
                <input name="prenom" type="text" class="form-control" id="exampleInputNumber1">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1" >Email : </label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Téléphone : </label>
                <input name="tele" type="tel" class="form-control" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" >Sujet : </label>
                <input name="sujet" type="text" class="form-control" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputMessage">Message:</label>
                <input name="message" type="text" class="form-control" id="exampleInputMessage">
              </div>
              <button type="submit" class="">Send</button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <h3>
              Contacter notre support Dweya
            </h3>
            <p>
              Ce formulaire vous permet de nous contacter pour tous votre questions ou demandes.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

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
                <a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> A propos </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="medicine.php"> Medicaments </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Connexion_User.php"> Boutique </a>
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