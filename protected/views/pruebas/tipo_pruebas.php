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
			'Tipos de Pruebas'.
		'</li>'.
	'</ul>'.
'</div>';
date_default_timezone_set('America/Bogota');
?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<?php $this->pageTitle = Yii::app()->name; ?>

<script>
	function iniciarPrueba(){
		var checkboxValues = new Array();
		//recorremos todos los checkbox seleccionados con .each
		$('input[name="tipoBox[]"]:checked').each(function() {
			checkboxValues.push($(this).val());
		});
		var json = JSON.stringify(checkboxValues);
		$.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/CrearPrueba",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                json: json,
                fecha: $('#fecha2').val(),
                equipo: <?php echo $equipo?>,
                tp: <?php echo $tp?>,
                odt: <?php echo $odt?>
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                location.href="<?php echo $nameProyect?>/Pruebas/ListarPrueba/"+data.last_insert;
            }
	    });
	}
	$(function() {
	    $('.date-picker').datepicker().next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
	});
</script>
<h2>Elige los tipos de prueba a realizar y la Fecha de Elaboracion</h2>
<div id="info"></div>
<div class="row-fluid">
	<div class="span4">
		<?php 
			foreach ($tipo_pruebas as $key) {?>
				<label>
					<input type="checkbox" name="tipoBox[]" value="<?php echo $key->id?>">
					<span class="lbl"> <?php echo $key->nombre?></span>
				</label>
		<?php 
			}
		?>
	</div>
	<div class="span8">
		<label class="control-label">Fecha de Elaboracion de la Prueba</label>
	    <div class="input-append bootstrap-timepicker">
	        <input class="span6 date-picker" id="fecha2" name="fecha2" type="text" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>"/>
	        <span class="add-on">
	            <i class="icon-calendar"></i>
	        </span>
	    </div>
	</div>
</div>
<br><br>
<div class="row-fluid">
	<div class="span12">
		<button class="btn btn-small btn-success" onclick="iniciarPrueba();">
		Continuar
		<i class="icon-arrow-right icon-on-right bigger-110"></i>
		</button>
	</div>
</div>
