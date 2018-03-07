<?php 
Yii::app()->params['pagetitle']='Editar';
Yii::app()->params['breadcrumbs']=
'<ol class="breadcrumb">'.
	'<li>'.
		'<a href="../site/index">Inicio</a>'.
	'</li>'.
	'<li>'.
		'<a href="index">Servicios</a>'.
	'</li>'.
	'<li>'.
		'<a href="#" class="active">Editar</a>'.
	'</li>'.
'</ol>';
?>
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Formulario</h3>
	</div>
	<?php echo $this->renderPartial('_form', array('model'=>$model));?>
</div>