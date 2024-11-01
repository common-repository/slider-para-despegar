<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $sections;
$plugin_dir = plugin_dir_url( __FILE__ );
?>

<div id="first-container" class="container">
  <div id="background-plane" class="row text-center">
    <div class="col-md-6 text-center">
      <img id="despegar-plugin" src="<?php echo $plugin_dir?>img/plugin-despegar.png" alt="Despegar Plugin">
    </div>
  </div>
  <div class="row text-center">
    <h2>Bienvenido al plugin de despegar</h2>
    <p>Para comenzar, ingrese el Script (codigo) generado para su agencia</p>
    <a href="http://www.despegar.com.ar/comunidadafiliados/promoteQuimera/index" class="blue" target="_blank">¿Donde lo puedo encontrar?</a>
  </div>
  <form method="POST" id="script-form">
  <?php wp_nonce_field( 'insert_plugin', 'insert_plugin_nonce' ); ?>
    <div class="row ptop">
      <div class="col-md-6 col-md-offset-3">
        <div class="row" data-container-id="script">
          <div class="col-md-12">
            <div class="form-group">
              <label for="Script"><h6>Ingrese su script</h6></label>
              <textarea class="form-control break-word" rows="5" name="script-despegar" id="Script"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mtop">
      <div class="col-md-4 col-md-offset-4">
        <input type="submit" class="btn btn-despegar btn-embossed btn-block" value="Guardar">
      </div>
    </div>
  </form>
</div>
