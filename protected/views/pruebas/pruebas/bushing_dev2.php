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
			'Bushing 2 Devanados'.
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
		var observacion=$("#observacion").val();

		var json=''
			  	+'{'
				  +'"tabla_h": ['
				    +'{'
				        +'"h0_c1_tap": "'+$("#h0_c1_tap").val()+'",'
				        +'"h0_c2_tap": "'+$("#h0_c2_tap").val()+'",'

				        +'"h0_c1_cap": "'+$("#h0_c1_cap").val()+'",'
				        +'"h0_c2_cap": "'+$("#h0_c2_cap").val()+'",'

				        +'"h1_c1_tap": "'+$("#h1_c1_tap").val()+'",'
				        +'"h1_c2_tap": "'+$("#h1_c2_tap").val()+'",'

				        +'"h1_c1_cap": "'+$("#h1_c1_cap").val()+'",'
				        +'"h1_c2_cap": "'+$("#table_h tr").find("#h1_c2_cap").val()+'",'

				        +'"h2_c1_tap": "'+$("#h2_c1_tap").val()+'",'
				        +'"h2_c2_tap": "'+$("#h2_c2_tap").val()+'",'

				        +'"h2_c1_cap": "'+$("#h2_c1_cap").val()+'",'
				        +'"h2_c2_cap": "'+$("#h2_c2_cap").val()+'",'

				        +'"h3_c1_tap": "'+$("#h3_c1_tap").val()+'",'
				        +'"h3_c2_tap": "'+$("#h3_c2_tap").val()+'",'

				        +'"h3_c1_cap": "'+$("#h3_c1_cap").val()+'",'
				        +'"h3_c2_cap": "'+$("#h3_c2_cap").val()+'"'
				    +'}'
				  +'],'
				  +'"tabla_x": ['
				    +'{'
				        +'"x0_c1_tap": "'+$("#x0_c1_tap").val()+'",'
				        +'"x0_c2_tap": "'+$("#x0_c2_tap").val()+'",'

				        +'"x0_c1_cap": "'+$("#x0_c1_cap").val()+'",'
				        +'"x0_c2_cap": "'+$("#x0_c2_cap").val()+'",'

				        +'"x1_c1_tap": "'+$("#x1_c1_tap").val()+'",'
				        +'"x1_c2_tap": "'+$("#x1_c2_tap").val()+'",'
 
				        +'"x1_c1_cap": "'+$("#x1_c1_cap").val()+'",'
				        +'"x1_c2_cap": "'+$("#x1_c2_cap").val()+'",'

				        +'"x2_c1_tap": "'+$("#x2_c1_tap").val()+'",'
				        +'"x2_c2_tap": "'+$("#x2_c2_tap").val()+'",'

				        +'"x2_c1_cap": "'+$("#x2_c1_cap").val()+'",'
				        +'"x2_c2_cap": "'+$("#x2_c2_cap").val()+'",'

				        +'"x3_c1_tap": "'+$("#x3_c1_tap").val()+'",'
				        +'"x3_c2_tap": "'+$("#x3_c2_tap").val()+'",'

				        +'"x3_c1_cap": "'+$("#x3_c1_cap").val()+'",'
				        +'"x3_c2_cap": "'+$("#x3_c2_cap").val()+'"'
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
			var data = JSON.parse(text);
			$("#h0_c1_tap").val(data.tabla_h[0].h0_c1_tap)
			$("#h0_c2_tap").val(data.tabla_h[0].h0_c2_tap)

			$("#h0_c1_cap").val(data.tabla_h[0].h0_c1_cap)
			$("#h0_c2_cap").val(data.tabla_h[0].h0_c2_cap)

			$("#h1_c1_tap").val(data.tabla_h[0].h1_c1_tap)
			$("#h1_c2_tap").val(data.tabla_h[0].h1_c2_tap)

			$("#h1_c1_cap").val(data.tabla_h[0].h1_c1_cap)
			$("#h1_c2_cap").val(data.tabla_h[0].h1_c2_cap)

			$("#h2_c1_tap").val(data.tabla_h[0].h2_c1_tap)
			$("#h2_c2_tap").val(data.tabla_h[0].h2_c2_tap)

			$("#h2_c1_cap").val(data.tabla_h[0].h2_c1_cap)
			$("#h2_c2_cap").val(data.tabla_h[0].h2_c2_cap)

			$("#h3_c1_tap").val(data.tabla_h[0].h3_c1_tap)
			$("#h3_c2_tap").val(data.tabla_h[0].h3_c2_tap)

			$("#h3_c1_cap").val(data.tabla_h[0].h3_c1_cap)
			$("#h3_c2_cap").val(data.tabla_h[0].h3_c2_cap)
			
			//************************
			$("#x0_c1_tap").val(data.tabla_x[0].x0_c1_tap)
			$("#x0_c2_tap").val(data.tabla_x[0].x0_c2_tap)

			$("#x0_c1_cap").val(data.tabla_x[0].x0_c1_cap)
			$("#x0_c2_cap").val(data.tabla_x[0].x0_c2_cap)

			$("#x1_c1_tap").val(data.tabla_x[0].x1_c1_tap)
			$("#x1_c2_tap").val(data.tabla_x[0].x1_c2_tap)
 
			$("#x1_c1_cap").val(data.tabla_x[0].x1_c1_cap)
			$("#x1_c2_cap").val(data.tabla_x[0].x1_c2_cap)

			$("#x2_c1_tap").val(data.tabla_x[0].x2_c1_tap)
			$("#x2_c2_tap").val(data.tabla_x[0].x2_c2_tap)

			$("#x2_c1_cap").val(data.tabla_x[0].x2_c1_cap)
			$("#x2_c2_cap").val(data.tabla_x[0].x2_c2_cap)

			$("#x3_c1_tap").val(data.tabla_x[0].x3_c1_tap)
			$("#x3_c2_tap").val(data.tabla_x[0].x3_c2_tap)

			$("#x3_c1_cap").val(data.tabla_x[0].x3_c1_cap)
			$("#x3_c2_cap").val(data.tabla_x[0].x3_c2_cap)

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
	<h3>Bushing</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<hr>
