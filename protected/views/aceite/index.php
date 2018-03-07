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
		'<li>Pruebas Aceite</li>'.
	'</ul>'.
'</div>';

?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/chosen.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/chosen.jquery.min.js"></script>
<script type="text/javascript">
$(document).on( "click", "#partial .pagination li", function() {
    var page = $(this).attr('p');
    consultar(page);
});
function consultar(page){
	var desde=$('#desde').val();
	var hasta=$('#hasta').val();
    var equipo=$("#equipo").val();
	var pasa=true;
	var motivo="";

	if(equipo=="0"){
        pasa=false;
        motivo="Elija el Equipo";
    }
	if(pasa){
		$.ajax({
            url:"<?php echo $nameProyect?>/Aceite/ListarPruebas",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                desde: desde,
                hasta: hasta,
                equipo: equipo,
                page: page
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                $("#partial").html(data.respuesta);
                $("#info").html('');
            }
	    });
	}else{
		var html='<div class="alert alert-error">'+
    			'<button class="close" data-dismiss="alert" type="button">'+
    			'<i class="icon-remove"></i>'+
    			'</button>'+
    			'<strong>'+
    			'<i class="icon-remove"></i>'+
    			'Error! '+
    			'</strong>'+
    			motivo+
    			'<br>'+
    			'</div>';
    	$("#info").html(html);
	}
}
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$(".chzn-select").chosen();
    $('#zona').on('change', function() {
        $.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Subestacion",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                zona: this.value
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                $("#subestacion2").html(data.response);
                $("#info").html('');
            }
        });
    });
    $('#categoria').on('change', function() {
        $.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Equipos",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                subestacion: $('#subestacion2').val(),
                categoria: this.value
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                $("#equipo").html(data.response);
                $("#info").html('');
            }
        });
    });
    $('#subestacion2').on('change', function() {
        $('#categoria').val(0);
        $('#equipo')
                .find('option')
                .remove()
                .end()
                .append('<option value="0">[Seleccione]</option>')
                .val('0');
    });
});
function verPrueba(prueba){
    location.href="<?php echo $nameProyect?>/Aceite/Update/"+prueba;
}
</script>
<h3>Ingrese las datos para buscar la prueba</h3>
<div id="info"></div>
<div class="form-inline">
    <label for="zona">Ubicacion</label>
    <select id="zona">
        <option value="0">[Seleccione]</option>
        <?php 
            foreach ($ubicacion as $key) {?>
            <option value="<?php echo $key->id?>"><?php echo $key->nombre?></option>
        <?php
            }
        ?>
    </select>
    <label for="subestacion2">Subestaciones</label>
    <select id="subestacion2" name="subestacion2"><option value="0">[Seleccione]</option></select>
    

    <label for="categoria">Categoria</label>
    <select id="categoria" name="categoria">
        <option value="0">[Seleccione]</option>
        <option value="1">Transformadores</option>
    </select>

    <label for="equipo">Equipo</label>
    <select id="equipo" name="equipo"><option value="0">[Seleccione]</option></select>

    <br><br>
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
    <button class="btn btn-small btn-primary" onclick="consultar()">
        Buscar
    </button>
</div>
<hr>
<div id="partial"></div>