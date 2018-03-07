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
		'<li>Inspección Interruptor</li>'.
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
	<div class="span10">
		<h3 class="header smaller lighter blue">
			 INSPECCIÓN INTERRUPTOR
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>Subestación:</label>
					<input id="subestacion" type="text" maxlength="10"/>
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
				<td>
					<label>Hora</label>
					<div class="input-append bootstrap-timepicker">
						<input id="hora" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label>No interruptor:</label>
					<input id="n_interruptor" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Marca:</label>
					<input id="marca" type="text" maxlength="10"/>
				</td>
				<td>
					<label>No serial:</label>
					<input id="n_serial" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Voltaje:</label>
					<input id="voltaje" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Potencia:</label>
					<input id="potencia" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Temperatura Ambiente &#8451;:</label>
					<input id="temp_ambiente" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>No O. Trabajo</label>
					<input id="n_odt" type="text" maxlength="10"/>
				</td>
				<td>
					<label>No Consignación:</label>
					<input id="n_consignacion" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Código de Opeación Equipo:</label>
					<input id="cod_op_equipo" type="text" maxlength="10"/>
				</td>
			</tr>
		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th>Preliminares</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="12">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_preliminar" data-maxlength="200" rows="20"></textarea>
				</th>
			</tr>
			<tr>
				<td>Aspecto Exterior ( Pintura  - Limpieza)</td>
				<td>
					<label>
						<input name="aspecto_exterior" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aspecto_exterior" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aspecto_exterior" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado conexión puesta tierra</td>
				<td>
					<label>
						<input name="conexion_tierra" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_tierra" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="conexion_tierra" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Presión de SF6</td>
				<td>
					<label>
						<input name="presion_sf6" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="presion_sf6" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="presion_sf6" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Presión hidráulica</td>
				<td>
					<label>
						<input name="presion_hidraulica" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="presion_hidraulica" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="presion_hidraulica" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado sistema de vacio</td>
				<td>
					<label>
						<input name="estado_sistema_vacio" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_sistema_vacio" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_sistema_vacio" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel de aceite</td>
				<td>
					<label>
						<input name="nivel_aceite" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Resortes de operación (Tensado, destensado)</td>
				<td>
					<label>
						<input name="resortes_operacion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="resortes_operacion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="resortes_operacion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado indicación visual - Abierto Cerrado</td>
				<td>
					<label>
						<input name="indicacion_visual" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="indicacion_visual" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="indicacion_visual" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado indicación tablero local  - Abierto Cerrado</td>
				<td>
					<label>
						<input name="indicacion_tab_local" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="indicacion_tab_local" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="indicacion_tab_local" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado de polos</td>
				<td>
					<label>
						<input name="estado_polos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_polos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_polos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Verificación alimentación VDC</td>
				<td>
					<label>
						<input name="veri_alimentacion_vdc" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="veri_alimentacion_vdc" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="veri_alimentacion_vdc" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>

			<tr>
				<th>Cajas de Control</th>
				<th>Bueno</th>
				<th>Regular</th>
				<th>Malo</th>
				<th rowspan="15">
					<label>Anotaciones:</label>
					<textarea class="span12 limited" id="anotacion_caja_control" data-maxlength="200" rows="20"></textarea>
				</th>
			</tr>
			<tr>
				<td>Empaques</td>
				<td>
					<label>
						<input name="empaques" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="empaques" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="empaques" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Chapas</td>
				<td>
					<label>
						<input name="chapas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="chapas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="chapas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Visagras</td>
				<td>
					<label>
						<input name="visagras" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="visagras" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="visagras" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Cableado</td>
				<td>
					<label>
						<input name="cableado" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="cableado" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="cableado" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Microswiches</td>
				<td>
					<label>
						<input name="microswiches" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="microswiches" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="microswiches" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Contactores</td>
				<td>
					<label>
						<input name="contactores" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="contactores" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="contactores" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Iluminacion</td>
				<td>
					<label>
						<input name="iluminacion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="iluminacion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="iluminacion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Calefaccion</td>
				<td>
					<label>
						<input name="calefaccion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="calefaccion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="calefaccion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Fusibles</td>
				<td>
					<label>
						<input name="fusibles" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="fusibles" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="fusibles" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Borneras</td>
				<td>
					<label>
						<input name="borneras" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="borneras" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Interruptores</td>
				<td>
					<label>
						<input name="interruptores" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="interruptores" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="interruptores" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Motor cambiador de Tomas</td>
				<td>
					<label>
						<input name="motor_cambiador_tomas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="motor_cambiador_tomas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="motor_cambiador_tomas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Motor de accionamiento</td>
				<td>
					<label>
						<input name="motor_accionamiento" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="motor_accionamiento" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="motor_accionamiento" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado  del cableado</td>
				<td>
					<label>
						<input name="estado_cableado" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_cableado" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_cableado" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="5">
					<label>Observaciones</label>
					<textarea class="span12 limited" id="observacion" data-maxlength="200" rows="1"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					<label>JEFE TRABAJO:</label>
					<select id="responsable">
						<option value="">[Elegir]</option>
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
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/bootstrap-timepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('#hora').timepicker({
		minuteStep: 1,
		showSeconds: true,
		showMeridian: false
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
		  '"subestacion": "'+$("#subestacion").val()+'",'+
		  '"fecha": "'+$("#fecha").val()+'",'+
		  '"hora": "'+$("#hora").val()+'",'+
		  '"n_interruptor": "'+$("#n_interruptor").val()+'",'+
		  '"marca": "'+$("#marca").val()+'",'+
		  '"n_serial": "'+$("#n_serial").val()+'",'+
		  '"voltaje": "'+$("#voltaje").val()+'",'+
		  '"potencia": "'+$("#potencia").val()+'",'+
		  '"temp_ambiente": "'+$("#temp_ambiente").val()+'",'+
		  '"n_odt": "'+$("#n_odt").val()+'",'+
		  '"n_consignacion": "'+$("#n_consignacion").val()+'",'+
		  '"cod_op_equipo": "'+$("#cod_op_equipo").val()+'",'+
		  '"aspecto_exterior": "'+$('input[name=aspecto_exterior]:checked').val()+'",'+
		  '"conexion_tierra": "'+$('input[name=conexion_tierra]:checked').val()+'",'+
		  '"presion_sf6": "'+$('input[name=presion_sf6]:checked').val()+'",'+
		  '"presion_hidraulica": "'+$('input[name=presion_hidraulica]:checked').val()+'",'+
		  '"estado_sistema_vacio": "'+$('input[name=estado_sistema_vacio]:checked').val()+'",'+
		  '"nivel_aceite": "'+$('input[name=nivel_aceite]:checked').val()+'",'+
		  '"resortes_operacion": "'+$('input[name=resortes_operacion]:checked').val()+'",'+
		  '"indicacion_visual": "'+$('input[name=indicacion_visual]:checked').val()+'",'+
		  '"indicacion_tab_local": "'+$('input[name=indicacion_tab_local]:checked').val()+'",'+
		  '"estado_polos": "'+$('input[name=estado_polos]:checked').val()+'",'+
		  '"veri_alimentacion_vdc": "'+$('input[name=veri_alimentacion_vdc]:checked').val()+'",'+
		  '"anotacion_preliminar": "'+$("#anotacion_preliminar").val()+'",'+
		  '"empaques": "'+$('input[name=empaques]:checked').val()+'",'+
		  '"chapas": "'+$('input[name=chapas]:checked').val()+'",'+
		  '"visagras": "'+$('input[name=visagras]:checked').val()+'",'+
		  '"cableado": "'+$('input[name=cableado]:checked').val()+'",'+
		  '"microswiches": "'+$('input[name=microswiches]:checked').val()+'",'+
		  '"contactores": "'+$('input[name=contactores]:checked').val()+'",'+
		  '"iluminacion": "'+$('input[name=iluminacion]:checked').val()+'",'+
		  '"calefaccion": "'+$('input[name=calefaccion]:checked').val()+'",'+
		  '"fusibles": "'+$('input[name=fusibles]:checked').val()+'",'+
		  '"borneras": "'+$('input[name=borneras]:checked').val()+'",'+
		  '"interruptores": "'+$('input[name=interruptores]:checked').val()+'",'+
		  '"motor_cambiador_tomas": "'+$('input[name=motor_cambiador_tomas]:checked').val()+'",'+
		  '"motor_accionamiento": "'+$('input[name=motor_accionamiento]:checked').val()+'",'+
		  '"estado_cableado": "'+$('input[name=estado_cableado]:checked').val()+'",'+
		  '"anotacion_caja_control": "'+$("#anotacion_caja_control").val()+'",'+
		  '"observacion": "'+$("#observacion").val()+'",'+
		  '"responsable": "'+$("#responsable").val()+'"'
		  ;

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
		$("#subestacion").val(data.subestacion)
		$("#fecha").val(data.fecha)
		$("#hora").val(data.hora)
		$("#n_interruptor").val(data.n_interruptor)
		$("#marca").val(data.marca)
		$("#n_serial").val(data.n_serial)
		$("#voltaje").val(data.voltaje)
		$("#potencia").val(data.potencia)
		$("#temp_ambiente").val(data.temp_ambiente)
		$("#n_odt").val(data.n_odt)
		$("#n_consignacion").val(data.n_consignacion)
		$("#cod_op_equipo").val(data.cod_op_equipo)
		$('input[name=aspecto_exterior][value='+data.aspecto_exterior+']').prop('checked',true);
		$('input[name=conexion_tierra][value='+data.conexion_tierra+']').prop('checked',true);
		$('input[name=presion_sf6][value='+data.presion_sf6+']').prop('checked',true);
		$('input[name=presion_hidraulica][value='+data.presion_hidraulica+']').prop('checked',true);
		$('input[name=estado_sistema_vacio][value='+data.estado_sistema_vacio+']').prop('checked',true);
		$('input[name=nivel_aceite][value='+data.nivel_aceite+']').prop('checked',true);
		$('input[name=resortes_operacion][value='+data.resortes_operacion+']').prop('checked',true);
		$('input[name=indicacion_visual][value='+data.indicacion_visual+']').prop('checked',true);
		$('input[name=indicacion_tab_local][value='+data.indicacion_tab_local+']').prop('checked',true);
		$('input[name=estado_polos][value='+data.estado_polos+']').prop('checked',true);
		$('input[name=veri_alimentacion_vdc][value='+data.veri_alimentacion_vdc+']').prop('checked',true);
		$("#anotacion_preliminar").val(data.anotacion_preliminar)
		$('input[name=empaques][value='+data.empaques+']').prop('checked',true);
		$('input[name=chapas][value='+data.chapas+']').prop('checked',true);
		$('input[name=visagras][value='+data.visagras+']').prop('checked',true);
		$('input[name=cableado][value='+data.cableado+']').prop('checked',true);
		$('input[name=microswiches][value='+data.microswiches+']').prop('checked',true);
		$('input[name=contactores][value='+data.contactores+']').prop('checked',true);
		$('input[name=iluminacion][value='+data.iluminacion+']').prop('checked',true);
		$('input[name=calefaccion][value='+data.calefaccion+']').prop('checked',true);
		$('input[name=fusibles][value='+data.fusibles+']').prop('checked',true);
		$('input[name=borneras][value='+data.borneras+']').prop('checked',true);
		$('input[name=interruptores][value='+data.interruptores+']').prop('checked',true);
		$('input[name=motor_cambiador_tomas][value='+data.motor_cambiador_tomas+']').prop('checked',true);
		$('input[name=motor_accionamiento][value='+data.motor_accionamiento+']').prop('checked',true);
		$('input[name=estado_cableado][value='+data.estado_cableado+']').prop('checked',true);
		$("#anotacion_caja_control").val(data.anotacion_caja_control)
		$("#observacion").val(data.observacion)
		$("#responsable").val(data.responsable)
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
