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
		'<li>Llenar Vehiculo</li>'.
	'</ul>'.
'</div>';
?>
<div id="info"></div>
<div class="row-fluid">
	<div class="span6">
		<h4>Formatos Obligatorios</h4>
		<hr>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Formato</th>
					<th>Accion</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody>
		<?php 
			foreach ($formatos as $value) {
				if($value->categoria=="L"){
				?>
				<tr>
					<td>
						<?php echo $value->nombre?>
					</td>
					<td>
						<button class="btn btn-mini btn-primary" onclick="abrirFormato(<?php echo $value->id?>);">
							<i class="icon-edit bigger-120"></i>
						</button>
						<?php if($value->nombre=="PARTE DE VEHICULO"){ ?>
						<a class="btn btn-mini btn-danger" href="<?php echo $nameProyect?>/Vehiculos/imprimirFormato/<?php echo $value->id?>" target="_blank">
							<i class="icon-print bigger-120"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<?php echo $value->estado?>
					</td>
				</tr>
		<?php 	}
			}
	    ?>
			</tbody>
		</table>

	</div>
	<div class="span6">
		<label>Desde</label>
		<div class="input-append bootstrap-timepicker">
	        <input class="input-small date-picker" id="fecha_desde" name="fecha_desde" type="text" data-date-format="yyyy-mm-dd" />
	        <span class="add-on">
	            <i class="icon-calendar"></i>
	        </span>
	    </div>
	    <label>Hasta</label>
		<div class="input-append bootstrap-timepicker">
	        <input class="input-small date-picker" id="fecha_hasta" name="fecha_hasta" type="text" data-date-format="yyyy-mm-dd" />
	        <span class="add-on">
	            <i class="icon-calendar"></i>
	        </span>
	    </div>
	    <select id="vehiculo">
	    	<option value="0">[Elegir]</option>
		<?php foreach ($vehiculos as $key) {?>
	    	<option value="<?php echo $key->id?>"><?php echo $key->matricula?></option>
	    <?php }?>
	    </select>
	    <button class="btn btn-primary" onclick="preoperacional();">
	    	Consultar
		</button>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			Vehiculo
			<small>Otros Datos</small>
		</h3>
		<br>
	</div>
</div>

<br><br><br>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/bootstrap-timepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/moment.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('#hora_zona_protegida, #hora_jefe_zona_protegida,'+
	  ' #hora_zona_trabajo, #hora_jefe_zona_trabajo,'+
	  ' #hora_real_inicio, #hora_real_fin').timepicker({
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
function abrirFormato(id){
	location.href="<?php echo $nameProyect?>/Vehiculos/verFormato/"+id;
}
function preoperacional(){
	var fecha1 = moment($('#fecha_desde').val());
	var fecha2 = moment($('#fecha_hasta').val());
	var diff=0;
	if(fecha1==null || fecha2==null){
		alert("Debe elegir 7 dias entre las fechas")
	}else{
		diff=fecha2.diff(fecha1, 'days')
		console.log(diff)
		if(diff==6){
			location.href="<?php echo $nameProyect?>/Vehiculos/ImprimirFormato/0?desde="+$('#fecha_desde').val()+"&hasta="+$('#fecha_hasta').val()+"&vehiculo="+$('#vehiculo').val();
		}else{
			alert("Debe elegir 7 dias entre las fechas")
		}
	}
}
</script>
