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
		'<li>Inspección Fusibles</li>'.
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
			 INSPECCIÓN FUSIBLES
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
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="4">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_preliminar" data-maxlength="200" rows="10"></textarea>
				</th>
			</tr>
			<tr>
				<td>Limpieza</td>
				<td>
					<label>
						<input name="limpieza" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Puntos</td>
				<td>
					<label>
						<input name="puntos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="puntos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="puntos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado de fusibles</td>
				<td>
					<label>
						<input name="estado_fusibles" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_fusibles" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_fusibles" type="radio" value="malo">
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
		  '"n_odt": "'+$("#n_odt").val()+'",'+
		  '"n_consignacion": "'+$("#n_consignacion").val()+'",'+
		  '"cod_op_equipo": "'+$("#cod_op_equipo").val()+'",'+
		  '"limpieza": "'+$('input[name=limpieza]:checked').val()+'",'+
		  '"puntos": "'+$('input[name=puntos]:checked').val()+'",'+
		  '"estado_fusibles": "'+$('input[name=estado_fusibles]:checked').val()+'",'+
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
		$('input[name=limpieza][value='+data.limpieza+']').prop('checked',true);
		$('input[name=puntos][value='+data.puntos+']').prop('checked',true);
		$('input[name=estado_fusibles][value='+data.estado_fusibles+']').prop('checked',true);
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
