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
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#opciones">Opciones</a></li>
    <li><a data-toggle="tab" href="#opciones-avanzadas">Opciones avanzadas</a></li>
    <li><a data-toggle="tab" href="#scode">Shortcode</a></li>
    <li><a data-toggle="tab" href="#script">Script</a></li>

  </ul>

  <form action="#" method="POST" id="form-box">
    <div class="tab-content">
      <div id="opciones" class="tab-pane fade in active">
        <?php echo $sections['options'];?>
      </div>
      <div id="opciones-avanzadas" class="tab-pane fade">
        <?php echo $sections['options_advanced']; ?>
      </div>
      <div id="scode" class="tab-pane fade">
        <div class="row">
          <div class="col-md-6 text-center">
            <span id="short-code">[Slider-Despegar]</span>
          </div>
          <div class="col-md-6 text-sc">
            <p>¡Copialo y pegalo donde quieras!</p>
          </div>
        </div>
      </div>
      <div id="script" class="tab-pane fade">
        <?php echo $sections['script']; ?>
      </div>
    </div>
  </form>


  <div class="row mtop dashed-b">
    <style type="text/css" media="screen" id="style-sheet">
     <?php echo $sections['css_generated']; ?>
   </style>
   <div class="container-all-Slider-Despegar">
    <?php echo $sections['container_box']; ?>
  </div>
</div>

</div>


