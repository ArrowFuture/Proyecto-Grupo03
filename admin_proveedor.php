<?php
@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ordenar Productos al Proveedor</title>

   <!-- Enlace a Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Enlace a archivo CSS personalizado -->
   <link rel="stylesheet" href="css/admin_style.css">

   <style>
      /* Estilo para el mensaje de éxito */
      .success-message {
         display: none;
         background-color: #ff6347; /* Color rojo */
         color: white;
         padding: 20px;
         text-align: center;
         position: fixed;
         top: 0; /* Colocar arriba */
         left: 0;
         right: 0;
         z-index: 1000;
         font-size: 24px; /* Tamaño de fuente grande */
      }
   </style>
</head>
<body>

<?php include 'admin_header.php'; ?>

<div id="success-message" class="success-message">
   Orden enviada correctamente.
</div>

<section class="update-profile">

   <h1 class="title">Ordenar Productos al Proveedor</h1>

   <form id="order-form" action="procesar_orden.php" method="POST">
      <div class="flex">
         <div class="inputBox">
            <span>Producto:</span>
            <input type="text" name="product_name" placeholder="Nombre del Producto" required class="box">
            
            <span>Cantidad:</span>
            <input type="number" name="quantity" placeholder="Cantidad a Ordenar" required class="box">
            
            <span>Proveedor:</span>
            <input type="text" name="provider_name" placeholder="Nombre del Proveedor" required class="box">
         </div>
         
         <div class="inputBox">
            <span>Fecha de Entrega deseable:</span>
            <input type="date" name="delivery_date" required class="box">
            
            <span>Comentarios:</span>
            <textarea name="comments" placeholder="Comentarios adicionales" class="box"></textarea>
         </div>
      </div>

      <div class="flex-btn">
         <input type="submit" class="btn" value="Enviar Orden" name="submit_order">
         <a href="admin_page.php" class="option-btn">Regresar</a>
      </div>
   </form>

</section>

<script>
   // Captura el envío del formulario
   document.getElementById('order-form').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevenir el envío normal del formulario
      var formData = new FormData(this);
      fetch('procesar_orden.php', {
         method: 'POST',
         body: formData
      })
      .then(response => response.text())
      .then(data => {
         // Mostrar el mensaje de éxito
         var successMessage = document.getElementById('success-message');
         successMessage.style.display = 'block';
         // Limpiar los campos del formulario
         document.getElementById('order-form').reset();
         // Ocultar el mensaje de éxito después de 3 segundos
         setTimeout(function() {
            successMessage.style.display = 'none';
         }, 3000); // 3000 milisegundos = 3 segundos
      })
      .catch(error => console.error('Error:', error));
   });
</script>

</body>
</html>

