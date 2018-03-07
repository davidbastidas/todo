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
			"Resistencia de Aislamiento TC's".
		'</li>'.
	'</ul>'.
'</div>';
$datos_equipo = json_decode( $datosjson, true );
$temp = json_decode( $temperaturas, true );
?>
<?php $this->pageTitle = Yii::app()->name; ?>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script>
var temp_ambiente="<?php echo $temp['temperaturas'][0]['temp_ambiente']?>";
var temp_aceite="<?php echo $temp['temperaturas'][0]['temp_aceite']?>";
var tipo_equipo="<?php if(isset($datos_equipo['tipo_mecanismo'])){echo $datos_equipo['tipo_mecanismo'];}else{echo '0';}?>";
//tabla 100.14
	var row = {c:5, f:41, oil:0.36, solid:0.50};
	var table_conversion = [];
	table_conversion.push(row);
	row = {c:10, f:50, oil:0.50, solid:0.63};
	table_conversion.push(row);
	row = {c:15, f:59, oil:0.75, solid:0.81};
	table_conversion.push(row);
	row = {c:20, f:68, oil:1.00, solid:1.00};
	table_conversion.push(row);
	row = {c:25, f:77, oil:1.40, solid:1.25};
	table_conversion.push(row);
	row = {c:30, f:86, oil:1.98, solid:1.58};
	table_conversion.push(row);
	row = {c:35, f:95, oil:2.80, solid:2.00};
	table_conversion.push(row);
	row = {c:40, f:104, oil:3.95, solid:2.50};
	table_conversion.push(row);
	row = {c:45, f:113, oil:5.60, solid:3.15};
	table_conversion.push(row);
	row = {c:50, f:122, oil:7.85, solid:3.98};
	table_conversion.push(row);
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
			  +'"tabla": ['
			    +'{'
			      +'"tension_aplicada": "'+$("#tension_aplicada").val()+'",'
			      +'"tiempo_inyeccion": "'+$("#tiempo_inyeccion").val()+'",'
			      +'"fcorreccionk": "'+$("#fcorreccionk").html()+'",'
			      +'"lecturahx": "'+$("#lecturahx").val()+'",'
			      +'"lecturahg": "'+$("#lecturahg").val()+'",'
			      +'"lecturaxg": "'+$("#lecturaxg").val()+'",'
			      +'"calculohx": "'+$("calculohx").html()+'",'
			      +'"calculohg": "'+$("calculohg").html()+'",'
			      +'"calculoxg": "'+$("calculoxg").html()+'"'
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
		$("#tension_aplicada").val(data.tabla[0].tension_aplicada)
	    $("#tiempo_inyeccion").val(data.tabla[0].tiempo_inyeccion)
	    $("#fcorreccionk").html(data.tabla[0].fcorreccionk)
	    $("#lecturahx").val(data.tabla[0].lecturahx)
	    $("#lecturahg").val(data.tabla[0].lecturahg)
	    $("#lecturaxg").val(data.tabla[0].lecturaxg)
	    $("calculohx").html(data.tabla[0].calculohx)
	    $("calculohg").html(data.tabla[0].calculohg)
	    $("calculoxg").html(data.tabla[0].calculoxg)

		$("#observacion").val(data.observaciones);

		$(".calculado").each(function(){
	  		gcval = parseInt($(this).html());
	  		if(gcval>=5){
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
$( document ).ready(function() {
    var size=table_conversion.length;
	for (i = 0; i < size; i++) {
		if(tipo_equipo=="Solido"){
			if(temp_ambiente==table_conversion[i].c){
				$("#fcorreccionk").html((table_conversion[i].solid).toFixed(2));
				break;
			}
		}else if(tipo_equipo=="Aceite"){
			
			if(temp_aceite==table_conversion[i].c){
				$("#fcorreccionk").html((table_conversion[i].oil).toFixed(2));
				break;
			}
		}
	}
});

var calculo=0;
$(document).on("keyup", ".lectura", function(){
	var idtr=$(this).attr("id");
	//conseguir K
	var size=table_conversion.length;
	for (i = 0; i < size; i++) {
		if(tipo_equipo=="Solido"){
			//solido
			if(temp_ambiente==table_conversion[i].c){
				calculo=$(this).val()*table_conversion[i].solid;
				if(idtr=="lecturahx"){
					idtr="calculohx"
				}else if(idtr=="lecturahg"){
					idtr="calculohg"
				}else if(idtr=="lecturaxg"){
					idtr="calculoxg"
				}
				$(idtr).html(Number(calculo).toFixed(2));
				if(calculo>=5){
					$(idtr).css({
					   'text-decoration': 'underline',
					   'color': 'green'
					});
				}else{
					$(idtr).css({
					   'text-decoration': 'underline',
					   'color': 'red'
					});
				}
				break;
			}
		} else if(tipo_equipo=="Aceite"){
			//aceite
			if(temp_aceite==table_conversion[i].c){
				calculo=$(this).val()*table_conversion[i].oil;
				if(idtr=="lecturahx"){
					idtr="calculohx"
				}else if(idtr=="lecturahg"){
					idtr="calculohg"
				}else if(idtr=="lecturaxg"){
					idtr="calculoxg"
				}
				$(idtr).html(Number(calculo).toFixed(2));
				if(calculo>=5){
					$(idtr).css({
					   'text-decoration': 'underline',
					   'color': 'green'
					});
				}else{
					$(idtr).css({
					   'text-decoration': 'underline',
					   'color': 'red'
					});
				}
				break;
			}
		}
	}
});
</script>

<div class="info"></div>
<div id="contenedor">
	<div class="row-fluid">
	  <div class="span6">
		<h3>Resistencia de Aislamiento TC's</h3>
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
	  <div class="span7">
	  	<table id="table_1" class="table table-bordered">
				<tr>
					<th class="center" rowspan="4" colspan="4"></th>
				</tr>
				<tr>
					<td class="center">Tensión Aplicada:</td>
					<td class="center"><input id="tension_aplicada" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
				</tr>
				<tr>
					<td class="center">Tiempo de inyección:</td>
					<td class="center"><input id="tiempo_inyeccion" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
				</tr>
				<tr>
					<td class="center">Factor de Corrección K</td>
					<td class="center"><div id="fcorreccionk"></div></td>
				</tr>
				<tr>
					<th class="center" colspan="3">Resistencia de aislamiento [G&#937;]</th>
					<th class="center" colspan="3">Resistencia de aislamiento [G&#937;] &#64;20&#176;C</th>
				</tr>
				<tr>
					<th class="center">H - X</th>
					<th class="center">H - G</th>
					<th class="center">X - G</th>
					<th class="center">H - X</th>
					<th class="center">H - G</th>
					<th class="center">X - G</th>
				</tr>
			<tbody>
				<tr>
					<th class="center"><input id="lecturahx" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></th>
					<th class="center"><input id="lecturahg" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></th>
					<th class="center"><input id="lecturaxg" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></th>
					<th class="center"><calculohx class="calculado"></calculohx></th>
					<th class="center"><calculohg class="calculado"></calculohg></th>
					<th class="center"><calculoxg class="calculado"></calculoxg></th>
				</tr>
			</tbody>
		</table>
	  </div>
	</div>
	<label for="observacion">Observaciones(Limite 400 caracteres)</label>
	<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
</div>
<script>
cargarDatos();
aplicarReglas();
if(tipo_equipo==0){
	$('#contenedor').html('');
	$('.info').html('Faltan guardar el equipo como Tipo Solido o Aceite. Consulte con el Administrador.');
}
</script>