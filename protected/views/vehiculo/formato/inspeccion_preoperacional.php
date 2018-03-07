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
			'<a href="'.$nameProyect.'/Vehiculo/formatos">Formato Vehiculos</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Inspección Pararayo</li>'.
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
			 INSPECCIÓN PREOPERACIONAL
		</h3>
		<table class="table table-bordered">
			<tr>
				<td colspan="4">1. Datos del Vehículo</td>
			</tr>
			<tr>
				<td>
					<label>Placa:</label>
					<input id="placa" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Marca:</label>
					<input id="marca" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Linea:</label>
					<input id="linea" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Modelo:</label>
					<input id="modelo" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td colspan="4">2. Documentación</td>
			</tr>
			<tr>
				<td>
					<label>Tarjeta Propiedad:</label>
					<select id="tarjeta_propiedad">
						<option value="">[Elegir]</option>
						<option value="vigente">Vigente</option>
						<option value="no_vigente">No Vigente</option>
					</select>
				</td>
				<td>
					<label>Tarjeta Tarjeta/carta de operación:</label>
					<select id="tarjeta_operacion">
						<option value="">[Elegir]</option>
						<option value="vigente">Vigente</option>
						<option value="no_vigente">No Vigente</option>
					</select>
				</td>
				<td colspan="2" class="center">
					<label>GPS:</label>
					<input id="gps" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Certificado de Gases:</label>
					<select id="certificado_gases">
						<option value="">[Elegir]</option>
						<option value="vigente">Vigente</option>
						<option value="no_vigente">No Vigente</option>
					</select>
				</td>
				<td>
					<label>Seguro Obligatorio:</label>
					<select id="seguro_obligatorio">
						<option value="">[Elegir]</option>
						<option value="vigente">Vigente</option>
						<option value="no_vigente">No Vigente</option>
					</select>
				</td>
				<td colspan="2" class="center">
					<label>Póliza Extracontractual:</label>
					<select id="poliza_extracontractual">
						<option value="">[Elegir]</option>
						<option value="vigente">Vigente</option>
						<option value="no_vigente">No Vigente</option>
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="4">3. Estado Latonería - Carrocería exteriores.</td>
			</tr>
			<tr>
				<td>
					<label>Kilometraje inicial:</label>
					<input id="kilometraje_inicial" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Kilometraje final:</label>
					<input id="kilometraje_final" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Proyecto :</label>
					<input id="proyecto" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Ciudad :</label>
					<input id="ciudad" type="text" maxlength="10"/>
				</td>
			</tr>
		</table>
		
		<table class="table table-bordered" style="font-size:10px;">
			<tr>
				<th>ITEM A INSPECCIONAR</th>
				<th>C</th>
				<th>NC</th>
				<th>NA</th>
			</tr>
			<tr>
				<th colspan="4" class="center">4. Estado General del Vehículo</th>
			</tr>
			<tr>
				<td>Ajuste puertas cabina y cerradura</td>
				<td>
					<label>
						<input name="ajuste_puerta_cabina" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="ajuste_puerta_cabina" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="ajuste_puerta_cabina" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado general vidrios y elevavidrios</td>
				<td>
					<label>
						<input name="est_gen_vidrios_eleva" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_gen_vidrios_eleva" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_gen_vidrios_eleva" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Cojinería y asientos</td>
				<td>
					<label>
						<input name="cojineria_asientos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="cojineria_asientos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="cojineria_asientos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado del vidrio frontal</td>
				<td>
					<label>
						<input name="estado_vidrio_frontal" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_vidrio_frontal" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_vidrio_frontal" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Espejos interiore/ exteriores</td>
				<td>
					<label>
						<input name="espejo_interior_exterior" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="espejo_interior_exterior" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="espejo_interior_exterior" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado general de llantas</td>
				<td>
					<label>
						<input name="estado_llantas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_llantas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="estado_llantas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Tapa capó motor y  trasera</td>
				<td>
					<label>
						<input name="tapa_capo_motor_trasera" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tapa_capo_motor_trasera" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="tapa_capo_motor_trasera" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th colspan="4" class="center">5. Estado Mecánico del Vehículo</th>
			</tr>
			<tr>
				<td>Nivel aceite motor</td>
				<td>
					<label>
						<input name="nivel_aceite_motor" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_motor" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_motor" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel aceite dirección hidráulica</td>
				<td>
					<label>
						<input name="nivel_aceite_direccion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_direccion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_aceite_direccion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Funcionamiento de frenos</td>
				<td>
					<label>
						<input name="func_frenos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_frenos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_frenos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Funcionamiento acelerador</td>
				<td>
					<label>
						<input name="func_acelerador" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_acelerador" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_acelerador" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel líquido refrigerante</td>
				<td>
					<label>
						<input name="nivel_liq_refrigerante" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_refrigerante" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_refrigerante" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel líquido de frenos</td>
				<td>
					<label>
						<input name="nivel_liq_freno" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_freno" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_freno" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Funcionamiento freno de seguridad</td>
				<td>
					<label>
						<input name="func_freno_seguridad" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_freno_seguridad" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_freno_seguridad" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Funcionamiento dirección</td>
				<td>
					<label>
						<input name="func_direccion" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_direccion" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_direccion" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel líquido de embrague</td>
				<td>
					<label>
						<input name="nivel_liq_embrague" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_embrague" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_liq_embrague" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Nivel de electrolito y carga de batería</td>
				<td>
					<label>
						<input name="nivel_electrolito_bat" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_electrolito_bat" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="nivel_electrolito_bat" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Funcionamiento embrague</td>
				<td>
					<label>
						<input name="func_embrague" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_embrague" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="func_embrague" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Limpieza del motor</td>
				<td>
					<label>
						<input name="limpieza_motor" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_motor" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpieza_motor" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<th colspan="4" class="center">6. Estado de sistemas y accesorios del vehículo</th>
			</tr>
			<tr>
				<td>Luces altas y bajas</td>
				<td>
					<label>
						<input name="luces_altas_bajas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_altas_bajas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_altas_bajas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Luces de parqueo - direccionales</td>
				<td>
					<label>
						<input name="luces_direccionales" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_direccionales" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_direccionales" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Luces traseras, reversa y freno</td>
				<td>
					<label>
						<input name="luces_traseras" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_traseras" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_traseras" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Luz tablero de instrumentos</td>
				<td>
					<label>
						<input name="luces_tablero_inst" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_tablero_inst" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="luces_tablero_inst" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td> Velocímetro - Odómetro</td>
				<td>
					<label>
						<input name="velocimentro_odometro" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="velocimentro_odometro" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="velocimentro_odometro" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Radio - Carita- antena -parlantes</td>
				<td>
					<label>
						<input name="radio_carita_antena_parlantes" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="radio_carita_antena_parlantes" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="radio_carita_antena_parlantes" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Limpia y lava parabrisas</td>
				<td>
					<label>
						<input name="limpia_parabrisas" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpia_parabrisas" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="limpia_parabrisas" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Cinturones de seguridad</td>
				<td>
					<label>
						<input name="cinturon_seguridad" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="cinturon_seguridad" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="cinturon_seguridad" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Aire acondicionado / Ventilador</td>
				<td>
					<label>
						<input name="aire_acondicionado" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aire_acondicionado" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="aire_acondicionado" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Pito</td>
				<td>
					<label>
						<input name="pito" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="pito" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="pito" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Gato, Cruceta y taco.</td>
				<td>
					<label>
						<input name="gato_cruceta_taco" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="gato_cruceta_taco" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="gato_cruceta_taco" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Kit de herramienta</td>
				<td>
					<label>
						<input name="kit_herramienta" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="kit_herramienta" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="kit_herramienta" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Triángulos de señalización/ Conos</td>
				<td>
					<label>
						<input name="senalizacion_conos" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="senalizacion_conos" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="senalizacion_conos" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Botiquín</td>
				<td>
					<label>
						<input name="botiquin" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="botiquin" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="botiquin" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Estado llanta y rin de repuesto</td>
				<td>
					<label>
						<input name="est_llanta_rin_repuesto" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_llanta_rin_repuesto" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="est_llanta_rin_repuesto" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Alarma de reversa</td>
				<td>
					<label>
						<input name="alarma_reversa" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="alarma_reversa" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="alarma_reversa" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Extintor de 10 Lbs</td>
				<td>
					<label>
						<input name="extintor_10_lb" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="extintor_10_lb" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="extintor_10_lb" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td>Barra antivolco</td>
				<td>
					<label>
						<input name="barra_antivolco" type="radio" value="bueno">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="barra_antivolco" type="radio" value="regular">
						<span class="lbl"></span>
					</label>
				</td>
				<td>
					<label>
						<input name="barra_antivolco" type="radio" value="malo">
						<span class="lbl"></span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<label>Firma Inspector:</label>
					<select id="inspector">
						<option value="">[Elegir]</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<label>Firma Conductor:</label>
					<select id="conductor">
						<option value="">[Elegir]</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">Vehiculo puede operar:</td>
				<td>
					<label>
						<input name="puede_operar" type="radio" value="si">
						<span class="lbl">SI</span>
					</label>
				</td>
				<td>
					<label>
						<input name="puede_operar" type="radio" value="no">
						<span class="lbl">NO</span>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<label>Restriccion:</label>
					<textarea class="span12 limited" id="restriccion" data-maxlength="50" rows="1"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<label>8. Observaciones</label>
					<textarea class="span12 limited" id="observaciones" data-maxlength="100" rows="1"></textarea>
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
		  '"placa": "'+$("#placa").val()+'",'+
		  '"marca": "'+$("#marca").val()+'",'+
		  '"linea": "'+$("#linea").val()+'",'+
		  '"modelo": "'+$("#modelo").val()+'",'+
		  '"tarjeta_propiedad": "'+$("#tarjeta_propiedad").val()+'",'+
		  '"tarjeta_operacion": "'+$("#tarjeta_operacion").val()+'",'+
		  '"gps": "'+$("#gps").val()+'",'+
		  '"certificado_gases": "'+$("#certificado_gases").val()+'",'+
		  '"seguro_obligatorio": "'+$("#seguro_obligatorio").val()+'",'+
		  '"poliza_extracontractual": "'+$("#poliza_extracontractual").val()+'",'+

		  '"kilometraje_inicial": "'+$("#kilometraje_inicial").val()+'",'+
		  '"kilometraje_final": "'+$("#kilometraje_final").val()+'",'+
		  '"proyecto": "'+$("#proyecto").val()+'",'+
		  '"ciudad": "'+$("#ciudad").val()+'",'+


		  '"ajuste_puerta_cabina": "'+$('input[name=ajuste_puerta_cabina]:checked').val()+'",'+
		  '"est_gen_vidrios_eleva": "'+$('input[name=est_gen_vidrios_eleva]:checked').val()+'",'+
		  '"cojineria_asientos": "'+$('input[name=cojineria_asientos]:checked').val()+'",'+
		  '"estado_vidrio_frontal": "'+$('input[name=estado_vidrio_frontal]:checked').val()+'",'+
		  '"espejo_interior_exterior": "'+$('input[name=espejo_interior_exterior]:checked').val()+'",'+
		  '"estado_llantas": "'+$('input[name=estado_llantas]:checked').val()+'",'+
		  '"tapa_capo_motor_trasera": "'+$('input[name=tapa_capo_motor_trasera]:checked').val()+'",'+

		  '"nivel_aceite_motor": "'+$('input[name=nivel_aceite_motor]:checked').val()+'",'+
		  '"nivel_aceite_direccion": "'+$('input[name=nivel_aceite_direccion]:checked').val()+'",'+
		  '"func_frenos": "'+$('input[name=func_frenos]:checked').val()+'",'+
		  '"func_acelerador": "'+$('input[name=func_acelerador]:checked').val()+'",'+
		  '"nivel_liq_refrigerante": "'+$('input[name=nivel_liq_refrigerante]:checked').val()+'",'+
		  '"nivel_liq_freno": "'+$('input[name=nivel_liq_freno]:checked').val()+'",'+
		  '"func_freno_seguridad": "'+$('input[name=func_freno_seguridad]:checked').val()+'",'+
		  '"func_direccion": "'+$('input[name=func_direccion]:checked').val()+'",'+
		  '"nivel_liq_embrague": "'+$('input[name=nivel_liq_embrague]:checked').val()+'",'+
		  '"nivel_electrolito_bat": "'+$('input[name=nivel_electrolito_bat]:checked').val()+'",'+
		  '"func_embrague": "'+$('input[name=func_embrague]:checked').val()+'",'+
		  '"limpieza_motor": "'+$('input[name=limpieza_motor]:checked').val()+'",'+

		  '"luces_altas_bajas": "'+$('input[name=luces_altas_bajas]:checked').val()+'",'+
		  '"luces_direccionales": "'+$('input[name=luces_direccionales]:checked').val()+'",'+
		  '"luces_traseras": "'+$('input[name=luces_traseras]:checked').val()+'",'+
		  '"luces_tablero_inst": "'+$('input[name=luces_tablero_inst]:checked').val()+'",'+
		  '"velocimentro_odometro": "'+$('input[name=velocimentro_odometro]:checked').val()+'",'+
		  '"radio_carita_antena_parlantes": "'+$('input[name=radio_carita_antena_parlantes]:checked').val()+'",'+
		  '"limpia_parabrisas": "'+$('input[name=limpia_parabrisas]:checked').val()+'",'+
		  '"cinturon_seguridad": "'+$('input[name=cinturon_seguridad]:checked').val()+'",'+
		  '"aire_acondicionado": "'+$('input[name=aire_acondicionado]:checked').val()+'",'+
		  '"pito": "'+$('input[name=pito]:checked').val()+'",'+
		  '"gato_cruceta_taco": "'+$('input[name=gato_cruceta_taco]:checked').val()+'",'+
		  '"kit_herramienta": "'+$('input[name=kit_herramienta]:checked').val()+'",'+
		  '"senalizacion_conos": "'+$('input[name=senalizacion_conos]:checked').val()+'",'+
		  '"botiquin": "'+$('input[name=botiquin]:checked').val()+'",'+
		  '"est_llanta_rin_repuesto": "'+$('input[name=est_llanta_rin_repuesto]:checked').val()+'",'+
		  '"alarma_reversa": "'+$('input[name=alarma_reversa]:checked').val()+'",'+
		  '"extintor_10_lb": "'+$('input[name=extintor_10_lb]:checked').val()+'",'+
		  '"barra_antivolco": "'+$('input[name=barra_antivolco]:checked').val()+'",'+

		  '"inspector": "'+$("#inspector").val()+'",'+
		  '"conductor": "'+$("#conductor").val()+'",'+
		  '"puede_operar": "'+$('input[name=puede_operar]:checked').val()+'",'+

		  '"restriccion": "'+$("#restriccion").val()+'",'+
		  '"observaciones": "'+$("#observaciones").val()+'"'
		  ;

	json+='}';
	//console.log(json);
	$.ajax({
        url:"<?php echo $nameProyect?>/Vehiculo/ActualizarFormato",
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
        		location.href="<?php echo $nameProyect?>/vehiculo/formatos";
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
		$("#placa").val(data.placa)
		$("#marca").val(data.marca)
		$("#linea").val(data.linea)
		$("#modelo").val(data.modelo)
		$("#tarjeta_propiedad").val(data.tarjeta_propiedad)
		$("#tarjeta_operacion").val(data.tarjeta_operacion)
		$("#gps").val(data.gps)
		$("#certificado_gases").val(data.certificado_gases)
		$("#seguro_obligatorio").val(data.seguro_obligatorio)
		$("#poliza_extracontractual").val(data.poliza_extracontractual)
		$("#kilometraje_inicial").val(data.kilometraje_inicial)
		$("#kilometraje_final").val(data.kilometraje_final)
		$("#proyecto").val(data.proyecto)
		$("#ciudad").val(data.ciudad)

		$('input[name=ajuste_puerta_cabina][value='+data.ajuste_puerta_cabina+']').prop('checked',true);
		$('input[name=est_gen_vidrios_eleva][value='+data.est_gen_vidrios_eleva+']').prop('checked',true);
		$('input[name=cojineria_asientos][value='+data.cojineria_asientos+']').prop('checked',true);
		$('input[name=estado_vidrio_frontal][value='+data.estado_vidrio_frontal+']').prop('checked',true);
		$('input[name=espejo_interior_exterior][value='+data.espejo_interior_exterior+']').prop('checked',true);
		$('input[name=estado_llantas][value='+data.estado_llantas+']').prop('checked',true);
		$('input[name=tapa_capo_motor_trasera][value='+data.tapa_capo_motor_trasera+']').prop('checked',true);
		$('input[name=nivel_aceite_motor][value='+data.nivel_aceite_motor+']').prop('checked',true);
		$('input[name=nivel_aceite_direccion][value='+data.nivel_aceite_direccion+']').prop('checked',true);
		$('input[name=func_frenos][value='+data.func_frenos+']').prop('checked',true);
		$('input[name=func_acelerador][value='+data.func_acelerador+']').prop('checked',true);
		$('input[name=nivel_liq_refrigerante][value='+data.nivel_liq_refrigerante+']').prop('checked',true);
		$('input[name=nivel_liq_freno][value='+data.nivel_liq_freno+']').prop('checked',true);
		$('input[name=func_freno_seguridad][value='+data.func_freno_seguridad+']').prop('checked',true);
		$('input[name=func_direccion][value='+data.func_direccion+']').prop('checked',true);
		$('input[name=nivel_liq_embrague][value='+data.nivel_liq_embrague+']').prop('checked',true);
		$('input[name=nivel_electrolito_bat][value='+data.nivel_electrolito_bat+']').prop('checked',true);
		$('input[name=func_embrague][value='+data.func_embrague+']').prop('checked',true);
		$('input[name=limpieza_motor][value='+data.limpieza_motor+']').prop('checked',true);
		$('input[name=luces_altas_bajas][value='+data.luces_altas_bajas+']').prop('checked',true);
		$('input[name=luces_direccionales][value='+data.luces_direccionales+']').prop('checked',true);
		$('input[name=luces_traseras][value='+data.luces_traseras+']').prop('checked',true);
		$('input[name=luces_tablero_inst][value='+data.luces_tablero_inst+']').prop('checked',true);
		$('input[name=velocimentro_odometro][value='+data.velocimentro_odometro+']').prop('checked',true);
		$('input[name=radio_carita_antena_parlantes][value='+data.radio_carita_antena_parlantes+']').prop('checked',true);
		$('input[name=limpia_parabrisas][value='+data.limpia_parabrisas+']').prop('checked',true);
		$('input[name=cinturon_seguridad][value='+data.cinturon_seguridad+']').prop('checked',true);
		$('input[name=aire_acondicionado][value='+data.aire_acondicionado+']').prop('checked',true);
		$('input[name=pito][value='+data.pito+']').prop('checked',true);
		$('input[name=gato_cruceta_taco][value='+data.gato_cruceta_taco+']').prop('checked',true);
		$('input[name=kit_herramienta][value='+data.kit_herramienta+']').prop('checked',true);
		$('input[name=senalizacion_conos][value='+data.senalizacion_conos+']').prop('checked',true);
		$('input[name=botiquin][value='+data.botiquin+']').prop('checked',true);
		$('input[name=est_llanta_rin_repuesto][value='+data.est_llanta_rin_repuesto+']').prop('checked',true);
		$('input[name=alarma_reversa][value='+data.alarma_reversa+']').prop('checked',true);
		$('input[name=extintor_10_lb][value='+data.extintor_10_lb+']').prop('checked',true);
		$('input[name=barra_antivolco][value='+data.barra_antivolco+']').prop('checked',true);

		$("#inspector").val(data.inspector)
		$("#conductor").val(data.conductor)
		$('input[name=puede_operar][value='+data.puede_operar+']').prop('checked',true);
		
		$("#restriccion").val(data.restriccion)
		$("#observaciones").val(data.observaciones)
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
