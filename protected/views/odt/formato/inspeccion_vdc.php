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
		'<li>Inspección Servicios Auxiliares VDC</li>'.
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
			 INSPECCIÓN SERVICIOS AUXILIARES VDC
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
				<td>
					<label>Tension:</label>
					<input id="tension" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Marca:</label>
					<input id="marca" type="text" maxlength="10"/>
				</td>
				<td>
					<label>No serial:</label>
					<input id="n_serial" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>No O. Trabajo</label>
					<input id="n_odt" type="text" maxlength="10"/>
				</td>
				<td>
					<label>No Consignación:</label>
					<input id="n_consignacion" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Código de Opeación Equipo:</label>
					<input id="cod_op_equipo" type="text" maxlength="10"/>
				</td>
			</tr>
		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th>Preliminares</th>
				<th></th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="13">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_preliminar" data-maxlength="200" rows="20"></textarea>
				</th>
			</tr>
			<tr>
				<td>Voltaje de entrada cargador</td>
				<td>
					<input id="voltaje_entrada" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="voltaje_entrada_cargador" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_entrada_cargador" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_entrada_cargador" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Voltaje de salida cargador</td>
				<td>
					<input id="voltaje_salida" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="voltaje_salida_cargador" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_salida_cargador" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_salida_cargador" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Corriente de carga - Amperímetro</td>
				<td>
					<input id="corriente_carga" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="corriente_carga_i" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="corriente_carga_i" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="corriente_carga_i" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Banco de baterías - Nivel de electrolito</td>
				<td>
					<label>
						<input name="banco_baterias" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="banco_baterias" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="banco_baterias" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado conectores banco batería - estado</td>
				<td>
					<label>
						<input name="estado_conectores_bb" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_conectores_bb" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_conectores_bb" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado bornes</td>
				<td>
					<label>
						<input name="estado_bornes" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_bornes" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_bornes" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado soporte banco batería</td>
				<td>
					<label>
						<input name="estado_soportes_bb" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_soportes_bb" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_soportes_bb" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Limpieza - instalaciones y banco baterias</td>
				<td>
					<label>
						<input name="limpieza_inst_bb" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_inst_bb" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_inst_bb" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado extractor de gases cuarto de baterías</td>
				<td>
					<label>
						<input name="estado_extractor_gas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_extractor_gas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_extractor_gas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Breakers -en servicio y fuera de servicio </td>
				<td>
					<label>
						<input name="breakers_in_out" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="breakers_in_out" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="breakers_in_out" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado general tablero VDC (pintura-conexiones, etc)</td>
				<td>
					<label>
						<input name="estado_gen_tab_vdc" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_gen_tab_vdc" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_gen_tab_vdc" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado conexión puesta tierra</td>
				<td>
					<label>
						<input name="estado_con_puesta_tierra" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_con_puesta_tierra" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_con_puesta_tierra" type="radio" value="malo">
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
					<label>JEFE TRABAJO:</label>
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
		  '"tension": "'+$("#tension").val()+'",'+
		  '"marca": "'+$("#marca").val()+'",'+
		  '"n_serial": "'+$("#n_serial").val()+'",'+
		  '"n_odt": "'+$("#n_odt").val()+'",'+
		  '"n_consignacion": "'+$("#n_consignacion").val()+'",'+
		  '"cod_op_equipo": "'+$("#cod_op_equipo").val()+'",'+

		  '"voltaje_entrada": "'+$("#voltaje_entrada").val()+'",'+
		  '"voltaje_salida": "'+$("#voltaje_salida").val()+'",'+
		  '"corriente_carga": "'+$("#corriente_carga").val()+'",'+

		  '"voltaje_entrada_cargador": "'+$('input[name=voltaje_entrada_cargador]:checked').val()+'",'+
		  '"voltaje_salida_cargador": "'+$('input[name=voltaje_salida_cargador]:checked').val()+'",'+
		  '"corriente_carga_i": "'+$('input[name=corriente_carga_i]:checked').val()+'",'+
		  '"banco_baterias": "'+$('input[name=banco_baterias]:checked').val()+'",'+
		  '"estado_conectores_bb": "'+$('input[name=estado_conectores_bb]:checked').val()+'",'+
		  '"estado_bornes": "'+$('input[name=estado_bornes]:checked').val()+'",'+
		  '"estado_soportes_bb": "'+$('input[name=estado_soportes_bb]:checked').val()+'",'+
		  '"limpieza_inst_bb": "'+$('input[name=limpieza_inst_bb]:checked').val()+'",'+
		  '"estado_extractor_gas": "'+$('input[name=estado_extractor_gas]:checked').val()+'",'+
		  '"breakers_in_out": "'+$('input[name=breakers_in_out]:checked').val()+'",'+
		  '"estado_gen_tab_vdc": "'+$('input[name=estado_gen_tab_vdc]:checked').val()+'",'+
		  '"estado_con_puesta_tierra": "'+$('input[name=estado_con_puesta_tierra]:checked').val()+'",'+
		  '"anotacion_preliminar": "'+$("#anotacion_preliminar").val()+'",'+
		  '"observacion": "'+$("#observacion").val()+'",'+
		  '"responsable": "'+$("#responsable").val()+'"'
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
		$("#tension").val(data.n_interruptor)
		$("#marca").val(data.marca)
		$("#n_serial").val(data.n_serial)
		$("#n_odt").val(data.n_odt)
		$("#n_consignacion").val(data.n_consignacion)
		$("#cod_op_equipo").val(data.cod_op_equipo)

		$("#voltaje_entrada").val(data.voltaje_entrada)
		$("#voltaje_salida").val(data.voltaje_salida)
		$("#corriente_carga").val(data.corriente_carga)

		$('input[name=voltaje_entrada_cargador][value='+data.voltaje_entrada_cargador+']').prop('checked',true);
		$('input[name=voltaje_salida_cargador][value='+data.voltaje_salida_cargador+']').prop('checked',true);
		$('input[name=corriente_carga_i][value='+data.corriente_carga_i+']').prop('checked',true);
		$('input[name=banco_baterias][value='+data.banco_baterias+']').prop('checked',true);
		$('input[name=estado_conectores_bb][value='+data.estado_conectores_bb+']').prop('checked',true);
		$('input[name=estado_bornes][value='+data.estado_bornes+']').prop('checked',true);
		$('input[name=estado_soportes_bb][value='+data.estado_soportes_bb+']').prop('checked',true);
		$('input[name=limpieza_inst_bb][value='+data.limpieza_inst_bb+']').prop('checked',true);
		$('input[name=estado_extractor_gas][value='+data.estado_extractor_gas+']').prop('checked',true);
		$('input[name=breakers_in_out][value='+data.breakers_in_out+']').prop('checked',true);
		$('input[name=estado_gen_tab_vdc][value='+data.estado_gen_tab_vdc+']').prop('checked',true);
		$('input[name=estado_con_puesta_tierra][value='+data.estado_con_puesta_tierra+']').prop('checked',true);
		$("#anotacion_preliminar").val(data.anotacion_preliminar)
		$("#observacion").val(data.observacion)
		$("#responsable").val(data.responsable)
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
