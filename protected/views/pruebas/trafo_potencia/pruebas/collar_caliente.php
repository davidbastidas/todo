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
			"Collar Caliente TP's".
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
$(document).on("keyup", ".cprimarioa, .csecundarioa", function(){
	var idtr=$(this).parent().parent().attr("id");
	var A=$('#'+idtr).find('.cprimarioa').val();
	var B=$('#'+idtr).find('.csecundarioa').val();
	var C=A/B;
	var limmin=C*0.9975;
	var limmax=C*1.0025;
	$('#'+idtr).find('rcalculada').html(C.toFixed(2));
	$('#'+idtr).find('limmin').html(limmin.toFixed(2));
	$('#'+idtr).find('limmax').html(limmax.toFixed(2));
	
});

$(document).on("keyup", ".wattios", function(){
	if($(this).val()<100){
		$(this).css({
		   'text-decoration': 'underline',
		   'color': 'green'
		});
	}else{
		$(this).css({
		   'text-decoration': 'underline',
		   'color': 'red'
		});
	}
});

function crearJson(){
	var json='{'+
			 '"observaciones": "'+$("#observacion").val()+'", "tabla": [';
	var y=1;
	$('#table_1 >tbody >tr').each(function() {
		if(y==1){
			json+='{'+
		        '"fase": "'+$(this).find(".fase").val()+'",'+
		        '"serie": "'+$(this).find(".serie").val()+'",'+
		        '"vprueba": "'+$(this).find(".vprueba").val()+'",'+
		        '"wattios": "'+$(this).find(".wattios").val()+'"'+
		      '}';
		      y++;
		}else{
			json+=',{'+
		        '"fase": "'+$(this).find(".fase").val()+'",'+
		        '"serie": "'+$(this).find(".serie").val()+'",'+
		        '"vprueba": "'+$(this).find(".vprueba").val()+'",'+
		        '"wattios": "'+$(this).find(".wattios").val()+'"'+
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
					'<td class="center input-mini"><input class="input-mini textomax fase" type="text" value="'+obj.tabla[y].fase+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax serie" type="text" value="'+obj.tabla[y].serie+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax vprueba" type="text" value="'+obj.tabla[y].vprueba+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax wattios" type="text" value="'+obj.tabla[y].wattios+'"/></td>'+
					'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila"><i class="icon-trash bigger-120"></i></button></td>'+
				'</tr>'
			);
		}
		$("#observacion").val(obj.observaciones);
		$(".wattios").each(function(){
	  		if($(this).val()<100){
				$(this).css({
				   'text-decoration': 'underline',
				   'color': 'green'
				});
			}else{
				$(this).css({
				   'text-decoration': 'underline',
				   'color': 'red'
				});
			}
	  	});
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
				'<td class="center input-mini"><input class="input-mini textomax fase" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax serie" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax vprueba" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax wattios" type="text"/></td>'+
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
	<h3>Collar Caliente TP's</h3>
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
	  		<label for="taps">Agregar Fila(s)</label>
	  		<div class="form-inline">
	  			<input id="taps" class="input-mini decimalmax decimal" type="text" placeholder=""/>
			  	<button class="btn btn-small btn-info" onclick="nuevotap()">
					<i class="icon-bolt bigger-125"></i>
					Agregar
				</button>
	  		</div>
	  	</div>
	</div>
	<hr>
	<span id="ntaps">0</span> Fila
	<table id="table_1" class="table table-bordered">
		<thead>
			<tr>
				<th class="center">skirt</th>
				<th class="center">V Prueba</th>
				<th class="center">V Salida</th>
				<th class="center">Wattios (mW)</th>
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