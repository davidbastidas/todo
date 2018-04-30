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
			'<a href="'.$nameProyect.'/rtc/index">RTC</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Informes</li>'.
	'</ul>'.
'</div>';
$json = json_decode($odt->json, true);
$size = count($json['table_materiales_epp']);

$sizeDesmontado = count($json['table_equipos_desmontados']);
?>
<div class="page-header">
	<h1>
		Informe Rtc
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Materiales, Equipos &amp; Jornadas
		</small>
	</h1>
</div>
<div id="info"></div>
<div class="row-fluid">
	<div class="span12">
		<h4>Jornada Laboral</h4>
		<hr>
		<div id="jornada_laboral">

		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span6">
		<h4>Equipos Instalados</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Equipo</th>
					<th>Serial</th>
				</tr>
			</thead>

			<tbody>
			<?php
			for ($i = 0; $i < $size; $i++) {
				if($json['table_materiales_epp'][$i]['equipo_instalado'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_instalado'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_instalado_serial'] ?>
						</td>
					</tr>
				<?php
				}
			} ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
	</div>
</div>
<div class="row-fluid">
	<div class="span6">
		<h4>Herramientas Epp</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Herrameinta</th>
					<th>Estado</th>
					<th>Cantidad</th>
				</tr>
			</thead>

			<tbody>
			<?php
			for ($i = 0; $i < $size; $i++) {
				if($json['table_materiales_epp'][$i]['herramientas_epp'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['herramientas_epp'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['herramientas_epp_estado'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['herramientas_epp_cantidad'] ?>
						</td>
					</tr>
				<?php
				}
			} ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<h4>Equipo de prueba</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Equipo</th>
					<th>Serial</th>
					<th>Cantidad</th>
				</tr>
			</thead>

			<tbody>
			<?php
			for ($i = 0; $i < $size; $i++) {
				if($json['table_materiales_epp'][$i]['equipo_prueba'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_prueba'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_prueba_serial'] ?>
						</td>
						<td>
							<?php echo $json['table_materiales_epp'][$i]['equipo_prueba_cantidad'] ?>
						</td>
					</tr>
				<?php
				}
			} ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<h4>Equipo Desmontado</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Equipo</th>
					<th>Serial</th>
				</tr>
			</thead>

			<tbody>
			<?php
			for ($i = 0; $i < $size; $i++) {
				if($json['table_equipos_desmontados'][$i]['equipo_desmontado'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['equipo_desmontado'] ?>
						</td>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['equipo_desmontado_serial'] ?>
						</td>
					</tr>
				<?php
				}
			} ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<h4>Materiales Insumos</h4>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Material</th>
					<th>Unidad</th>
					<th>Cantidad</th>
				</tr>
			</thead>

			<tbody>
			<?php
			for ($i = 0; $i < $size; $i++) {
				if($json['table_equipos_desmontados'][$i]['materiales_insumos'] != ''){?>
					<tr>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['materiales_insumos'] ?>
						</td>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['materiales_insumos_unidad'] ?>
						</td>
						<td>
							<?php echo $json['table_equipos_desmontados'][$i]['materiales_insumos_cantidad'] ?>
						</td>
					</tr>
				<?php
				}
			} ?>
			</tbody>
		</table>
	</div>
</div>

<div class="space"></div>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/moment/moment.js"></script>
<script>
<?php
$horario = $odt->fk_brigada_fk->horario;
if($horario == 'ORDINARIO 7:00 A 17:00'){
	$hora_inicio = '07:00:00';
	$hora_fin = '17:00:00';
}

?>
var inicio_nocturno='21:00:00';
var fin_nocturno='05:59:00';
var inicio_diurno='06:00:00';
var fin_diurno='20:59:00';
var hora_inicio='';
var hora_fin='';
var tiempo_diurna='';
var tiempo_nocturno='';
var tiempo_diurna2=0;
var tiempo_nocturno2=0;
var hora24='24:00';
var hora00='00:00';
function calcularHorasDiurnasNocturnas(){
	var jornada=moment.utc('<?php echo $hora_inicio; ?>', "hh:mm");
	hora_inicio=moment.utc('<?php echo $hora_inicio; ?>', "hh:mm");
	hora_fin=moment.utc('<?php echo $hora_fin; ?>', "hh:mm");
	inicio_nocturno=moment.utc(inicio_nocturno, "hh:mm");
	fin_nocturno=moment.utc(fin_nocturno, "hh:mm");
	inicio_diurno=moment.utc(inicio_diurno, "hh:mm");
	fin_diurno=moment.utc(fin_diurno, "hh:mm");
	tiempo_nocturno=moment.utc('00:00', "hh-mm")
	tiempo_diurna=moment.utc('00:00', "hh-mm")
	hora00=moment.utc(hora00, "hh:mm");
	hora24=moment.utc(hora24, "hh:mm");
	var hi=hora_inicio;//.hour();
	//console.log(hi)
	var hf=hora_fin;//.hour();
	//console.log(hf)
	var muere=false;
	if (hi.isSameOrAfter(hora00) && hi.isBefore(inicio_diurno)) {// desde las 00 a las 06
		if (hf.isSameOrAfter(hora00) && hf.isBefore(inicio_diurno) && hi.isBefore(hf)) {
			tiempo_nocturno2=hora_inicio.diff(hora_fin);
			tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
				.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
			//console.log("+N 0-6= "+tiempo_nocturno.format("HH:mm"))
			muere=true;
		}else{
			tiempo_nocturno2=hora_inicio.diff(inicio_diurno);
			tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
				.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
			//console.log("+N 0-6= "+tiempo_nocturno.format("HH:mm"))
		}
	}else if (hi.isSameOrAfter(inicio_diurno) && hi.isBefore(inicio_nocturno)) {// desde las 06 hasta las 21
		if (hf.isSameOrAfter(inicio_diurno) && hf.isBefore(inicio_nocturno) && hi.isBefore(hf)) {
			tiempo_diurna2=hora_inicio.diff(hora_fin);
			tiempo_diurna.add(0+Math.abs(moment.duration(tiempo_diurna2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_diurna2).minutes()), 'minutes');
			//console.log("+D 6= "+tiempo_diurna.format("HH:mm"))
			muere=true;
		}else{
			tiempo_diurna2=hora_inicio.diff(inicio_nocturno);
			tiempo_diurna.add(0+Math.abs(moment.duration(tiempo_diurna2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_diurna2).minutes()), 'minutes');
			//console.log("+D 6= "+tiempo_diurna.format("HH:mm"))
		}
	}else if (hi.isSameOrAfter(inicio_nocturno) && hi.isBefore(hora24)) {// desde las 21 a las 00
		if(hf.isSameOrAfter(inicio_nocturno) && hf.isBefore(hora24) && hi.isBefore(hf)){
			tiempo_nocturno2=hora_inicio.diff(hora_fin);
			tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
			muere=true;
			//console.log("+N 22= "+tiempo_nocturno.format("HH:mm"))
		}else{
			tiempo_nocturno2=hora_inicio.diff(hora24);
			tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
			//console.log("+N 22= "+tiempo_nocturno.format("HH:mm"))
		}
	}
	//buscando la hora final
	if (!muere) {
		if (hf.isSameOrAfter(hora00) && hf.isBefore(inicio_diurno)) {// desde las 00 a las 06
			if(hi.isSameOrAfter(hora00) && hi.isBefore(inicio_diurno)){
				//sumar diurno y de 21 a 24
				tiempo_diurna2=inicio_diurno.diff(inicio_nocturno);
				tiempo_diurna.add(0+Math.abs(moment.duration(tiempo_diurna2).hours()), 'hours')
						.add(0+Math.abs(moment.duration(tiempo_diurna2).minutes()), 'minutes');
				//console.log("+D muere 0-6= "+tiempo_diurna.format("HH:mm"))
				tiempo_nocturno2=inicio_nocturno.diff(hora24);
				tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
				//console.log("+N muere 0-6= "+tiempo_nocturno.format("HH:mm"))
			}else if(hi.isSameOrAfter(inicio_diurno) && hi.isBefore(inicio_nocturno)){
				//sumar de 22 a 24
				tiempo_nocturno2=inicio_nocturno.diff(hora24);
				tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
				//console.log("+N muere 0-6= "+tiempo_nocturno.format("HH:mm"))
			}
			tiempo_nocturno2=hora00.diff(hora_fin);
			tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
				.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
			//console.log("+N muere 0-6= "+tiempo_nocturno.format("HH:mm"))
		}else if (hf.isSameOrAfter(inicio_diurno) && hf.isBefore(inicio_nocturno)) {//desde las 06 a las 21
			if(hi.isSameOrAfter(inicio_diurno) && hi.isBefore(inicio_nocturno)){
				//sumar de 22 a 24 y de 0 a 6
				tiempo_nocturno2=inicio_nocturno.diff(hora24);
				tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
				//console.log("+N muere 6-22= "+tiempo_nocturno.format("HH:mm"))
				tiempo_nocturno2=hora00.diff(inicio_diurno);
				tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
				//console.log("+N muere 6-22= "+tiempo_nocturno.format("HH:mm"))
			}else if(hi.isSameOrAfter(inicio_nocturno) && hi.isBefore(hora24)){
				//sumar de 0 a 6
				tiempo_nocturno2=hora00.diff(inicio_diurno);
				tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
				//console.log("+N muere 6-22= "+tiempo_nocturno.format("HH:mm"))
			}
			tiempo_diurna2=inicio_diurno.diff(hora_fin);
			tiempo_diurna.add(0+Math.abs(moment.duration(tiempo_diurna2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_diurna2).minutes()), 'minutes');
			//console.log("+D muere 6-22= "+tiempo_diurna.format("HH:mm"))
		}else if (hf.isSameOrAfter(inicio_nocturno) && hf.isBefore(hora24)) {//desde las 21 a las 00
			if(hi.isSameOrAfter(inicio_nocturno) && hi.isBefore(hora24)){
				//sumar de 0 a 6 y sumar diurno
				tiempo_nocturno2=hora00.diff(inicio_diurno);
				tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
					.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
				//console.log("+N muere 22-24= "+tiempo_nocturno.format("HH:mm"))
				tiempo_diurna2=inicio_diurno.diff(inicio_nocturno);
				tiempo_diurna.add(0+Math.abs(moment.duration(tiempo_diurna2).hours()), 'hours')
						.add(0+Math.abs(moment.duration(tiempo_diurna2).minutes()), 'minutes');
				//console.log("+D muere 22-24= "+tiempo_diurna.format("HH:mm"))
			}else if(hi.isSameOrAfter(hora00) && hi.isBefore(inicio_diurno)){
				// sumar diurno
				tiempo_diurna2=inicio_diurno.diff(inicio_nocturno);
				tiempo_diurna.add(0+Math.abs(moment.duration(tiempo_diurna2).hours()), 'hours')
						.add(0+Math.abs(moment.duration(tiempo_diurna2).minutes()), 'minutes');
				//console.log("+D muere 22-24= "+tiempo_diurna.format("HH:mm"))
			}
			tiempo_nocturno2=inicio_nocturno.diff(hora_fin);
			tiempo_nocturno.add(0+Math.abs(moment.duration(tiempo_nocturno2).hours()), 'hours')
				.add(0+Math.abs(moment.duration(tiempo_nocturno2).minutes()), 'minutes');
			//console.log("+N muere 22= "+tiempo_nocturno.format("HH:mm"))
		}
	}
	//rectificacion por reseteo de calculos hasta 24 horas
	if (jornada.isSame(hora00) && (hi.duration().asMinutes()-hf.duration().asMinutes())==0) {
		tiempo_nocturno=moment.utc('00:00', "hh-mm")
		tiempo_diurna=moment.utc('00:00', "hh-mm")
		tiempo_nocturno.add(8, 'hours')
				.add(0, 'minutes');
		tiempo_diurna.add(16, 'hours')
				.add(0, 'minutes');
	}
	console.log("D= "+tiempo_diurna.format("HH:mm"));
	console.log("N= "+tiempo_nocturno.format("HH:mm"));
}

calcularHorasDiurnasNocturnas();
</script>
