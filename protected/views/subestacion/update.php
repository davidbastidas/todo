<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Subestacion'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
<?php Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="icon-home home-icon"></i>
			<a href="'.$nameProyect.'/site/index">Inicio</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">
			<a href="'.$nameProyect.'/Subestacion/index">Subestacion</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li>Actualizar</li>
	</ul>
</div>
';?><div class="widget-box">
	<div class="widget-header">
		<h4>Actualizar Subestacion</h4>
	</div>
	<div class="widget-body">
		<div class="widget-main no-padding">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	$('.fk_ubicacion').on('change', function() {
        consultaMunicipios();
    });
	function consultaMunicipios(){
		$.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Municipios",
            type:'POST',
            dataType:"json",
            async: false,
            cache:false,
            data: {
                ubicacion: $(".fk_ubicacion").val()
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                console.log(data.response)
                $("#fk_municipio").html(data.response);
                $("#info").html('');
            }
        });
	}
	consultaMunicipios();
	<?php if(isset($model->fk_municipio_subestacion->id)){ ?>
		$('#fk_municipio').val(<?php echo $model->fk_municipio_subestacion->id?>).trigger('change');
	<?php } ?>
});
</script>