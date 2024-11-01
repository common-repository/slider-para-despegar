<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<form action="#" method="POST" id="change-script">
<?php wp_nonce_field( 'save_script', 'save_script_nonce' ); ?>
<div class="row ptop">
	<div class="col-md-12">
		<div class="row" data-container-id="script">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Script"><h6>Aqui puede remplazar su script</h6></label>
					<textarea class="form-control break-word" rows="5" name="script-despegar" id="Script"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mtop">
	<div class="col-md-4 col-md-offset-4">
		<input type="submit" class="btn btn-despegar btn-embossed btn-block" value="Cambiar script">
	</div>
</div>
</form>