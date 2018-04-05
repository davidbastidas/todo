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
            <button  class="btn btn-small btn-primary" onclick="agregar();">Agregar</button>
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
		<?php foreach ($facturas as $value) {?>
			<tr id="<?php echo $value->id?>">
				<td>
					<?php echo $value->fk_item->item. ' - ' .$value->fk_item->descripcion ?>
				</td>
				<td>
					<?php echo $value->criterio ?>
				</td>
				<td>
					<?php echo $value->dividendo ?>
				</td>
				<td>
					<button class="btn btn-mini btn-danger" onclick="eliminar(<?php echo $value->id?>);">
						<i class="icon-trash bigger-120"></i>
					</button>
				</td>
				<td>
					<?php 
					if($value->estado == 1){
						echo 'Activo';
					}else{
						echo 'Inactivo';
					}?>
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
function agregar(){
	$.ajax({
        url:"<?php echo $nameProyect?>/rtc/AgregarFactura",
        type:'POST',
        dataType:"json",
        cache:false,
        data: {
            odt: '<?php echo $odt->id?>',
            item: $("#items_facturacion").val(),
            criterio: $("#forma_dividir").val(),
            dividendo: $("#numero_dividir").val()
        },
        beforeSend:  function() {
            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
        },
        success: function(data){
        	if(data.response){
        		$("#info").html('');
        		location.href="<?php echo $nameProyect?>/rtc/facturacion/<?php echo $odt->id?>";
        		
        	}else{
				$("#info").html('No se agrego el item');
        	}
        }
    });
}
function eliminar(id){
	location.href="<?php echo $nameProyect?>/rtc/EliminarFactura/"+id;
}
</script>