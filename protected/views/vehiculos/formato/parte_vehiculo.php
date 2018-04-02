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
			'<a href="'.$nameProyect.'/Vehiculos/formatos">Formato Vehiculos</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Parte de Vehiculos</li>'.
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
			 Parte de Vehiculos
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>MATRICULA:</label>
					<input id="matricula" type="text" maxlength="10"/>
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
			</tr>
			<tr>
				<td colspan="2">
					<label>ASIGNACIÓN DE VEHICULOS A ZONA / SECTOR:</label>
					<input id="asignacion_vehiculo_zona" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Division:</label>
					<input id="division" type="text" maxlength="10"/>
				</td>
				<td>
					<label>MANTENIMIENTO DE SUBESTACIONES:</label>
					<input id="mant_subestacion" type="text" maxlength="10"/>
				</td>
			</tr>

		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th></th>
				<th></th>
				<th colspan="5" class="center">GASTOS</th>
			</tr>
			<tr>
				<th>DIA</th>
				<th>RECORRIDO</th>
				<th>LECTURA KMS INICIO DÍA</th>
				<th>CANTIDAD GALONES COMBUSTIBLE</th>
				<th>COSTO EN $ DEL COMBUSTILE</th>
				<th>PEAJE, PARQUEO</th>
				<th>OTROS (REPARACIONES ETC)</th>
			</tr>
			

			<?php 
			for ($i=1; $i < 29; $i++) { ?>
			<tr>
				<td><?php echo $i ?></td>
				<td>
					<input id="recorrido_<?php echo $i ?>" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<input id="kml_inicio_<?php echo $i ?>" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<input id="galones_<?php echo $i ?>" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<input id="costo_<?php echo $i ?>" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<input id="peaje_<?php echo $i ?>" type="text" maxlength="10" class="input-small"/>
				</td>
				<td>
					<input id="otros_<?php echo $i ?>" type="text" maxlength="10" class="input-small"/>
				</td>
			</tr>
			<?php }
			?>
			<tr>
				<td></td>
				<td></td>
				<td><div id="total_kml_inicio"></div></td>
				<td><div id="total_galones"></div></td>
				<td><div id="total_costo"></div></td>
				<td><div id="total_peaje"></div></td>
				<td><div id="total_otros"></div></td>
			</tr>
			<tr>
				<td colspan="7">
					<label>Firma Inspector:</label>
					<select id="inspector">
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
		  '"matricula": "'+$("#matricula").val()+'",'+
		  '"fecha": "'+$("#fecha").val()+'",'+
		  '"asignacion_vehiculo_zona": "'+$("#asignacion_vehiculo_zona").val()+'",'+
		  '"division": "'+$("#division").val()+'",'+
		  '"mant_subestacion": "'+$("#mant_subestacion").val()+'",'+
		  '"table_gastos": [';
		  for (var i = 1; i < 29; i++) {
		  	if(i==1){
		  	   json+='{'+
				      '"recorrido":"'+$("#recorrido_"+i).val()+'",'+
				      '"kml_inicio":"'+$("#kml_inicio_"+i).val()+'",'+
				      '"galones":"'+$("#galones_"+i).val()+'",'+
				      '"costo":"'+$("#costo_"+i).val()+'",'+
				      '"peaje":"'+$("#peaje_"+i).val()+'",'+
				      '"otros":"'+$("#otros_"+i).val()+'"'+
				    '}';
		  	}else{
		  		json+=',{'+
				      '"recorrido":"'+$("#recorrido_"+i).val()+'",'+
				      '"kml_inicio":"'+$("#kml_inicio_"+i).val()+'",'+
				      '"galones":"'+$("#galones_"+i).val()+'",'+
				      '"costo":"'+$("#costo_"+i).val()+'",'+
				      '"peaje":"'+$("#peaje_"+i).val()+'",'+
				      '"otros":"'+$("#otros_"+i).val()+'"'+
				    '}';
		  	}
		  }
		json+='],'+
		  '"inspector":"'+$("#inspector").val()+'"';
	json+='}';
	//console.log(json);
	$.ajax({
        url:"<?php echo $nameProyect?>/Vehiculos/ActualizarFormato",
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
        		location.href="<?php echo $nameProyect?>/vehiculos/formatos";
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
		$("#matricula").val('<?php echo $formato->fkVehiculo->matricula ?>')
		$("#fecha").val(data.fecha)
		$("#asignacion_vehiculo_zona").val(data.asignacion_vehiculo_zona)
		$("#division").val(data.division)
		$("#mant_subestacion").val(data.mant_subestacion)
		
		var size=data.table_gastos.length;
		for (var i = 1; i <= size; i++) {
			$("#recorrido_"+i).val(data.table_gastos[i-1].recorrido)
			$("#kml_inicio_"+i).val(data.table_gastos[i-1].kml_inicio)
			$("#galones_"+i).val(data.table_gastos[i-1].galones)
			$("#costo_"+i).val(data.table_gastos[i-1].costo)
			$("#peaje_"+i).val(data.table_gastos[i-1].peaje)
			$("#otros_"+i).val(data.table_gastos[i-1].otros)
		}

		$("#inspector").val(data.inspector)
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
