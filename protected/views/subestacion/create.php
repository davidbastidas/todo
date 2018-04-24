<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Subestacion'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
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
		<li>Crear</li>
	</ul>
</div>
';?>
<div class="widget-box">
	<div class="widget-header">
		<h4>Crear Subestacion</h4>
	</div>
	<div class="widget-body">
		<div class="widget-main no-padding">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	$('.fk_ubicacion').on('change', function() {
        $.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Municipios",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                ubicacion: this.value
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
    });
});
</script>
