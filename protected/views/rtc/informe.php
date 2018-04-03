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
		'<li>Informes y Facturacion</li>'.
	'</ul>'.
'</div>';
$json = json_decode($odt->json, true);
$size = count($json['table_materiales_epp']);

$sizeDesmontado = count($json['table_equipos_desmontados']);
?>
<div class="page-header">
	<h1>
		Informe Rtc
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Materiales, Equipos &amp; Facturacion
		</small>
	</h1>
</div>
<div id="info"></div>
<div class="row-fluid">
	<div class="span6">
		<h4>Equipos Instalados</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Equipo</th>
					<th>Serial</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			for ($i = 0; $i < $size; $i++) {
				if($json['table_materiales_epp'][$i]['equipo_instalado'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_instalado'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_instalado_serial'] ?>
						</td>
					</tr>
				<?php 
				}
			} ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<h4>Items de Facturacion</h4>
		<hr>
		<div class="form-inline">
			<select id="items_facturacion">
				<option value="">[Seleecione un Item]</option>
				<?php foreach ($model as $value) {?>
					<option value="<?php echo $value->id?>"><?php echo $value->item. ' - ' .$value->descripcion ?></option>
				<?php } ?>
			</select>
            <button  class="btn btn-small btn-primary" id="agregar_formato">Agregar</button>
        </div>
        <br>
		
		<table id="tabla_items_facturacion" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Item</th>
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
<div class="row-fluid">
	<div class="span6">
		<h4>Herramientas Epp</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Herrameinta</th>
					<th>Estado</th>
					<th>Cantidad</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			for ($i = 0; $i < $size; $i++) {
				if($json['table_materiales_epp'][$i]['herramientas_epp'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['herramientas_epp'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['herramientas_epp_estado'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['herramientas_epp_cantidad'] ?>
						</td>
					</tr>
				<?php 
				}
			} ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<h4>Equipo de prueba</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Equipo</th>
					<th>Serial</th>
					<th>Cantidad</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			for ($i = 0; $i < $size; $i++) {
				if($json['table_materiales_epp'][$i]['equipo_prueba'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_prueba'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_prueba_serial'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_prueba_cantidad'] ?>
						</td>
					</tr>
				<?php 
				}
			} ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<h4>Equipo Desmontado</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Equipo</th>
					<th>Serial</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			for ($i = 0; $i < $size; $i++) {
				if($json['table_equipos_desmontados'][$i]['equipo_desmontado'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['equipo_desmontado'] ?>
						</td>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['equipo_desmontado_serial'] ?>
						</td>
					</tr>
				<?php 
				}
			} ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<h4>Materiales Insumos</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Material</th>
					<th>Unidad</th>
					<th>Cantidad</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			for ($i = 0; $i < $size; $i++) {
				if($json['table_equipos_desmontados'][$i]['materiales_insumos'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['materiales_insumos'] ?>
						</td>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['materiales_insumos_unidad'] ?>
						</td>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['materiales_insumos_cantidad'] ?>
						</td>
					</tr>
				<?php 
				}
			} ?>
			</tbody>
		</table>
	</div>
</div>

<div class="space"></div>
