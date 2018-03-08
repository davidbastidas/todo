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
'<li>RTC</li>'.
'</ul>'.
'</div>';
?>
<div id="info"></div>
<div class="widget-box">
	<div class="widget-header">
		<h5>Busqueda</h5>

		<div class="widget-toolbar">
			<a href="#" data-action="collapse">
				<i class="icon-chevron-up"></i>
			</a>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-body-inner" style="display: block;">
			<div class="widget-main">
				<div class="form-inline">
					<label class="control-label">Desde</label>
					<div class="input-append bootstrap-timepicker">
						<input class="span6 date-picker" id="desde" name="desde" type="text" data-date-format="yyyy-mm-dd" />
						<span class="add-on">
							<i class="icon-calendar"></i>
						</span>
					</div>
					<label class="control-label">Hasta</label>
					<div class="input-append bootstrap-timepicker">
						<input class="span6 date-picker" id="hasta" name="hasta" type="text" data-date-format="yyyy-mm-dd" />
						<span class="add-on">
							<i class="icon-calendar"></i>
						</span>
					</div>

					<label for="brigada">Brigadas</label>
					<select class="chzn-select" id="brigada" name="brigada" data-placeholder="Elija una brigada...">
						<option value=""></option>
						<?php foreach ($brigadas as $key) {?>
						<option value="<?php echo $key->id ?>" ><?php echo $key->nombre ?></option>
						<?php }?> 
					</select>

					<button class="btn btn-small btn-primary" onclick="consultar()">
						Buscar
					</button>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>

<div id="partial"></div>

<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$(document).on( "click", "#partial .pagination li", function() {
	var page = $(this).attr('p');
	consultar(page);
});
function consultar(page){
	$.ajax({
		url:"<?php echo $nameProyect?>/Rtc/ListarPruebas",
		type:'POST',
		dataType:"json",
		cache:false,
		data: {
			desde:$("#desde").val(),
			hasta:$("#hasta").val(),
			brigada: $("#brigada").val(),
			page: page
		},
		beforeSend:  function() {
			$("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
		},
		success: function(data){
			$("#partial").html(data.respuesta);
			$("#info").html('');
		},
		error: function(){
			$("#info").html('');
		}
	});
}
$(document).on("click", ".borrar", function(e) {
	var id=$(this).attr('data-id');
	var r = confirm("Seguro desea Eliminar?");
	if (r == true) {
		borrar(id);
	}
});
function borrar(id){
	$.ajax({
		url:"<?php echo $nameProyect?>/Odt/delete/"+id,
		type:'POST',
		dataType:"json",
		cache:false,
		data: {
			id: id
		},
		beforeSend:  function() {
			$("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
		},
		success: function(data){
			if(data.respuesta==true){
				$("#info").html('');
				consultar(0);
			}
		}
	});
}
consultar(0);

$(function() {
	$(".chzn-select").chosen();
	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
});
</script>