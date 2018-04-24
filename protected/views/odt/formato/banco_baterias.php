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
			'<a href="'.$nameProyect.'/odt/index">Inicio</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>'.
			'<a href="'.$nameProyect.'/odt/llenarodt/'.$odt.'">Llenar ODT</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Mantenimiento Banco De Baterias</li>'.
	'</ul>'.
'</div>';
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
$size=count($json_brigada['brigada']);
$json_formato=json_decode($formato->json, true);
?>
<div id="info"></div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			MANTENIMIENTO BANCO DE BATERIAS
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>No CONSIGNACIÓN:</label>
					<input id="n_consignacion" type="text" maxlength="10"/>
				</td>
				<td colspan="2">
					<label>Fecha</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="fecha" name="fecha" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>
				</td>
			</tr>
			<tr>
				<td>
					<label>SUBESTACION:</label>
					<input id="subestacion" type="text" maxlength="10"/>
				</td>
				<td colspan="2">
					<label>VOLT. CARGADOR :</label>
					<input id="volt_cargador" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>T.Ambiente °C:</label>
					<input id="temp_ambiente" type="text" maxlength="10"/>
				</td>
				<td colspan="2">
					<label>VOLT. BANCO DE BATERIA :</label>
					<input id="volt_banco_bateria" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>FABRICANTE:</label>
					<input id="fabricante" type="text" maxlength="10"/>
				</td>
				<td colspan="2">
					<label>NUMERO DE ELEMENTOS:</label>
					<input id="numero_elementos" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>RESPONSABLE:</label>
					<select id="responsable">
						<option value="">RESPONSABLE</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
				<td>
					<label>PLOMO/ACIDO:</label>
					<input id="plomo_acido" type="text" maxlength="10"/>
				</td>
				<td>
					<label>SECAS</label>
					<input id="secas" type="text" maxlength="10"/>
				</td>
			</tr>
		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th rowspan="2" class="center">BATERIA</th>
				<th colspan="3" class="center">MEDICIONES</th>
				<th rowspan="2" class="center">BATERIA</th>
				<th colspan="3" class="center">MEDICIONES</th>
				<th rowspan="2" class="center">BATERIA</th>
				<th colspan="3" class="center">MEDICIONES</th>
			</tr>
			<tr>
				<th class="center">VOLT.</th>
				<th class="center">DENS.</th>
				<th class="center">TEMP.</th>
				<th class="center">VOLT.</th>
				<th class="center">DENS.</th>
				<th class="center">TEMP.</th>
				<th class="center">VOLT.</th>
				<th class="center">DENS.</th>
				<th class="center">TEMP.</th>
			</tr>
			<tbody>
				<?php 
				$cont=35;$col3=0;
				for ($i=1; $i <= 35 ; $i++) { $cont++;?>
					<tr>
						<td><?php echo $i?></td>
						<td><input id="volt_<?php echo $i?>" type="text" maxlength="5" style="width:40px;"/></td>
						<td><input id="dens_<?php echo $i?>" type="text" maxlength="5" style="width:40px;"/></td>
						<td><input id="temp_<?php echo $i?>" type="text" maxlength="5" style="width:40px;"/></td>
						<td><?php echo $cont?></td>
						<td><input id="volt_<?php echo $cont?>" type="text" maxlength="5" style="width:40px;"/></td>
						<td><input id="dens_<?php echo $cont?>" type="text" maxlength="5" style="width:40px;"/></td>
						<td><input id="temp_<?php echo $cont?>" type="text" maxlength="5" style="width:40px;"/></td>
						<?php $col3=($cont-$i)+$cont;?>
						<td><?php echo $col3?></td>
						<td><input id="volt_<?php echo $col3?>" type="text" maxlength="5" style="width:40px;"/></td>
						<td><input id="dens_<?php echo $col3?>" type="text" maxlength="5" style="width:40px;"/></td>
						<td><input id="temp_<?php echo $col3?>" type="text" maxlength="5" style="width:40px;"/></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th colspan="12">PRUEBA DESCARGA DE BATERIAS</th>
			</tr>
			<tr>
				<td>TIEMPO</td>
				<td>15 min</td>
				<td>30 min</td>
				<td>45 min</td>
				<td>60 min</td>
				<td>75 min</td>
				<td>90 min</td>
				<td>105 min</td>
				<td>120 min</td>
				<td>135 min</td>
				<td>150 min</td>
				<td>180 min</td>
			</tr>
			<tr>
				<td>VOLT. DC</td>
				<td><input id="volt_v_15" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_30" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_45" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_60" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_75" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_90" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_105" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_120" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_135" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_150" type="text" maxlength="5" style="width:40px;"/></td>
				<td><input id="volt_v_180" type="text" maxlength="5" style="width:40px;"/></td>
			</tr>
			<tr>
				<td colspan="12">
					<label>Observaciones</label>
					<textarea class="span12 limited" id="observacion" data-maxlength="100" rows="1"></textarea>
				</td>
			</tr>
		</table>
		<button class="btn btn-large btn-success" onclick="crearJson()">Guardar</button>
	</div>
</div>



<br><br><br>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
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
	var json='{'+
		  '"n_consignacion": "'+$("#n_consignacion").val()+'",'+
		  '"fecha": "'+$("#fecha").val()+'",'+
		  '"subestacion": "'+$("#subestacion").val()+'",'+
		  '"volt_cargador": "'+$("#volt_cargador").val()+'",'+
		  '"temp_ambiente": "'+$("#temp_ambiente").val()+'",'+
		  '"volt_banco_bateria": "'+$("#volt_banco_bateria").val()+'",'+
		  '"fabricante": "'+$("#fabricante").val()+'",'+
		  '"numero_elementos": "'+$("#numero_elementos").val()+'",'+
		  '"responsable": "'+$("#responsable").val()+'",'+
		  '"plomo_acido": "'+$("#plomo_acido").val()+'",'+
		  '"secas": "'+$("#secas").val()+'",'+
		  '"table_bateria": [';
		  for (var i = 1; i <= 105; i++) {
		  	if(i==1){
		  	   json+='{'+
				      '"volt":"'+$("#volt_"+i).val()+'",'+
				      '"dens":"'+$("#dens_"+i).val()+'",'+
				      '"temp":"'+$("#temp_"+i).val()+'"'+
				    '}';
		  	}else{
		  		json+=',{'+
				      '"volt":"'+$("#volt_"+i).val()+'",'+
				      '"dens":"'+$("#dens_"+i).val()+'",'+
				      '"temp":"'+$("#temp_"+i).val()+'"'+
				    '}';
		  	}
		  }
		json+='],'+
		  '"volt_15":"'+$("#volt_v_15").val()+'",'+
		  '"volt_30":"'+$("#volt_v_30").val()+'",'+
		  '"volt_45":"'+$("#volt_v_45").val()+'",'+
		  '"volt_60":"'+$("#volt_v_60").val()+'",'+
		  '"volt_75":"'+$("#volt_v_75").val()+'",'+
		  '"volt_90":"'+$("#volt_v_90").val()+'",'+
		  '"volt_105":"'+$("#volt_v_105").val()+'",'+
		  '"volt_120":"'+$("#volt_v_120").val()+'",'+
		  '"volt_135":"'+$("#volt_v_135").val()+'",'+
		  '"volt_150":"'+$("#volt_v_150").val()+'",'+
		  '"volt_180":"'+$("#volt_v_180").val()+'",'+
		  '"observacion":"'+$("#observacion").val()+'"';

	json+='}';
	//console.log(json);
	$.ajax({
        url:"<?php echo $nameProyect?>/Odt/ActualizarFormato",
        type:'POST',
        dataType:"json",
        cache:false,
        data: {
            json: json,
            id: <?php echo $formato->id?>
        },
        beforeSend:  function() {
            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
        },
        success: function(data){
        	
        	if(data.update=="1" || data.update=="0"){
        		location.href="<?php echo $nameProyect?>/odt/llenarodt/<?php echo $odt?>";
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
	var text='<?php echo $formato->json?>';
	if(text.length>0){
		var data = JSON.parse('<?php echo $formato->json?>');
		$("#n_consignacion").val(data.n_consignacion)
		$("#fecha").val(data.fecha)
		$("#subestacion").val(data.subestacion)
		$("#volt_cargador").val(data.volt_cargador)
		$("#temp_ambiente").val(data.temp_ambiente)
		$("#volt_banco_bateria").val(data.volt_banco_bateria)
		$("#fabricante").val(data.fabricante)
		$("#numero_elementos").val(data.numero_elementos)
		$("#responsable").val(data.responsable)
		$("#plomo_acido").val(data.plomo_acido)
		$("#secas").val(data.secas)
		var size=data.table_bateria.length;
		for (var i = 1; i <= size; i++) {
			$("#volt_"+i).val(data.table_bateria[i-1].volt)
			$("#dens_"+i).val(data.table_bateria[i-1].dens)
			$("#temp_"+i).val(data.table_bateria[i-1].temp)
		}

		$("#volt_v_15").val(data.volt_15)
		$("#volt_v_30").val(data.volt_30)
		$("#volt_v_45").val(data.volt_45)
		$("#volt_v_60").val(data.volt_60)
		$("#volt_v_75").val(data.volt_75)
		$("#volt_v_90").val(data.volt_90)
		$("#volt_v_105").val(data.volt_105)
		$("#volt_v_120").val(data.volt_120)
		$("#volt_v_135").val(data.volt_135)
		$("#volt_v_150").val(data.volt_150)
		$("#volt_v_180").val(data.volt_180)
		$("#observacion").val(data.observacion)
	}
	var estado='<?php echo $formato->estado?>';
	if (estado==3){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
cargarDatos();
</script>
