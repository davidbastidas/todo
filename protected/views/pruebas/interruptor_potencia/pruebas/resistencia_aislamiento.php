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
			'Resistencia de Aislamiento Interruptor Potencia'.
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
var tipo_equipo=parseInt("<?php if(isset($datos_equipo['tipo'])){echo $datos_equipo['tipo'];}else{echo '0';}?>");
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
			      +'"r_lectura12": "'+$("#r_lectura12").val()+'",'
			      +'"r_gc12": "'+$("#r_gc12").html()+'",'
			      +'"r_lectura1g": "'+$("#r_lectura1g").val()+'",'
			      +'"r_gc1g": "'+$("#r_gc1g").html()+'",'
			      +'"r_lectura2g": "'+$("#r_lectura2g").val()+'",'
			      +'"r_gc2g": "'+$("#r_gc2g").html()+'",'
			      +'"r_lectura1gb": "'+$("#r_lectura1gb").val()+'",'
			      +'"r_gc1gb": "'+$("#r_gc1gb").html()+'",'

			      +'"s_lectura34": "'+$("#s_lectura34").val()+'",'
			      +'"s_gc34": "'+$("#s_gc34").html()+'",'
			      +'"s_lectura3g": "'+$("#s_lectura3g").val()+'",'
			      +'"s_gc3g": "'+$("#s_gc3g").html()+'",'
			      +'"s_lectura4g": "'+$("#s_lectura4g").val()+'",'
			      +'"s_gc4g": "'+$("#s_gc4g").html()+'",'
			      +'"s_lectura3gb": "'+$("#s_lectura3gb").val()+'",'
			      +'"s_gc3gb": "'+$("#s_gc3gb").html()+'",'

			      +'"t_lectura56": "'+$("#t_lectura56").val()+'",'
			      +'"t_gc56": "'+$("#t_gc56").html()+'",'
			      +'"t_lectura5g": "'+$("#t_lectura5g").val()+'",'
			      +'"t_gc5g": "'+$("#t_gc5g").html()+'",'
			      +'"t_lectura6g": "'+$("#t_lectura6g").val()+'",'
			      +'"t_gc6g": "'+$("#t_gc6g").html()+'",'
			      +'"t_lectura5gb": "'+$("#t_lectura5gb").val()+'",'
			      +'"t_gc5gb": "'+$("#t_gc5gb").html()+'"'
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

		$("#r_lectura12").val(data.tabla[0].r_lectura12)
	    $("#r_gc12").html(data.tabla[0].r_gc12)
	    $("#r_lectura1g").val(data.tabla[0].r_lectura1g)
	    $("#r_gc1g").html(data.tabla[0].r_gc1g)
	    $("#r_lectura2g").val(data.tabla[0].r_lectura2g)
	    $("#r_gc2g").html(data.tabla[0].r_gc2g)
	    $("#r_lectura1gb").val(data.tabla[0].r_lectura1gb)
	    $("#r_gc1gb").html(data.tabla[0].r_gc1gb)
	      
	    $("#s_lectura34").val(data.tabla[0].s_lectura34)
	    $("#s_gc34").html(data.tabla[0].s_gc34)
	    $("#s_lectura3g").val(data.tabla[0].s_lectura3g)
	    $("#s_gc3g").html(data.tabla[0].s_gc3g)
	    $("#s_lectura4g").val(data.tabla[0].s_lectura4g)
	    $("#s_gc4g").html(data.tabla[0].s_gc4g)
	    $("#s_lectura3gb").val(data.tabla[0].s_lectura3gb)
	    $("#s_gc3gb").html(data.tabla[0].s_gc3gb)

	    $("#t_lectura56").val(data.tabla[0].t_lectura56)
	    $("#t_gc56").html(data.tabla[0].t_gc56)
	    $("#t_lectura5g").val(data.tabla[0].t_lectura5g)
	    $("#t_gc5g").html(data.tabla[0].t_gc5g)
	    $("#t_lectura6g").val(data.tabla[0].t_lectura6g)
	    $("#t_gc6g").html(data.tabla[0].t_gc6g)
	    $("#t_lectura5gb").val(data.tabla[0].t_lectura5gb)
	    $("#t_gc5gb").html(data.tabla[0].t_gc5gb)

		$("#observacion").val(data.observaciones);

		$(".gc").each(function(){
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
var calculo=0;
$(document).on("keyup", ".lectura", function(){
	var idtr=$(this).parent().parent().find('.gc').attr("id");
	//conseguir K
	var size=table_conversion.length;
	for (i = 0; i < size; i++) {
		if(tipo_equipo>=1 && tipo_equipo<=3){
			console.log("solido")
			if(temp_ambiente==table_conversion[i].c){
				calculo=$(this).val()*table_conversion[i].solid;
				$("#"+idtr).html(Number(calculo).toFixed(2));
				if(calculo>=5){
					$("#"+idtr).css({
					   'text-decoration': 'underline',
					   'color': 'green'
					});
				}else{
					$("#"+idtr).css({
					   'text-decoration': 'underline',
					   'color': 'red'
					});
				}
				break;
			}
		} else if(tipo_equipo>=4 && tipo_equipo<=5){
			console.log("aceite")
			if(temp_aceite==table_conversion[i].c){
				calculo=$(this).val()*table_conversion[i].oil;
				$("#"+idtr).html(Number(calculo).toFixed(2));
				if(calculo>=5){
					$("#"+idtr).css({
					   'text-decoration': 'underline',
					   'color': 'green'
					});
				}else{
					$("#"+idtr).css({
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
		<h3>Resistencia de Aislamiento</h3>
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
	  	<table id="table_1" class="table table-bordered">
			<thead>
				<tr>
					<th class="center">FASE</th>
					<th class="center">Linea</th>
					<th class="center">Tierra</th>
					<th class="center input-mini">Lectura G&#937;</th>
					<th class="center input-mini">Lectura G&#937;&#64;20&#176;C</th>
					<th class="center">Estado IT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="center input-mini" rowspan="4" style="vertical-align: middle;">R</td>
					<td class="center input-mini">1</td>
					<td class="center input-mini">2</td>
					<td><input id="r_lectura12" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="r_gc12" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">1</td>
					<td class="center input-mini">G</td>
					<td><input id="r_lectura1g" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="r_gc1g" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">2</td>
					<td class="center input-mini">G</td>
					<td><input id="r_lectura2g" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="r_gc2g" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">1</td>
					<td class="center input-mini">G</td>
					<td><input id="r_lectura1gb" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="r_gc1gb" class="gc"></span></td>
					<td class="center">Closed</td>
				</tr>
				
				<tr>
					<td class="center input-mini" rowspan="4" style="vertical-align: middle;">S</td>
					<td class="center input-mini">3</td>
					<td class="center input-mini">4</td>
					<td><input id="s_lectura34" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="s_gc34" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">3</td>
					<td class="center input-mini">G</td>
					<td><input id="s_lectura3g" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="s_gc3g" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">4</td>
					<td class="center input-mini">G</td>
					<td><input id="s_lectura4g" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="s_gc4g" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">3</td>
					<td class="center input-mini">G</td>
					<td><input id="s_lectura3gb" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="s_gc3gb" class="gc"></span></td>
					<td class="center">Closed</td>
				</tr>

				<tr>
					<td class="center input-mini" rowspan="4" style="vertical-align: middle;">T</td>
					<td class="center input-mini">5</td>
					<td class="center input-mini">6</td>
					<td><input id="t_lectura56" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="t_gc56" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">5</td>
					<td class="center input-mini">G</td>
					<td><input id="t_lectura5g" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="t_gc5g" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">6</td>
					<td class="center input-mini">G</td>
					<td><input id="t_lectura6g" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="t_gc6g" class="gc"></span></td>
					<td class="center">Open</td>
				</tr>
				<tr>
					<td class="center input-mini">5</td>
					<td class="center input-mini">G</td>
					<td><input id="t_lectura5gb" class="input-mini decimal decimalmax lectura" type="text" placeholder=""></td>
					<td class="center input-mini"><span id="t_gc5gb" class="gc"></span></td>
					<td class="center">Closed</td>
				</tr>

			</tbody>
		</table>
	  </div>
	  <div class="span6">
	  	<div>
	  		Formula:<br>
	  		Rc = Ra * K (Lectura G&#937;&#64;20&#176;C = Lectura G&#937; * K)<br>
	  		Where :<br>
	  		Rc is resistance corrected to 20&#176; C<br>
	  		Ra is measured resistance at test temperature<br>
	  		K is applicable multiplier
	  	</div>
	  	<div id="tabla_valores"></div>
	  	
	  </div>
	</div>
	<label for="observacion">Observaciones(Limite 400 caracteres)</label>
		<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
</div>
<script>
cargarDatos();
aplicarReglas();
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

if(tipo_equipo>=1 && tipo_equipo<=3){
	$("#tabla_valores").html(
			'<table class="table table-bordered">'+
	  		'<thead>'+
	  			'<tr>'+
	  				'<th class="center" colspan="3">Table 100.14.1<br>Test Temperatures to 20&#176; C</th>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<th class="center" colspan="2">Temperature</th>'+
	  				'<th class="center">Multiplier</th>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<th class="center">&#176;C</th>'+
	  				'<th class="center">&#176;F</th>'+
	  				'<th class="center">Apparatus Containing Solid Insulation</th>'+
	  			'</tr>'+
	  		'</thead>'+
	  		'<tbody>'+
	  			'<tr>'+
	  				'<td class="center">5</td>'+
	  				'<td class="center">41</td>'+
	  				'<td class="center">0.50</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">10</td>'+
	  				'<td class="center">50</td>'+
	  				'<td class="center">0.63</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">15</td>'+
	  				'<td class="center">59</td>'+
	  				'<td class="center">0.81</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">20</td>'+
	  				'<td class="center">68</td>'+
	  				'<td class="center">1.00</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">25</td>'+
	  				'<td class="center">77</td>'+
	  				'<td class="center">1.25</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">30</td>'+
	  				'<td class="center">86</td>'+
	  				'<td class="center">1.58</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">35</td>'+
	  				'<td class="center">95</td>'+
	  				'<td class="center">2.00</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">40</td>'+
	  				'<td class="center">104</td>'+
	  				'<td class="center">2.50</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">45</td>'+
	  				'<td class="center">113</td>'+
	  				'<td class="center">3.15</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">50</td>'+
	  				'<td class="center">122</td>'+
	  				'<td class="center">3.98</td>'+
	  			'</tr>'+
	  		'</tbody>'+
	  	'</table>'
		);
} else if(tipo_equipo>=4 && tipo_equipo<=5){
	$("#tabla_valores").html(
			'<table class="table table-bordered">'+
	  		'<thead>'+
	  			'<tr>'+
	  				'<th class="center" colspan="3">Table 100.14.1<br>Test Temperatures to 20&#176; C</th>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<th class="center" colspan="2">Temperature</th>'+
	  				'<th class="center">Multiplier</th>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<th class="center">&#176;C</th>'+
	  				'<th class="center">&#176;F</th>'+
	  				'<th class="center">Apparatus Containing Immersed Oil Insulation</th>'+
	  			'</tr>'+
	  		'</thead>'+
	  		'<tbody>'+
	  			'<tr>'+
	  				'<td class="center">5</td>'+
	  				'<td class="center">41</td>'+
	  				'<td class="center">0.36</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">10</td>'+
	  				'<td class="center">50</td>'+
	  				'<td class="center">0.50</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">15</td>'+
	  				'<td class="center">59</td>'+
	  				'<td class="center">0.75</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">20</td>'+
	  				'<td class="center">68</td>'+
	  				'<td class="center">1.00</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">25</td>'+
	  				'<td class="center">77</td>'+
	  				'<td class="center">1.40</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">30</td>'+
	  				'<td class="center">86</td>'+
	  				'<td class="center">1.98</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">35</td>'+
	  				'<td class="center">95</td>'+
	  				'<td class="center">2.80</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">40</td>'+
	  				'<td class="center">104</td>'+
	  				'<td class="center">3.95</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">45</td>'+
	  				'<td class="center">113</td>'+
	  				'<td class="center">5.60</td>'+
	  			'</tr>'+
	  			'<tr>'+
	  				'<td class="center">50</td>'+
	  				'<td class="center">122</td>'+
	  				'<td class="center">7.85</td>'+
	  			'</tr>'+
	  		'</tbody>'+
	  	'</table>'
		);
}
if(tipo_equipo==0){
	$('#contenedor').html('');
	$('.info').html('Faltan guardar el equipo como Tipo Solido o Aceite. Consulte con el Administrador.');
}
</script>