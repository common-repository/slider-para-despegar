<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $options_seted;
global $sections;
$plugin_dir = plugin_dir_path('/html');
?>
<?php wp_nonce_field( 'options', 'options_nonce' ); ?>
<div class="row ptop">
      <div class="col-md-6">
            <div class="row pbottom-small">
                  <div class="col-md-12">
                        <h6>Imagen de fondo:</h6>
                  </div>
                  <div class="col-md-4">
                        <input class="upload_image_button btn btn-despegar btn-embossed" type="button" class="btn btn-block btn-lg btn-info" name="background-img" value="Seleccionar imagen" />					
                  </div>
                  <div class="col-md-8">
                        <div class="input-group">
                              <span class="input-group-addon" id="img-back">URL</span>
                              <input class="form-control" aria-describedby="img-back" type="text" id="background-img" name="background-img" value="<?php echo esc_url($options_seted['back_img'])?>" />
                        </div>
                  </div>
            </div>
            <div class="row pbottom-small">
                  <div class="col-md-12">
                        <div class="row">
                              <div class="col-md-12">
                                    <h6>Color de fondo:</h6>
                                    <div class="f-left">
                                          <p>Transparente:</p>
                                    </div>
                                    <div class="f-left m-left bootstrap-switch-square" name="background-color">
                                    <input type="checkbox" data-toggle="switch" name="back-transparente" id="background-color" <?php if ($options_seted['back_transparente'] == 1) echo 'checked'?> />
                                    </div>
                              </div>
                        </div>
                        <div class="row container-disapear <?php if ($options_seted['back-transparente'] == 1) echo 'container-on'; else echo 'container-off'?>" data-container-id="background-color">
                              <div class="col-md-6">
                                    <p>Color uno
                                          <input type="text" class="color-picker" name="color-1" value="<?php echo $options_seted['color_back_1']?>" />
                                    </p>
                                    <p>Color dos 
                                          <input type="text" class="color-picker" name="color-2" value="<?php echo $options_seted['color_back_2']?>" />
                                    </p>
                              </div>
                              <div class="col-md-6">
                                    <label class="radio">
                                          <input type="radio" name="back-style" id="back-opt-1" value="1" data-toggle="radio" class="custom-radio" <?php if ($options_seted['back_style'] == 1) echo 'checked'?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                          Estilo uno
                                    </label>
                                    <label class="radio">
                                          <input type="radio" name="back-style" id="back-opt-2" value="2" data-toggle="radio" class="custom-radio" <?php if ($options_seted['back_style'] == 2) echo 'checked'?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                          Estilo dos
                                    </label>
                                    <label class="radio">
                                          <input type="radio" name="back-style" id="back-opt-3" value="3" data-toggle="radio" class="custom-radio" <?php if ($options_seted['back_style'] == 3) echo 'checked'?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                          Estilo tres
                                    </label>
                                    <label class="radio">
                                          <input type="radio" name="back-style" id="back-opt-4" value="4" data-toggle="radio" class="custom-radio" <?php if ($options_seted['back_style'] == 4) echo 'checked'?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                                          Estilo cuatro
                                    </label>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div class="col-md-6">
            <div class="row pbottom-small">
                  <div class="col-md-12">
                        <h6>Posición del cuadro</h6>
                        <label class="radio">
                              <input type="radio" name="position-box" id="position-box-1" value="1" data-toggle="radio" class="custom-radio" <?php if ($options_seted['position'] == 1) echo 'checked'?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                              Izquierda
                        </label>
                        <label class="radio">
                              <input type="radio" name="position-box" id="position-box-2" value="2" data-toggle="radio" class="custom-radio" <?php if ($options_seted['position'] == 2) echo 'checked'?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                              Centro
                        </label>
                        <label class="radio">
                              <input type="radio" name="position-box" id="position-box-3" value="3" data-toggle="radio" class="custom-radio" <?php if ($options_seted['position'] == 3) echo 'checked'?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                              Derecha
                        </label>
                  </div>
            </div>
      </div>
</div>
<div class="row mtop">
      <div class="col-md-4 col-md-offset-4">
            <input type="submit" class="btn btn-despegar btn-embossed btn-block" value="Guardar y previsualizar">
      </div>
</div>
