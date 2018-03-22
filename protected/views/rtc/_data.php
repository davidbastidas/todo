<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center">ODT</th>
			<th class="text-center">Fecha</th>
			<th class="text-center">Subestacion</th>
			<th class="text-center">Brigada</th>
			<th class="text-center">Jefe brigada</th>
			<th class="text-center">Pruebas</th>
			<th class="text-center">Informe y Facturacion</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$nameProyect = "/" . Yii::app() -> params['nameproyect'];
		foreach ($model as $value) {?>
		<tr>
			<td class="text-center">
				<?php echo $value->numero?>
			</td>
			<td class="text-center">
				<?php 
				$date = new DateTime($value->fecha);
				echo $date->format('Y-m-d')." ".$value->hora_prevista_inicio; ?>
			</td>
			<td class="text-center">
				<?php echo $value->fk_equipo_fk->fk_subestacion_e->fk_ubicacion_s->nombre . ' - ' . $value->fk_equipo_fk->fk_subestacion_e->nombre?>
			</td>
			<td class="text-center">
				<?php 
				if(isset($value->fk_brigada_fk->nombre)){
					echo $value->fk_brigada_fk->nombre;
				}else{
					echo 'Sin brigada';
				}
				?>
			</td>
			<td class="text-center">
				<?php echo ''?>
			</td>
			<td class="text-center">
				<a class="demo-psi-pen-5 btn btn-primary btn-small" href="<?php echo $nameProyect.'/odt/llenarodt/'.$value->id?>">
                    <i class="icon-edit bigger-120"></i>
                </a>
			</td>
			<td class="text-center">
				<a class="btn btn-info btn-small" href="<?php echo $nameProyect.'/rtc/informe/'.$value->id?>">
                    <i class="fa fa-wrench bigger-120"></i>
                </a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>