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
		'<li>Buscar Vehiculo</li>'.
	'</ul>'.
'</div>';
?>
<div id="info"></div>
<div class="row-fluid">
	<div class="span6">
		<h4>Vehiculos Disponibles</h4>
		<hr>
		<div class="form-inline">
			<select id="vehiculos">
				<option value="">[Seleccione]</option>
				<?php 
				foreach ($vehiculos as $key) { 
					echo '<option value="'.$key->id.'">'.$key->matricula.'</option>';
				}
				?>
			</select>
			<button class="btn btn-small btn-primary" onclick="usar()">Usar Vehiculo</button>
		</div>
		
	</div>
</div>

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
function usar(){
	my_form=document.createElement('form');
	my_form.name='myForm';
	my_form.method='POST';
	my_form.action="<?php echo $nameProyect?>/Vehiculo/UsarVehiculo";

	my_tb=document.createElement('input');
	my_tb.type='text';
	my_tb.name='vehiculo';
	my_tb.value=$("#vehiculos").val();
	my_form.appendChild(my_tb);
	document.body.appendChild(my_form);
	my_form.submit();
}
</script>
