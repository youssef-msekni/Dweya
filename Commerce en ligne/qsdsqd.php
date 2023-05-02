<!DOCTYPE html>

<?php
session_start();
include ('cnx.php');

if (isset($_POST['code']) && $_POST['code']!=""){
  $code = $_POST['code'];

  $result = $connexion->query("SELECT * FROM article WHERE code = '$code'");

  $row = $result->fetch_array();

  $code = $row['code'];
  $name = $row['nom'];
  $price = $row['prix'];
  $image = $row['design'];
   
  $cartArray = array(
   $code=>array(
   'name'=>$name,
   'code'=>$code,
   'price'=>$price,
   'image'=>$image)
  );

  if(empty($_SESSION["shopping_cart"])) {
      $_SESSION["shopping_cart"] = $cartArray;
  }else{
      $array_keys = array_keys($_SESSION["shopping_cart"]); 
      if(in_array($code,$array_keys)) {
      }else{
          $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
      }
  }
}

?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Products</title>
    <link rel="stylesheet" href="./css/style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div class="container">
      <?php include('nav.php') ?>
    </div>

    <div class="small-container">
      <div class="row row-2">
        <h2>All Products</h2>
        <form method="post">
        <select name="tri">
          <?php  
            if(!isset($_POST['tri'])){
              echo "<option value='defaut'>Tri par défaut</option>
              <option value='prix'>Tri par prix</option>
              <option value='etoiles'>Tri par nombre etoiles</option>" ;;
            }else{
              if( $_POST['tri'] == 'defaut'){
                echo "<option value='defaut'>Tri par défaut</option>
                <option value='prix'>Tri par prix</option>
                <option value='etoiles'>Tri par nombre etoiles</option>" ;};
              if( $_POST['tri'] == 'prix'){echo "<option value='prix'>Tri par prix</option>
                <option value='etoiles'>Tri par nombre etoiles</option>
                <option value='defaut'>Tri par défaut</option>" ;};
              if( $_POST['tri'] == 'etoiles'){    echo "
                <option value='etoiles'>Tri par nombre etoiles</option>
                <option value='prix'>Tri par prix</option>
                <option value='defaut'>Tri par défaut</option>
                " ;}   }
          ?>
        </select>
        <input type="submit" value="&#10003;" id="tribtn">
        </form>
      </div>


      <div class="row">   
        <form action="">
        <a href="" class="btn-search">TOUS</a>
        <a href="" class="btn-search">INFO</a>
        <a href="" class="btn-search">VIDEO</a>
        </form>
        <input  type="text" placeholder="CHERCHER ICI" class="search" >
        <?php 
        if(!isset($_POST['tri'])){
          $articles = $connexion->query("SELECT * FROM magasin.article");
        }else{
          if( $_POST['tri'] == 'defaut'){$articles = $connexion->query("SELECT * FROM magasin.article");};
          if( $_POST['tri'] == 'prix'){$articles = $connexion->query("SELECT * FROM magasin.article ORDER BY prix DESC");};
          if( $_POST['tri'] == 'etoiles'){$articles = $connexion->query("SELECT * FROM magasin.article ORDER BY stars DESC");};
        }
        // $articles = $connexion->query("SELECT * FROM magasin.article");
        foreach ($articles as $i) {
          echo "
          <div class='col-4'>
          <form  method='post' action=''>
            <input type='hidden' name='code' value='".$i['code']."' /> 
            <a href='oneproduct.php?idart=".$i['id_article']."'><img src='./images/products/".$i['design']." '/></a>
            <h4>".$i['nom']."</h4>";

            $nb = $i['stars'];

          if ($nb == 5){
            echo 
            "<div class='rating'>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
            </div>";
          };

          if ($nb == 4){
            echo 
            "<div class='rating'>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-regular fa-star'></i>
            </div>";
          };

          if ($nb == 3){
            echo 
            "<div class='rating'>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
            </div>";
          };

          if ($nb == 2){
            echo 
            "<div class='rating'>
              <i class='fa-solid fa-star'></i>
              <i class='fa-solid fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
            </div>";
          };

          if ($nb == 1){
            echo 
            "<div class='rating'>
              <i class='fa-solid fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
            </div>";
          };

          if ($nb == 0){
            echo 
            "<div class='rating'>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
              <i class='fa-regular fa-star'></i>
            </div>";
          };

          echo "<p>".$i['prix']." TND</p>
          <button type='submit' class='btn'>
          <i class='fa-solid fa-cart-shopping'></i> Add</button>
          </div>
           </form>
          ";

        }
        echo "   </div> ";
        ?>

        <div class="page-btn">
          <span>1</span>
          <span>2</span>
          <span>3</span>
          <span>4</span>
          <span>...</span>
        </div>
      </div>



      <?php include('footer.php') ?>

  </body>
</html>