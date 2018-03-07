<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
Yii::app()->params['breadcrumbs']=
'<div class="breadcrumbs fixed" id="breadcrumbs">'.
	'<ul class="breadcrumb">'.
		'<li>'.
			'<i class="icon-home home-icon"></i>'.
			'<a href="'.$nameProyect.'/site/index">Inicio</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>'.
			'<a href="'.$nameProyect.'/odt/index">Inicio</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>'.
			'<a href="'.$nameProyect.'/odt/llenarodt/'.$odt.'">Llenar ODT</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Inspección Tableros PCM</li>'.
	'</ul>'.
'</div>';
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
$size=count($json_brigada['brigada']);
$json_formato=json_decode($formato->json, true);
?>
<div id="info"></div>

<div class="row-fluid">
	<div class="span8">
		<h3 class="header smaller lighter blue">
			 INSPECCIÓN TABLEROS PCM
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>Subestación:</label>
					<input id="subestacion" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Nombre Bahía:</label>
					<input id="bahia" type="text" maxlength="10"/>
				</td>
				
			</tr>
			<tr>
				<td>
					<label>Fecha</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="fecha" name="fecha" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>
				</td>
				<td>
					<label>Tablero No:</label>
					<input id="tablero_n" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Zona :</label>
					<input id="zona" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Encargado:</label>
					<select id="responsable">
						<option value="">[Elegir]</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Solicitud de Consignación:</label>
					<input id="solicitud_consignacion" type="text" maxlength="10"/>
				</td>
				<td colspan="2">
					<label>Ord. de Mtto:</label>
					<input id="ord_mtto" type="text" maxlength="10"/>
				</td>
			</tr>
		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th>Chequeos Preliminares</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
			</tr>
			<tr>
				<td>Aspecto Exterior ( Pintura  - Cerraduras - Limpieza)</td>
				<td>
					<label>
						<input name="aspecto_exterior" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aspecto_exterior" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aspecto_exterior" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Conexión a Malla de tierra</td>
				<td>
					<label>
						<input name="conexion_malla" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_malla" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_malla" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado de canaletas</td>
				<td>
					<label>
						<input name="estado_canaletas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_canaletas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_canaletas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Barreras  para  acceso  de animales  al tablero</td>
				<td>
					<label>
						<input name="barreras_animales" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="barreras_animales" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="barreras_animales" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Limpieza interior</td>
				<td>
					<label>
						<input name="limpieza_interior" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_interior" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_interior" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Alimentación Auxiliar  DC / AC</td>
				<td>
					<label>
						<input name="alimentacion_auxiliar" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="alimentacion_auxiliar" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="alimentacion_auxiliar" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th>Chequeo  Borneras de Conexión</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
			</tr>
			<tr>
				<td>Borneras  de Corriente</td>
				<td>
					<label>
						<input name="borneras_corriente" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras_corriente" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras_corriente" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Borneras de tensión</td>
				<td>
					<label>
						<input name="borneras_tension" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras_tension" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras_tension" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Borneras  de Control</td>
				<td>
					<label>
						<input name="borneras_control" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras_control" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras_control" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Marquillado</td>
				<td>
					<label>
						<input name="marquillado" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="marquillado" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="marquillado" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th>Chequeo de Equipos Protección</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
			</tr>
			<tr>
				<td>Ajuste de Borneras </td>
				<td>
					<label>
						<input name="ajuste_bornera" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="ajuste_bornera" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="ajuste_bornera" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Indicación  de Led / Alarmas.</td>
				<td>
					<label>
						<input name="indicacion_led_alarma" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="indicacion_led_alarma" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="indicacion_led_alarma" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Almacenamiento de Registros de disparos</td>
				<td>
					<label>
						<input name="alm_registros_disparos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="alm_registros_disparos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="alm_registros_disparos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Tensiones  de alimentación</td>
				<td>
					<label>
						<input name="tensiones_alimentacion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tensiones_alimentacion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tensiones_alimentacion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Tensiones de Disparo</td>
				<td>
					<label>
						<input name="tensiones_disparo" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tensiones_disparo" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tensiones_disparo" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th>Chequeo de Equipos Control</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
			</tr>
			<tr>
				<td>Estado operativo de equipos</td>
				<td>
					<label>
						<input name="est_operativo_equipos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_operativo_equipos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_operativo_equipos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Apriete de Borneras</td>
				<td>
					<label>
						<input name="apriete_borneras" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="apriete_borneras" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="apriete_borneras" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado del cableado</td>
				<td>
					<label>
						<input name="estado_cableado" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_cableado" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_cableado" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th>Chequeo Equipo de Medida Local / CLD</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
			</tr>
			<tr>
				<td>Estado operativo de equipos de medida  de  Corriente/ Voltaje</td>
				<td>
					<label>
						<input name="est_equip_med_c_v" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_equip_med_c_v" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_equip_med_c_v" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado operativo de equipos de medida de Potencia</td>
				<td>
					<label>
						<input name="est_equip_med_potencia" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_equip_med_potencia" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_equip_med_potencia" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado Operativo equipos multifuncional.</td>
				<td>
					<label>
						<input name="est_equip_multifuncional" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_equip_multifuncional" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_equip_multifuncional" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Comprobación de  la Medida  con el CLD</td>
				<td>
					<label>
						<input name="comprob_medida_cld" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="comprob_medida_cld" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="comprob_medida_cld" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Apriete de Borneras / Estado de cableado</td>
				<td>
					<label>
						<input name="bornera_est_cableado" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="bornera_est_cableado" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="bornera_est_cableado" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th>Chequeo de Servicios.</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
			</tr>
			<tr>
				<td>Luz  interna</td>
				<td>
					<label>
						<input name="luz_interna" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luz_interna" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luz_interna" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Toma  de Servicio</td>
				<td>
					<label>
						<input name="toma_servicio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="toma_servicio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="toma_servicio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Calefacción</td>
				<td>
					<label>
						<input name="calefaccion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="calefaccion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="calefaccion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<label>Observaciones</label>
					<textarea class="span12 limited" id="observacion" data-maxlength="200" rows="1"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<label>Firma:</label>
					<select id="firma">
						<option value="">[Elegir]</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
		</table>
		<button class="btn btn-large btn-success" onclick="crearJson()">Guardar</button>
	</div>
