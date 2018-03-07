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
		'<li>Inspección Servicios Auxiliares VAC</li>'.
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
			 INSPECCIÓN SERVICIOS AUXILIARES VAC
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
				<th rowspan="21">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_preliminar" data-maxlength="200" rows="40"></textarea>
				</th>
			</tr>
			<tr>
				<td colspan="2">Celdas de alta tensión - Limpieza</td>
				<td>
					<label>
						<input name="celdas_alta_tension" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="celdas_alta_tension" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="celdas_alta_tension" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado cerramiento trafo servicios auxiliares</td>
				<td>
					<label>
						<input name="estado_cerramiento_trafo" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_cerramiento_trafo" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_cerramiento_trafo" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado conexión puesta tierra trafo de servicios auxiliares</td>
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
				<td>Temperatura transformador de servicios auxiliares</td>
				<td>
					<input id="temp_trafo_serv_aux" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="temp_trafo_serv_aux_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="temp_trafo_serv_aux_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="temp_trafo_serv_aux_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">Limpieza general - instalaciones y planta de emergencia</td>
				<td>
					<label>
						<input name="limpeza_gen" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpeza_gen" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpeza_gen" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Nivel de aceite - Planta de emergencia</td>
				<td>
					<label>
						<input name="nivel_aceite" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Nivel de combustible - Planta de emergencia</td>
				<td>
					<label>
						<input name="nivel_combustible" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_combustible" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_combustible" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<td>Voltaje batería planta de emergencia</td>
				<td>
					<input id="voltaje_bat_planta_emer" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="voltaje_bat_planta_emer_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_bat_planta_emer_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_bat_planta_emer_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Corriente batería planta de emergencia</td>
				<td>
					<input id="corriente_bat_planta_emer" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="corriente_bat_planta_emer_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="corriente_bat_planta_emer_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="corriente_bat_planta_emer_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<td colspan="2">Nivel liquido bateria</td>
				<td>
					<label>
						<input name="nivel_liq_bat" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_bat" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_bat" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado conectores batería planta de emergencia</td>
				<td>
					<label>
						<input name="est_conector_bat" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_conector_bat" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_conector_bat" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado soporte batería planta emergencia</td>
				<td>
					<label>
						<input name="est_soporte_bat" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_soporte_bat" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_soporte_bat" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado tanque de almacenamiento ACPM y accesorios</td>
				<td>
					<label>
						<input name="est_tanque_alm_acpm" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_tanque_alm_acpm" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_tanque_alm_acpm" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado general tablero de servicios auxiliares</td>
				<td>
					<label>
						<input name="est_gen_tab" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_gen_tab" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_gen_tab" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<td>Voltaje AT/BT Servicios auxiliares</td>
				<td>
					<input id="voltaje_atbt_serv" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="voltaje_atbt_serv_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_atbt_serv_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="voltaje_atbt_serv_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Totalizador - Corriente de carga (Amperímetro)</td>
				<td>
					<input id="tot_corriente_carga" type="text" class="input-small" maxlength="5">
				</td>
				<td>
					<label>
						<input name="tot_corriente_carga_radio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tot_corriente_carga_radio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tot_corriente_carga_radio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<td colspan="2">Transferencia - Indicacion Estado interruptores de potencia </td>
				<td>
					<label>
						<input name="tranfs_ind_est_intp" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tranfs_ind_est_intp" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tranfs_ind_est_intp" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Breakers tablero de distribucion AC</td>
				<td>
					<label>
						<input name="breakers_tab_distrib" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="breakers_tab_distrib" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="breakers_tab_distrib" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado extintor</td>
				<td>
					<label>
						<input name="estado_extintor" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_extintor" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_extintor" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">Estado conecion puesta tierra planta de emergencia </td>
				<td>
					<label>
						<input name="estado_conecion_p_t" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_conecion_p_t" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_conecion_p_t" type="radio" value="malo">
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
		  '"n_odt": "'+$("#n_odt").val()+'",'+
		  '"n_consignacion": "'+$("#n_consignacion").val()+'",'+
		  '"cod_op_equipo": "'+$("#cod_op_equipo").val()+'",'+

		  '"celdas_alta_tension": "'+$('input[name=celdas_alta_tension]:checked').val()+'",'+
		  '"estado_cerramiento_trafo": "'+$('input[name=estado_cerramiento_trafo]:checked').val()+'",'+
		  '"estado_con_puesta_tierra": "'+$('input[name=estado_con_puesta_tierra]:checked').val()+'",'+
		  '"temp_trafo_serv_aux": "'+$("#temp_trafo_serv_aux").val()+'",'+

		  '"temp_trafo_serv_aux_radio": "'+$('input[name=temp_trafo_serv_aux_radio]:checked').val()+'",'+
		  '"limpeza_gen": "'+$('input[name=limpeza_gen]:checked').val()+'",'+
		  '"nivel_aceite": "'+$('input[name=nivel_aceite]:checked').val()+'",'+
		  '"nivel_combustible": "'+$('input[name=nivel_combustible]:checked').val()+'",'+
		  '"voltaje_bat_planta_emer": "'+$("#voltaje_bat_planta_emer").val()+'",'+

		  '"voltaje_bat_planta_emer_radio": "'+$('input[name=voltaje_bat_planta_emer_radio]:checked').val()+'",'+
		  '"corriente_bat_planta_emer": "'+$("#corriente_bat_planta_emer").val()+'",'+

		  
		  '"corriente_bat_planta_emer_radio": "'+$('input[name=corriente_bat_planta_emer_radio]:checked').val()+'",'+
		  '"nivel_liq_bat": "'+$('input[name=nivel_liq_bat]:checked').val()+'",'+
		  '"est_conector_bat": "'+$('input[name=est_conector_bat]:checked').val()+'",'+
		  '"est_soporte_bat": "'+$('input[name=est_soporte_bat]:checked').val()+'",'+
		  '"est_tanque_alm_acpm": "'+$('input[name=est_tanque_alm_acpm]:checked').val()+'",'+
		  '"est_gen_tab": "'+$('input[name=est_gen_tab]:checked').val()+'",'+
		  '"voltaje_atbt_serv": "'+$("#voltaje_atbt_serv").val()+'",'+

		  '"voltaje_atbt_serv_radio": "'+$('input[name=voltaje_atbt_serv_radio]:checked').val()+'",'+
		  '"tot_corriente_carga": "'+$("#tot_corriente_carga").val()+'",'+

		  '"tot_corriente_carga_radio": "'+$('input[name=tot_corriente_carga_radio]:checked').val()+'",'+
		  '"tranfs_ind_est_intp": "'+$('input[name=tranfs_ind_est_intp]:checked').val()+'",'+
		  '"breakers_tab_distrib": "'+$('input[name=breakers_tab_distrib]:checked').val()+'",'+
		  '"estado_extintor": "'+$('input[name=estado_extintor]:checked').val()+'",'+
		  '"estado_conecion_p_t": "'+$('input[name=estado_conecion_p_t]:checked').val()+'",'+

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
		$("#n_odt").val(data.n_odt)
		$("#n_consignacion").val(data.n_consignacion)
		$("#cod_op_equipo").val(data.cod_op_equipo)

		

		$('input[name=celdas_alta_tension][value='+data.celdas_alta_tension+']').prop('checked',true);
		$('input[name=estado_cerramiento_trafo][value='+data.estado_cerramiento_trafo+']').prop('checked',true);
		$('input[name=estado_con_puesta_tierra][value='+data.estado_con_puesta_tierra+']').prop('checked',true);
		$("#temp_trafo_serv_aux").val(data.temp_trafo_serv_aux)

		$('input[name=temp_trafo_serv_aux_radio][value='+data.temp_trafo_serv_aux_radio+']').prop('checked',true);
		$('input[name=limpeza_gen][value='+data.limpeza_gen+']').prop('checked',true);
		$('input[name=nivel_aceite][value='+data.nivel_aceite+']').prop('checked',true);
		$('input[name=nivel_combustible][value='+data.nivel_combustible+']').prop('checked',true);
		$("#voltaje_bat_planta_emer").val(data.voltaje_bat_planta_emer)

		$('input[name=voltaje_bat_planta_emer_radio][value='+data.voltaje_bat_planta_emer_radio+']').prop('checked',true);
		$("#corriente_bat_planta_emer").val(data.corriente_bat_planta_emer)

		$('input[name=corriente_bat_planta_emer_radio][value='+data.corriente_bat_planta_emer_radio+']').prop('checked',true);
		$('input[name=nivel_liq_bat][value='+data.nivel_liq_bat+']').prop('checked',true);
		$('input[name=est_conector_bat][value='+data.est_conector_bat+']').prop('checked',true);
		$('input[name=est_soporte_bat][value='+data.est_soporte_bat+']').prop('checked',true);
		$('input[name=est_tanque_alm_acpm][value='+data.est_tanque_alm_acpm+']').prop('checked',true);
		$('input[name=est_gen_tab][value='+data.est_gen_tab+']').prop('checked',true);
		$("#voltaje_atbt_serv").val(data.voltaje_atbt_serv)

		$('input[name=voltaje_atbt_serv_radio][value='+data.voltaje_atbt_serv_radio+']').prop('checked',true);
		$("#tot_corriente_carga").val(data.tot_corriente_carga)
		$('input[name=tot_corriente_carga_radio][value='+data.tot_corriente_carga_radio+']').prop('checked',true);
		$('input[name=tranfs_ind_est_intp][value='+data.tranfs_ind_est_intp+']').prop('checked',true);
		$('input[name=breakers_tab_distrib][value='+data.breakers_tab_distrib+']').prop('checked',true);
		$('input[name=estado_extintor][value='+data.estado_extintor+']').prop('checked',true);
		$('input[name=estado_conecion_p_t][value='+data.estado_conecion_p_t+']').prop('checked',true);

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
