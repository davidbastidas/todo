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
			'Factor Disipacion Interruptor Potencia'.
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
	$(document).on("keyup", ".pkv", function(){
		validarColorValor(this);
	});
	function crearJson(){
		var observacion=$("#observacion").val();
		var json=''
			  	+'{'
				  +'"tabla": ['
				    +'{'
				      +'"kv": "'+$("#12-ust-kvmeas").val()+'",'
				      +'"cp": "'+$("#12-ust-cp").val()+'",'
				      +'"pkv": "'+$("#12-ust-kv").val()+'",'
				      +'"frecuencia": "'+$("#12-ust-hz").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#12-ust-kvmeas2").val()+'",'
				      +'"cp": "'+$("#12-ust-cp2").val()+'",'
				      +'"pkv": "'+$("#12-ust-kv2").val()+'",'
				      +'"frecuencia": "'+$("#12-ust-hz2").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#12-gnd-kvmeas").val()+'",'
				      +'"cp": "'+$("#12-gnd-cp").val()+'",'
				      +'"pkv": "'+$("#12-gnd-kv").val()+'",'
				      +'"frecuencia": "'+$("#12-gnd-hz").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#12-gnd-kvmeas2").val()+'",'
				      +'"cp": "'+$("#12-gnd-cp2").val()+'",'
				      +'"pkv": "'+$("#12-gnd-kv2").val()+'",'
				      +'"frecuencia": "'+$("#12-gnd-hz2").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#34-ust-kvmeas").val()+'",'
				      +'"cp": "'+$("#34-ust-cp").val()+'",'
				      +'"pkv": "'+$("#34-ust-kv").val()+'",'
				      +'"frecuencia": "'+$("#34-ust-hz").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#34-ust-kvmeas2").val()+'",'
				      +'"cp": "'+$("#34-ust-cp2").val()+'",'
				      +'"pkv": "'+$("#34-ust-kv2").val()+'",'
				      +'"frecuencia": "'+$("#34-ust-hz2").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#34-gnd-kvmeas").val()+'",'
				      +'"cp": "'+$("#34-gnd-cp").val()+'",'
				      +'"pkv": "'+$("#34-gnd-kv").val()+'",'
				      +'"frecuencia": "'+$("#34-gnd-hz").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#34-gnd-kvmeas2").val()+'",'
				      +'"cp": "'+$("#34-gnd-cp2").val()+'",'
				      +'"pkv": "'+$("#34-gnd-kv2").val()+'",'
				      +'"frecuencia": "'+$("#34-gnd-hz2").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#56-ust-kvmeas").val()+'",'
				      +'"cp": "'+$("#56-ust-cp").val()+'",'
				      +'"pkv": "'+$("#56-ust-kv").val()+'",'
				      +'"frecuencia": "'+$("#56-ust-hz").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#56-ust-kvmeas2").val()+'",'
				      +'"cp": "'+$("#56-ust-cp2").val()+'",'
				      +'"pkv": "'+$("#56-ust-kv2").val()+'",'
				      +'"frecuencia": "'+$("#56-ust-hz2").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#56-gnd-kvmeas").val()+'",'
				      +'"cp": "'+$("#56-gnd-cp").val()+'",'
				      +'"pkv": "'+$("#56-gnd-kv").val()+'",'
				      +'"frecuencia": "'+$("#56-gnd-hz").val()+'"'
				    +'},'
				    +'{'
				      +'"kv": "'+$("#56-gnd-kvmeas2").val()+'",'
				      +'"cp": "'+$("#56-gnd-cp2").val()+'",'
				      +'"pkv": "'+$("#56-gnd-kv2").val()+'",'
				      +'"frecuencia": "'+$("#56-gnd-hz2").val()+'"'
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
			$("#12-ust-kvmeas").val(data.tabla[0].kv);
			$("#12-ust-cp").val(data.tabla[0].cp);
			$("#12-ust-kv").val(data.tabla[0].pkv);
			$("#12-ust-hz").val(data.tabla[0].frecuencia);

			$("#12-ust-kvmeas2").val(data.tabla[1].kv);
			$("#12-ust-cp2").val(data.tabla[1].cp);
			$("#12-ust-kv2").val(data.tabla[1].pkv);
			$("#12-ust-hz2").val(data.tabla[1].frecuencia);

			$("#12-gnd-kvmeas").val(data.tabla[2].kv);
			$("#12-gnd-cp").val(data.tabla[2].cp);
			$("#12-gnd-kv").val(data.tabla[2].pkv);
			$("#12-gnd-hz").val(data.tabla[2].frecuencia);

			$("#12-gnd-kvmeas2").val(data.tabla[3].kv);
			$("#12-gnd-cp2").val(data.tabla[3].cp);
			$("#12-gnd-kv2").val(data.tabla[3].pkv);
			$("#12-gnd-hz2").val(data.tabla[3].frecuencia);

			$("#34-ust-kvmeas").val(data.tabla[4].kv);
			$("#34-ust-cp").val(data.tabla[4].cp);
			$("#34-ust-kv").val(data.tabla[4].pkv);
			$("#34-ust-hz").val(data.tabla[4].frecuencia);

			$("#34-ust-kvmeas2").val(data.tabla[5].kv);
			$("#34-ust-cp2").val(data.tabla[5].cp);
			$("#34-ust-kv2").val(data.tabla[5].pkv);
			$("#34-ust-hz2").val(data.tabla[5].frecuencia);

			$("#34-gnd-kvmeas").val(data.tabla[6].kv);
			$("#34-gnd-cp").val(data.tabla[6].cp);
			$("#34-gnd-kv").val(data.tabla[6].pkv);
			$("#34-gnd-hz").val(data.tabla[6].frecuencia);

			$("#34-gnd-kvmeas2").val(data.tabla[7].kv);
			$("#34-gnd-cp2").val(data.tabla[7].cp);
			$("#34-gnd-kv2").val(data.tabla[7].pkv);
			$("#34-gnd-hz2").val(data.tabla[7].frecuencia);

			$("#56-ust-kvmeas").val(data.tabla[8].kv);
			$("#56-ust-cp").val(data.tabla[8].cp);
			$("#56-ust-kv").val(data.tabla[8].pkv);
			$("#56-ust-hz").val(data.tabla[8].frecuencia);

			$("#56-ust-kvmeas2").val(data.tabla[9].kv);
			$("#56-ust-cp2").val(data.tabla[9].cp);
			$("#56-ust-kv2").val(data.tabla[9].pkv);
			$("#56-ust-hz2").val(data.tabla[9].frecuencia);

			$("#56-gnd-kvmeas").val(data.tabla[10].kv);
			$("#56-gnd-cp").val(data.tabla[10].cp);
			$("#56-gnd-kv").val(data.tabla[10].pkv);
			$("#56-gnd-hz").val(data.tabla[10].frecuencia);

			$("#56-gnd-kvmeas2").val(data.tabla[11].kv);
			$("#56-gnd-cp2").val(data.tabla[11].cp);
			$("#56-gnd-kv2").val(data.tabla[11].pkv);
			$("#56-gnd-hz2").val(data.tabla[11].frecuencia);

			$('table .pkv').each(function() {
				validarColorValor(this);
			});
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
	function validarColorValor(obj){
		var idattr=$(obj).attr("id");
		var value=parseInt($(obj).val());
		if(value<=100){
			console.log(value)
			$("#"+idattr).css({
			   'text-decoration': 'underline',
			   'color': 'green',
			   'font-weight': 'bold'
			});
		}else if(value>100){
			$("#"+idattr).css({
			   'text-decoration': 'underline',
			   'color': 'red',
			   'font-weight': 'bold'
			});
		}
	}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Factor Disipacion</h3>
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
	<thead>
		<tr>
			<th rowspan="2" class="center">N</th>
			<th colspan="3" class="center input-mini">Grupo Conexion</th>
			<th rowspan="2" class="center">Kv Meas</th>
			<th rowspan="2" class="center">CP</th>
			<th rowspan="2" class="center">P&#64;10KV</th>
			<th rowspan="2" class="center">Frecuencia</th>
			<th rowspan="2" class="center">Estado IT</th>
		</tr>
		<tr>
			<td class="center input-mini">Cable Alta tension</td>
			<td class="center input-mini">Cable Baja tension</td>
			<td class="center input-mini">Modo</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="4">R</td>
			<td class="center input-mini" rowspan="2">1</td>
			<td class="center input-mini" rowspan="2">2</td>
			<td class="center input-mini" rowspan="2">UST</td>
			<td><input id="12-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-ust-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-ust-kv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="12-ust-hz" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Open</td>
		</tr>
		<tr>
			<td><input id="12-ust-kvmeas2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-ust-cp2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-ust-kv2" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="12-ust-hz2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Open</td>
		</tr>
		<tr>
			<td class="center input-mini" rowspan="2">1</td>
			<td class="center input-mini" rowspan="2">GND</td>
			<td class="center input-mini" rowspan="2">GND</td>
			<td><input id="12-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-gnd-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-gnd-kv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="12-gnd-hz" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Closed</td>
		</tr>
		<tr>
			<td><input id="12-gnd-kvmeas2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-gnd-cp2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-gnd-kv2" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="12-gnd-hz2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Closed</td>
		</tr>

		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="4">S</td>
			<td class="center input-mini" rowspan="2">3</td>
			<td class="center input-mini" rowspan="2">4</td>
			<td class="center input-mini" rowspan="2">UST</td>
			<td><input id="34-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-ust-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-ust-kv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="34-ust-hz" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Open</td>
		</tr>
		<tr>
			<td><input id="34-ust-kvmeas2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-ust-cp2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-ust-kv2" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="34-ust-hz2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Open</td>
		</tr>
		<tr>
			<td class="center input-mini" rowspan="2">3</td>
			<td class="center input-mini" rowspan="2">GND</td>
			<td class="center input-mini" rowspan="2">GND</td>
			<td><input id="34-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-gnd-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-gnd-kv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="34-gnd-hz" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Closed</td>
		</tr>
		<tr>
			<td><input id="34-gnd-kvmeas2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-gnd-cp2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="34-gnd-kv2" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="34-gnd-hz2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Closed</td>
		</tr>

		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="4">T</td>
			<td class="center input-mini" rowspan="2">5</td>
			<td class="center input-mini" rowspan="2">6</td>
			<td class="center input-mini" rowspan="2">UST</td>
			<td><input id="56-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-ust-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-ust-kv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="56-ust-hz" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Open</td>
		</tr>
		<tr>
			<td><input id="56-ust-kvmeas2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-ust-cp2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-ust-kv2" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="56-ust-hz2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Open</td>
		</tr>
		<tr>
			<td class="center input-mini" rowspan="2">5</td>
			<td class="center input-mini" rowspan="2">GND</td>
			<td class="center input-mini" rowspan="2">GND</td>
			<td><input id="56-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-gnd-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-gnd-kv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="56-gnd-hz" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Closed</td>
		</tr>
		<tr>
			<td><input id="56-gnd-kvmeas2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-gnd-cp2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="56-gnd-kv2" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
			<td><input id="56-gnd-hz2" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td>Closed</td>
		</tr>
		
	</tbody>
</table>
<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>