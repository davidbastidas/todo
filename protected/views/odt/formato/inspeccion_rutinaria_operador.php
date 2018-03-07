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
		'<li>Inspección Rutinaria Operador Movil</li>'.
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
	<div class="span10">
		<h3 class="header smaller lighter blue">
			 INSPECCIÓN RUTINARIA OPERADOR MÓVIL
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>Subestación:</label>
					<input id="subestacion" type="text" maxlength="10"/>
				</td>
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
					<label>Hora</label>
					<div class="input-append bootstrap-timepicker">
						<input id="hora" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<label>Nombre Operador:</label>
					<input id="nombre_operador" type="text" maxlength="10"/>
				</td>
			</tr>
		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th colspan="2">Servicios auxiliares</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="8">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_auxiliar" data-maxlength="200" rows="10"></textarea>
				</th>
			</tr>
			<tr>
				<td>Nivel de tensión alterna (tablero AC)</td>
				<td>
					<input id="nivel_tension_ac" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<label>
						<input name="nivel_tension_ac_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_tension_ac_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_tension_ac_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel de tensión alterna (Cargador de batería)</td>
				<td>
					<input id="nivel_tension_bat" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<label>
						<input name="nivel_tension_bat_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_tension_bat_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_tension_bat_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel de tensión continua (tablero DC)</td>
				<td>
					<input id="nivel_tension_dc" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<label>
						<input name="nivel_tension_dc_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_tension_dc_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_tension_dc_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificación estado de breakers tableros AC-DC y cargador (on/off)</td>
				<td>
					<label>
						<input name="estado_breakers_ac_dc" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_breakers_ac_dc" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_breakers_ac_dc" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificar estado banco baterías</td>
				<td>
					<label>
						<input name="estado_banco_bat" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_banco_bat" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_banco_bat" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificar nivel de combustible planta de emergencia</td>
				<td>
					<label>
						<input name="nivel_combustible_planta" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_combustible_planta" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_combustible_planta" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificar nivel de aceite planta de emergencia</td>
				<td>
					<label>
						<input name="nivel_aceite_planta" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_planta" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_planta" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<th colspan="2">Paneles de alarmas</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="3">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_panel_alarma" data-maxlength="200" rows="3"></textarea>
				</th>
			</tr>
			<tr>
				<td colspan="2">Pruebas de lámparas de señalización </td>
				<td>
					<label>
						<input name="lamparas_senalizacion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="lamparas_senalizacion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="lamparas_senalizacion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificación de alarmas</td>
				<td>
					<label>
						<input name="verificacion_alarmas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="verificacion_alarmas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="verificacion_alarmas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<th colspan="2">Relés de protecciones</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="5">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_reles" data-maxlength="200" rows="10"></textarea>
				</th>
			</tr>
			<tr>
				<td colspan="2">Estado de operación del relé (led de alimentación encendido)</td>
				<td>
					<label>
						<input name="estado_op_rele" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_op_rele" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_op_rele" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado de operación del relé (led de boqueo apagado)</td>
				<td>
					<label>
						<input name="estado_op_rele_apagado" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_op_rele_apagado" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_op_rele_apagado" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado de operación fuentes (led de alimentación encendido)</td>
				<td>
					<label>
						<input name="estado_op_fuente" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_op_fuente" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_op_fuente" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Lámparas de señalización - prueba de lámparas</td>
				<td>
					<label>
						<input name="prueba_lampara" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="prueba_lampara" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="prueba_lampara" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<th colspan="2">General</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="7">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_generales" data-maxlength="200" rows="10"></textarea>
				</th>
			</tr>
			<tr>
				<td colspan="2">Verificar los nivel de SF6 de los equipos</td>
				<td>
					<label>
						<input name="niveles_sf6" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="niveles_sf6" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="niveles_sf6" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificar los nivel de aceite de los equipos</td>
				<td>
					<label>
						<input name="nivel_aceite_equipos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_equipos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_equipos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificar temperatura de los equipos</td>
				<td>
					<label>
						<input name="temperatura_equipos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="temperatura_equipos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="temperatura_equipos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Verificar funcionamiento de los ventiladores</td>
				<td>
					<label>
						<input name="func_ventiladores" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_ventiladores" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_ventiladores" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Iluminación interna y externa de la SSEE</td>
				<td>
					<label>
						<input name="iluminacion_int_ext" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="iluminacion_int_ext" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="iluminacion_int_ext" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Avifauna presente en la subestación</td>
				<td>
					<label>
						<input name="avifauna" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="avifauna" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="avifauna" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<td colspan="6">
					<label>Anotaciones Generales:</label>
					<textarea class="span12 limited" id="observacion" data-maxlength="200" rows="1"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<label>FIRMA OPERADOR</label>
					<input id="firma_operador" type="text" maxlength="20"/>
				</td>
			</tr>
		</table>
		<button class="btn btn-large btn-success" onclick="crearJson()">Guardar</button>
	</div>
</div>



