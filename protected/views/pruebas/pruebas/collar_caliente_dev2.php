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
			'Collar Caliente 2 Devanados'.
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script>
function aplicarReglas(){
	$('.decimal').keypress(function(event) {
	    if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46){
	        return true;
	    }else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
	        event.preventDefault();
	    }
	});
	$('.textomax').each(function() {
		$(this).attr('maxlength','6');
	});
	$('.decimalmax').each(function() {
		$(this).attr('maxlength','7');
	});
}
	$(function() {
		$('textarea[class*=limited]').each(function() {
			var limit = parseInt($(this).attr('data-maxlength')) || 100;
			$(this).inputlimiter({
				"limit": limit,
				remText: '%n caracteres disponibles...',
				limitText: 'maximo : %n.'
			});
		});
	});
	function crearJson(){
		//tabla 1 fila 1
		var kv=$("#table_1 tr").find("#kv").val();
		var h0=$("#table_1 tr").find("#h0").val();
		var h1=$("#table_1 tr").find("#h1").val();
		var h2=$("#table_1 tr").find("#h2").val();
		var h3=$("#table_1 tr").find("#h3").val();
		var x0=$("#table_1 tr").find("#x0").val();
		var x1=$("#table_1 tr").find("#x1").val();
		var x2=$("#table_1 tr").find("#x2").val();
		var x3=$("#table_1 tr").find("#x3").val();

		var observacion=$("#observacion").val();

		var json=''
			  	+'{'
				  +'"tabla1": ['
				    +'{'
				      +'"kv": "'+kv+'",'
				      +'"h0": "'+h0+'",'
				      +'"h1": "'+h1+'",'
				      +'"h2": "'+h2+'",'
				      +'"h3": "'+h3+'",'
				      +'"x0": "'+x0+'",'
				      +'"x1": "'+x1+'",'
				      +'"x2": "'+x2+'",'
				      +'"x3": "'+x3+'"'
				    +'}'
				  +'],'
				  +'"observaciones": "'+observacion+'"'
				+'}';
		$.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/ActualizarTipoPrueba",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                json: json,
                id: <?php echo $model_datos->id?>
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
            	console.log(data.update);
            	if(data.update=="1" || data.update=="0"){
            		location.href="<?php echo $nameProyect?>/Pruebas/ListarPrueba/<?php echo $model_datos->fk_pruebas?>";
            	}else{
            		$(".info").html('<div class="alert alert-error">'+
            			'<button class="close" data-dismiss="alert" type="button">'+
						'<i class="icon-remove"></i>'+
						'</button>'+
						'<strong>'+
						'<i class="icon-remove"></i>'+
						'No se guardo!'+
						'</strong>'+
						'Compruebe su conexion.'+
						'<br>'+
						'</div>');
            	}
                
            }
	    });
	}
	function cargarDatos(){
		var text='<?php echo $model_datos->datos?>';
		if(text.length>0){
			var data = JSON.parse('<?php echo $model_datos->datos?>');
			//tabla 1 fila 1
			$("#table_1 tr #kv").val(data.tabla1[0].kv);
			$("#table_1 tr #h0").val(data.tabla1[0].h0);
			$("#table_1 tr #h1").val(data.tabla1[0].h1);
			$("#table_1 tr #h2").val(data.tabla1[0].h2);
			$("#table_1 tr #h3").val(data.tabla1[0].h3);
			$("#table_1 tr #x0").val(data.tabla1[0].x0);
			$("#table_1 tr #x1").val(data.tabla1[0].x1);
			$("#table_1 tr #x2").val(data.tabla1[0].x2);
			$("#table_1 tr #x3").val(data.tabla1[0].x3);

			$("#observacion").val(data.observaciones);
		}
		var estado='<?php echo $estado?>';
		if (estado==3){
			$("input").prop("disabled", true);
			$("button").prop("disabled", true);
			$("select").prop("disabled", true);
			$("textarea").prop("disabled", true);
		}
	}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Collar Caliente</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<hr>
<table id="table_1" class="table table-bordered">
		<tr>
			<th rowspan="2" class="center">Prueba</th>
			<th rowspan="2" class="center">Kv</th>
			<th colspan="8" class="center">Bujes</th>
		</tr>
		<tr>
			<td class="center input-mini">H0</td>
			<td class="center input-mini">H1</td>
			<td class="center input-mini">H2</td>
			<td class="center input-mini">H3</td>
			<td class="center input-mini">X0</td>
			<td class="center input-mini">X1</td>
			<td class="center input-mini">X2</td>
			<td class="center input-mini">X3</td>
		</tr>
	<tbody>
		<tr>
			<td class="center input-mini">mW</td>
			<td class="center input-mini"><input id="kv" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="h0" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="h1" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="h2" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="h3" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="x0" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="x1" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="x2" class="input-mini decimal decimalmax" type="text"></td>
			<td class="center input-mini"><input id="x3" class="input-mini decimal decimalmax" type="text"></td>
		</tr>
	</tbody>
</table>
<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>