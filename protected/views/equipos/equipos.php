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
			'Equipos'.
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>


<a class="btn btn-large btn-success" href="<?php echo $nameProyect ?>/Pruebas/ubicacion/1">
	Transformadores
</a>
<a class="btn btn-large btn-warning" href="<?php echo $nameProyect ?>/Pruebas/ubicacion/2">
	Interruptor de Potencia
</a>