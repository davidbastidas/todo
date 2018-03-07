<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	'Administrar',
);
Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="icon-home home-icon"></i>
			<a href="'.$nameProyect.'/site/index">Inicio</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">
			<a href="'.$nameProyect.'/Equipos/index">Equipos</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li>Administrar</li>
	</ul>
</div>
';
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

?>
<script>
$(document).on( "click", "#partial .pagination li", function() {
    var page = $(this).attr('p');
    consultar(page);
});
$(function() {
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
    $('#subestacion2').on('change', function() {
        $('#categoria').val(0);
    });
});
function consultar(page){
    var equipo=$("#equipo").val();
    var subestacion2=$("#subestacion2").val();
    var categoria=$("#categoria").val();
	var pasa=true;
	var motivo="";
	if(pasa){
		$.ajax({
            url:"<?php echo $nameProyect?>/Equipos/ListarEquipos",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                equipo: equipo,
                subestacion2: subestacion2,
                categoria: categoria,
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
</script>

<h2>Administrar Equipos</h2>

<div id="info"></div>
<div class="row-fluid">
	<div class="span5">
		<label for="equipo">Equipo</label>
		<input id="equipo" name="equipo" type="text" placeholder=""/>
	</div>
	<div class="span2">
		O Eliges...->
		<button class="btn btn-small btn-primary" onclick="consultar()">
	        Buscar
	    </button>
	</div>
	<div class="span5">
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
	        <option value="2">Interruptor de Potencia</option>
	        <option value="3">Transformador de Corriente </option>
	        <option value="4">Transformador de Potencia</option>
	    </select>
	</div>
</div>
<hr>
<div id="partial"></div>