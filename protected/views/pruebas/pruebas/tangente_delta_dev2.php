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
			'Tangente Delta 2 Devanados'.
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
	//tabla 1 fila 1
	var t1_alta_baja_gnd_kvmeas=$("#table_1 tr").find("#alta-baja-gnd-kvmeas").val();
	var t1_alta_baja_gnd_pfcorr=$("#table_1 tr").find("#alta-baja-gnd-pfcorr").val();
	var t1_alta_baja_gnd_cap=$("#table_1 tr").find("#alta-baja-gnd-cap").val();

	//tabla 1 fila 2
	var t1_alta_baja_gar_kvmeas=$("#table_1 tr").find("#alta-baja-gar-kvmeas").val();
	var t1_alta_baja_gar_pfcorr=$("#table_1 tr").find("#alta-baja-gar-pfcorr").val();
	var t1_alta_baja_gar_cap=$("#table_1 tr").find("#alta-baja-gar-cap").val();

	//tabla 1 fila 3
	var t1_alta_alta_ust_kvmeas=$("#table_1 tr").find("#alta-alta-ust-kvmeas").val();
	var t1_alta_alta_ust_pfcorr=$("#table_1 tr").find("#alta-alta-ust-pfcorr").val();
	var t1_alta_alta_ust_cap=$("#table_1 tr").find("#alta-alta-ust-cap").val();

	//tabla 1 fila 4
	var t1_baja_alta_gnd_kvmeas=$("#table_1 tr").find("#baja-alta-gnd-kvmeas").val();
	var t1_baja_alta_gnd_pfcorr=$("#table_1 tr").find("#baja-alta-gnd-pfcorr").val();
	var t1_baja_alta_gnd_cap=$("#table_1 tr").find("#baja-alta-gnd-cap").val();

	//tabla 1 fila 5
	var t1_baja_alta_gar_kvmeas=$("#table_1 tr").find("#baja-alta-gar-kvmeas").val();
	var t1_baja_alta_gar_pfcorr=$("#table_1 tr").find("#baja-alta-gar-pfcorr").val();
	var t1_baja_alta_gar_cap=$("#table_1 tr").find("#baja-alta-gar-cap").val();

	//tabla 1 fila 6
	var t1_baja_alta_ust_kvmeas=$("#table_1 tr").find("#baja-alta-ust-kvmeas").val();
	var t1_baja_alta_ust_pfcorr=$("#table_1 tr").find("#baja-alta-ust-pfcorr").val();
	var t1_baja_alta_ust_cap=$("#table_1 tr").find("#baja-alta-ust-cap").val();

	//*************************************************************
	//tabla 2 fila 1
	var t2_alta_baja_gnd_kvmeas=$("#table_2 tr").find("#alta-baja-gnd-kvmeas").val();
	var t2_alta_baja_gnd_pfcorr=$("#table_2 tr").find("#alta-baja-gnd-pfcorr").val();
	var t2_alta_baja_gnd_cap=$("#table_2 tr").find("#alta-baja-gnd-cap").val();

	//tabla 2 fila 2
	var t2_alta_baja_gar_kvmeas=$("#table_2 tr").find("#alta-baja-gar-kvmeas").val();
	var t2_alta_baja_gar_pfcorr=$("#table_2 tr").find("#alta-baja-gar-pfcorr").val();
	var t2_alta_baja_gar_cap=$("#table_2 tr").find("#alta-baja-gar-cap").val();

	//tabla 2 fila 3
	var t2_alta_alta_ust_kvmeas=$("#table_2 tr").find("#alta-alta-ust-kvmeas").val();
	var t2_alta_alta_ust_pfcorr=$("#table_2 tr").find("#alta-alta-ust-pfcorr").val();
	var t2_alta_alta_ust_cap=$("#table_2 tr").find("#alta-alta-ust-cap").val();

	//tabla 2 fila 4
	var t2_baja_alta_gnd_kvmeas=$("#table_2 tr").find("#baja-alta-gnd-kvmeas").val();
	var t2_baja_alta_gnd_pfcorr=$("#table_2 tr").find("#baja-alta-gnd-pfcorr").val();
	var t2_baja_alta_gnd_cap=$("#table_2 tr").find("#baja-alta-gnd-cap").val();

	//tabla 2 fila 5
	var t2_baja_alta_gar_kvmeas=$("#table_2 tr").find("#baja-alta-gar-kvmeas").val();
	var t2_baja_alta_gar_pfcorr=$("#table_2 tr").find("#baja-alta-gar-pfcorr").val();
	var t2_baja_alta_gar_cap=$("#table_2 tr").find("#baja-alta-gar-cap").val();

	//tabla 2 fila 6
	var t2_baja_alta_ust_kvmeas=$("#table_2 tr").find("#baja-alta-ust-kvmeas").val();
	var t2_baja_alta_ust_pfcorr=$("#table_2 tr").find("#baja-alta-ust-pfcorr").val();
	var t2_baja_alta_ust_cap=$("#table_2 tr").find("#baja-alta-ust-cap").val();

	var observacion=$("#observacion").val();

	var json=''
		  	+'{'
			  +'"tabla1": ['
			    +'{'
			      +'"alta_baja_gnd_kvmeas": "'+t1_alta_baja_gnd_kvmeas+'",'
			      +'"alta_baja_gnd_pfcorr": "'+t1_alta_baja_gnd_pfcorr+'",'
			      +'"alta_baja_gnd_cap": "'+t1_alta_baja_gnd_cap+'"'
			    +'},'
			    +'{'
			      +'"alta_baja_gar_kvmeas": "'+t1_alta_baja_gar_kvmeas+'",'
			      +'"alta_baja_gar_pfcorr": "'+t1_alta_baja_gar_pfcorr+'",'
			      +'"alta_baja_gar_cap": "'+t1_alta_baja_gar_cap+'"'
			    +'},'
			    +'{'
			      +'"alta_alta_ust_kvmeas": "'+t1_alta_alta_ust_kvmeas+'",'
			      +'"alta_alta_ust_pfcorr": "'+t1_alta_alta_ust_pfcorr+'",'
			      +'"alta_alta_ust_cap": "'+t1_alta_alta_ust_cap+'"'
			    +'},'
			    +'{'
			      +'"baja_alta_gnd_kvmeas": "'+t1_baja_alta_gnd_kvmeas+'",'
			      +'"baja_alta_gnd_pfcorr": "'+t1_baja_alta_gnd_pfcorr+'",'
			      +'"baja_alta_gnd_cap": "'+t1_baja_alta_gnd_cap+'"'
			    +'},'
			    +'{'
			      +'"baja_alta_gar_kvmeas": "'+t1_baja_alta_gar_kvmeas+'",'
			      +'"baja_alta_gar_pfcorr": "'+t1_baja_alta_gar_pfcorr+'",'
			      +'"baja_alta_gar_cap": "'+t1_baja_alta_gar_cap+'"'
			    +'},'
			    +'{'
			      +'"baja_alta_ust_kvmeas": "'+t1_baja_alta_ust_kvmeas+'",'
			      +'"baja_alta_ust_pfcorr": "'+t1_baja_alta_ust_pfcorr+'",'
			      +'"baja_alta_ust_cap": "'+t1_baja_alta_ust_cap+'"'
			    +'}'
			  +'],'
			  +'"tabla2": ['
			    +'{'
			      +'"alta_baja_gnd_kvmeas": "'+t2_alta_baja_gnd_kvmeas+'",'
			      +'"alta_baja_gnd_pfcorr": "'+t2_alta_baja_gnd_pfcorr+'",'
			      +'"alta_baja_gnd_cap": "'+t2_alta_baja_gnd_cap+'"'
			    +'},'
			    +'{'
			      +'"alta_baja_gar_kvmeas": "'+t2_alta_baja_gar_kvmeas+'",'
			      +'"alta_baja_gar_pfcorr": "'+t2_alta_baja_gar_pfcorr+'",'
			      +'"alta_baja_gar_cap": "'+t2_alta_baja_gar_cap+'"'
			    +'},'
			    +'{'
			      +'"alta_alta_ust_kvmeas": "'+t2_alta_alta_ust_kvmeas+'",'
			      +'"alta_alta_ust_pfcorr": "'+t2_alta_alta_ust_pfcorr+'",'
			      +'"alta_alta_ust_cap": "'+t2_alta_alta_ust_cap+'"'
			    +'},'
			    +'{'
			      +'"baja_alta_gnd_kvmeas": "'+t2_baja_alta_gnd_kvmeas+'",'
			      +'"baja_alta_gnd_pfcorr": "'+t2_baja_alta_gnd_pfcorr+'",'
			      +'"baja_alta_gnd_cap": "'+t2_baja_alta_gnd_cap+'"'
			    +'},'
			    +'{'
			      +'"baja_alta_gar_kvmeas": "'+t2_baja_alta_gar_kvmeas+'",'
			      +'"baja_alta_gar_pfcorr": "'+t2_baja_alta_gar_pfcorr+'",'
			      +'"baja_alta_gar_cap": "'+t2_baja_alta_gar_cap+'"'
			    +'},'
			    +'{'
			      +'"baja_alta_ust_kvmeas": "'+t2_baja_alta_ust_kvmeas+'",'
			      +'"baja_alta_ust_pfcorr": "'+t2_baja_alta_ust_pfcorr+'",'
			      +'"baja_alta_ust_cap": "'+t2_baja_alta_ust_cap+'"'
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
		//tabla 1 fila 1
		$("#table_1 tr #alta-baja-gnd-kvmeas").val(data.tabla1[0].alta_baja_gnd_kvmeas);
		$("#table_1 tr #alta-baja-gnd-pfcorr").val(data.tabla1[0].alta_baja_gnd_pfcorr);
		$("#table_1 tr #alta-baja-gnd-cap").val(data.tabla1[0].alta_baja_gnd_cap);

		//tabla 1 fila 2
		$("#table_1 tr #alta-baja-gar-kvmeas").val(data.tabla1[1].alta_baja_gar_kvmeas);
		$("#table_1 tr #alta-baja-gar-pfcorr").val(data.tabla1[1].alta_baja_gar_pfcorr);
		$("#table_1 tr #alta-baja-gar-cap").val(data.tabla1[1].alta_baja_gar_cap);

		//tabla 1 fila 3
		$("#table_1 tr #alta-alta-ust-kvmeas").val(data.tabla1[2].alta_alta_ust_kvmeas);
		$("#table_1 tr #alta-alta-ust-pfcorr").val(data.tabla1[2].alta_alta_ust_pfcorr);
		$("#table_1 tr #alta-alta-ust-cap").val(data.tabla1[2].alta_alta_ust_cap);

		//tabla 1 fila 4
		$("#table_1 tr #baja-alta-gnd-kvmeas").val(data.tabla1[3].baja_alta_gnd_kvmeas);
		$("#table_1 tr #baja-alta-gnd-pfcorr").val(data.tabla1[3].baja_alta_gnd_pfcorr);
		$("#table_1 tr #baja-alta-gnd-cap").val(data.tabla1[3].baja_alta_gnd_cap);

		//tabla 1 fila 5
		$("#table_1 tr #baja-alta-gar-kvmeas").val(data.tabla1[4].baja_alta_gar_kvmeas);
		$("#table_1 tr #baja-alta-gar-pfcorr").val(data.tabla1[4].baja_alta_gar_pfcorr);
		$("#table_1 tr #baja-alta-gar-cap").val(data.tabla1[4].baja_alta_gar_cap);

		//tabla 1 fila 6
		$("#table_1 tr #baja-alta-ust-kvmeas").val(data.tabla1[5].baja_alta_ust_kvmeas);
		$("#table_1 tr #baja-alta-ust-pfcorr").val(data.tabla1[5].baja_alta_ust_pfcorr);
		$("#table_1 tr #baja-alta-ust-cap").val(data.tabla1[5].baja_alta_ust_cap);

		//*************************************************************
		//tabla 2 fila 1
		$("#table_2 tr #alta-baja-gnd-kvmeas").val(data.tabla2[0].alta_baja_gnd_kvmeas);
		$("#table_2 tr #alta-baja-gnd-pfcorr").val(data.tabla2[0].alta_baja_gnd_pfcorr);
		$("#table_2 tr #alta-baja-gnd-cap").val(data.tabla2[0].alta_baja_gnd_cap);

		//tabla 2 fila 2
		$("#table_2 tr #alta-baja-gar-kvmeas").val(data.tabla2[1].alta_baja_gar_kvmeas);
		$("#table_2 tr #alta-baja-gar-pfcorr").val(data.tabla2[1].alta_baja_gar_pfcorr);
		$("#table_2 tr #alta-baja-gar-cap").val(data.tabla2[1].alta_baja_gar_cap);

		//tabla 2 fila 3
		$("#table_2 tr #alta-alta-ust-kvmeas").val(data.tabla2[2].alta_alta_ust_kvmeas);
		$("#table_2 tr #alta-alta-ust-pfcorr").val(data.tabla2[2].alta_alta_ust_pfcorr);
		$("#table_2 tr #alta-alta-ust-cap").val(data.tabla2[2].alta_alta_ust_cap);

		//tabla 2 fila 4
		$("#table_2 tr #baja-alta-gnd-kvmeas").val(data.tabla2[3].baja_alta_gnd_kvmeas);
		$("#table_2 tr #baja-alta-gnd-pfcorr").val(data.tabla2[3].baja_alta_gnd_pfcorr);
		$("#table_2 tr #baja-alta-gnd-cap").val(data.tabla2[3].baja_alta_gnd_cap);

		//tabla 2 fila 5
		$("#table_2 tr #baja-alta-gar-kvmeas").val(data.tabla2[4].baja_alta_gar_kvmeas);
		$("#table_2 tr #baja-alta-gar-pfcorr").val(data.tabla2[4].baja_alta_gar_pfcorr);
		$("#table_2 tr #baja-alta-gar-cap").val(data.tabla2[4].baja_alta_gar_cap);

		//tabla 2 fila 6
		$("#table_2 tr #baja-alta-ust-kvmeas").val(data.tabla2[5].baja_alta_ust_kvmeas);
		$("#table_2 tr #baja-alta-ust-pfcorr").val(data.tabla2[5].baja_alta_ust_pfcorr);
		$("#table_2 tr #baja-alta-ust-cap").val(data.tabla2[5].baja_alta_ust_cap);

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
			<td class="center input-mini">Cable Alta tension</td>
			<td class="center input-mini">Cable Baja tension</td>
			<td class="center input-mini">Medio</td>
		</tr>
	<tbody>
		<tr>
			<td class="center input-mini">1</td>
			<td class="center input-mini">CHL + CH (GST)</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">GND</td>
			<td><input id="alta-baja-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">2</td>
			<td class="center input-mini">CH (GST -G)</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="alta-baja-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">3</td>
			<td class="center input-mini">CHL (UST)</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">UST</td>
			<td><input id="alta-alta-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-alta-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-alta-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
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
			<td class="center input-mini">CL + CHL (GST)</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">GND</td>
			<td><input id="baja-alta-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">5</td>
			<td class="center input-mini">CL (GST -G)</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="baja-alta-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">6</td>
			<td class="center input-mini">CHL (UST)</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">UST</td>
			<td><input id="baja-alta-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
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
			<td class="center input-mini">Cable Alta tension</td>
			<td class="center input-mini">Cable Baja tension</td>
			<td class="center input-mini">Medio</td>
		</tr>
	<tbody>
		<tr>
			<td class="center input-mini">1</td>
			<td class="center input-mini">CHL + CH (GST)</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">GND</td>
			<td><input id="alta-baja-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">2</td>
			<td class="center input-mini">CH (GST -G)</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="alta-baja-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-baja-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">3</td>
			<td class="center input-mini">CHL (UST)</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">UST</td>
			<td><input id="alta-alta-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-alta-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="alta-alta-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
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
			<td class="center input-mini">CL + CHL (GST)</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">GND</td>
			<td><input id="baja-alta-gnd-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gnd-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gnd-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">5</td>
			<td class="center input-mini">CL (GST-G)</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">GAR</td>
			<td><input id="baja-alta-gar-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gar-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-gar-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
		<tr>
			<td class="center input-mini">6</td>
			<td class="center input-mini">CHL (UST)</td>
			<td class="center input-mini">BAJA</td>
			<td class="center input-mini">ALTA</td>
			<td class="center input-mini">UST</td>
			<td><input id="baja-alta-ust-kvmeas" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-ust-pfcorr" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
			<td><input id="baja-alta-ust-cap" class="input-mini decimal decimalmax" type="text" placeholder=""></td>
		</tr>
	</tbody>
</table>
<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>