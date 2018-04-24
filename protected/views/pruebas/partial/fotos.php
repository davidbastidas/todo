<ul class="ace-thumbnails">
<?php 
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$ruta_fotos = Yii::app()->params['ruta_fotos'];
foreach ($fotos as $key) {?>
<a href="<?php echo '../../../archivos/fotos/'.$key->fk_pruebas.'/'.$key->nombre ?>" data-rel="colorbox">
	<?php echo $key->nombre; ?>
</a>
<a href="#" onclick="removerFoto(<?php echo $key->id; ?>)">
	<i class="icon-remove red"></i>
</a>
<br>
<?php 
}

?>
</ul>