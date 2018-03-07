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
			'Corriente Excitacion 2 Devanados'.
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
	var modo_combinacion="dyn";
	$(function() {
    	$('.decimal').keypress(function(event) {

		    if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46){
		        return true;

		    }else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
		        event.preventDefault();
		    }
		});
		$('textarea[class*=limited]').each(function() {
			var limit = parseInt($(this).attr('data-maxlength')) || 100;
			$(this).inputlimiter({
				"limit": limit,
				remText: '%n caracteres disponibles...',
				limitText: 'maximo : %n.'
			});
		});
		$('#combinacion').on('change', function() {
			modo_combinacion=this.value;
			if(modo_combinacion=="dyn" || modo_combinacion=="ddn"){
				$("#a").html("H1-H2(A)");
				$("#b").html("H2-H3(B)");
				$("#c").html("H3-H1(C)");
			}else if(modo_combinacion=="ydn" || modo_combinacion=="yyn"){
				$("#a").html("H0-H1(A)");
				$("#b").html("H0-H2(B)");
				$("#c").html("H0-H3(C)");
			}
		});
		$(document).on("keyup", "#table_1 input", function(){
			var key=$(this).attr("name");
			var a=parseFloat($("#a_"+key).val());
			var c=parseFloat($("#c_"+key).val());
			var aux1=c-a;
			var aux2=(c+a)/2;
			var calculo = Math.round(Math.abs((aux1/aux2)*100));
			if(a>50 || c>50){
				if(calculo<=5){
					$("#resultado_"+key).html('<span class="label label-success arrowed">'+calculo+"% OK"+'</span>');
				}else{
					$("#resultado_"+key).html('<span class="label label-important arrowed-in">'+calculo+"% MAL"+'</span>');
				}
			} else if(a<50 || c<50){
				if(calculo<=10){
					$("#resultado_"+key).html('<span class="label label-success arrowed">'+calculo+"% OK"+'</span>');
				}else{
					$("#resultado_"+key).html('<span class="label label-important arrowed-in">'+calculo+"% MAL"+'</span>');
				}
			}
		});
	});
	function crearJson(){
		var json=''
			  	+'{'
				  +'"tabla1": [';
		for (var i = 1; i <= t_taps; i++) {
			if(i==1){
				json+= '{'
				      +'"tap": "'+$("#table_1 tr").find("#tap_"+i).val()+'",'
				      +'"kv": "'+$("#table_1 tr").find("#kv_"+i).val()+'",'
				      +'"a": "'+$("#table_1 tr").find("#a_"+i).val()+'",'
				      +'"b": "'+$("#table_1 tr").find("#b_"+i).val()+'",'
				      +'"c": "'+$("#table_1 tr").find("#c_"+i).val()+'",'
				      +'"resultado": "'+$("#table_1 tr").find("#resultado_"+i+" span").html()+'"'
				    +'}';
			}else{
				json+= ',{'
				      +'"tap": "'+$("#table_1 tr").find("#tap_"+i).val()+'",'
				      +'"kv": "'+$("#table_1 tr").find("#kv_"+i).val()+'",'
				      +'"a": "'+$("#table_1 tr").find("#a_"+i).val()+'",'
				      +'"b": "'+$("#table_1 tr").find("#b_"+i).val()+'",'
				      +'"c": "'+$("#table_1 tr").find("#c_"+i).val()+'",'
				      +'"resultado": "'+$("#table_1 tr").find("#resultado_"+i+" span").html()+'"'
				    +'}';
			}
			
		}
		json+='],'
				  +'"observaciones": "'+$("#observacion").val()+'",'
				  +'"combinacion": "'+modo_combinacion+'"'
				+'}';
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
			var count = data.tabla1.length;
			t_taps=count;
			$("#n_taps").html(t_taps+" taps");
			var result="";
			for (var i = 0; i <count; i++) {
				$("#cuerpo_tabla").append(
					'<tr id="tr_'+(i+1)+'">'
						+'<td class="center input-mini"><input id="tap_'+(i+1)+'" class="input-mini textomax" type="text" value="'+data.tabla1[i].tap+'" name="'+(i+1)+'"/></td>'
						+'<td class="center input-mini"><input id="kv_'+(i+1)+'" class="input-mini decimal decimalmax" type="text" value="'+data.tabla1[i].kv+'" name="'+(i+1)+'"/></td>'
						+'<td class="center input-mini"><input id="a_'+(i+1)+'" class="input-mini decimal decimalmax" type="text" value="'+data.tabla1[i].a+'" name="'+(i+1)+'"/></td>'
						+'<td class="center input-mini"><input id="b_'+(i+1)+'" class="input-mini decimal decimalmax" type="text" value="'+data.tabla1[i].b+'" name="'+(i+1)+'"/></td>'
						+'<td class="center input-mini"><input id="c_'+(i+1)+'" class="input-mini decimal decimalmax" type="text" value="'+data.tabla1[i].c+'" name="'+(i+1)+'"/></td>'
						+'<td class="center input-mini"><resultado id="resultado_'+(i+1)+'">'+data.tabla1[i].resultado+'</resultado></td>'
						+'<td class="center input-mini"><button class="btn btn-mini btn-danger" onclick="removerTap('+(i+1)+')"><i class="icon-trash bigger-120"></i></button></td>'
					+'</tr>'
					);
				if(data.tabla1[i].resultado.indexOf('OK') != -1){
					$("#resultado_"+(i+1)).html('<span class="label label-success arrowed">'+data.tabla1[i].resultado+'</span>');
				}else{
					$("#resultado_"+(i+1)).html('<span class="label label-important arrowed-in">'+data.tabla1[i].resultado+'</span>');
				}
			}

			$("#observacion").val(data.observaciones);
			$("#combinacion").val(data.combinacion);
			if(data.combinacion=="dyn" || ata.combinacion=="ddn"){
				$("#a").html("H1-H2(A)");
				$("#b").html("H2-H3(B)");
				$("#c").html("H3-H1(C)");
			}else if(data.combinacion=="ydn" || data.combinacion=="yyn"){
				$("#a").html("H0-H1(A)");
				$("#b").html("H0-H2(B)");
				$("#c").html("H0-H3(C)");
			}
		}else{
			//auto colocar Dyn Ddn
			$("#a").html("H1-H2(A)");
			$("#b").html("H2-H3(B)");
			$("#c").html("H3-H1(C)");
		}
		var estado='<?php echo $estado?>';
		if (estado==3){
			$("input").prop("disabled", true);
			$("button").prop("disabled", true);
			$("select").prop("disabled", true);
			$("textarea").prop("disabled", true);
		}
	}
	var t_taps=0;
	function nuevotap(){
		var taps=$("#taps").val();
		var n=1;
		if(t_taps>0){
			n=t_taps+1;
		}
		t_taps=t_taps+parseInt(taps);
		$("#n_taps").html(t_taps+" taps");
		for (var i = n; i <=t_taps; i++) {
			$("#cuerpo_tabla").append(
				'<tr id="tr_'+i+'">'
					+'<td class="center input-mini"><input id="tap_'+i+'" class="input-mini textomax" type="text" name="'+i+'"/></td>'
					+'<td class="center input-mini"><input id="kv_'+i+'" class="input-mini decimal decimalmax" type="text" name="'+i+'"/></td>'
					+'<td class="center input-mini"><input id="a_'+i+'" class="input-mini decimal decimalmax" type="text" name="'+i+'"/></td>'
					+'<td class="center input-mini"><input id="b_'+i+'" class="input-mini decimal decimalmax" type="text" name="'+i+'"/></td>'
					+'<td class="center input-mini"><input id="c_'+i+'" class="input-mini decimal decimalmax" type="text" name="'+i+'"/></td>'
					+'<td class="center input-mini"><resultado id="resultado_'+i+'">Formula</resultado></td>'
					+'<td class="center input-mini"><button class="btn btn-mini btn-danger" onclick="removerTap('+i+')"><i class="icon-trash bigger-120"></i></button></td>'
				+'</tr>'
				);
		}
	}
	function removerTap(tap){
		$("#tr_"+tap).remove();
		t_taps=t_taps-1;
		$("#n_taps").html(t_taps+" taps");
	}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Corriente de Excitacion </h3>
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
		<label for="combinacion">Selecciona Conexión</label>
		<select id="combinacion">
			<option value="dyn">Dyn</option>
			<option value="ddn">Ddn</option>
			<option value="ydn">Ydn</option>
			<option value="yyn">Yyn</option>
		</select>
  	</div>
  	<div class="span6 form-inline">
  		<label for="taps">Agrega la cantidad de taps</label>
  		<div class="form-inline">
  			<input id="taps" class="input-mini" type="text" placeholder="N de taps"/>
		  	<button class="btn btn-small btn-info" onclick="nuevotap()">
				<i class="icon-bolt bigger-125"></i>
				Agregar Taps
			</button>
  		</div>
  	</div>
</div>
<table id="table_1" class="table table-bordered">
	<thead>
		<tr>
			<th colspan="7" class="center">Corriente de Excitacion<div id="n_taps"></div></th>
		</tr>
		<tr>
			<th class="center">Tap</th>
			<th class="center">Kv</th>
			<th class="center"><div id="a"></div></th>
			<th class="center"><div id="b"></div></th>
			<th class="center"><div id="c"></div></th>
			<th class="center">Resultado(D)</th>
			<th class="center">Accion</th>
			
		</tr>
	</thead>
	<tbody id="cuerpo_tabla">		
	</tbody>
</table>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
</script>