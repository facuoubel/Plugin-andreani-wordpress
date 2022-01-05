<tr valign="top" id="packing_options">
	<th scope="row" class="titledesc"><?php _e( 'Metodos y Operativas', 'wc_kuad' ); ?></th>
	<td class="forminp">
		<style type="text/css">
			.wc-modal-shipping-method-settings form .form-table tr td input[type=checkbox] {
						min-width: 15px !important;
				}
			.kuad_boxes .small {
				width: 25px !important;
    		min-width: 25px !important;
			}
			.kuad_boxes td, .kuad_services td {
				vertical-align: middle;
				padding: 4px 7px;
			}
			.kuad_services th, .kuad_boxes th {
				padding: 9px 7px;
			}
			.kuad_boxes td input {
				margin-right: 4px;
			}
			.kuad_boxes .check-column {
				vertical-align: middle;
				text-align: left;
				padding: 0 7px;
			}
			.kuad_services th.sort {
				width: 16px;
				padding: 0 16px;
			}
			.kuad_services td.sort {
				cursor: move;
				width: 16px;
				padding: 0 16px;
				cursor: move;
			}
		</style>
		<table class="kuad_boxes widefat">
			<thead>
				<tr>
					<th class="check-column"><input type="checkbox" /></th>
					<th><?php _e( 'Servicio', 'wc_kuad' ); ?></th>
					<th><?php _e( 'Operativa', 'wc_kuad' ); ?></th>
 					<th><?php _e( 'Modalidad', 'wc_kuad' ); ?></th>
					<th><?php _e( 'Activo', 'wc_kuad' ); ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th colspan="3">
						<a href="#" class="button plus insert"><?php _e( 'Agregar Servicio', 'wc_kuad' ); ?></a>
						<a href="#" class="button minus remove"><?php _e( 'Remover Servicio', 'wc_kuad' ); ?></a>
					</th>
					<th colspan="6">
  				</th>
				</tr>
			</tfoot>
			<tbody id="rates">
				<?php	
				
					if ( $this->instance_settings['services'] ) {
						foreach ( $this->instance_settings['services'] as $key => $box ) {
 							if ( ! is_numeric( $key ) )
								continue;
							?>
							<tr>
								<td class="check-column"><input type="checkbox" /> </td>
								<td><input type="text" size="35" name="service_name[<?php echo $key; ?>]" value="<?php echo esc_attr( $box['service_name'] ); ?>" /></td>
								<td><input class="operativa" type="text" size="15" maxlength="6" name="service_operativa[<?php echo $key; ?>]" value="<?php echo esc_attr( $box['operativa'] ); ?>" /> </td>
								<td>
											<select class="select modalidad" name="woocommerce_andreani_kuad_modalidad[<?php echo $key; ?>]" id="woocommerce_andreani_kuad_modalidad" style="">
													<option value="0" <?php if($box['woocommerce_andreani_kuad_modalidad'] == '0') { ?> selected <?php } ?> >Seleccionar</option>
													<option value="sas" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'sas') { ?> selected <?php } ?> >Sucursal a Sucursal</option>
													<option value="sap" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'sap') { ?> selected <?php } ?> >Sucursal a Puerta</option>								
													<option value="pas" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'pas') { ?> selected <?php } ?> >Puerta a Sucursal</option>			
													<option value="pap" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'pap') { ?> selected <?php } ?> >Puerta a Puerta</option>	
													<option value="sasp" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'sasp') { ?> selected <?php } ?> >Sucursal a Sucursal - C/P.Destino</option>
													<option value="sapp" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'sapp') { ?> selected <?php } ?> >Sucursal a Puerta - C/P.Destino</option>								
													<option value="pasp" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'pasp') { ?> selected <?php } ?> >Puerta a Sucursal - C/P.Destino</option>			
													<option value="papp" <?php if($box['woocommerce_andreani_kuad_modalidad'] == 'papp') { ?> selected <?php } ?> >Puerta a Puerta - C/P.Destino</option>												
											</select>
								</td>			
 								<td><input type="checkbox" name="service_enabled[<?php echo $key; ?>]" <?php checked( ! isset( $box['enabled'] ) || $box['enabled'] == 1, true ); ?> /></td>
							</tr>
							<?php
						}
					}
				?>
			</tbody>
		</table>
		<script type="text/javascript">
 		 

 			jQuery(document).ready(function () {
 				
 				
			 jQuery('#woocommerce_andreani_kuad_ajuste_precio').keydown(function (e) {
						
						if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
							
								(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
								 
								(e.keyCode >= 35 && e.keyCode <= 40)) {
										 
										 return;
						}
						
						if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
								e.preventDefault();
						}
				});				
				
				jQuery('#woocommerce_kuad_packing_method').change(function(){
					if ( jQuery(this).val() == 'box_packing' )
						jQuery('#packing_options').show();
					else
						jQuery('#packing_options').hide();
				}).change();

				jQuery('.kuad_boxes .insert').click( function() {
					var $tbody = jQuery('.kuad_boxes').find('tbody');
					var size = $tbody.find('tr').size();
					var code = '<tr class="new">\
							<td class="check-column"><input type="checkbox" /></td>\
							<td><input type="text" size="35" name="service_name[' + size + ']" /></td>\
							<td><input type="text" size="15" name="service_operativa[' + size + ']" /></td>\
							<td><select class="select modalidad" name="woocommerce_andreani_kuad_modalidad[' + size + ']" id="woocommerce_andreani_kuad_modalidad" style=""><option value="0">Seleccionar</option><option value="sas">Sucursal a Sucursal</option><option value="sap">Sucursal a Puerta</option><option value="pas">Puerta a Sucursal</option><option value="pap">Puerta a Puerta</option><option value="sasp">Sucursal a Sucursal - C/P.Destino</option><option value="sapp">Sucursal a Puerta - C/P.Destino</option><option value="pasp">Puerta a Sucursal - C/P.Destino</option><option value="papp">Puerta a Puerta - C/P.Destino</option></select></td>\
							<td><input type="checkbox" name="service_enabled[' + size + ']" /></td>\
						</tr>';
					$tbody.append( code );
					return false;
				});

				jQuery('.kuad_boxes .remove').click(function() {
					var $tbody = jQuery('.kuad_boxes').find('tbody');
					$tbody.find('.check-column input:checked').each(function() {
						jQuery(this).closest('tr').hide().find('input').val('');
					});
					return false;
				});

				
				jQuery('.kuad_services tbody').sortable({
					items:'tr',
					cursor:'move',
					axis:'y',
					handle: '.sort',
					scrollSensitivity:40,
					forcePlaceholderSize: true,
					helper: 'clone',
					opacity: 0.65,
					placeholder: 'wc-metabox-sortable-placeholder',
					start:function(event,ui){
						ui.item.css('baclbsround-color','#f6f6f6');
					},
					stop:function(event,ui){
						ui.item.removeAttr('style');
						kuad_services_row_indexes();
					}
				});

				function kuad_services_row_indexes() {
					jQuery('.kuad_services tbody tr').each(function(index, el){
						jQuery('input.order', el).val( parseInt( jQuery(el).index('.kuad_services tr') ) );
					});
				};

			});

		</script>
	</td>
</tr>