<br><br><br>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/bootstrap-timepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('#hora').timepicker({
		minuteStep: 1,
		showSeconds: true,
		showMeridian: false
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
		  '"fecha": "'+$("#fecha").val()+'",'+
		  '"hora": "'+$("#hora").val()+'",'+
		  '"nombre_operador": "'+$("#nombre_operador").val()+'",'+

		  '"nivel_tension_ac": "'+$("#nivel_tension_ac").val()+'",'+
		  '"nivel_tension_bat": "'+$("#nivel_tension_bat").val()+'",'+
		  '"nivel_tension_dc": "'+$("#nivel_tension_dc").val()+'",'+

		  '"nivel_tension_ac_radio": "'+$('input[name=nivel_tension_ac_radio]:checked').val()+'",'+
		  '"nivel_tension_bat_radio": "'+$('input[name=nivel_tension_bat_radio]:checked').val()+'",'+
		  '"nivel_tension_dc_radio": "'+$('input[name=nivel_tension_dc_radio]:checked').val()+'",'+
		  '"estado_breakers_ac_dc": "'+$('input[name=estado_breakers_ac_dc]:checked').val()+'",'+
		  '"estado_banco_bat": "'+$('input[name=estado_banco_bat]:checked').val()+'",'+
		  '"nivel_combustible_planta": "'+$('input[name=nivel_combustible_planta]:checked').val()+'",'+
		  '"nivel_aceite_planta": "'+$('input[name=nivel_aceite_planta]:checked').val()+'",'+
		  '"anotacion_auxiliar": "'+$("#anotacion_auxiliar").val()+'",'+

		  '"lamparas_senalizacion": "'+$('input[name=lamparas_senalizacion]:checked').val()+'",'+
		  '"verificacion_alarmas": "'+$('input[name=verificacion_alarmas]:checked').val()+'",'+
		  '"anotacion_panel_alarma": "'+$("#anotacion_panel_alarma").val()+'",'+

		  '"estado_op_rele": "'+$('input[name=estado_op_rele]:checked').val()+'",'+
		  '"estado_op_rele_apagado": "'+$('input[name=estado_op_rele_apagado]:checked').val()+'",'+
		  '"estado_op_fuente": "'+$('input[name=estado_op_fuente]:checked').val()+'",'+	  
		  '"prueba_lampara": "'+$('input[name=prueba_lampara]:checked').val()+'",'+
		  '"anotacion_reles": "'+$("#anotacion_reles").val()+'",'+

		  '"niveles_sf6": "'+$('input[name=niveles_sf6]:checked').val()+'",'+
		  '"nivel_aceite_equipos": "'+$('input[name=nivel_aceite_equipos]:checked').val()+'",'+
		  '"temperatura_equipos": "'+$('input[name=temperatura_equipos]:checked').val()+'",'+
		  '"func_ventiladores": "'+$('input[name=func_ventiladores]:checked').val()+'",'+
		  '"iluminacion_int_ext": "'+$('input[name=iluminacion_int_ext]:checked').val()+'",'+	  
		  '"avifauna": "'+$('input[name=avifauna]:checked').val()+'",'+
		  '"anotacion_generales": "'+$("#anotacion_generales").val()+'",'+
		  
		  '"observacion": "'+$("#observacion").val()+'",'+
		  '"firma_operador": "'+$("#firma_operador").val()+'"'
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
		$("#fecha").val(data.fecha)
		$("#hora").val(data.hora)
		$("#nombre_operador").val(data.nombre_operador)
		$("#nivel_tension_ac").val(data.nivel_tension_ac)
		$("#nivel_tension_bat").val(data.nivel_tension_bat)
		$("#nivel_tension_dc").val(data.nivel_tension_dc)

		$('input[name=nivel_tension_ac_radio][value='+data.nivel_tension_ac_radio+']').prop('checked',true);
		$('input[name=nivel_tension_bat_radio][value='+data.nivel_tension_bat_radio+']').prop('checked',true);
		$('input[name=nivel_tension_dc_radio][value='+data.nivel_tension_dc_radio+']').prop('checked',true);
		$('input[name=estado_breakers_ac_dc][value='+data.estado_breakers_ac_dc+']').prop('checked',true);
		$('input[name=estado_banco_bat][value='+data.estado_banco_bat+']').prop('checked',true);
		$('input[name=nivel_combustible_planta][value='+data.nivel_combustible_planta+']').prop('checked',true);
		$('input[name=nivel_aceite_planta][value='+data.nivel_aceite_planta+']').prop('checked',true);
		$("#anotacion_auxiliar").val(data.anotacion_auxiliar)

		$('input[name=lamparas_senalizacion][value='+data.lamparas_senalizacion+']').prop('checked',true);
		$('input[name=verificacion_alarmas][value='+data.verificacion_alarmas+']').prop('checked',true);
		$("#anotacion_panel_alarma").val(data.anotacion_panel_alarma)

		$('input[name=estado_op_rele][value='+data.estado_op_rele+']').prop('checked',true);
		$('input[name=estado_op_rele_apagado][value='+data.estado_op_rele_apagado+']').prop('checked',true);
		$('input[name=estado_op_fuente][value='+data.estado_op_fuente+']').prop('checked',true);
		$('input[name=prueba_lampara][value='+data.prueba_lampara+']').prop('checked',true);
		$("#anotacion_reles").val(data.anotacion_reles)

		$('input[name=niveles_sf6][value='+data.niveles_sf6+']').prop('checked',true);
		$('input[name=nivel_aceite_equipos][value='+data.nivel_aceite_equipos+']').prop('checked',true);
		$('input[name=temperatura_equipos][value='+data.temperatura_equipos+']').prop('checked',true);
		$('input[name=func_ventiladores][value='+data.func_ventiladores+']').prop('checked',true);
		$('input[name=iluminacion_int_ext][value='+data.iluminacion_int_ext+']').prop('checked',true);
		$('input[name=avifauna][value='+data.avifauna+']').prop('checked',true);
		$("#anotacion_generales").val(data.anotacion_generales)
		
		$("#observacion").val(data.observacion)
		$("#firma_operador").val(data.firma_operador)
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
