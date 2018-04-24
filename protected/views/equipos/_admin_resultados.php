<?php 
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
echo "<br>Total equipos: ".$modelcount?>

<table id="sample-table-1" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Equipo</th>
			<th>Subestacion</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>
<?php 
	foreach ($equipos as $key) {
		$json_equipo = json_decode( $key->datosjson, true );
		?>
		<tr>
			<td>
				<?php 
				if(isset($json_equipo['nombre_eq'])){
					echo $json_equipo['nombre_eq'];
				}else{
					echo $key->serie;
				}
				?>
			</td>
			<td>
				<?php 
					echo $key->fk_subestacion_e->nombre
				?>
			</td>
			<td>
				<a class="blue" href="<?php echo $nameProyect?>/equipos/<?php echo $key->id?>" title="Mostrar">
					<i class="icon-zoom-in bigger-130"></i>
				</a>
				<a class="green" href="<?php echo $nameProyect?>/equipos/update/<?php echo $key->id?>" title="Actualiza">
					<i class="icon-pencil bigger-130"></i>
				</a>
			</td>
		</tr>
<?php } ?>
	</tbody>
</table>
