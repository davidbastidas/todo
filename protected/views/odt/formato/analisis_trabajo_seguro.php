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
		'<li>Analisis de Trabajo Seguro</li>'.
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
			ANÁLISIS DE TRABAJO SEGURO
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>Proyecto:</label>
					<input id="proyecto" type="text" maxlength="10"/>
				</td>
				<td>
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
					<label>Contratista / Empresa:</label>
					<input id="contratista" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Lugar</label>
					<input id="lugar" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>Coordinador de TSA:</label>
					<select id="coordinador_tsa">
						<option value="">COODINADOR</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>Descripción de la actividad</label>
					<textarea class="span12 limited" id="descripcion_actividad" data-maxlength="50" rows="1"></textarea>
				</td>
			</tr>
		</table>

		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th colspan="14" style="background-color:#fd6600;color:white;">Riesgos en Seguridad Industrial y ambientales (Si aplica seleccione la Opción)</th>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">A</td>
				<td>Quemaduras químicas o térmicas</td>
				<td style="background-color:#B2AEAE;">E</td>
				<td>Derrames, Fugas</td>
				<td style="background-color:#B2AEAE;">I</td>
				<td>Golpes</td>
				<td style="background-color:#B2AEAE;">M</td>
				<td>Explosión</td>
				<td style="background-color:#B2AEAE;">Q</td>
				<td>Ruido</td>
				<td style="background-color:#B2AEAE;">U</td>
				<td>Contaminación del agua</td>
				<td style="background-color:#B2AEAE;">Y</td>
				<td>Afectación de la flora</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">B</td>
				<td>Caídas de diferente nivel</td>
				<td style="background-color:#B2AEAE;">F</td>
				<td>Corrientes de aire</td>
				<td style="background-color:#B2AEAE;">J</td>
				<td>Asfixia</td>
				<td style="background-color:#B2AEAE;">N</td>
				<td>Vibraciones</td>
				<td style="background-color:#B2AEAE;">R</td>
				<td>Calor</td>
				<td style="background-color:#B2AEAE;">V</td>
				<td>Contaminación del aire</td>
				<td style="background-color:#B2AEAE;" rowspan="3">Z</td>
				<td rowspan="3">Otros:</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">C</td>
				<td>Caídas al mismo nivel </td>
				<td style="background-color:#B2AEAE;">G</td>
				<td>Lesiones osteomusculares</td>
				<td style="background-color:#B2AEAE;">K</td>
				<td>Incendio</td>
				<td style="background-color:#B2AEAE;">O</td>
				<td>Electrocución</td>
				<td style="background-color:#B2AEAE;">S</td>
				<td>Frío</td>
				<td style="background-color:#B2AEAE;">W</td>
				<td>Afectación de la fauna</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">D</td>
				<td>Cambios bruscos de temperatura</td>
				<td style="background-color:#B2AEAE;">H</td>
				<td>Atropellamiento (de transito)</td>
				<td style="background-color:#B2AEAE;">L</td>
				<td>Infección</td>
				<td style="background-color:#B2AEAE;">P</td>
				<td>Irritación</td>
				<td style="background-color:#B2AEAE;">T</td>
				<td>Público</td>
				<td style="background-color:#B2AEAE;">X</td>
				<td>Contaminación del suelo</td>
			</tr>
		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th colspan="14" style="background-color:#fd6600;color:white;">Elementos de Protección Personal</th>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">1</td>
				<td>Casco con barbuquejo para alturas</td>
				<td style="background-color:#B2AEAE;">2</td>
				<td>Botas de seguridad dieléctricas</td>
				<td style="background-color:#B2AEAE;">3</td>
				<td>Guantes carnaza, vaqueta, etc</td>
				<td style="background-color:#B2AEAE;">4</td>
				<td>Guantes de vinilo</td>
				<td style="background-color:#B2AEAE;">5</td>
				<td>Casco con barbuquejo dieléctrico para alturas</td>
				<td style="background-color:#B2AEAE;">6</td>
				<td>Visor de seguridad</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">7</td>
				<td>Botas de seguridad</td>
				<td style="background-color:#B2AEAE;">8</td>
				<td>Gafas de seguridad</td>
				<td style="background-color:#B2AEAE;">9</td>
				<td>Impermeable</td>
				<td style="background-color:#B2AEAE;">10</td>
				<td>Guantes de caucho</td>
				<td style="background-color:#B2AEAE;">11</td>
				<td>Gafas o monogafas</td>
				<td style="background-color:#B2AEAE;">12</td>
				<td>Tapabocas y mascara de gases</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">13</td>
				<td>Tapaoidos de copa o de insercion</td>
				<td style="background-color:#B2AEAE;">14</td>
				<td>Overol de dos piezas</td>
				<td style="background-color:#B2AEAE;">15</td>
				<td>Botas de caucho</td>
				<td style="background-color:#B2AEAE;">16</td>
				<td colspan="5">Otros:</td>
			</tr>
		</table>

		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th colspan="2" style="background-color:#fd6600;color:white;">I. CONTROLES EN LA FUENTE</th>
				<th colspan="2" style="background-color:#fd6600;color:white;">II. CONTROLES EN EL MEDIO</th>
				<th colspan="2" style="background-color:#fd6600;color:white;">III. CONTROLES EN EL TRABAJADOR</th>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.1</td>
				<td>Guardas para protección de equipos o sistemas en movimientos</td>
				<td style="background-color:#B2AEAE;">II.1</td>
				<td>Uso de voltímetro para verificar electricidad.</td>
				<td style="background-color:#B2AEAE;">III.1</td>
				<td>Uso de EPP</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.2</td>
				<td>Conexión a Tierra</td>
				<td style="background-color:#B2AEAE;">II.2</td>
				<td>Señalización / Demarcación de área de trabajo</td>
				<td style="background-color:#B2AEAE;">III.2</td>
				<td>Capacitación (asociada a trabajo en alturas diurno y nocturno)</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.3</td>
				<td>Aplicación del programa de riesgo químico</td>
				<td style="background-color:#B2AEAE;">II.3</td>
				<td>Iluminación Provisional de la instalación</td>
				<td style="background-color:#B2AEAE;">III.3</td>
				<td>Charla de Seguridad (Tareas con condiciones críticas)</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.4</td>
				<td>Aplicación del programa de seguridad víal</td>
				<td style="background-color:#B2AEAE;">II.4</td>
				<td>Hojas de Seguridad de los productos químicos (MSDS)</td>
				<td style="background-color:#B2AEAE;">III.4</td>
				<td>Supervisión (Tareas críticas)</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.5</td>
				<td>Aplicación del programa ambiental</td>
				<td style="background-color:#B2AEAE;">II.5</td>
				<td>Permiso de Trabajo</td>
				<td style="background-color:#B2AEAE;">III.5</td>
				<td>Ayudas mecánicas (para manipulación de cargas)</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.6</td>
				<td>Aplicación del programa de prevención contra caídas</td>
				<td style="background-color:#B2AEAE;">II.6</td>
				<td>Equipos de Extinción</td>
				<td style="background-color:#B2AEAE;">III.6</td>
				<td>Uso de equipos de protección individual para trabajos en alturas</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.7</td>
				<td>Controles de Ingeniería</td>
				<td style="background-color:#B2AEAE;">II.7</td>
				<td>Orden y Aseo</td>
				<td style="background-color:#B2AEAE;">III.7</td>
				<td>Inspección pre-uso de equipos de individuales y colectivos para trabajo en alturas</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.8</td>
				<td>Intervenciones de Mantenimiento</td>
				<td style="background-color:#B2AEAE;">II.8</td>
				<td>Uso de equipo de ventilación mecánica</td>
				<td style="background-color:#B2AEAE;">III.8</td>
				<td>Ropa de Trabajo acorde a la actividad</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">I.9</td>
				<td>Inspección preoperacional de equipos y herramientas</td>
				<td style="background-color:#B2AEAE;">II.9</td>
				<td>Ventilación de área de trabajo (15 minutos)</td>
				<td style="background-color:#B2AEAE;">III.9</td>
				<td>Estiramientos / Pausas / Descansos</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="5"></td>
				<td style="background-color:#B2AEAE;">II.10</td>
				<td>Equipo para monitoreo de atmósferas</td>
				<td style="background-color:#B2AEAE;">III.10</td>
				<td>Esquema de vacunación (Tétano, Fiebre Amarilla)</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">II.11</td>
				<td>Bloqueo y Etiquetado - control de energías peligrosas (eléctricas)</td>
				<td style="background-color:#B2AEAE;">III.11</td>
				<td>Hidratación</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">II.12</td>
				<td>Equipos mecánicos para ascenso y descenso</td>
				<td style="background-color:#B2AEAE;">III.12</td>
				<td>Evaluación de riesgos durante el desarrollo de la tarea (ascenso, descenso, posicionamiento e intervención del trabajo)</td>
			</tr>
			<tr>
				<td style="background-color:#B2AEAE;">II.13</td>
				<td>Apoyo especializado para el control de plagas</td>
				<td style="background-color:#B2AEAE;">III.13</td>
				<td></td>
			</tr>
		</table>
		<p>
			A continuación diligencie el paso a paso e indica las letras y números de los riesgos, controles y EPP, de igual forma describa las observaciones y recomendaciones para cada paso de la actividad
		</p>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">PASO A PASO</th>
					<th rowspan="2">RIESGOS EN SEG Y AMB</th>
					<th colspan="3">CONTROLES</th>
					<th rowspan="2">ELEMENTOS DE PROTECCIÓN PERSONAL</th>
					<th rowspan="2">RECOMENDACIONES / OBSERVACIONES</th>
				</tr>
				<tr>
					<th>FUENTE</th>
					<th>MEDIO</th>
					<th>TRABAJADOR</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i=1; $i < 21; $i++) { ?>
				<tr>
					<td><?php echo $i?></td>
					<td><input id="paso_paso_<?php echo $i?>" type="text" maxlength="20"/></td>	
					<td><input id="riesgo_seg_amb_<?php echo $i?>" type="text" class="input-small" maxlength="10"/></td>
					<td><input id="fuente_<?php echo $i?>" type="text" class="input-small" maxlength="10"/></td>
					<td><input id="medio_<?php echo $i?>" type="text" class="input-small" maxlength="10"/></td>
					<td><input id="trabajador_<?php echo $i?>" type="text" class="input-small" maxlength="10"/></td>
					<td><input id="epp_<?php echo $i?>" type="text" class="input-small" maxlength="10"/></td>
					<td><input id="obs_<?php echo $i?>" type="text" class="input-small" maxlength="10"/></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<p class="center" style="color:red;text-decoration: underline;">
			"EN CASO DE LLUVIA FUERTE O TORMENTA ELÉCTRICA SE DEBERÁ SUSPENDER EL TRABAJO. <br>
			SI SE ENCUENTRA OPERANDO EN LA ESTRUCTURA SE DEBERÁ PROTEGER LOS EQUIPOS Y DESCENDER"
		</p>
		<p class="center">
			Yo, como responsable de la ejecución he revisado que los controles han sido seguros y me comprometo a cumplir con todas las normas y recomendaciones de esta lista.
		</p>
		<br>
		<table class="table table-bordered">
			<tr>
				<th>16. RESPONSABLE DEL ANÁLISIS Y DETERMINACIÓN DE LOS CONTROLES </th>
				<th>17. REVISADO POR </th>
			</tr>
			<tr>
				<td>
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
					<select id="revisado">
						<option value="">REVISADO POR</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
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
		  '"proyecto": "'+$("#proyecto").val()+'",'+
		  '"fecha": "'+$("#fecha").val()+'",'+
		  '"contratista": "'+$("#contratista").val()+'",'+
		  '"lugar": "'+$("#lugar").val()+'",'+
		  '"coordinador_tsa": "'+$("#coordinador_tsa").val()+'",'+
		  '"descripcion_actividad": "'+$("#descripcion_actividad").val()+'",'+
		  '"table_paso_paso": [';
		  for (var i = 1; i <= 20; i++) {
		  	if(i==1){
		  	   json+='{'+
				      '"paso_paso":"'+$("#paso_paso_"+i).val()+'",'+
				      '"riesgo_seg_amb":"'+$("#riesgo_seg_amb_"+i).val()+'",'+
				      '"fuente":"'+$("#fuente_"+i).val()+'",'+
				      '"medio":"'+$("#medio_"+i).val()+'",'+
				      '"trabajador":"'+$("#trabajador_"+i).val()+'",'+
				      '"epp":"'+$("#epp_"+i).val()+'",'+
				      '"obs":"'+$("#obs_"+i).val()+'"'+
				    '}';
		  	}else{
		  		json+=',{'+
				      '"paso_paso":"'+$("#paso_paso_"+i).val()+'",'+
				      '"riesgo_seg_amb":"'+$("#riesgo_seg_amb_"+i).val()+'",'+
				      '"fuente":"'+$("#fuente_"+i).val()+'",'+
				      '"medio":"'+$("#medio_"+i).val()+'",'+
				      '"trabajador":"'+$("#trabajador_"+i).val()+'",'+
				      '"epp":"'+$("#epp_"+i).val()+'",'+
				      '"obs":"'+$("#obs_"+i).val()+'"'+
				    '}';
		  	}
		  }
		json+='],'+
		  '"responsable":"'+$("#responsable").val()+'",'+
		  '"revisado":"'+$("#revisado").val()+'"';

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
		$("#proyecto").val(data.proyecto)
		$("#fecha").val(data.fecha)
		$("#contratista").val(data.contratista)
		$("#lugar").val(data.lugar)
		$("#coordinador_tsa").val(data.coordinador_tsa)
		$("#descripcion_actividad").val(data.descripcion_actividad)
		
		var size=data.table_paso_paso.length;
		for (var i = 1; i <= size; i++) {
			$("#paso_paso_"+i).val(data.table_paso_paso[i-1].paso_paso)
			$("#riesgo_seg_amb_"+i).val(data.table_paso_paso[i-1].riesgo_seg_amb)
			$("#fuente_"+i).val(data.table_paso_paso[i-1].fuente)
			$("#medio_"+i).val(data.table_paso_paso[i-1].medio)
			$("#trabajador_"+i).val(data.table_paso_paso[i-1].trabajador)
			$("#epp_"+i).val(data.table_paso_paso[i-1].epp)
			$("#obs_"+i).val(data.table_paso_paso[i-1].obs)
		}

		$("#responsable").val(data.responsable)
		$("#revisado").val(data.revisado)
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
