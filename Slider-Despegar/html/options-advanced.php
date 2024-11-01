<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php wp_nonce_field( 'options_advanced', 'options_advanced_nonce' ); ?>


<div class="row ptop">
	<div class="col-md-12">
		<div class="row" data-container-id="advanced-options">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<h6>Imagen de fondo para moviles</h6>
					</div>
					<div class="col-md-4">
						<input class="upload_image_button btn btn-despegar btn-embossed" type="button" class="btn btn-block btn-lg btn-info" name="background-img-mobile" value="Seleccionar imagen" />
					</div>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon" id="img-back">URL</span>
							<input class="form-control" aria-describedby="img-back" type="text" name="background-img-mobile" id="background-img-mobile" value="<?php echo esc_url($options_seted['back_img_mobile'])?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<h6>&nbsp;</h6>
					</div>
					<div class="col-md-5">
						<p>Ancho del cuadro:</p>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="number" name="width-box" min="250" class="form-control" value="<?php echo esc_html($options_seted['box_width'])?>" placeholder="400" aria-describedby="px">
							<span class="input-group-addon" id="px">PX</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mtop">
	<div class="col-md-4 col-md-offset-4">
		<input type="submit" class="btn btn-despegar btn-embossed btn-block" value="Guardar y previsualizar">
	</div>
</div>