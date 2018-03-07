<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Brigadas',
	);
Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
<ul class="breadcrumb">
<li class="active">
<i class="icon-home home-icon"></i>
<a href="'.$nameProyect.'/site/index">Inicio</a>
<span class="divider">
<i class="icon-angle-right arrow-icon"></i>
</span>
</li>
<li>Brigadas</li>
</ul>
</div>
';
?>
<div class="page-header position-relative">
	<h1>
		Brigadas
		<small>
			<i class="icon-double-angle-right"></i>
			Creacion, Modificacion
		</small>
	</h1>
</div>
<div class="row-fluid">
	<div class="span12">
		<a href="crearBrigada" class="btn btn-primary"><i class="fa fa-icon-plus"></i> Crear</a>
		<div class="widget-box">
			<div class="widget-header header-color-blue" style="background: #7b5c4e;border-color: #7b5c4e;">
				<h5 class="bigger lighter">
					<i class="icon-table"></i>
					Listado de brigadas
				</h5>
			</div>
			<div class="widget-body" style="border-color: #7b5c4e;">
				<div class="widget-main no-padding">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Asignado</th>
								<th>Acciones</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($model as $key) {?>
							<tr>
								<td><?php echo $key->id?></td>
								<td><?php echo $key->nombre?></td>
								<td><?php echo isset($key->fk_coordinador_usuario->nombre) ? $key->fk_coordinador_usuario->nombre : "" ?></td>
								<td>
									<button class="btn btn-primary btn-small" onclick="setBrigada(<?php echo $key->id?>)">Asignar a...</button>
									<button class="btn btn-danger btn-small" onclick="eliminar(<?php echo $key->id?>)"><i class="fa fa-ban"></i></button>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal-asignar" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Coordinador a asignar</h4>
			</div>
			<div class="modal-body" style="overflow-y:inherit;">
				<label>Coordinador</label>
				<select class="chzn-select" id="coordinador" name="coordinador" data-placeholder="Elija un coordinador...">
					<option value=""></option>
					<?php foreach ($coordinadores as $key) {?>
					<option value="<?php echo $key->id ?>" ><?php echo $key->nombre ?></option>
					<?php }?> 
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success guardar">Guardar</button>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
$(function() {
	$(".chzn-select").chosen();
});
var objeto = new Object();
function setBrigada(id){
	objeto.brigada = id;
	$("#modal-asignar").modal("show");
}
function eliminar(id){
	var r = confirm("¿Seguro Desea ELIMINAR este registro?");
	if (r == true) {
		$.ajax({
			url:"<?php echo $nameProyect?>/Usuarios/EliminarBrigada",
			type:'POST',
			dataType:"json",
			cache:false,
			data: {
				id: id
			},
			beforeSend:  function() {
				$("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
			},
			success: function(data){
				if(data.success){
					location.href="<?php echo $nameProyect?>/usuarios/brigadas";
				}else{
					$("#info").html('No se Elimino el registro.');
				}
			}
		});
	}
}

$('.guardar').on('click', function () {
	asignarBrigada();
});
function asignarBrigada(){
	$.ajax({
		url:"<?php echo $nameProyect?>/Usuarios/AsignarBrigada",
		type:'POST',
		dataType:"json",
		cache:false,
		data: {
			coordinador: $("#coordinador").val(),
			brigadaId: objeto.brigada
		},
		beforeSend:  function() {
			$("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
		},
		success: function(response){
			if(response.success){
				location.href="<?php echo $nameProyect?>/usuarios/brigadas";
			}
			$("#info").html('');
		}
	});
}
</script>