</div>



<br><br><br>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('textarea[class*=limited]').each(function() {
		var limit = parseInt($(this).attr('data-maxlength')) || 100;
		$(this).inputlimiter({
			"limit": limit,
			remText: '%n caracteres disponibles...',
			limitText: 'maximo : %n.'
		});
	});
});
function crearJson(){
	var json='{'+
		  '"subestacion": "'+$("#subestacion").val()+'",'+
		  '"bahia": "'+$("#bahia").val()+'",'+
		  '"fecha": "'+$("#fecha").val()+'",'+
		  '"tablero_n": "'+$("#tablero_n").val()+'",'+
		  '"zona": "'+$("#zona").val()+'",'+
		  '"responsable": "'+$("#responsable").val()+'",'+
		  '"solicitud_consignacion": "'+$("#solicitud_consignacion").val()+'",'+
		  '"ord_mtto": "'+$("#ord_mtto").val()+'",'+
		  '"aspecto_exterior": "'+$('input[name=aspecto_exterior]:checked').val()+'",'+
		  '"conexion_malla": "'+$('input[name=conexion_malla]:checked').val()+'",'+
		  '"estado_canaletas": "'+$('input[name=estado_canaletas]:checked').val()+'",'+
		  '"barreras_animales": "'+$('input[name=barreras_animales]:checked').val()+'",'+
		  '"limpieza_interior": "'+$('input[name=limpieza_interior]:checked').val()+'",'+
		  '"alimentacion_auxiliar": "'+$('input[name=alimentacion_auxiliar]:checked').val()+'",'+
		  '"borneras_corriente": "'+$('input[name=borneras_corriente]:checked').val()+'",'+
		  '"borneras_tension": "'+$('input[name=borneras_tension]:checked').val()+'",'+
		  '"borneras_control": "'+$('input[name=borneras_control]:checked').val()+'",'+
		  '"marquillado": "'+$('input[name=marquillado]:checked').val()+'",'+
		  '"ajuste_bornera": "'+$('input[name=ajuste_bornera]:checked').val()+'",'+
		  '"indicacion_led_alarma": "'+$('input[name=indicacion_led_alarma]:checked').val()+'",'+
		  '"alm_registros_disparos": "'+$('input[name=alm_registros_disparos]:checked').val()+'",'+
		  '"tensiones_alimentacion": "'+$('input[name=tensiones_alimentacion]:checked').val()+'",'+
		  '"tensiones_disparo": "'+$('input[name=tensiones_disparo]:checked').val()+'",'+
		  '"est_operativo_equipos": "'+$('input[name=est_operativo_equipos]:checked').val()+'",'+
		  '"apriete_borneras": "'+$('input[name=apriete_borneras]:checked').val()+'",'+
		  '"estado_cableado": "'+$('input[name=estado_cableado]:checked').val()+'",'+
		  '"est_equip_med_c_v": "'+$('input[name=est_equip_med_c_v]:checked').val()+'",'+
		  '"est_equip_med_potencia": "'+$('input[name=est_equip_med_potencia]:checked').val()+'",'+
		  '"est_equip_multifuncional": "'+$('input[name=est_equip_multifuncional]:checked').val()+'",'+
		  '"comprob_medida_cld": "'+$('input[name=comprob_medida_cld]:checked').val()+'",'+
		  '"bornera_est_cableado": "'+$('input[name=bornera_est_cableado]:checked').val()+'",'+
		  '"luz_interna": "'+$('input[name=luz_interna]:checked').val()+'",'+
		  '"toma_servicio": "'+$('input[name=toma_servicio]:checked').val()+'",'+
		  '"calefaccion": "'+$('input[name=calefaccion]:checked').val()+'",'+
		  '"observacion": "'+$("#observacion").val()+'",'+
		  '"firma": "'+$("#firma").val()+'"'
		  ;

	json+='}';
	//console.log(json);
	$.ajax({
        url:"<?php echo $nameProyect?>/Odt/ActualizarFormato",
        type:'POST',
        dataType:"json",
        cache:false,
        data: {
            json: json,
            id: <?php echo $formato->id?>
        },
        beforeSend:  function() {
            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
        },
        success: function(data){
        	
        	if(data.update=="1" || data.update=="0"){
        		location.href="<?php echo $nameProyect?>/odt/llenarodt/<?php echo $odt?>";
        	}else{
        		$(".info").html('<div class="alert alert-error">'+
        			'<button class="close" data-dismiss="alert" type="button">'+
					'<i class="icon-remove"></i>'+
					'</button>'+
					'<strong>'+
					'<i class="icon-remove"></i>'+
					'No se guardo!'+
					'</strong>'+
					'Compruebe su conexion.'+
					'<br>'+
					'</div>');
        	}
            
        }
    });
}
function cargarDatos(){
	var text='<?php echo $formato->json?>';
	if(text.length>0){
		var data = JSON.parse('<?php echo $formato->json?>');
		$("#subestacion").val(data.subestacion)
		$("#bahia").val(data.bahia)
		$("#fecha").val(data.fecha)
		$("#tablero_n").val(data.tablero_n)
		$("#zona").val(data.zona)
		$("#responsable").val(data.responsable)
		$("#solicitud_consignacion").val(data.solicitud_consignacion)
		$("#ord_mtto").val(data.ord_mtto)
		$('input[name=aspecto_exterior][value='+data.aspecto_exterior+']').prop('checked',true);
		$('input[name=conexion_malla][value='+data.conexion_malla+']').prop('checked',true);
		$('input[name=estado_canaletas][value='+data.estado_canaletas+']').prop('checked',true);
		$('input[name=barreras_animales][value='+data.barreras_animales+']').prop('checked',true);
		$('input[name=limpieza_interior][value='+data.limpieza_interior+']').prop('checked',true);
		$('input[name=alimentacion_auxiliar][value='+data.alimentacion_auxiliar+']').prop('checked',true);
		$('input[name=borneras_corriente][value='+data.borneras_corriente+']').prop('checked',true);
		$('input[name=borneras_tension][value='+data.borneras_tension+']').prop('checked',true);
		$('input[name=borneras_control][value='+data.borneras_control+']').prop('checked',true);
		$('input[name=marquillado][value='+data.marquillado+']').prop('checked',true);
		$('input[name=ajuste_bornera][value='+data.ajuste_bornera+']').prop('checked',true);
		$('input[name=indicacion_led_alarma][value='+data.indicacion_led_alarma+']').prop('checked',true);
		$('input[name=alm_registros_disparos][value='+data.alm_registros_disparos+']').prop('checked',true);
		$('input[name=tensiones_alimentacion][value='+data.tensiones_alimentacion+']').prop('checked',true);
		$('input[name=tensiones_disparo][value='+data.tensiones_disparo+']').prop('checked',true);
		$('input[name=est_operativo_equipos][value='+data.est_operativo_equipos+']').prop('checked',true);
		$('input[name=apriete_borneras][value='+data.apriete_borneras+']').prop('checked',true);
		$('input[name=estado_cableado][value='+data.estado_cableado+']').prop('checked',true);
		$('input[name=est_equip_med_c_v][value='+data.est_equip_med_c_v+']').prop('checked',true);
		$('input[name=est_equip_med_potencia][value='+data.est_equip_med_potencia+']').prop('checked',true);
		$('input[name=est_equip_multifuncional][value='+data.est_equip_multifuncional+']').prop('checked',true);
		$('input[name=comprob_medida_cld][value='+data.comprob_medida_cld+']').prop('checked',true);
		$('input[name=bornera_est_cableado][value='+data.bornera_est_cableado+']').prop('checked',true);
		$('input[name=luz_interna][value='+data.luz_interna+']').prop('checked',true);
		$('input[name=toma_servicio][value='+data.toma_servicio+']').prop('checked',true);
		$('input[name=calefaccion][value='+data.calefaccion+']').prop('checked',true);
		$("#observacion").val(data.observacion)
		$("#firma").val(data.firma)
	}
	var estado='<?php echo $formato->estado?>';
	if (estado==3){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
cargarDatos();
</script>
