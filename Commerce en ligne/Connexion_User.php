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


  <!-- Connexion section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="custom_heading-container ">
        <h2>
        Saisissez vos coordonnées
        </h2>
      </div>

      <div class="container layout_padding2">
      <div class="row">
        <div class="col-md-5">
          <div class="form_contaier">
            <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post" 
enctype="application/x-www-form-urlencoded">
              <div class="form-group">
                <label for="exampleInputName1"  >Login: </label>
                <input name="Login" type="text" class="form-control" id="exampleInputName1">
              </div>
              <div class="form-group">
                <label for="exampleInputNumber1" >Pass :</label>
                <input name="Pass" type="password" class="form-control" id="exampleInputNumber1">
              </div>
              <div class="form-group">
                <label for="exampleInputNumber1" >Role :</label>
                <input name="Role" type="text" class="form-control" id="exampleInputNumber1">
              </div>

              
              <button type="submit" class="">Se Connecter</button>
              
              <a href="Insert_client.php">
                Crer Un Compte
                </a>  
            </form>
    </div>
  </section>
  <?php
if(!empty($_POST ['Login'])&& !empty($_POST ['Pass'])&& !empty($_POST ['Role'])) 
{
include("connexion.php");
$Login=strtolower($_POST ['Login']); 
$Pass=($_POST ['Pass']); 
$Role=($_POST ['Role']); 

// Requête SQL
$reqPass=($_POST['Pass']=="tous")?"":"AND Pass='$Pass'"; 
$requete="SELECT id_user AS 'Code utilisateur',Login,
Pass,Role FROM user WHERE lower(Login)
LIKE'%$Login%' AND Pass LIKE'%$Pass%' AND Role LIKE'%$Role%'"; 
$idcom=connexpdo('db_commerce','myparam');
$result=$idcom->prepare($requete);
$result->execute();
$id =$idcom->lastInsertId();
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
echo "<h3>Connexion Impossible , Il n'y a aucun utilisateur correspondant au login : $Login</h3>";
exit;
}
$_SESSION["Login"]=$Login;
$_SESSION["Role"]=$Role;
$_SESSION["id_user"]=$id;

if ($Role=="client"){
  {echo "<script  type=\"text/javascript\"> window.location='loggedin.php' </script>";}
}
else if ($Role=="admin"){
  echo "<script  type=\"text/javascript\"> window.location='logedinadmin.php' </script>";
}

}
exit();


}

//$result->closeCursor();
$idcom=null;

?>



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