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
			'Busquedas para pruebas'.
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>
<script>
function escogerPruebas(){
	if($("#tipo_prueba").val()!="0"){
		location.href="<?php echo $nameProyect?>/Pruebas/EscogerPruebas/"+$("#tipo_prueba").val()+"?odt=<?php echo $odt?>";
	}
}
</script>
<div id="info"></div>
<div class="row-fluid">	
	<label for="tipo_prueba">Tipo Prueba</label>
	<select id="tipo_prueba" name="tipo_prueba">
		<option value="0">[Seleccione]</option>
		<?php 
			foreach ($tipo_servicio as $tp) {?>
			<option value="<?php echo $tp->id?>"><?php echo $tp->nombre?></option>
		<?php
			}
		?>
	</select>
	
</div>
<br>
<button class="btn btn-large btn-success" onclick="escogerPruebas()">
	Crear Prueba
	<i class="icon-arrow-right icon-on-right bigger-110"></i>
</button>

<div id="partial"></div>

