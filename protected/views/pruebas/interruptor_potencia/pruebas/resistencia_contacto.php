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
			'Resistencia de Contacto Interruptor Potencia'.
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
$(document).on("keyup", ".lectura", function(){
	validarColorValor(this);
});
function crearJson(){
	var observacion=$("#observacion").val();
	var json=''
		  	+'{'
			  +'"tabla": ['
			    +'{'
			      +'"amperaje": "100",'
			      +'"lectura": "'+$("#lect-1").val()+'"'
			    +'},'
			    +'{'
			      +'"amperaje": "'+$("#con12").val()+'",'
			      +'"lectura": "'+$("#lect-2").val()+'"'
			    +'},'
			    +'{'
			      +'"amperaje": "100",'
			      +'"lectura": "'+$("#lect-3").val()+'"'
			    +'},'
			    +'{'
			      +'"amperaje": "'+$("#con34").val()+'",'
			      +'"lectura": "'+$("#lect-4").val()+'"'
			    +'},'
			    +'{'
			      +'"amperaje": "100",'
			      +'"lectura": "'+$("#lect-5").val()+'"'
			    +'},'
			    +'{'
			      +'"amperaje": "'+$("#con56").val()+'",'
			      +'"lectura": "'+$("#lect-6").val()+'"'
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
        	//console.log(data.update);
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
		$("#lect-1").val(data.tabla[0].lectura);

		$("#con12").val(data.tabla[1].amperaje);
		$("#lect-2").val(data.tabla[1].lectura);

		$("#lect-3").val(data.tabla[2].lectura);

		$("#con34").val(data.tabla[3].amperaje);
		$("#lect-4").val(data.tabla[3].lectura);

		$("#lect-5").val(data.tabla[4].lectura);

		$("#con56").val(data.tabla[5].amperaje);
		$("#lect-6").val(data.tabla[5].lectura);

		$('table .lectura').each(function() {
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
		//console.log(value)
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
	<h3>Resistencia de Contacto</h3>
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
			<th class="center input-mini">Conexiones [Interruptor]</th>
			<th class="center input-mini">Nivel de Amperaje</th>
			<th class="center input-mini">Lectura &#181;&#8486;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="2">[1]-[2]</td>
			<td class="center input-mini">100</td>
			<td class="center input-mini">
				<input id="lect-1" class="input-mini decimal decimalmax lectura" type="text" placeholder=""/>
			</td>
		</tr>
		<tr>
			<td class="center input-mini">
				<select id="con12" class="input-mini">
					<option value="200">200</option>
					<option value="250">250</option>
					<option value="300">300</option>
				</select>
			</td>
			<td class="center input-mini">
				<input id="lect-2" class="input-mini decimal decimalmax lectura" type="text" placeholder=""/>
			</td>
		</tr>

		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="2">[3]-[4]</td>
			<td class="center input-mini">100</td>
			<td class="center input-mini">
				<input id="lect-3" class="input-mini decimal decimalmax lectura" type="text" placeholder=""/>
			</td>
		</tr>
		<tr>
			<td class="center input-mini">
				<select id="con34" class="input-mini">
					<option value="200">200</option>
					<option value="250">250</option>
					<option value="300">300</option>
				</select>
			</td>
			<td class="center input-mini">
				<input id="lect-4" class="input-mini decimal decimalmax lectura" type="text" placeholder=""/>
			</td>
		</tr>
		<tr>
			<td class="center input-mini" style="vertical-align: middle;" rowspan="2">[5]-[6]</td>
			<td class="center input-mini">100</td>
			<td class="center input-mini">
				<input id="lect-5" class="input-mini decimal decimalmax lectura" type="text" placeholder=""/>
			</td>
		</tr>
		<tr>
			<td class="center input-mini">
				<select id="con56" class="input-mini">
					<option value="200">200</option>
					<option value="250">250</option>
					<option value="300">300</option>
				</select>
			</td>
			<td class="center input-mini">
				<input id="lect-6" class="input-mini decimal decimalmax lectura" type="text" placeholder=""/>
			</td>
		</tr>
		
	</tbody>
</table>
<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>