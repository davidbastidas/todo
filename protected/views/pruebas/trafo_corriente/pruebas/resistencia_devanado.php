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
			"Resistencia de Devanado TC's".
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
$(document).on("keyup", ".rreferencia", function(){
	var idtr=$(this).parent().parent().attr("id");
	var rmedida=$('#'+idtr).find('.rmedida').val();
	var rreferencia=$('#'+idtr).find('.rreferencia').val();
	if(rmedida<=rreferencia){
		$('#'+idtr).find('.rmedida').css({
		   'text-decoration': 'underline',
		   'color': 'green'
		});
	}else{
		$('#'+idtr).find('.rmedida').css({
		   'text-decoration': 'underline',
		   'color': 'red'
		});
	}
});
//5 parents coger el attr id y buscar id calculo_ratio, elegir el que esta value y reaizar formula
function crearJson(){
	var json='{'+
			 '"observaciones": "'+$("#observacion").val()+'", "tabla": [';
	var y=1;
	$('#table_1 >tbody >tr').each(function() {
		if(y==1){
			json+='{'+
		        '"nucleo": "'+$(this).find(".nucleo").val()+'",'+
		        '"iprueba": "'+$(this).find(".iprueba").val()+'",'+
		        '"rmedida": "'+$(this).find(".rmedida").val()+'",'+
		        '"rreferencia": "'+$(this).find(".rreferencia").val()+'",'+
		        '"desviacion": "'+$(this).find(".desviacion").val()+'"'+
		      '}';
		      y++;
		}else{
			json+=',{'+
		        '"nucleo": "'+$(this).find(".nucleo").val()+'",'+
		        '"iprueba": "'+$(this).find(".iprueba").val()+'",'+
		        '"rmedida": "'+$(this).find(".rmedida").val()+'",'+
		        '"rreferencia": "'+$(this).find(".rreferencia").val()+'",'+
		        '"desviacion": "'+$(this).find(".desviacion").val()+'"'+
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
					'<td class="center input-mini"><input id="iprueba_'+(y+1)+'" class="input-mini decimal decimalmax iprueba" type="text" value="'+obj.tabla[y].iprueba+'"/></td>'+
					'<td class="center input-mini"><input id="rmedida_'+(y+1)+'" class="input-mini decimal decimalmax rmedida" type="text" value="'+obj.tabla[y].rmedida+'"/></td>'+
					'<td class="center input-mini"><input id="rreferencia_'+(y+1)+'" class="input-mini decimal decimalmax rreferencia" type="text" value="'+obj.tabla[y].rreferencia+'"/></td>'+
					'<td class="center input-mini"><input id="desviacion_'+(y+1)+'" class="input-mini decimal decimalmax desviacion" type="text" value="'+obj.tabla[y].desviacion+'"/></td>'+
					'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila"><i class="icon-trash bigger-120"></i></button></td>'+
				'</tr>'
			);
			
		}
		$('.rreferencia').each(function() {
			var idtr=$(this).parent().parent().attr("id");
			var rmedida=$('#'+idtr).find('.rmedida').val();
			var rreferencia=$('#'+idtr).find('.rreferencia').val();
			if(rmedida<=rreferencia){
				$('#'+idtr).find('.rmedida').css({
				   'text-decoration': 'underline',
				   'color': 'green'
				});
			}else{
				$('#'+idtr).find('.rmedida').css({
				   'text-decoration': 'underline',
				   'color': 'red'
				});
			}
		});
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
				'<td class="center input-mini"><input id="iprueba_'+i+'" class="input-mini decimal decimalmax iprueba" type="text"/></td>'+
				'<td class="center input-mini"><input id="rmedida_'+i+'" class="input-mini decimal decimalmax rmedida" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="rreferencia_'+i+'" class="input-mini decimal decimalmax rreferencia" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="desviacion_'+i+'" class="input-mini decimal decimalmax desviacion" type="text" name="'+i+'"/></td>'+
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
	<h3>Resistencia de Devanado TC's</h3>
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
	  		<label for="taps">Agregar Bobinado(s)</label>
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
	<span id="ntaps">0</span> Bobinados
	<table id="table_1" class="table table-bordered">
		<thead>
			<tr>
				<th class="center">Nucleo</th>
				<th class="center">I Prueba</th>
				<th class="center">R Medida [m&#937;]</th>
				<th class="center">R referencia [m&#937;]</th>
				<th class="center">Desviacion</th>
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