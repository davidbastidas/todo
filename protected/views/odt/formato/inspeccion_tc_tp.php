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
		'<li>Inspección TC y TP</li>'.
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
			 INSPECCIÓN TC Y TP
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
					<label>N° TC/TP:</label>
					<input id="n_tc_tp" type="text" maxlength="10"/>
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
					<label>Voltaje:</label>
					<input id="voltaje" type="text" maxlength="10"/>
				</td>
				<td>
					<label>RTC/RTP</label>
					<input id="rtc_rtp" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Temperatura Ambiente &#8451;:</label>
					<input id="temp_ambiente" type="text" maxlength="10"/>
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
				<th>Inspecciones TC</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="6">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_insp_tc" data-maxlength="200" rows="10"></textarea>
				</th>
			</tr>
			<tr>
				<td>Aspecto Exterior ( Pintura  - Limpieza)</td>
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
				<td>Estado conexión puesta tierra</td>
				<td>
					<label>
						<input name="conexion_tierra" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_tierra" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_tierra" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel de aceite</td>
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
				<td>Estado porcelanas</td>
				<td>
					<label>
						<input name="estado_porcelanas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_porcelanas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_porcelanas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Limpieza general</td>
				<td>
					<label>
						<input name="limpieza_general" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_general" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_general" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th>Inspecciones TP</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="6">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_insp_tp" data-maxlength="200" rows="10"></textarea>
				</th>
			</tr>
			<tr>
				<td>Aspecto Exterior ( Pintura  - Limpieza)</td>
				<td>
					<label>
						<input name="aspecto_exterior_tp" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aspecto_exterior_tp" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aspecto_exterior_tp" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado conexión puesta tierra</td>
				<td>
					<label>
						<input name="conexion_tierra_tp" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_tierra_tp" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_tierra_tp" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel de aceite</td>
				<td>
					<label>
						<input name="nivel_aceite_tp" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_tp" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_tp" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado porcelanas</td>
				<td>
					<label>
						<input name="estado_porcelanas_tp" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_porcelanas_tp" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_porcelanas_tp" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Limpieza general</td>
				<td>
					<label>
						<input name="limpieza_general_tp" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_general_tp" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_general_tp" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="5">
					<label>Anotaciones Generales:</label>
					<textarea class="span12 limited" id="observacion" data-maxlength="200" rows="1"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="5">
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
		  '"n_tc_tp": "'+$("#n_tc_tp").val()+'",'+
		  '"marca": "'+$("#marca").val()+'",'+
		  '"n_serial": "'+$("#n_serial").val()+'",'+
		  '"voltaje": "'+$("#voltaje").val()+'",'+
		  '"rtc_rtp": "'+$("#rtc_rtp").val()+'",'+
		  '"temp_ambiente": "'+$("#temp_ambiente").val()+'",'+
		  '"n_odt": "'+$("#n_odt").val()+'",'+
		  '"n_consignacion": "'+$("#n_consignacion").val()+'",'+
		  '"cod_op_equipo": "'+$("#cod_op_equipo").val()+'",'+
		  '"aspecto_exterior": "'+$('input[name=aspecto_exterior]:checked').val()+'",'+
		  '"conexion_tierra": "'+$('input[name=conexion_tierra]:checked').val()+'",'+
		  '"nivel_aceite": "'+$('input[name=nivel_aceite]:checked').val()+'",'+
		  '"estado_porcelanas": "'+$('input[name=estado_porcelanas]:checked').val()+'",'+
		  '"limpieza_general": "'+$('input[name=limpieza_general]:checked').val()+'",'+
		  '"anotacion_insp_tc": "'+$("#anotacion_insp_tc").val()+'",'+

		  '"aspecto_exterior_tp": "'+$('input[name=aspecto_exterior_tp]:checked').val()+'",'+
		  '"conexion_tierra_tp": "'+$('input[name=conexion_tierra_tp]:checked').val()+'",'+
		  '"nivel_aceite_tp": "'+$('input[name=nivel_aceite_tp]:checked').val()+'",'+
		  '"estado_porcelanas_tp": "'+$('input[name=estado_porcelanas_tp]:checked').val()+'",'+
		  '"limpieza_general_tp": "'+$('input[name=limpieza_general_tp]:checked').val()+'",'+
		  '"anotacion_insp_tp": "'+$("#anotacion_insp_tp").val()+'",'+

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
		$("#n_tc_tp").val(data.n_tc_tp)
		$("#marca").val(data.marca)
		$("#n_serial").val(data.n_serial)
		$("#voltaje").val(data.voltaje)
		$("#rtc_rtp").val(data.rtc_rtp)
		$("#temp_ambiente").val(data.temp_ambiente)
		$("#n_odt").val(data.n_odt)
		$("#n_consignacion").val(data.n_consignacion)
		$("#cod_op_equipo").val(data.cod_op_equipo)
		$('input[name=aspecto_exterior][value='+data.aspecto_exterior+']').prop('checked',true);
		$('input[name=conexion_tierra][value='+data.conexion_tierra+']').prop('checked',true);
		$('input[name=nivel_aceite][value='+data.nivel_aceite+']').prop('checked',true);
		$('input[name=estado_porcelanas][value='+data.estado_porcelanas+']').prop('checked',true);
		$('input[name=limpieza_general][value='+data.limpieza_general+']').prop('checked',true);
		$("#anotacion_insp_tc").val(data.anotacion_insp_tc)

		$('input[name=aspecto_exterior_tp][value='+data.aspecto_exterior_tp+']').prop('checked',true);
		$('input[name=conexion_tierra_tp][value='+data.conexion_tierra_tp+']').prop('checked',true);
		$('input[name=nivel_aceite_tp][value='+data.nivel_aceite_tp+']').prop('checked',true);
		$('input[name=estado_porcelanas_tp][value='+data.estado_porcelanas_tp+']').prop('checked',true);
		$('input[name=limpieza_general_tp][value='+data.limpieza_general_tp+']').prop('checked',true);
		$("#anotacion_insp_tp").val(data.anotacion_insp_tp)
		
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
