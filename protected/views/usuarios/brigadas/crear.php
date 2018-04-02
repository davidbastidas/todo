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
			<input type="text" placeholder="Ubicacion" id="ubicacion" name="ubicacion"/>
		</div>
		<div class="form-group span3">
			<label for="pep">PEP</label>
			<input type="text" placeholder="PEP" id="pep" name="pep"/>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="form-group span3">
			<label for="nombre">Jefe de la brigada</label>
			<input type="text" placeholder="Jefe" id="jefe" name="jefe"/>
		</div>
		<div class="form-group span3">
			<label for="vehiculo">Vehiculo</label>
			<input type="text" placeholder="Vehiculo" id="vehiculo" name="vehiculo"/>
		</div>
		<div class="form-group span3">
			<label for="telefono">Telefono</label>
			<input type="text" placeholder="Telefono" id="telefono" name="telefono"/>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="form-inline">
			<label for="usuario">Operarios</label>

			<select class="form-class" id="usuario" name="usuario" data-placeholder="Elija un usuario...">
				<option value="">Seleccione el operario</option>
				<?php foreach ($model as $key) {?>
				<option value="<?php echo $key->id ?>" ><?php echo $key->nombre ?></option>
				<?php }?> 
			</select>
			<button class="btn btn-primary btn-small agregar">Agregar</button>
		</div>
		<table>
		</table>
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
					$("table").append("<tr>"+
						"<td class='usuario_id'>"+usuario.id+"</td>"+
						"<td class='usuario_nombre'>"+usuario.nombre+"</td>"+
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
			$('table > tbody  > tr').each(function() {
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
</script>