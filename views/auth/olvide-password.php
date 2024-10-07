<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu correo electrónico a continuacion</p>

<?php 
  include_once __DIR__ . "/../templates/alertas.php" ;
?>

<form action="/olvide" method="POST" class="formulario">
  <div class="campo">
    <label for="email">Email</label>
    <input
      type="email"
      id="email"
      name="email"
      placeholder="Escriba aquí su correo electrónico"
    />
  </div>

  <input type="submit" value="Enviar Instrucciones" class="boton">
</form>

<div class="acciones">
  <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
  <a href="/">¿Ya tienes una cuenta? Iniciar Sesión</a>
</div>