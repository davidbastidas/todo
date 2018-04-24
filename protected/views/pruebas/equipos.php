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
			'Lista de Equipos'.
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>
<style>
.card2 {
	text-align: center;
	border:1px solid #DDD;
	margin-top:5px;
	margin-bottom:5px;
	margin-right:5px;
	padding-top:2px;
	padding-bottom: 5px;
}
.card2:hover {
	background-color:#FCE6A6;
	border-color:#EFD27A;
}

</style>
<script>
	function escogerPruebas(equipo){
		location.href="<?php echo $nameProyect?>/Pruebas/EscogerPruebas/"+equipo;
	}
</script>
<?php 
	foreach ($equipos as $key) {?>
	<a href="#" onclick="escogerPruebas(<?php echo $key->id?>)">
		<div class="span2">
			<div class="card2">Tranfo - <?php echo $key->serie?></div>
		</div>
	</a>
<?php
	}
?>