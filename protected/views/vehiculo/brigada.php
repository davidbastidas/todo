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
		'<li>ODT</li>'.
	'</ul>'.
'</div>';
?>
<a class="btn btn-small btn-primary" href="<?php echo $nameProyect?>/Vehiculo/formatos">
	<i class="fa fa-car fa-2x"></i>
    Vehiculo
</a>
<div id="info"></div>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="smaller lighter green">
			<i class="icon-list"></i>
			ODT's
		</h4>

		<div class="widget-toolbar">
			<a href="#" data-action="collapse">
				<i class="icon-chevron-up"></i>
			</a>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-body-inner" style="display: block;">
			<div class="widget-main">
				<ul id="tasks" class="item-list">
					<?php 
					$estilo='';$estado='';
					foreach ($model as $value) {
						$json=json_decode($value->fk_equipo_fk->datosjson,true);
						if($value->estado==1){
							$estilo='item-orange';
							$estado='<i class="fa fa-check fa-2x text-warning"></i>';
						}else if($value->estado==2){
							$estilo='item-default';
							$estado='<i class="fa fa-check fa-2x text-info"></i>';
						}else if($value->estado==3){
							$estilo='item-green';
							$estado='<i class="fa fa-check text-success"></i><i class="fa fa-check text-success"></i>';
						}else if($value->estado==4){
							$estilo='item-red';
						}
						echo '<li class="'.$estilo.' clearfix">'.
							'<div class="row-fluid">'.
								'<div class="span3">'.
									'<span class="lbl"> Numero: '.$value->numero.'</span><br>'.
									'<span class="lbl"> Tipo de Trabajo: '.$value->tipo_trabajo.'</span><br>'.
									'<span class="lbl"> Subestacion: '.$value->fk_equipo_fk->fk_subestacion_e->nombre.'</span><br>'.
									'<span class="lbl"> Departamento: '.$value->fk_equipo_fk->fk_subestacion_e->fk_ubicacion_s->nombre.'</span><br>'.
								'</div>'.
								'<div class="span4">'.
									'<span class="lbl"> Bahia/LN: '.$value->bahia_ln.'</span><br>'.
									'<span class="lbl"> Lugar de Trabajo: '.$value->lugar_trabajo.'</span><br>'.
									'<span class="lbl"> Equipo: '.$json['nombre_eq'].'</span><br>'.
								'</div>'.
							

							'<div class="pull-right action-buttons span2">'.
								'<a href="'.$nameProyect.'/odt/llenarodt/'.$value->id.'" class="blue">'.
									'<i class="icon-pencil fa-2x"></i>'.
								'</a>'.

								'<span class="vbar"></span>'.

								''.$estado.
							'</div>'.
							'</div>'.
						'</li>';
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="partial"></div>
					
<script type="text/javascript">
$(document).on( "click", "#partial .pagination li", function() {
    var page = $(this).attr('p');
    consultar(page);
});
function consultar(page){
	$.ajax({
        url:"<?php echo $nameProyect?>/Odt/ListarPruebas",
        type:'POST',
        dataType:"json",
        cache:false,
        data: {
        	desde:$("#desde").val(),
        	hasta:$("#hasta").val(),
            nombre: $("#nombre").val(),
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
</script>