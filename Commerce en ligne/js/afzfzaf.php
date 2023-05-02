<!DOCTYPE html>

<?php
session_start();

if (isset($_POST['action']) && $_POST['action']=="remove"){
  if(!empty($_SESSION["shopping_cart"])){
    foreach($_SESSION["shopping_cart"] as $key => $value){
      if($_POST["code"] == $key){
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


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mon Panier</title>
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

    <!-- single product details -->

    <div class="small-container single-product">
      <div class="row">

      <?php
    if(isset($_SESSION["shopping_cart"]))
        {$total_price = 0;
    ?> 
    
        
        <table >
        <tr>
            <td></td>
            <td>Nom du livre</td>
            <td>Prix Unitaire</td>
        </tr> 
        <?php foreach ($_SESSION["shopping_cart"] as $product){ ?>
        <tr>
          <td><img src='./images/products/<?php echo $product["image"]; ?>' width="45" height="60" /></td>
          
          <td>
            <?php echo $product["name"]; ?><br/>
            <form method='post'>
              <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
              <input type='hidden' name='action' value="remove" />
              <!-- <input type="number" value="1"> -->
              <button type='submit' class='remove'>Retirer</button>
            </form>
          </td>

          <td style="text-align: center;"><?php echo $product["price"]*1 . "DT"; ?></td>
        </tr>

      <?php $total_price += $product["price"]; }$_SESSION["total"]= $total_price?>
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


    <?php include('footer.php') ?>

  </body>
</html>