<h1 class="nombre-pagina">Panel de Administración</h1>

<?php
  //Al principio no aparece el nombre del admin, para eso ve a AdminController y pasarle los datos
  include_once __DIR__ . "/../templates/barra.php";	
?>

<h2>Buscar Citas</h2>
<div class="busqueda">
  <form class="formulario" action="">
    <div class="campo">
      <label for="fecha">Fecha</label>
      <input
        type="date"
        id="fecha"
        name="fecha"
        value="<?php echo $fecha; ?>"
      />
    </div>
  </form>
</div>

<?php
  if( count($citas) === 0 ) {
    echo "<h2>No hay citas en esta fecha</h2>";
  }
?>

<div id="citas-admin">
  <ul class="citas">
    <?php
    $idCita = 0;
      foreach( $citas as $key => $cita ) {
          if($idCita !== $cita->id) {
            $total = 0;

            ?>
            <li>
              <p>Id: <span><?php echo $cita->id; ?></span></p>
              <p>Hora: <span><?php echo $cita->hora; ?></span></p>
              <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
              <p>Correo electrónico: <span><?php echo $cita->email; ?></span></p>
              <p>Teléfono: <span><?php echo $cita->telefono; ?></span></p>
              
              <h3>Servicios</h3>

            <?php
              $idCita = $cita->id;
          } //End if 
            $total += $cita->precio;
          ?>
                <p class="servicio"><?php echo $cita->servicio . " " . "$" . $cita->precio . " MXN"; ?></p>
            <!-- </li> El primer servicio queda mas separado que el resto, elimina la etiqueta y HTML lo acomodara solo -->
          <?php
              //Retorna el id en la cual nos encontramos 
            	$actual = $cita->id;
              //Indice del arreglo de la base de datos, cual es la ultima cita que tiene el mismo id, para entonces detectar que es el ultimo
              $proximo = $citas[$key + 1]->id ?? 0;

          if(esUltimo($actual, $proximo)) { ?>
            <p class="total">Total: <span>$<?php echo $total; ?> MXN</span></p>

            <form action="/api/eliminar" method="POST">
              <input type="hidden" name="id" value="<?php echo $cita->id; ?>">

              <input type="submit" class="boton-eliminar" value="Eliminar">
            </form>

              <?php
          }
        } //End foreach ?>
  </ul>
</div>

<?php
  $script = "<script src='build/js/buscador.js'></script>";	
?>