<div class="row-fluid">
	<div class="span6">
		<table id="table_h" class="table table-bordered">
				<tr>
					<th colspan="4" class="center">Datos de placa toma capacitiva</th>
				</tr>
				
			<tbody>
				<tr>
					<td class="center input-mini">NT</td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">H0</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="h0_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h0_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="h0_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h0_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini"></td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">H1</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="h1_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h1_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="h1_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h1_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini"></td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">H2</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="h2_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h2_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="h2_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h2_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini"></td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">H3</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="h3_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h3_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="h3_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="h3_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<table id="table_x" class="table table-bordered">
				<tr>
					<th colspan="4" class="center">Datos de placa toma capacitiva</th>
				</tr>
				
			<tbody>
				<tr>
					<td class="center input-mini">NT</td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">X0</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="x0_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x0_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="x0_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x0_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini"></td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">X1</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="x1_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x1_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="x1_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x1_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini"></td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">X2</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="x2_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x2_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="x2_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x2_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini"></td>
					<td class="center input-mini" colspan="2">F.P TAP CAPACITIVO</td>
					<td class="center input-mini">CAPACITANCIA</td>
				</tr>
				<tr>
					<td class="center input-mini" rowspan="2">X3</td>
					<td class="center input-mini">C1</td>
					<td class="center input-mini"><input id="x3_c1_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x3_c1_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
				<tr>
					<td class="center input-mini">C2</td>
					<td class="center input-mini"><input id="x3_c2_tap" class="input-mini decimal decimalmax" type="text"></td>
					<td class="center input-mini"><input id="x3_c2_cap" class="input-mini decimal decimalmax" type="text"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>