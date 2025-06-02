<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'Ya agregado a la lista de deseos!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'Ya agregado al carrito!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'añadido a la lista de deseos!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'Ya agregado al carrito!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'añadido al carrito!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>Aqui todos somos Gamers</span>
         <h3>Consigue consolas, juegos y periféricos al mejor precio</h3>
         <p>En 8-Bit Galaxy vivimos el gaming contigo: te ofrecemos calidad, buenos precios y todo lo que necesitas para llevar tu experiencia al siguiente nivel.</p>
         <a href="about.php" class="btn">Acerca de...</a>
      </div>

   </section>

</div>

<section class="home-category">

   <h3 class="title">
      <span class="word-red">Compra</span>
      <span class="word-green">por</span>
      <span class="word-blue">categoría</span>
   </h3>

   <div class="box-container">

      <div class="box">
         <img src="images/catconsola.png" alt="">
         <h3>Consolas</h3>
         <p>Encuentra las mejores consolas del mercado, con excelente rendimiento y precios accesibles que se adaptan a tu presupuesto.</p>
         <a href="category.php?category=Consolas" class="btn">Consolas</a>
      </div>

      <div class="box">
         <img src="images/catvideojuegos.png" alt="">
         <h3>Videojuegos</h3>
         <p>Explora una amplia variedad de videojuegos para todas las edades y gustos, con títulos populares y novedades imperdibles.</p>
         <a href="category.php?category=Videojuegos" class="btn">Videojuegos</a>
      </div>

      <div class="box">
         <img src="images/catperifericos.png" alt="">
         <h3>Perifericos</h3>
         <p>Descubre periféricos de alta calidad como teclados, ratones, auriculares y más, ideales para mejorar tu experiencia de juego o trabajo.</p>
         <a href="category.php?category=Perifericos" class="btn">Perifericos</a>
      </div>
   </div>

</section>
<br><br><br>








<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>