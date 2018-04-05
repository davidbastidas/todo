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
			'<a href="'.$nameProyect.'/rtc/index">RTC</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Facturacion</li>'.
	'</ul>'.
'</div>';
$json = json_decode($odt->json, true);
$size = count($json['table_materiales_epp']);

$sizeDesmontado = count($json['table_equipos_desmontados']);
?>
<div class="page-header">
	<h1>
		Rtc
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Facturacion
		</small>
	</h1>
</div>
<div id="info"></div>
<div class="row-fluid">
	<div class="span12">
		<h4>Items de Facturacion</h4>
		<hr>
		<div class="form-inline">
			<select id="items_facturacion" class="form-control">
				<option value="">[Seleecione un Item]</option>
				<?php foreach ($model as $value) {?>
					<option value="<?php echo $value->id?>" valor="<?php echo $value->valor_un?>"><?php echo $value->item. ' - ' .$value->descripcion ?></option>
				<?php } ?>
			</select>
			<select id="forma_dividir" class="input-small">
				<option value="">[Seleecione un Criterio]</option>
				<option value="mes">Mes</option>
				<option value="dias">Dias</option>
				<option value="horas">Horas</option>
			</select>
			<input type="text" id="numero_dividir" placeholder="A dividir" class="input-small"/>
            <button  class="btn btn-small btn-primary" id="agregar_formato">Agregar</button>
        </div>
        <br>
		<div id="info-valor"></div>
		<table id="tabla_items_facturacion" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Item</th>
					<th>Criterio</th>
					<th>A dividir</th>
					<th>Accion</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody>
		<?php foreach ($model as $value) {?>
			<tr id="<?php echo $value->id?>">
				<td>
					<?php echo $value->item. ' - ' .$value->descripcion ?>
				</td>
				<td>
					<?php echo $value->item ?>
				</td>
				<td>
					<?php echo $value->item ?>
				</td>
				<td>
					<button class="btn btn-mini btn-danger" onclick="eliminarItem(<?php echo $value->id?>);">
						<i class="icon-trash bigger-120"></i>
					</button>
				</td>
				<td>
					<?php echo $value->estado?>
				</td>
			</tr>
		<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="space"></div>

<script type="text/javascript">
$(document).on("change", "#items_facturacion", function() {
	var valor = $("option:selected", this).attr('valor');
	console.log(valor)
	$("#info-valor").html("Valor del Item seleccionado: $ "+valor);
});
</script>