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
			"Tangente Delta TP's".
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
	var table=$(this).parent().parent().parent().attr("id");
	var idtr=$(this).parent().parent().attr("id");
	var n=$('#table_1 >tbody >tr').length;

	$("#table_1").find('#n_taps').html((n-1)+" Fila");
	$("#table_2").find('#n_taps2').html((n-1)+" Fila");

	$("#table_1 #"+idtr).remove();
	$("#table_2 #"+idtr).remove();
});
$(document).on("keyup", ".capacitancia", function(){
	var tabla=$(this).parent().parent().parent().parent().attr("id");

	var size=$('#'+tabla+' >tbody >tr').length;
	if(size>1){
		comparaciones(tabla);
	}
});
function comparaciones(tabla){
	var idtr_anterior="";
	var idtr_actual="";
	$('#'+tabla+' >tbody >tr').each(function(index) {
		console.log(index)
		if(index>0){
			idtr_actual=$(this).attr("id");
			var C1=$('#'+tabla+' #'+idtr_actual).find('.capacitancia').val();
			var C2=$('#'+tabla+' #'+idtr_anterior).find('.capacitancia').val();
			var DIF=Math.abs(C1-C2);
			var PORC=(DIF/C1)*100;
			if(PORC<=5){
				$('#'+tabla+' #'+idtr_actual).find('.capacitancia').css({
				   'text-decoration': 'underline',
				   'color': 'green'
				});
				$('#'+tabla+' #'+idtr_anterior).find('.capacitancia').css({
				   'text-decoration': 'underline',
				   'color': 'green'
				});
			}else{
				$('#'+tabla+' #'+idtr_actual).find('.capacitancia').css({
				   'text-decoration': 'underline',
				   'color': 'red'
				});
				$('#'+tabla+' #'+idtr_anterior).find('.capacitancia').css({
				   'text-decoration': 'underline',
				   'color': 'red'
				});
			}
			idtr_anterior=$(this).attr("id");
		}else{
			idtr_anterior=$(this).attr("id");
		}
	});
}
//5 parents coger el attr id y buscar id calculo_ratio, elegir el que esta value y reaizar formula
function crearJson(){
	var json='{'+
			 '"observaciones": "'+$("#observacion").val()+'", "tabla1": [';
	var y=1;
	$('#table_1 >tbody >tr').each(function() {
		if(y==1){
			json+='{'+
		        '"vprueba": "'+$(this).find(".vprueba").val()+'",'+
		        '"vsalida": "'+$(this).find(".vsalida").val()+'",'+
		        '"isalida": "'+$(this).find(".isalida").val()+'",'+
		        '"frecuencia": "'+$(this).find(".frecuencia").val()+'",'+
		        '"capacitancia": "'+$(this).find(".capacitancia").val()+'"'+
		      '}';
		      y++;
		}else{
			json+=',{'+
		        '"vprueba": "'+$(this).find(".vprueba").val()+'",'+
		        '"vsalida": "'+$(this).find(".vsalida").val()+'",'+
		        '"isalida": "'+$(this).find(".isalida").val()+'",'+
		        '"frecuencia": "'+$(this).find(".frecuencia").val()+'",'+
		        '"capacitancia": "'+$(this).find(".capacitancia").val()+'"'+
		      '}';
		}
	});
	json+='], "tabla2": [';

	y=1;
	$('#table_2 >tbody >tr').each(function() {
		if(y==1){
			json+='{'+
		        '"vprueba": "'+$(this).find(".vprueba").val()+'",'+
		        '"vsalida": "'+$(this).find(".vsalida").val()+'",'+
		        '"isalida": "'+$(this).find(".isalida").val()+'",'+
		        '"frecuencia": "'+$(this).find(".frecuencia").val()+'",'+
		        '"capacitancia": "'+$(this).find(".capacitancia").val()+'"'+
		      '}';
		      y++;
		}else{
			json+=',{'+
		        '"vprueba": "'+$(this).find(".vprueba").val()+'",'+
		        '"vsalida": "'+$(this).find(".vsalida").val()+'",'+
		        '"isalida": "'+$(this).find(".isalida").val()+'",'+
		        '"frecuencia": "'+$(this).find(".frecuencia").val()+'",'+
		        '"capacitancia": "'+$(this).find(".capacitancia").val()+'"'+
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
		n_filas=obj.tabla1.length;
		n=n_filas;//valor para seguir agregando nucleos
		$('#ntaps').html(n)
		$('#ntaps2').html(n)
		for (var y = 0; y < n_filas; y++) {
			$('#table_1 tbody').append(
				'<tr id="tr_'+(y+1)+'">'+
					'<td class="center input-mini"><input class="input-mini textomax vprueba" type="text" value="'+obj.tabla1[y].vprueba+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax vsalida" type="text" value="'+obj.tabla1[y].vsalida+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax isalida" type="text" value="'+obj.tabla1[y].isalida+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax frecuencia" type="text" value="'+obj.tabla1[y].frecuencia+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax capacitancia" type="text" value="'+obj.tabla1[y].capacitancia+'"/></td>'+
				'</tr>'
			);
			$('#table_2 tbody').append(
				'<tr id="tr_'+(y+1)+'">'+
					'<td class="center input-mini"><input class="input-mini textomax vprueba" type="text" value="'+obj.tabla2[y].vprueba+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax vsalida" type="text" value="'+obj.tabla2[y].vsalida+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax isalida" type="text" value="'+obj.tabla2[y].isalida+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax frecuencia" type="text" value="'+obj.tabla2[y].frecuencia+'"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax capacitancia" type="text" value="'+obj.tabla2[y].capacitancia+'"/></td>'+
				'</tr>'
			);
		}
		comparaciones('table_1');
		comparaciones('table_2');
		$("#observacion").val(obj.observaciones);
	}else{
		for (var i = 1; i <=2; i++) {
			$('#table_1 tbody').append(
				'<tr id="tr_'+i+'">'+
					'<td class="center input-mini"><input class="input-mini textomax vprueba" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax vsalida" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax isalida" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax frecuencia" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax capacitancia" type="text"/></td>'+
				'</tr>'
			);
			$('#table_2 tbody').append(
				'<tr id="tr_'+i+'">'+
					'<td class="center input-mini"><input class="input-mini textomax vprueba" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax vsalida" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax isalida" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax frecuencia" type="text"/></td>'+
					'<td class="center input-mini"><input class="input-mini decimal decimalmax capacitancia" type="text"/></td>'+
				'</tr>'
			);
		}
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
				'<td class="center input-mini"><input class="input-mini textomax vprueba" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax vsalida" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax isalida" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax frecuencia" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax capacitancia" type="text"/></td>'+
				'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila"><i class="icon-trash bigger-120"></i></button></td>'+
			'</tr>'
		);
		$('#table_2 tbody').append(
			'<tr id="tr_'+i+'">'+
				'<td class="center input-mini"><input class="input-mini textomax vprueba" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax vsalida" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax isalida" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax frecuencia" type="text"/></td>'+
				'<td class="center input-mini"><input class="input-mini decimal decimalmax capacitancia" type="text"/></td>'+
			'</tr>'
		);
	}
	n=i-1;
	$('#ntaps').html(n)
	$('#ntaps2').html(n)
}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Tangente Delta TP's</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<div id="grupo_tablas">
	<!--<div class="row-fluid">
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
	</div>-->
	<hr>
	<span id="ntaps">0</span> Fila
	<table id="table_1" class="table table-bordered">
		<thead>
			<tr>
				<th class="center" colspan="6">H Vs G</th>
			</tr>
			<tr>
				<th class="center">V prueba</th>
				<th class="center">V salida</th>
				<th class="center">I salida</th>
				<th class="center">Frecuencia</th>
				<th class="center">Capacitancia (pf)</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>

	<span id="ntaps2">0</span> Fila
	<table id="table_2" class="table table-bordered">
		<thead>
			<tr>
				<th class="center" colspan="5">L Vs G</th>
			</tr>
			<tr>
				<th class="center">V prueba</th>
				<th class="center">V salida</th>
				<th class="center">I salida</th>
				<th class="center">Frecuencia</th>
				<th class="center">Capacitancia (pf)</th>
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

<?php 
if (false != true) {
    echo "false";
}else{
	echo "true";
}
?>