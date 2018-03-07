<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center">Numero</th>
			<th class="text-center">Consignacion</th>
			<th class="text-center">Tipo Trabajo</th>
			<th class="text-center">Trazabilidad</th>
			<th class="text-center">Tipo MTO</th>
			<th class="text-center">Categoria</th>
			<th class="text-center">Fecha</th>
			<th class="text-center">Accion</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($model as $value) {?>
		<tr>
			<td class="text-center">
				<?php echo $value->numero?>
			</td>
			<td class="text-center">
				<?php echo $value->consignacion?>
			</td>
			<td class="text-center">
				<?php echo $value->tipo_trabajo?>
			</td>
			<td class="text-center">
				<?php echo $value->trazabilidad?>
			</td>
			<td class="text-center">
				<?php echo $value->tipo_mantenimiento?>
			</td>
			<td class="text-center">
				<?php echo $value->categoria?>
			</td>
			<td class="text-center">
				<?php echo $value->fecha?>
			</td>

			<td class="text-center">
				<!--<a class="demo-psi-pen-5 btn btn-primary btn-xs" href="update/<?php //echo $value->id?>"></a>-->
				<a class="btn btn-small btn-danger borrar" href="#" data-id="<?php echo $value->id?>">
                    <i class="icon-trash bigger-120"></i>
                </a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>