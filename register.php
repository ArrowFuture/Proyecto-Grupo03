<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'El correo electrónico del usuario ya existe!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirme que la contraseña no coincide!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image, user_type) VALUES(?,?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image, 'user']);

         if($insert){
            if($image_size > 2000000){
               $message[] = 'El tamaño de la imagen es demasiado grande!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'Registrado correctamente!';
               header('location:login.php');
            }
         }

      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>Regístrate ahora</h3>
      <input type="text" name="name" class="box" placeholder="Ingresa tu nombre" required>
      <input type="email" name="email" class="box" placeholder="Ingresa tu email" required>
      <input type="password" name="pass" class="box" placeholder="Ingrese una contraseña" required>
      <input type="password" name="cpass" class="box" placeholder="confirme la contraseña" required>
      <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="registrate ahora" class="btn" name="submit">
      <p>Ya tienes una cuenta? <a href="login.php">iniciar sesion ahora</a></p>
   </form>

</section>


</body>
</html>
