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
			"Relacion Transformacion TC's".
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>
<style>
.owerflowy {overflow-y: auto;}
</style>
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
$(document).on("click", ".borrar_fila", function(){
	var idtr=$(this).parent().parent().attr("id");
	var n=$('#table_1 >tbody >tr').length;
	$("#table_1").find('#n_taps').html((n-1)+" taps");
	$("#table_1 #"+idtr).remove();
});
$(document).on("keyup", ".cprimarioa, .csecundarioa, .tolerancia", function(){
	var idtr=$(this).parent().parent().attr("id");
	var A=$('#'+idtr).find('.cprimarioa').val();
	var B=$('#'+idtr).find('.csecundarioa').val();
	var tolerancia=$('#'+idtr).find('.tolerancia').val();
	tolerancia=tolerancia/100;
	var C=A/B;
	var limmin=C*(1-tolerancia);
	var limmax=C*(1+tolerancia);
	$('#'+idtr).find('rcalculada').html(C.toPrecision(4));
	$('#'+idtr).find('limmin').html(limmin.toPrecision(4));
	$('#'+idtr).find('limmax').html(limmax.toPrecision(4));
	calcularRmedia($('#'+idtr).find('.rmedia'));
});
$(document).on("keyup", ".rmedia", function(){
	calcularRmedia(this);
});
function calcularRmedia(campo){
	var idtr=$(campo).parent().parent().attr("id");
	var limmin=$('#'+idtr).find('limmin').html();
	var limmax=$('#'+idtr).find('limmax').html();
	var rmedida=$(campo).val();
	console.log(limmin+" < "+rmedida+" >"+limmax )
	if(rmedida<limmin){
		$(campo).css({
		   'text-decoration': 'underline',
		   'color': 'red'
		});
	}else if(rmedida>limmax){
		$(campo).css({
		   'text-decoration': 'underline',
		   'color': 'red'
		});
	}else{
		$(campo).css({
		   'text-decoration': 'underline',
		   'color': 'green'
		});
	}
}
//5 parents coger el attr id y buscar id calculo_ratio, elegir el que esta value y reaizar formula
function crearJson(){
	var json='{'+
			 '"observaciones": "'+$("#observacion").val()+'", "tabla": [';
	var y=1;
	$('#table_1 >tbody >tr').each(function() {
		if(y==1){
			json+='{'+
		        '"nucleo": "'+$(this).find(".nucleo").val()+'",'+
		        '"cprimarioa": "'+$(this).find(".cprimarioa").val()+'",'+
		        '"csecundarioa": "'+$(this).find(".csecundarioa").val()+'",'+
		        '"rcalculada": "'+$(this).find("rcalculada").html()+'",'+
		        '"cinyectada": "'+$(this).find(".cinyectada").val()+'",'+
		        '"cmedia": "'+$(this).find(".cmedia").val()+'",'+
		        '"limmin": "'+$(this).find("limmin").html()+'",'+
		        '"rmedia": "'+$(this).find(".rmedia").val()+'",'+
		        '"limmax": "'+$(this).find("limmax").html()+'",'+
		        '"tolerancia": "'+$(this).find(".tolerancia").val()+'"'+
		      '}';
		      y++;
		}else{
			json+=',{'+
		        '"nucleo": "'+$(this).find(".nucleo").val()+'",'+
		        '"cprimarioa": "'+$(this).find(".cprimarioa").val()+'",'+
		        '"csecundarioa": "'+$(this).find(".csecundarioa").val()+'",'+
		        '"rcalculada": "'+$(this).find("rcalculada").html()+'",'+
		        '"cinyectada": "'+$(this).find(".cinyectada").val()+'",'+
		        '"cmedia": "'+$(this).find(".cmedia").val()+'",'+
		        '"limmin": "'+$(this).find("limmin").html()+'",'+
		        '"rmedia": "'+$(this).find(".rmedia").val()+'",'+
		        '"limmax": "'+$(this).find("limmax").html()+'",'+
		        '"tolerancia": "'+$(this).find(".tolerancia").val()+'"'+
		      '}';
		}
	});
	json+=']}';
	console.log(json);
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
		var obj = JSON.parse(text);
		var n_filas=0;
		n_filas=obj.tabla.length;
		n=n_filas;//valor para seguir agregando nucleos
		$('#ntaps').html(n)
		for (var y = 0; y < n_filas; y++) {
			$('#table_1 tbody').append(
				'<tr id="tr_'+(y+1)+'">'+
					'<td class="center input-mini"><input id="nucleo_'+(y+1)+'" class="input-mini textomax nucleo" type="text" name="'+(y+1)+'" value="'+obj.tabla[y].nucleo+'"/></td>'+
					'<td class="center input-mini"><input id="cprimarioa_'+(y+1)+'" class="input-mini decimal decimalmax cprimarioa" type="text" value="'+obj.tabla[y].cprimarioa+'"/></td>'+
					'<td class="center input-mini"><input id="csecundarioa_'+(y+1)+'" class="input-mini decimal decimalmax csecundarioa" type="text" value="'+obj.tabla[y].csecundarioa+'"/></td>'+
					'<td class="center input-mini"><rcalculada id="rcalculada_'+(y+1)+'">'+obj.tabla[y].rcalculada+'</rcalculada></td>'+
					'<td class="center input-mini"><input id="cinyectada_'+(y+1)+'" class="input-mini decimal decimalmax cinyectada" type="text" value="'+obj.tabla[y].cinyectada+'"/></td>'+
					'<td class="center input-mini"><input id="cmedia_'+(y+1)+'" class="input-mini decimal decimalmax cmedia" type="text" value="'+obj.tabla[y].cmedia+'"/></td>'+
					'<td class="center input-mini"><limmin id="limmin_'+(y+1)+'">'+obj.tabla[y].limmin+'</limmin></td>'+
					'<td class="center input-mini"><input id="rmedia_'+(y+1)+'" class="input-mini decimal decimalmax rmedia" type="text" value="'+obj.tabla[y].rmedia+'"/></td>'+
					'<td class="center input-mini"><limmax id="limmax_'+(y+1)+'">'+obj.tabla[y].limmax+'</limmax></td>'+
					'<td class="center input-mini"><input id="tolerancia_'+(y+1)+'" class="input-mini decimal decimalmax tolerancia" type="text" value="'+obj.tabla[y].tolerancia+'"/></td>'+
					'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila"><i class="icon-trash bigger-120"></i></button></td>'+
				'</tr>'
			);
			var limmin = obj.tabla[y].limmin;
			var limmax = obj.tabla[y].limmax;
			var rmedida= obj.tabla[y].rmedia;
			console.log(limmin+" < "+rmedida+" >"+limmax )
			if(rmedida<limmin){
				$('#table_1 tbody #tr_'+(y+1)).find('.rmedia').css({
				   'text-decoration': 'underline',
				   'color': 'red'
				});
			}else if(rmedida>limmax){
				$('#table_1 tbody #tr_'+(y+1)).find('.rmedia').css({
				   'text-decoration': 'underline',
				   'color': 'red'
				});
			}else{
				$('#table_1 tbody #tr_'+(y+1)).find('.rmedia').css({
				   'text-decoration': 'underline',
				   'color': 'green'
				});
			}
		}
		
		$("#observacion").val(obj.observaciones);
	}
	var estado='<?php echo $estado?>';
	if (estado==3){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
var n=0;
function nuevotap(){
	var n_taps=parseInt($('#taps').val());
	for (var i = (n+1); i <=(n+n_taps); i++) {
		$('#table_1 tbody').append(
			'<tr id="tr_'+i+'">'+
				'<td class="center input-mini"><input id="nucleo_'+i+'" class="input-mini textomax nucleo" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="cprimarioa_'+i+'" class="input-mini decimal decimalmax cprimarioa" type="text"/></td>'+
				'<td class="center input-mini"><input id="csecundarioa_'+i+'" class="input-mini decimal decimalmax csecundarioa" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><rcalculada id="rcalculada_'+i+'"></rcalculada></td>'+
				'<td class="center input-mini"><input id="cinyectada_'+i+'" class="input-mini decimal decimalmax cinyectada" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="cmedia_'+i+'" class="input-mini decimal decimalmax cmedia" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><limmin id="limmin_'+i+'"></limmin></td>'+
				'<td class="center input-mini"><input id="rmedia_'+i+'" class="input-mini decimal decimalmax rmedia" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><limmax id="limmax_'+i+'"></limmax></td>'+
				'<td class="center input-mini"><input id="tolerancia_'+i+'" class="input-mini decimal decimalmax tolerancia" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila"><i class="icon-trash bigger-120"></i></button></td>'+
			'</tr>'
			);
	}
	n=i-1;
	$('#ntaps').html(n)
}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Relacion de Transformacion TC's</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<div id="grupo_tablas">
	<div class="row-fluid">
	  	<div class="span6 form-inline">
	  		<label for="taps">Agregar nucleo(s)</label>
	  		<div class="form-inline">
	  			<input id="taps" class="input-mini decimalmax decimal" type="text" placeholder="N nucleos"/>
			  	<button class="btn btn-small btn-info" onclick="nuevotap()">
					<i class="icon-bolt bigger-125"></i>
					Agregar
				</button>
	  		</div>
	  	</div>
	</div>
	<hr>
	<span id="ntaps">0</span> Nucleos
	<table id="table_1" class="table table-bordered">
		<thead>
			<tr>
				<th class="center">Nucleo</th>
				<th class="center">Corriente Primario A</th>
				<th class="center">Corriente secundario A</th>
				<th class="center">Relacion Calculada</th>
				<th class="center">Corriente Inyectada (A)</th>
				<th class="center">Corriente Medida (A)</th>
				<th class="center">Lim. Min</th>
				<th class="center">Relacion Medida</th>
				<th class="center">Lim. Max</th>
				<th class="center">Tolerancia</th>
				<th class="center"></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>