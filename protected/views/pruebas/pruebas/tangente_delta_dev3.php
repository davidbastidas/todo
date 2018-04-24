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
			'Tangente Delta 3 Devanados'.
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
	function crearJson(){
		//tabla 1 fila 1 h
		var t1_h_gndgar_kvmeas=$("#table_1 tr").find("#h-gndgar-kvmeas").val();
		var t1_h_gndgar_pfcorr=$("#table_1 tr").find("#h-gndgar-pfcorr").val();
		var t1_h_gndgar_cap=$("#table_1 tr").find("#h-gndgar-cap").val();

		//tabla 1 fila 2 h
		var t1_h_gar_kvmeas=$("#table_1 tr").find("#h-gar-kvmeas").val();
		var t1_h_gar_pfcorr=$("#table_1 tr").find("#h-gar-pfcorr").val();
		var t1_h_gar_cap=$("#table_1 tr").find("#h-gar-cap").val();

		//tabla 1 fila 3 h
		var t1_h_ust_kvmeas=$("#table_1 tr").find("#h-ust-kvmeas").val();
		var t1_h_ust_pfcorr=$("#table_1 tr").find("#h-ust-pfcorr").val();
		var t1_h_ust_cap=$("#table_1 tr").find("#h-ust-cap").val();

		//tabla 1 fila 4 x
		var t1_x_gnd_kvmeas=$("#table_1 tr").find("#x-gnd-kvmeas").val();
		var t1_x_gnd_pfcorr=$("#table_1 tr").find("#x-gnd-pfcorr").val();
		var t1_x_gnd_cap=$("#table_1 tr").find("#x-gnd-cap").val();

		//tabla 1 fila 5 x
		var t1_x_gar_kvmeas=$("#table_1 tr").find("#x-gar-kvmeas").val();
		var t1_x_gar_pfcorr=$("#table_1 tr").find("#x-gar-pfcorr").val();
		var t1_x_gar_cap=$("#table_1 tr").find("#x-gar-cap").val();

		//tabla 1 fila 6 x
		var t1_x_ust_kvmeas=$("#table_1 tr").find("#x-ust-kvmeas").val();
		var t1_x_ust_pfcorr=$("#table_1 tr").find("#x-ust-pfcorr").val();
		var t1_x_ust_cap=$("#table_1 tr").find("#x-ust-cap").val();
		//tabla 1 fila 7 y
		var t1_y_gnd_kvmeas=$("#table_1 tr").find("#y-gnd-kvmeas").val();
		var t1_y_gnd_pfcorr=$("#table_1 tr").find("#y-gnd-pfcorr").val();
		var t1_y_gnd_cap=$("#table_1 tr").find("#y-gnd-cap").val();

		//tabla 1 fila 8 y
		var t1_y_gar_kvmeas=$("#table_1 tr").find("#y-gar-kvmeas").val();
		var t1_y_gar_pfcorr=$("#table_1 tr").find("#y-gar-pfcorr").val();
		var t1_y_gar_cap=$("#table_1 tr").find("#y-gar-cap").val();

		//tabla 1 fila 9 y
		var t1_y_ust_kvmeas=$("#table_1 tr").find("#y-ust-kvmeas").val();
		var t1_y_ust_pfcorr=$("#table_1 tr").find("#y-ust-pfcorr").val();
		var t1_y_ust_cap=$("#table_1 tr").find("#y-ust-cap").val();

		//*************************************************************
		//tabla 2 fila 1 h
		var t2_h_gndgar_kvmeas=$("#table_2 tr").find("#h-gndgar-kvmeas").val();
		var t2_h_gndgar_pfcorr=$("#table_2 tr").find("#h-gndgar-pfcorr").val();
		var t2_h_gndgar_cap=$("#table_2 tr").find("#h-gndgar-cap").val();

		//tabla 2 fila 2 h
		var t2_h_gar_kvmeas=$("#table_2 tr").find("#h-gar-kvmeas").val();
		var t2_h_gar_pfcorr=$("#table_2 tr").find("#h-gar-pfcorr").val();
		var t2_h_gar_cap=$("#table_2 tr").find("#h-gar-cap").val();

		//tabla 2 fila 3 h
		var t2_h_ust_kvmeas=$("#table_2 tr").find("#h-ust-kvmeas").val();
		var t2_h_ust_pfcorr=$("#table_2 tr").find("#h-ust-pfcorr").val();
		var t2_h_ust_cap=$("#table_2 tr").find("#h-ust-cap").val();

		//tabla 2 fila 4 x
		var t2_x_gnd_kvmeas=$("#table_2 tr").find("#x-gnd-kvmeas").val();
		var t2_x_gnd_pfcorr=$("#table_2 tr").find("#x-gnd-pfcorr").val();
		var t2_x_gnd_cap=$("#table_2 tr").find("#x-gnd-cap").val();

		//tabla 2 fila 5 x
		var t2_x_gar_kvmeas=$("#table_2 tr").find("#x-gar-kvmeas").val();
		var t2_x_gar_pfcorr=$("#table_2 tr").find("#x-gar-pfcorr").val();
		var t2_x_gar_cap=$("#table_2 tr").find("#x-gar-cap").val();

		//tabla 2 fila 6 x
		var t2_x_ust_kvmeas=$("#table_2 tr").find("#x-ust-kvmeas").val();
		var t2_x_ust_pfcorr=$("#table_2 tr").find("#x-ust-pfcorr").val();
		var t2_x_ust_cap=$("#table_2 tr").find("#x-ust-cap").val();

		//tabla 2 fila 7 y
		var t2_y_gnd_kvmeas=$("#table_2 tr").find("#y-gnd-kvmeas").val();
		var t2_y_gnd_pfcorr=$("#table_2 tr").find("#y-gnd-pfcorr").val();
		var t2_y_gnd_cap=$("#table_2 tr").find("#y-gnd-cap").val();

		//tabla 2 fila 8 y
		var t2_y_gar_kvmeas=$("#table_2 tr").find("#y-gar-kvmeas").val();
		var t2_y_gar_pfcorr=$("#table_2 tr").find("#y-gar-pfcorr").val();
		var t2_y_gar_cap=$("#table_2 tr").find("#y-gar-cap").val();

		//tabla 2 fila 9 y
		var t2_y_ust_kvmeas=$("#table_2 tr").find("#y-ust-kvmeas").val();
		var t2_y_ust_pfcorr=$("#table_2 tr").find("#y-ust-pfcorr").val();
		var t2_y_ust_cap=$("#table_2 tr").find("#y-ust-cap").val();
		var observacion=$("#observacion").val();

		var json=''
			  	+'{'
				  +'"tabla1": ['
				    +'{'
				      +'"h_gndgar_kvmeas": "'+t1_h_gndgar_kvmeas+'",'
				      +'"h_gndgar_pfcorr": "'+t1_h_gndgar_pfcorr+'",'
				      +'"h_gndgar_cap": "'+t1_h_gndgar_cap+'"'
				    +'},'
				    +'{'
				      +'"h_gar_kvmeas": "'+t1_h_gar_kvmeas+'",'
				      +'"h_gar_pfcorr": "'+t1_h_gar_pfcorr+'",'
				      +'"h_gar_cap": "'+t1_h_gar_cap+'"'
				    +'},'
				    +'{'
				      +'"h_ust_kvmeas": "'+t1_h_ust_kvmeas+'",'
				      +'"h_ust_pfcorr": "'+t1_h_ust_pfcorr+'",'
				      +'"h_ust_cap": "'+t1_h_ust_cap+'"'
				    +'},'
				    +'{'
				      +'"x_gnd_kvmeas": "'+t1_x_gnd_kvmeas+'",'
				      +'"x_gnd_pfcorr": "'+t1_x_gnd_pfcorr+'",'
				      +'"x_gnd_cap": "'+t1_x_gnd_cap+'"'
				    +'},'
				    +'{'
				      +'"x_gar_kvmeas": "'+t1_x_gar_kvmeas+'",'
				      +'"x_gar_pfcorr": "'+t1_x_gar_pfcorr+'",'
				      +'"x_gar_cap": "'+t1_x_gar_cap+'"'
				    +'},'
				    +'{'
				      +'"x_ust_kvmeas": "'+t1_x_ust_kvmeas+'",'
				      +'"x_ust_pfcorr": "'+t1_x_ust_pfcorr+'",'
				      +'"x_ust_cap": "'+t1_x_ust_cap+'"'
				    +'},'
				    +'{'
				      +'"y_gnd_kvmeas": "'+t1_y_gnd_kvmeas+'",'
				      +'"y_gnd_pfcorr": "'+t1_y_gnd_pfcorr+'",'
				      +'"y_gnd_cap": "'+t1_y_gnd_cap+'"'
				    +'},'
				    +'{'
				      +'"y_gar_kvmeas": "'+t1_y_gar_kvmeas+'",'
				      +'"y_gar_pfcorr": "'+t1_y_gar_pfcorr+'",'
				      +'"y_gar_cap": "'+t1_y_gar_cap+'"'
				    +'},'
				    +'{'
				      +'"y_ust_kvmeas": "'+t1_y_ust_kvmeas+'",'
				      +'"y_ust_pfcorr": "'+t1_y_ust_pfcorr+'",'
				      +'"y_ust_cap": "'+t1_y_ust_cap+'"'
				    +'}'
				  +'],'
				  +'"tabla2": ['
				    +'{'
				      +'"h_gndgar_kvmeas": "'+t2_h_gndgar_kvmeas+'",'
				      +'"h_gndgar_pfcorr": "'+t2_h_gndgar_pfcorr+'",'
				      +'"h_gndgar_cap": "'+t2_h_gndgar_cap+'"'
				    +'},'
				    +'{'
				      +'"h_gar_kvmeas": "'+t2_h_gar_kvmeas+'",'
				      +'"h_gar_pfcorr": "'+t2_h_gar_pfcorr+'",'
				      +'"h_gar_cap": "'+t2_h_gar_cap+'"'
				    +'},'
				    +'{'
				      +'"h_ust_kvmeas": "'+t2_h_ust_kvmeas+'",'
				      +'"h_ust_pfcorr": "'+t2_h_ust_pfcorr+'",'
				      +'"h_ust_cap": "'+t2_h_ust_cap+'"'
				    +'},'
				    +'{'
				      +'"x_gnd_kvmeas": "'+t2_x_gnd_kvmeas+'",'
				      +'"x_gnd_pfcorr": "'+t2_x_gnd_pfcorr+'",'
				      +'"x_gnd_cap": "'+t2_x_gnd_cap+'"'
				    +'},'
				    +'{'
				      +'"x_gar_kvmeas": "'+t2_x_gar_kvmeas+'",'
				      +'"x_gar_pfcorr": "'+t2_x_gar_pfcorr+'",'
				      +'"x_gar_cap": "'+t2_x_gar_cap+'"'
				    +'},'
				    +'{'
				      +'"x_ust_kvmeas": "'+t2_x_ust_kvmeas+'",'
				      +'"x_ust_pfcorr": "'+t2_x_ust_pfcorr+'",'
				      +'"x_ust_cap": "'+t2_x_ust_cap+'"'
				    +'},'
				    +'{'
				      +'"y_gnd_kvmeas": "'+t2_y_gnd_kvmeas+'",'
				      +'"y_gnd_pfcorr": "'+t2_y_gnd_pfcorr+'",'
				      +'"y_gnd_cap": "'+t2_y_gnd_cap+'"'
				    +'},'
				    +'{'
				      +'"y_gar_kvmeas": "'+t2_y_gar_kvmeas+'",'
				      +'"y_gar_pfcorr": "'+t2_y_gar_pfcorr+'",'
				      +'"y_gar_cap": "'+t2_y_gar_cap+'"'
				    +'},'
				    +'{'
				      +'"y_ust_kvmeas": "'+t2_y_ust_kvmeas+'",'
				      +'"y_ust_pfcorr": "'+t2_y_ust_pfcorr+'",'
				      +'"y_ust_cap": "'+t2_y_ust_cap+'"'
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
			var data = JSON.parse(text);
			//tabla 1 fila 1
			$("#table_1 tr #h-gndgar-kvmeas").val(data.tabla1[0].h_gndgar_kvmeas);
			$("#table_1 tr #h-gndgar-pfcorr").val(data.tabla1[0].h_gndgar_pfcorr);
			$("#table_1 tr #h-gndgar-cap").val(data.tabla1[0].h_gndgar_cap);

			//tabla 1 fila 2
			$("#table_1 tr #h-gar-kvmeas").val(data.tabla1[1].h_gar_kvmeas);
			$("#table_1 tr #h-gar-pfcorr").val(data.tabla1[1].h_gar_pfcorr);
			$("#table_1 tr #h-gar-cap").val(data.tabla1[1].h_gar_cap);

			//tabla 1 fila 3
			$("#table_1 tr #h-ust-kvmeas").val(data.tabla1[2].h_ust_kvmeas);
			$("#table_1 tr #h-ust-pfcorr").val(data.tabla1[2].h_ust_pfcorr);
			$("#table_1 tr #h-ust-cap").val(data.tabla1[2].h_ust_cap);

			//tabla 1 fila 4
			$("#table_1 tr #x-gnd-kvmeas").val(data.tabla1[3].x_gnd_kvmeas);
			$("#table_1 tr #x-gnd-pfcorr").val(data.tabla1[3].x_gnd_pfcorr);
			$("#table_1 tr #x-gnd-cap").val(data.tabla1[3].x_gnd_cap);

			//tabla 1 fila 5
			$("#table_1 tr #x-gar-kvmeas").val(data.tabla1[4].x_gar_kvmeas);
			$("#table_1 tr #x-gar-pfcorr").val(data.tabla1[4].x_gar_pfcorr);
			$("#table_1 tr #x-gar-cap").val(data.tabla1[4].x_gar_cap);

			//tabla 1 fila 6
			$("#table_1 tr #x-ust-kvmeas").val(data.tabla1[5].x_ust_kvmeas);
			$("#table_1 tr #x-ust-pfcorr").val(data.tabla1[5].x_ust_pfcorr);
			$("#table_1 tr #x-ust-cap").val(data.tabla1[5].x_ust_cap);

			//tabla 1 fila 7
			$("#table_1 tr #y-gnd-kvmeas").val(data.tabla1[6].y_gnd_kvmeas);
			$("#table_1 tr #y-gnd-pfcorr").val(data.tabla1[6].y_gnd_pfcorr);
			$("#table_1 tr #y-gnd-cap").val(data.tabla1[6].y_gnd_cap);

			//tabla 1 fila 8
			$("#table_1 tr #y-gar-kvmeas").val(data.tabla1[7].y_gar_kvmeas);
			$("#table_1 tr #y-gar-pfcorr").val(data.tabla1[7].y_gar_pfcorr);
			$("#table_1 tr #y-gar-cap").val(data.tabla1[7].y_gar_cap);

			//tabla 1 fila 9
			$("#table_1 tr #y-ust-kvmeas").val(data.tabla1[8].y_ust_kvmeas);
			$("#table_1 tr #y-ust-pfcorr").val(data.tabla1[8].y_ust_pfcorr);
			$("#table_1 tr #y-ust-cap").val(data.tabla1[8].y_ust_cap);

			//*************************************************************
			//tabla 2 fila 1
			$("#table_2 tr #h-gndgar-kvmeas").val(data.tabla2[0].h_gndgar_kvmeas);
			$("#table_2 tr #h-gndgar-pfcorr").val(data.tabla2[0].h_gndgar_pfcorr);
			$("#table_2 tr #h-gndgar-cap").val(data.tabla2[0].h_gndgar_cap);

			//tabla 2 fila 2
			$("#table_2 tr #h-gar-kvmeas").val(data.tabla2[1].h_gar_kvmeas);
			$("#table_2 tr #h-gar-pfcorr").val(data.tabla2[1].h_gar_pfcorr);
			$("#table_2 tr #h-gar-cap").val(data.tabla2[1].h_gar_cap);

			//tabla 2 fila 3
			$("#table_2 tr #h-ust-kvmeas").val(data.tabla2[2].h_ust_kvmeas);
			$("#table_2 tr #h-ust-pfcorr").val(data.tabla2[2].h_ust_pfcorr);
			$("#table_2 tr #h-ust-cap").val(data.tabla2[2].h_ust_cap);

			//tabla 2 fila 4
			$("#table_2 tr #x-gnd-kvmeas").val(data.tabla2[3].x_gnd_kvmeas);
			$("#table_2 tr #x-gnd-pfcorr").val(data.tabla2[3].x_gnd_pfcorr);
			$("#table_2 tr #x-gnd-cap").val(data.tabla2[3].x_gnd_cap);

			//tabla 2 fila 5
			$("#table_2 tr #x-gar-kvmeas").val(data.tabla2[4].x_gar_kvmeas);
			$("#table_2 tr #x-gar-pfcorr").val(data.tabla2[4].x_gar_pfcorr);
			$("#table_2 tr #x-gar-cap").val(data.tabla2[4].x_gar_cap);

			//tabla 2 fila 6
			$("#table_2 tr #x-ust-kvmeas").val(data.tabla2[5].x_ust_kvmeas);
			$("#table_2 tr #x-ust-pfcorr").val(data.tabla2[5].x_ust_pfcorr);
			$("#table_2 tr #x-ust-cap").val(data.tabla2[5].x_ust_cap);

			//tabla 2 fila 7
			$("#table_2 tr #y-gnd-kvmeas").val(data.tabla2[6].y_gnd_kvmeas);
			$("#table_2 tr #y-gnd-pfcorr").val(data.tabla2[6].y_gnd_pfcorr);
			$("#table_2 tr #y-gnd-cap").val(data.tabla2[6].y_gnd_cap);

			//tabla 2 fila 8
			$("#table_2 tr #y-gar-kvmeas").val(data.tabla2[7].y_gar_kvmeas);
			$("#table_2 tr #y-gar-pfcorr").val(data.tabla2[7].y_gar_pfcorr);
			$("#table_2 tr #y-gar-cap").val(data.tabla2[7].y_gar_cap);

			//tabla 2 fila 9
			$("#table_2 tr #y-ust-kvmeas").val(data.tabla2[8].y_ust_kvmeas);
			$("#table_2 tr #y-ust-pfcorr").val(data.tabla2[8].y_ust_pfcorr);
			$("#table_2 tr #y-ust-cap").val(data.tabla2[8].y_ust_cap);
			
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
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Tangente Delta</h3>
	<h4 class="text-success">Voltaje 1</h4>
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
		<tr>
			<th rowspan="2" class="center">N</th>
			<th rowspan="2" class="center">Modo Prueba</th>
			<th colspan="3" class="center input-mini">Grupo Conexion</th>
			<th rowspan="2" class="center">Kv Meas</th>
			<th rowspan="2" class="center">%Pfcorr</th>
			<th rowspan="2" class="center">Cap(Pf)</th>
		</tr>
		<tr>
			<td class="center input-mini">Cable de inyeccion</td>
			<td class="center input-mini">Cable medida</td>
			<td class="center input-mini">Modo</td>
		</tr>
	<tbody>
		<tr>
			<td class="center input-mini">1</td>
			<td class="center input-mini">CHL + CH (GST)</td>
			<td class="center input-mini">H</td>
			<td class="center input-mini">BAJA/TIERRA TER/GUARDA</td>
			<td class="center input-mini">GND/GAR</td>
			<td><input id="h-gndgar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gndgar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gndgar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">2</td>
			<td class="center input-mini">CH (GST -G)</td>
			<td class="center input-mini">H</td>
			<td class="center input-mini">BAJA-TER/GUARDA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="h-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">3</td>
			<td class="center input-mini">CHL (UST)</td>
			<td class="center input-mini">H</td>
			<td class="center input-mini">TER/TIERRA BAJA/UST</td>
			<td class="center input-mini">UST</td>
			<td><input id="h-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="center input-mini">4</td>
			<td class="center input-mini">CL + CLT (GST)</td>
			<td class="center input-mini">X</td>
			<td class="center input-mini">TER/TIERRA ALTA/GUARDA</td>
			<td class="center input-mini">GND</td>
			<td><input id="x-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">5</td>
			<td class="center input-mini">CL (GST - G)</td>
			<td class="center input-mini">X</td>
			<td class="center input-mini">ALTA-TER/GUARDA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="x-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		<tr>
			<td class="center input-mini">6</td>
			<td class="center input-mini">CLT (UST)</td>
			<td class="center input-mini">X</td>
			<td class="center input-mini">ALTA/TIERRA TER/UST</td>
			<td class="center input-mini">UST</td>
			<td><input id="x-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="center input-mini">7</td>
			<td class="center input-mini">CT + CHT (GST)</td>
			<td class="center input-mini">Y</td>
			<td class="center input-mini">ALTA/TIERRA BAJA/GUARDA</td>
			<td class="center input-mini">GND</td>
			<td><input id="y-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">8</td>
			<td class="center input-mini">CT (GST -G)</td>
			<td class="center input-mini">Y</td>
			<td class="center input-mini">ALTA-BAJA/GUARDA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="y-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">9</td>
			<td class="center input-mini">CHT (UST)</td>
			<td class="center input-mini">Y</td>
			<td class="center input-mini">BAJA/TIERRA ALTA/UST</td>
			<td class="center input-mini">UST</td>
			<td><input id="y-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
	</tbody>
</table>
<h4 class="text-success">Voltaje 2</h4>
<hr>
<table id="table_2" class="table table-bordered">
		<tr>
			<th rowspan="2" class="center">N</th>
			<th rowspan="2" class="center">Modo Prueba</th>
			<th colspan="3" class="center input-mini">Grupo Conexion</th>
			<th rowspan="2" class="center">Kv Meas</th>
			<th rowspan="2" class="center">%Pfcorr</th>
			<th rowspan="2" class="center">Cap(Pf)</th>
		</tr>
		<tr>
			<td class="center input-mini">Cable de inyeccion</td>
			<td class="center input-mini">Cable medida</td>
			<td class="center input-mini">Modo</td>
		</tr>
	<tbody>
		<tr>
			<td class="center input-mini">1</td>
			<td class="center input-mini">CHL + CH (GST)</td>
			<td class="center input-mini">H</td>
			<td class="center input-mini">BAJA/TIERRA TER/GUARDA</td>
			<td class="center input-mini">GND/GAR</td>
			<td><input id="h-gndgar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gndgar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gndgar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">2</td>
			<td class="center input-mini">CH (GST -G)</td>
			<td class="center input-mini">H</td>
			<td class="center input-mini">BAJA-TER/GUARDA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="h-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">3</td>
			<td class="center input-mini">CHL (UST)</td>
			<td class="center input-mini">H</td>
			<td class="center input-mini">TER/TIERRA BAJA/UST</td>
			<td class="center input-mini">UST</td>
			<td><input id="h-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="h-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="center input-mini">4</td>
			<td class="center input-mini">CL + CLT (GST)</td>
			<td class="center input-mini">X</td>
			<td class="center input-mini">TER/TIERRA ALTA/GUARDA</td>
			<td class="center input-mini">GND</td>
			<td><input id="x-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">5</td>
			<td class="center input-mini">CL (GST - G)</td>
			<td class="center input-mini">X</td>
			<td class="center input-mini">ALTA-TER/GUARDA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="x-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		<tr>
			<td class="center input-mini">6</td>
			<td class="center input-mini">CLT (UST)</td>
			<td class="center input-mini">X</td>
			<td class="center input-mini">ALTA/TIERRA TER/UST</td>
			<td class="center input-mini">UST</td>
			<td><input id="x-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="x-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td class="center input-mini"></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="center input-mini">7</td>
			<td class="center input-mini">CT + CHT (GST)</td>
			<td class="center input-mini">Y</td>
			<td class="center input-mini">ALTA/TIERRA BAJA/GUARDA</td>
			<td class="center input-mini">GND</td>
			<td><input id="y-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">8</td>
			<td class="center input-mini">CT (GST -G)</td>
			<td class="center input-mini">Y</td>
			<td class="center input-mini">ALTA-BAJA/GUARDA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="y-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">9</td>
			<td class="center input-mini">CHT (UST)</td>
			<td class="center input-mini">Y</td>
			<td class="center input-mini">BAJA/TIERRA ALTA/UST</td>
			<td class="center input-mini">UST</td>
			<td><input id="y-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="y-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
	</tbody>
</table>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>