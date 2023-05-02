
<!DOCTYPE html>
<?php
                    session_start();
                    
if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["shopping_cart"])){
      foreach($_SESSION["shopping_cart"] as $key => $value){
        if($_POST["design"] == $key){
          unset($_SESSION["shopping_cart"][$key]);
          $status = "Le produit est supprimé de votre panier!";
        }
        if(empty($_SESSION["shopping_cart"]))
          unset($_SESSION["shopping_cart"]);
      } 
    }
  }
  if (isset($_POST['action']) && $_POST['action']=="caisse"){
    if(!empty($_SESSION["shopping_cart"])){
      header('Location: paiment.php');
    exit;
      } 
    }
                    
                    ?>
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
                  <a class="nav-link" href="aboutlogged.php"> A propos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="medicinelogged.php"> Medicaments </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buy.php"> Boutique </a>
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
              
              <div class="login_btn-contanier ml-0 ml-lg-5" >
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
<!-- Panier section -->



<div class="small-container single-product">
      <div class="row">

      <?php
    if(isset($_SESSION["shopping_cart"]))
        {$total_price = 0;
    ?> 
    
        
        <table >
        <tr>
            <td></td>
            <td>Nom du Produit</td>
            <td>Prix Unitaire</td>
        </tr> 
        <?php foreach ($_SESSION["shopping_cart"] as $product){ ?>
        <tr>
          <td><img src='./images/<?php echo $product["image"]; ?>' width="100" height="100" /></td>
          
          <td>
            <?php echo $product["design"]; ?><br/>
            <form method='post'>
              <input type='hidden' name='design' value="<?php echo $product["design"]; ?>" />
              <input type='hidden' name='action' value="remove" />
              <!-- <input type="number" value="1"> -->
              <button type='submit' class='remove'>Retirer</button>
            </form>
          </td>

          <td style="text-align: center;"><?php echo $product["prix"]*1 . "DT"; ?></td>
        </tr>

      <?php $total_price += $product["prix"]; }$_SESSION["total"]= $total_price?>
      <tr>
        <td colspan="3" align="right">
          <strong>TOTAL: <?php echo $total_price . "DT"; ?></strong>
          <br>
          <button type="submit" onclick="location.href='paiment.php'"class='caisse' style="height: 3em; cursor: pointer; padding: 0em 1em; margin-top: 1em;">Passer à la caisse</button>
        </td>
      </tr>
    </table> 
      <?php }else{
              echo '<h3 style="text-align: center; font-size: 2em; margin-top: 1em">Votre panier est vide</h3>';
            }?>
  </div>  
                <!-- <tr><td><img src='./images/products/product-13.jpg' width="100px"/></td><td>Produit X</td><td><input type="number" value="1"></td><td>Retirer</td></tr>
                <tr><td><img src='./images/products/product-12.jpg' width="100px"/></td><td>Produit Y</td><td><input type="number" value="1"></td><td>Retirer</td></tr> -->
        <!-- </table> -->




      </div>
    </div>



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