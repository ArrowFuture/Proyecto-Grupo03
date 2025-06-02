<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-1.jpg" alt="">
         <h3>Por qué elegirnos?</h3>
         <p>¡Elige 8-Bit Galaxy para sumergirte en un universo de diversión retro! Nuestra misión es brindarte una experiencia de juego nostálgica y emocionante, con una selección cuidadosamente curada de títulos clásicos y sorpresas ochenteras. ¡Prepárate para la aventura pixelada!</p>
         <a href="contact.php" class="btn">Contacta con nosotros</a>
      </div>

      <div class="box">
         <img src="images/about-2.jpg" alt="">
         <h3>Qué ofrecemos?</h3>
         <p>8-Bit Galaxy es tu portal definitivo al universo retro. No solo encontrarás una creciente biblioteca de juegos clásicos, sino también noticias, reseñas y quizás hasta una comunidad vibrante de jugadores con tu misma pasión. ¡Sumérgete en el corazón de la galaxia pixelada!</p>
         <a href="shop.php" class="btn">nuestra tienda</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">
      <span class="word-red">Opi</span><span class="word-green">nio</span><span class="word-blue">nes</span>
      <span class="word-red">de</span>
      <span class="word-green">Cli</span><span class="word-blue">en</span><span class="word-red">tes</span>
   </h1>

   <div class="box-container">

      <div class="box">
         <img src="images/comentario1.png" alt="">
         <p>¡Atención pixel-perfecta y juegos retro geniales! 8-Bit Galaxy siempre tiene lo que necesito a precios justos!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jose Miguel</h3>
      </div>

      <div class="box">
         <img src="images/comentario2.png" alt="">
         <p>¡Me encanta la inmensa variedad de juegos que ofrecen! Desde los últimos lanzamientos hasta mis géneros favoritos.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Alonzo Suarez</h3>
      </div>

      <div class="box">
         <img src="images/comentario3.png" alt="">
         <p>El equipo de 8-Bit Galaxy es súper amigable y siempre está listo para ayudar a encontrar tu próxima aventura.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Kakaroto Torres</h3>
      </div>

      <div class="box">
         <img src="images/comentario4.png" alt="">
         <p>¡Abiertos 24/7 para que encuentres tus videojuegos, consolas y periféricos cuando los necesites! Tu tienda gamer siempre disponible.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Samira Lopez</h3>
      </div>

      <div class="box">
         <img src="images/comentario5.png" alt="">
         <p>Precios razonables y productos de calidad. ¡Además, ofrece una experiencia de compra acogedora con una atención al cliente excepcional!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jose Francisco</h3>
      </div>

      <div class="box">
         <img src="images/comentario6.png" alt="">
         <p>Tu destino gamer de confianza. ¡Productos de calidad y un servicio al cliente insuperable para que siempre encuentres lo que buscas!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jaimes Juarez</h3>
      </div>

   </div>

</section>









<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>