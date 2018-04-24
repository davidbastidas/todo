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
			'Collar Caliente Interruptor Potencia'.
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
	$('.entero').keypress(function(e) {
	    var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9]/);
        if (verified) {e.preventDefault();}
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
			      +'"skirt": "'+$("#11-skirt").val()+'",'
			      +'"kv": "'+$("#11-kvmeas").val()+'",'
			      +'"cp": "'+$("#11-cp").val()+'",'
			      +'"pkv": "'+$("#11-pkv").val()+'"'
			    +'},'
			   +'{'
			      +'"skirt": "'+$("#12-skirt").val()+'",'
			      +'"kv": "'+$("#12-kvmeas").val()+'",'
			      +'"cp": "'+$("#12-cp").val()+'",'
			      +'"pkv": "'+$("#12-pkv").val()+'"'
			    +'},'
			    +'{'
			      +'"skirt": "'+$("#23-skirt").val()+'",'
			      +'"kv": "'+$("#23-kvmeas").val()+'",'
			      +'"cp": "'+$("#23-cp").val()+'",'
			      +'"pkv": "'+$("#23-pkv").val()+'"'
			    +'},'
			    +'{'
			      +'"skirt": "'+$("#24-skirt").val()+'",'
			      +'"kv": "'+$("#24-kvmeas").val()+'",'
			      +'"cp": "'+$("#24-cp").val()+'",'
			      +'"pkv": "'+$("#24-pkv").val()+'"'
			    +'},'
			    +'{'
			      +'"skirt": "'+$("#35-skirt").val()+'",'
			      +'"kv": "'+$("#35-kvmeas").val()+'",'
			      +'"cp": "'+$("#35-cp").val()+'",'
			      +'"pkv": "'+$("#35-pkv").val()+'"'
			    +'},'
			    +'{'
			      +'"skirt": "'+$("#36-skirt").val()+'",'
			      +'"kv": "'+$("#36-kvmeas").val()+'",'
			      +'"cp": "'+$("#36-cp").val()+'",'
			      +'"pkv": "'+$("#36-pkv").val()+'"'
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
		$("#11-skirt").val(data.tabla[0].skirt);
		$("#11-kvmeas").val(data.tabla[0].kv);
		$("#11-cp").val(data.tabla[0].cp);
		$("#11-pkv").val(data.tabla[0].pkv);

		$("#12-skirt").val(data.tabla[1].skirt);
		$("#12-kvmeas").val(data.tabla[1].kv);
		$("#12-cp").val(data.tabla[1].cp);
		$("#12-pkv").val(data.tabla[1].pkv);

		$("#23-skirt").val(data.tabla[2].skirt);
		$("#23-kvmeas").val(data.tabla[2].kv);
		$("#23-cp").val(data.tabla[2].cp);
		$("#23-pkv").val(data.tabla[2].pkv);

		$("#24-skirt").val(data.tabla[3].skirt);
		$("#24-kvmeas").val(data.tabla[3].kv);
		$("#24-cp").val(data.tabla[3].cp);
		$("#24-pkv").val(data.tabla[3].pkv);

		$("#35-skirt").val(data.tabla[4].skirt);
		$("#35-kvmeas").val(data.tabla[4].kv);
		$("#35-cp").val(data.tabla[4].cp);
		$("#35-pkv").val(data.tabla[4].pkv);

		$("#36-skirt").val(data.tabla[5].skirt);
		$("#36-kvmeas").val(data.tabla[5].kv);
		$("#36-cp").val(data.tabla[5].cp);
		$("#36-pkv").val(data.tabla[5].pkv);

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
<p>1. LA PRUEBA DE COLLAR CALIENTE SE REALIZA CON EL INTERRUPTOR EN POSICION CLOSE, "I", ESTA PRUEBA SE LLEVARA A CABO SIEMPRE Y CUANDO EL INTERRUPTOR SEA DE TIPO EXTERIOR</p>
<p>2. SKI C1: PRIMER FALDON DE CAMARA INTERRUPTIVA, PARTE SUPERIOR DEL INTERRUPTOR</p>
<p>3. SKI S2: PRIMER FALDON AISLADOR DE SOPORTE, PARTE INFERIOR INTERRUPTOR</p>
<table id="table_1" class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2" class="center">N</th>
			<th colspan="3" class="center input-mini">Grupo Conexion</th>
			<th rowspan="2" class="center">Kv Meas</th>
			<th rowspan="2" class="center">CP</th>
			<th rowspan="2" class="center">P@10KV</th>
		</tr>
		<tr>
			<td class="center input-mini">SKIRT</td>
			<td class="center input-mini">Cable Alta tension</td>
			<td class="center input-mini">Modo</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="2">1</td>
			<td class="center input-mini"><input id="11-skirt" class="input-mini entero" type="text" placeholder=""></td>
			<td class="center input-mini">SKL C1</td>
			<td class="center input-mini">UST</td>
			<td><input id="11-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="11-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="11-pkv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini"><input id="12-skirt" class="input-mini entero" type="text" placeholder=""></td>
			<td class="center input-mini">SKL S2</td>
			<td class="center input-mini">UST</td>
			<td><input id="12-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="12-pkv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
		</tr>

		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="2">2</td>
			<td class="center input-mini"><input id="23-skirt" class="input-mini entero" type="text" placeholder=""></td>
			<td class="center input-mini">SKL C1</td>
			<td class="center input-mini">UST</td>
			<td><input id="23-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="23-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="23-pkv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini"><input id="24-skirt" class="input-mini entero" type="text" placeholder=""></td>
			<td class="center input-mini">SKL S2</td>
			<td class="center input-mini">UST</td>
			<td><input id="24-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="24-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="24-pkv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
		</tr>

		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="2">3</td>
			<td class="center input-mini"><input id="35-skirt" class="input-mini entero" type="text" placeholder=""></td>
			<td class="center input-mini">SKL C1</td>
			<td class="center input-mini">UST</td>
			<td><input id="35-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="35-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="35-pkv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini"><input id="36-skirt" class="input-mini entero" type="text" placeholder=""></td>
			<td class="center input-mini">SKL S2</td>
			<td class="center input-mini">UST</td>
			<td><input id="36-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="36-cp" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="36-pkv" class="input-mini decimal decimalmax pkv" type="text" placeholder=""></td>
		</tr>
		
	</tbody>
</table>
<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>