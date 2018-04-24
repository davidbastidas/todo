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
			'<a href="'.$nameProyect.'/odt/index">Odt</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Crear</li>'.
	'</ul>'.
'</div>';
?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/bootstrap-timepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('#hora_prevista_inicio, #hora_prevista_fin').timepicker({
		minuteStep: 1,
		showSeconds: true,
		showMeridian: false
	});

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
                console.log(data.response)
                $("#subestacion2").html(data.response);
                $("#info").html('');
            }
        });
    });
    $('#categoria2').on('change', function() {
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
                console.log(data.response)
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
    $.fn.serializeObject = function(){
	    var o = {};
	    var a = this.serializeArray();
	    $.each(a, function() {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	    return o;
	};
	$("#yt0").click(function(){
		$.ajax({
	        url:"<?php echo $nameProyect?>/odt/Crear",
	        type:'POST',
            dataType:"json",
            cache:false,
	        data: {
	            empresa: $('#empresa option:selected').text(),
	            numero: $('#numero').val(),
	            consignacion: $('#consignacion').val(),
	            tipo_trabajo: $('#tipo_trabajo').val(),
	            trazabilidad: $('#trazabilidad').val(),
	            tipo_mantenimiento: $('#tipo_mantenimiento').val(),
	            categoria: $('#categoria_odt option:selected').text(),
	            fecha: $('#fecha').val(),
	            hora_prevista_inicio: $('#hora_prevista_inicio').val(),
	            hora_prevista_fin: $('#hora_prevista_fin').val(),
	            equipo: $('#equipo').val(),
	            bahia_ln: $('#bahia_ln').val(),
	            lugar_trabajo: $('#lugar_trabajo').val(),
	            brigada: $('#brigada').val(),
	            operarioId: $('#brigada option:selected').attr('operario_id'),
	            cliente_id: $('#empresa').val()
	        },
	        beforeSend:  function() {
	            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
	        },
	        success: function(data){
	        	if(data.respuesta=="1"){
	        		location.href="<?php echo $nameProyect?>/Odt/index/";
	        	}else{
					$("#info").html('No se guardo la ODT');
	        	}
	            
	        }
	    });
	});
});
</script>
<div class="panel-heading">
	<h3 class="panel-title">Formulario</h3>
</div>
<?php echo $this->renderPartial('_form',array('ubicacion' => $ubicacion, 'brigadas' => $brigadas, 'clientes' => $clientes,));?>


