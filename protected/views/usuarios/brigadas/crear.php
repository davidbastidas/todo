<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Crear Brigadas',
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
<li>Crear Brigadas</li>
</ul>
</div>
';
?>
<div class="page-header position-relative">
	<h1>
		Crear Brigadas
	</h1>
</div>
<div id="info"></div>
<div class="row-fluid">
	<div class="span12">
		<div class="form-group span3">
			<label for="nombre">Nombre de la brigada</label>
			<input type="text" placeholder="Nombre" id="nombre" name="nombre" />
		</div>
		<div class="form-group span3">
			<label for="descripcion">Descripcion</label>
			<input type="text" placeholder="Descripcion" id="descripcion" name="descripcion"/>
		</div>
		<div class="form-group span3">
			<label for="ubicacion">Ubicacion</label>
			<?php 
			echo CHtml::dropDownList('ubicacionfk', 'ubicacionfk', 
              CHtml::listData(Ubicacion::model()->findAll(),'nombre','nombre'),
              array('empty' => '[Seleccione la ubicacion]'));
			?>
		</div>
		<div class="form-group span3">
			<label for="pep">PEP</label>
			<?php 
			echo CHtml::dropDownList('pep', 'pep', 
              CHtml::listData(InfoPep::model()->findAll(),'id','nombre'),
              array('empty' => '[Seleccione el pep]'));
			?>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="form-group span3">
			<label for="horario">Horario</label>
			<?php 
			echo CHtml::dropDownList('horario', 'horario', 
              	array(
					'ORDINARIO 7:00 A 17:00' => 'ORDINARIO 7:00 A 17:00', 
					'ORDINARIO 8:00 A 18:00'=>'ORDINARIO 8:00 A 18:00',
					'TURNO 6:00 A 14:00'=>'TURNO 6:00 A 14:00',
					'TURNO 14:00 A 22:00'=>'TURNO 14:00 A 22:00',
					'TURNO 22:00 A 6:00'=>'TURNO 22:00 A 6:00'
				),
              array('empty' => '[Seleccione el Horario]'));
			?>
		</div>
		<div class="form-group span9">
			<label for="usuario">Operarios</label>
			<div class="form-inline">
				<select class="form-class" id="usuario" name="usuario" data-placeholder="Elija un usuario...">
					<option value="">Seleccione el operario</option>
					<?php foreach ($model as $key) {?>
					<option value="<?php echo $key->id ?>" ><?php echo $key->nombre ?></option>
					<?php }?> 
				</select>
				<button class="btn btn-primary btn-small agregar">Agregar</button>
			</div><br>
			<table class="table table-bordered table-hover">
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Es Jefe</th>
					<th>Accion</th>
				</tr>
				<tbody id="brigadistas"></tbody>
			</table>
		</div>
	</div>
</div>
<div class="row-fluid" style="display: none;">
	<div class="span12">
		<div class="form-group span3">
			<label for="nombre">Jefe de la brigada</label>
			<input type="text" placeholder="Jefe" id="jefe" name="jefe"/>
		</div>
	</div>
</div>
<hr>
<button class="btn btn-success guardar">Guardar Brigada</button>

<script type="text/javascript">
	var usuario = new Object();
	$(function() {
		$('.agregar').on('click', function () {
			var usuarioInput = $("#usuario");
			if (usuarioInput.val() != "") {
				usuario.id = usuarioInput.val();
				usuario.nombre = $("#usuario option:selected").text();
				var pasa = true;
				$('table > tbody  > tr').each(function() {
					if($(this).find('.usuario_id').html() == usuario.id){
						pasa = false;return;
					}
				});
				if(pasa){
					$("#brigadistas").append("<tr>"+
						"<td class='usuario_id'>"+usuario.id+"</td>"+
						"<td class='usuario_nombre'>"+usuario.nombre+"</td>"+
						"<td class='usuario_nombre'>"+
							"<div class='radio'>"+
								"<label>"+
									"<input name='form-field-radio' type='radio' class='ace radio_jefe'>"+
									"<span class='lbl radio_jefe'></span>"+
								"</label>"+
							"</div>"+
						"</td>"+
						"<td class='remover'><a href='#' onclick='remover(this)'><i class='fa fa-remove'></i></a></td>"+
						"</tr>");
				}else{
					alert("Ya se encuentra en el listado.")
				}
				$("#usuario option:selected").remove();
			}
		});
		$('.guardar').on('click', function () {
			var array = [];
			var objeto = null;
			$('#brigadistas').each(function() {
				objeto = new Object();
				objeto.id = $(this).find('.usuario_id').html();
				objeto.nombre = $(this).find('.usuario_nombre').html();
				array.push(objeto)
			});
			crearBrigada(JSON.stringify(array))
		});
		
		function crearBrigada(json){
			$.ajax({
	            url:"<?php echo $nameProyect?>/Usuarios/CrearBrigada",
	            type:'POST',
	            dataType:"json",
	            cache:false,
	            data: {
	                nombre: $("#nombre").val(),
	                descripcion: $("#descripcion").val(),
	                ubicacion: $("#ubicacionfk").val(),
	                pep: $("#pep").val(),
	                horario: $("#horario").val(),
	                jefe: $("#jefe").val(),
	                json: json
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

	});
	function remover(nodo){
		var tr = $(nodo).parent().parent();
		//agregarlo al select
		$('#usuario').append($('<option>', {
		    value: tr.find('.usuario_id').html(),
		    text: tr.find('.usuario_nombre').html()
		}));
		tr.remove();
	}
	$(document).on('click','.radio_jefe',function(){
			console.log($(this).parent().parent().parent().parent().find('.usuario_id').html())
			$("#jefe").val($(this).parent().parent().parent().parent().find('.usuario_id').html())
	});
</script>