<?php
$json_equipo = json_decode( $equipo->datosjson, true );
$nombre_equipo="";
if(isset($json_equipo['nombre_eq'])){
	$nombre_equipo=$json_equipo['nombre_eq'];
}
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
		'<li>Graficos Equipo '.$nombre_equipo.'</li>'.
	'</ul>'.
'</div>';

?>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.sparkline.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/flot/jquery.flot.min.js"></script>
<script type="text/javascript">
$(function() {
	$('#chartfp1,#chartfp2,#chartfp3,#chartfp4,#chartfp5,#chartfp6,#chartfp7,#chartfp8,#chartfp9').css({'width':'100%' , 'height':'220px'});
	$('#chartcap1,#chartcap2,#chartcap3,#chartcap4,#chartcap5,#chartcap6,#chartcap7,#chartcap8,#chartcap9').css({'width':'100%' , 'height':'220px'});
	$('#chart_bu_fp1,#chart_bu_fp2,#chart_bu_fp3,#chart_bu_fp4,#chart_bu_fp5,#chart_bu_fp6,#chart_bu_fp7,#chart_bu_fp8,#chart_bu_fp9,#chart_bu_fp10,#chart_bu_fp11,#chart_bu_fp12').css({'width':'100%' , 'height':'220px'});
	$('#chart_bu_cap1,#chart_bu_cap2,#chart_bu_cap3,#chart_bu_cap4,#chart_bu_cap5,#chart_bu_cap6,#chart_bu_cap7,#chart_bu_cap8,#chart_bu_cap9,#chart_bu_cap10,#chart_bu_cap11,#chart_bu_cap12').css({'width':'100%' , 'height':'220px'});
	$('#chart_ais1,#chart_ais2,#chart_ais3,#chart_ais4,#chart_ais5,#chart_ais6').css({'width':'100%' , 'height':'220px'});
	var min=0; var max=0;
	var min_aux=0; var max_aux=0;
	<?php if($equipo->devanados==2){?>
		
		
		var json_td2=JSON.parse('<?php echo $json_td2 ?>');
		// grafico 1
		var coor_line1_fp_gf1=[];
		for(var i in json_td2.td[0].fp[0].coordenadas){
		    coor_line1_fp_gf1.push([json_td2.td[0].fp[0].coordenadas[i]['x'], json_td2.td[0].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[0].fp[0].coordenadas).map(function(e) {return json_td2.td[0].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[0].fp[0].coordenadas).map(function(e) {return json_td2.td[0].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf1)

		var coor_line2_fp_gf1=[];
		for(var i in json_td2.td[0].fp[1].coordenadas){
		    coor_line2_fp_gf1.push([json_td2.td[0].fp[1].coordenadas[i]['x'], json_td2.td[0].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[0].fp[1].coordenadas).map(function(e) {return json_td2.td[0].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[0].fp[1].coordenadas).map(function(e) {return json_td2.td[0].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf1)
		crearChart('#chartfp1', 'FP V1', 'FP V2', coor_line1_fp_gf1, coor_line2_fp_gf1, min, max);

		min=0; max=0;
		var coor_line1_cap_gf1=[];
		for(var i in json_td2.td[0].cap[0].coordenadas){
		    coor_line1_cap_gf1.push([json_td2.td[0].cap[0].coordenadas[i]['x'], json_td2.td[0].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[0].cap[0].coordenadas).map(function(e) {return json_td2.td[0].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[0].cap[0].coordenadas).map(function(e) {return json_td2.td[0].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf1)

		var coor_line2_cap_gf1=[];
		for(var i in json_td2.td[0].cap[1].coordenadas){
		    coor_line2_cap_gf1.push([json_td2.td[0].cap[1].coordenadas[i]['x'], json_td2.td[0].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[0].cap[1].coordenadas).map(function(e) {return json_td2.td[0].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[0].cap[1].coordenadas).map(function(e) {return json_td2.td[0].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf1)
		crearChart('#chartcap1', 'CAP V1', 'CAP V2', coor_line1_cap_gf1, coor_line2_cap_gf1, min, max);
		

		// grafico 2
		min=0; max=0;
		var coor_line1_fp_gf2=[];
		for(var i in json_td2.td[1].fp[0].coordenadas){
		    coor_line1_fp_gf2.push([json_td2.td[1].fp[0].coordenadas[i]['x'], json_td2.td[1].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[1].fp[0].coordenadas).map(function(e) {return json_td2.td[1].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[1].fp[0].coordenadas).map(function(e) {return json_td2.td[1].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf2)

		var coor_line2_fp_gf2=[];
		for(var i in json_td2.td[1].fp[1].coordenadas){
		    coor_line2_fp_gf2.push([json_td2.td[1].fp[1].coordenadas[i]['x'], json_td2.td[1].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[1].fp[1].coordenadas).map(function(e) {return json_td2.td[1].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[1].fp[1].coordenadas).map(function(e) {return json_td2.td[1].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf2)
		crearChart('#chartfp2', 'FP V1', 'FP V2', coor_line1_fp_gf2, coor_line2_fp_gf2, min, max);

		min=0; max=0;
		var coor_line1_cap_gf2=[];
		for(var i in json_td2.td[1].cap[0].coordenadas){
		    coor_line1_cap_gf2.push([json_td2.td[1].cap[0].coordenadas[i]['x'], json_td2.td[1].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[1].cap[0].coordenadas).map(function(e) {return json_td2.td[1].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[1].cap[0].coordenadas).map(function(e) {return json_td2.td[1].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf2)

		var coor_line2_cap_gf2=[];
		for(var i in json_td2.td[1].cap[1].coordenadas){
		    coor_line2_cap_gf2.push([json_td2.td[1].cap[1].coordenadas[i]['x'], json_td2.td[1].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[1].cap[1].coordenadas).map(function(e) {return json_td2.td[1].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[1].cap[1].coordenadas).map(function(e) {return json_td2.td[1].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf2)
		crearChart('#chartcap2', 'CAP V1', 'CAP V2', coor_line1_cap_gf2, coor_line2_cap_gf2, min, max);
		
		// grafico 3
		min=0; max=0;
		var coor_line1_fp_gf3=[];
		for(var i in json_td2.td[2].fp[0].coordenadas){
		    coor_line1_fp_gf3.push([json_td2.td[2].fp[0].coordenadas[i]['x'], json_td2.td[2].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[2].fp[0].coordenadas).map(function(e) {return json_td2.td[2].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[2].fp[0].coordenadas).map(function(e) {return json_td2.td[2].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf3)

		var coor_line2_fp_gf3=[];
		for(var i in json_td2.td[2].fp[1].coordenadas){
		    coor_line2_fp_gf3.push([json_td2.td[2].fp[1].coordenadas[i]['x'], json_td2.td[2].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[2].fp[1].coordenadas).map(function(e) {return json_td2.td[2].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[2].fp[1].coordenadas).map(function(e) {return json_td2.td[2].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf3)
		crearChart('#chartfp3', 'FP V1', 'FP V2', coor_line1_fp_gf3, coor_line2_fp_gf3, min, max);
		

		min=0; max=0;
		var coor_line1_cap_gf3=[];
		for(var i in json_td2.td[2].cap[0].coordenadas){
		    coor_line1_cap_gf3.push([json_td2.td[2].cap[0].coordenadas[i]['x'], json_td2.td[2].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[2].cap[0].coordenadas).map(function(e) {return json_td2.td[2].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[2].cap[0].coordenadas).map(function(e) {return json_td2.td[2].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf3)

		var coor_line2_cap_gf3=[];
		for(var i in json_td2.td[2].cap[1].coordenadas){
		    coor_line2_cap_gf3.push([json_td2.td[2].cap[1].coordenadas[i]['x'], json_td2.td[2].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[2].cap[1].coordenadas).map(function(e) {return json_td2.td[2].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[2].cap[1].coordenadas).map(function(e) {return json_td2.td[2].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf3)
		crearChart('#chartcap3', 'CAP V1', 'CAP V2', coor_line1_cap_gf3, coor_line2_cap_gf3, min, max);
		

		// grafico 4
		min=0; max=0;
		var coor_line1_fp_gf4=[];
		for(var i in json_td2.td[3].fp[0].coordenadas){
		    coor_line1_fp_gf4.push([json_td2.td[3].fp[0].coordenadas[i]['x'], json_td2.td[3].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[3].fp[0].coordenadas).map(function(e) {return json_td2.td[3].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[3].fp[0].coordenadas).map(function(e) {return json_td2.td[3].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf4)

		var coor_line2_fp_gf4=[];
		for(var i in json_td2.td[3].fp[1].coordenadas){
		    coor_line2_fp_gf4.push([json_td2.td[3].fp[1].coordenadas[i]['x'], json_td2.td[3].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[3].fp[1].coordenadas).map(function(e) {return json_td2.td[3].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[3].fp[1].coordenadas).map(function(e) {return json_td2.td[3].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf4)
		crearChart('#chartfp4', 'FP V1', 'FP V2', coor_line1_fp_gf4, coor_line2_fp_gf4, min, max);

		min=0; max=0;
		var coor_line1_cap_gf4=[];
		for(var i in json_td2.td[3].cap[0].coordenadas){
		    coor_line1_cap_gf4.push([json_td2.td[3].cap[0].coordenadas[i]['x'], json_td2.td[3].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[3].cap[0].coordenadas).map(function(e) {return json_td2.td[3].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[3].cap[0].coordenadas).map(function(e) {return json_td2.td[3].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf4)

		var coor_line2_cap_gf4=[];
		for(var i in json_td2.td[3].cap[1].coordenadas){
		    coor_line2_cap_gf4.push([json_td2.td[3].cap[1].coordenadas[i]['x'], json_td2.td[3].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[3].cap[1].coordenadas).map(function(e) {return json_td2.td[3].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[3].cap[1].coordenadas).map(function(e) {return json_td2.td[3].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf4)
		crearChart('#chartcap4', 'CAP V1', 'CAP V2', coor_line1_cap_gf4, coor_line2_cap_gf4, min, max);
		

		// grafico 5
		min=0; max=0;
		var coor_line1_fp_gf5=[];
		for(var i in json_td2.td[4].fp[0].coordenadas){
		    coor_line1_fp_gf5.push([json_td2.td[4].fp[0].coordenadas[i]['x'], json_td2.td[4].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[4].fp[0].coordenadas).map(function(e) {return json_td2.td[4].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[4].fp[0].coordenadas).map(function(e) {return json_td2.td[4].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf5)

		var coor_line2_fp_gf5=[];
		for(var i in json_td2.td[4].fp[1].coordenadas){
		    coor_line2_fp_gf5.push([json_td2.td[4].fp[1].coordenadas[i]['x'], json_td2.td[4].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[4].fp[1].coordenadas).map(function(e) {return json_td2.td[4].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[4].fp[1].coordenadas).map(function(e) {return json_td2.td[4].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf5)
		crearChart('#chartfp5', 'FP V1', 'FP V2', coor_line1_fp_gf5, coor_line2_fp_gf5, min, max);
		
		min=0; max=0;
		var coor_line1_cap_gf5=[];
		for(var i in json_td2.td[4].cap[0].coordenadas){
		    coor_line1_cap_gf5.push([json_td2.td[4].cap[0].coordenadas[i]['x'], json_td2.td[4].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[4].cap[0].coordenadas).map(function(e) {return json_td2.td[4].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[4].cap[0].coordenadas).map(function(e) {return json_td2.td[4].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf5)

		var coor_line2_cap_gf5=[];
		for(var i in json_td2.td[4].cap[1].coordenadas){
		    coor_line2_cap_gf5.push([json_td2.td[4].cap[1].coordenadas[i]['x'], json_td2.td[4].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[4].cap[1].coordenadas).map(function(e) {return json_td2.td[4].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[4].cap[1].coordenadas).map(function(e) {return json_td2.td[4].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf5)
		crearChart('#chartcap5', 'CAP V1', 'CAP V2', coor_line1_cap_gf5, coor_line2_cap_gf5, min, max);
		

		// grafico 6
		var coor_line1_fp_gf6=[];
		min=0; max=0;
		for(var i in json_td2.td[5].fp[0].coordenadas){
		    coor_line1_fp_gf6.push([json_td2.td[5].fp[0].coordenadas[i]['x'], json_td2.td[5].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[5].fp[0].coordenadas).map(function(e) {return json_td2.td[5].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[5].fp[0].coordenadas).map(function(e) {return json_td2.td[5].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf6)

		var coor_line2_fp_gf6=[];
		for(var i in json_td2.td[5].fp[1].coordenadas){
		    coor_line2_fp_gf6.push([json_td2.td[5].fp[1].coordenadas[i]['x'], json_td2.td[5].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[5].fp[1].coordenadas).map(function(e) {return json_td2.td[5].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[5].fp[1].coordenadas).map(function(e) {return json_td2.td[5].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf6)
		crearChart('#chartfp6', 'FP V1', 'FP V2', coor_line1_fp_gf6, coor_line2_fp_gf6, min, max);
		
		min=0; max=0;
		var coor_line1_cap_gf6=[];
		for(var i in json_td2.td[5].cap[0].coordenadas){
		    coor_line1_cap_gf6.push([json_td2.td[5].cap[0].coordenadas[i]['x'], json_td2.td[5].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[5].cap[0].coordenadas).map(function(e) {return json_td2.td[5].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[5].cap[0].coordenadas).map(function(e) {return json_td2.td[5].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf6)

		var coor_line2_cap_gf6=[];
		for(var i in json_td2.td[5].cap[1].coordenadas){
		    coor_line2_cap_gf6.push([json_td2.td[5].cap[1].coordenadas[i]['x'], json_td2.td[5].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td2.td[5].cap[1].coordenadas).map(function(e) {return json_td2.td[5].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td2.td[5].cap[1].coordenadas).map(function(e) {return json_td2.td[5].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf6)
		crearChart('#chartcap6', 'CAP V1', 'CAP V2', coor_line1_cap_gf6, coor_line2_cap_gf6, min, max);
/************************************************************************************************************************************/
		var json_bu2=JSON.parse('<?php echo $json_bush2 ?>');
		// grafico 1 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf1=[];
		for(var i in json_bu2.bu[0].fp[0].coordenadas){
		    coor_line1_bu_fp_gf1.push([json_bu2.bu[0].fp[0].coordenadas[i]['x'], json_bu2.bu[0].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[0].fp[0].coordenadas).map(function(e) {return json_bu2.bu[0].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[0].fp[0].coordenadas).map(function(e) {return json_bu2.bu[0].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf1)

		var coor_line2_bu_fp_gf1=[];
		for(var i in json_bu2.bu[0].fp[1].coordenadas){
		    coor_line2_bu_fp_gf1.push([json_bu2.bu[0].fp[1].coordenadas[i]['x'], json_bu2.bu[0].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[0].fp[1].coordenadas).map(function(e) {return json_bu2.bu[0].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[0].fp[1].coordenadas).map(function(e) {return json_bu2.bu[0].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf1)
		crearChart('#chart_bu_fp1', 'C1', 'C2', coor_line1_bu_fp_gf1, coor_line2_bu_fp_gf1, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf1=[];
		for(var i in json_bu2.bu[0].cap[0].coordenadas){
		    coor_line1_bu_cap_gf1.push([json_bu2.bu[0].cap[0].coordenadas[i]['x'], json_bu2.bu[0].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[0].cap[0].coordenadas).map(function(e) {return json_bu2.bu[0].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[0].cap[0].coordenadas).map(function(e) {return json_bu2.bu[0].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf1)

		var coor_line2_bu_cap_gf1=[];
		for(var i in json_bu2.bu[0].cap[1].coordenadas){
		    coor_line2_bu_cap_gf1.push([json_bu2.bu[0].cap[1].coordenadas[i]['x'], json_bu2.bu[0].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[0].cap[1].coordenadas).map(function(e) {return json_bu2.bu[0].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[0].cap[1].coordenadas).map(function(e) {return json_bu2.bu[0].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf1)
		crearChart('#chart_bu_cap1', 'C1', 'C2', coor_line1_bu_cap_gf1, coor_line2_bu_cap_gf1, min, max);

		// grafico 2 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf2=[];
		for(var i in json_bu2.bu[1].fp[0].coordenadas){
		    coor_line1_bu_fp_gf2.push([json_bu2.bu[1].fp[0].coordenadas[i]['x'], json_bu2.bu[1].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[1].fp[0].coordenadas).map(function(e) {return json_bu2.bu[1].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[1].fp[0].coordenadas).map(function(e) {return json_bu2.bu[1].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf2)

		var coor_line2_bu_fp_gf2=[];
		for(var i in json_bu2.bu[1].fp[1].coordenadas){
		    coor_line2_bu_fp_gf2.push([json_bu2.bu[1].fp[1].coordenadas[i]['x'], json_bu2.bu[1].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[1].fp[1].coordenadas).map(function(e) {return json_bu2.bu[1].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[1].fp[1].coordenadas).map(function(e) {return json_bu2.bu[1].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf2)
		crearChart('#chart_bu_fp2', 'C1', 'C2', coor_line1_bu_fp_gf2, coor_line2_bu_fp_gf2, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf2=[];
		for(var i in json_bu2.bu[1].cap[0].coordenadas){
		    coor_line1_bu_cap_gf2.push([json_bu2.bu[1].cap[0].coordenadas[i]['x'], json_bu2.bu[1].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[1].cap[0].coordenadas).map(function(e) {return json_bu2.bu[1].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[1].cap[0].coordenadas).map(function(e) {return json_bu2.bu[1].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf2)

		var coor_line2_bu_cap_gf2=[];
		for(var i in json_bu2.bu[1].cap[1].coordenadas){
		    coor_line2_bu_cap_gf2.push([json_bu2.bu[1].cap[1].coordenadas[i]['x'], json_bu2.bu[1].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[1].cap[1].coordenadas).map(function(e) {return json_bu2.bu[1].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[1].cap[1].coordenadas).map(function(e) {return json_bu2.bu[1].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf2)
		crearChart('#chart_bu_cap2', 'C1', 'C2', coor_line1_bu_cap_gf2, coor_line2_bu_cap_gf2, min, max);

		// grafico 3 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf3=[];
		for(var i in json_bu2.bu[2].fp[0].coordenadas){
		    coor_line1_bu_fp_gf3.push([json_bu2.bu[2].fp[0].coordenadas[i]['x'], json_bu2.bu[2].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[2].fp[0].coordenadas).map(function(e) {return json_bu2.bu[2].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[2].fp[0].coordenadas).map(function(e) {return json_bu2.bu[2].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf3)

		var coor_line2_bu_fp_gf3=[];
		for(var i in json_bu2.bu[2].fp[1].coordenadas){
		    coor_line2_bu_fp_gf3.push([json_bu2.bu[2].fp[1].coordenadas[i]['x'], json_bu2.bu[2].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[2].fp[1].coordenadas).map(function(e) {return json_bu2.bu[2].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[2].fp[1].coordenadas).map(function(e) {return json_bu2.bu[2].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf3)
		crearChart('#chart_bu_fp3', 'C1', 'C2', coor_line1_bu_fp_gf3, coor_line2_bu_fp_gf3, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf3=[];
		for(var i in json_bu2.bu[2].cap[0].coordenadas){
		    coor_line1_bu_cap_gf3.push([json_bu2.bu[2].cap[0].coordenadas[i]['x'], json_bu2.bu[2].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[2].cap[0].coordenadas).map(function(e) {return json_bu2.bu[2].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[2].cap[0].coordenadas).map(function(e) {return json_bu2.bu[2].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf3)

		var coor_line2_bu_cap_gf3=[];
		for(var i in json_bu2.bu[2].cap[1].coordenadas){
		    coor_line2_bu_cap_gf3.push([json_bu2.bu[2].cap[1].coordenadas[i]['x'], json_bu2.bu[2].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[2].cap[1].coordenadas).map(function(e) {return json_bu2.bu[2].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[2].cap[1].coordenadas).map(function(e) {return json_bu2.bu[2].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf3)
		crearChart('#chart_bu_cap3', 'C1', 'C2', coor_line1_bu_cap_gf3, coor_line2_bu_cap_gf3, min, max);

		// grafico 4 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf4=[];
		for(var i in json_bu2.bu[3].fp[0].coordenadas){
		    coor_line1_bu_fp_gf4.push([json_bu2.bu[3].fp[0].coordenadas[i]['x'], json_bu2.bu[3].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[3].fp[0].coordenadas).map(function(e) {return json_bu2.bu[3].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[3].fp[0].coordenadas).map(function(e) {return json_bu2.bu[3].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf4)

		var coor_line2_bu_fp_gf4=[];
		for(var i in json_bu2.bu[3].fp[1].coordenadas){
		    coor_line2_bu_fp_gf4.push([json_bu2.bu[3].fp[1].coordenadas[i]['x'], json_bu2.bu[3].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[3].fp[1].coordenadas).map(function(e) {return json_bu2.bu[3].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[3].fp[1].coordenadas).map(function(e) {return json_bu2.bu[3].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf4)
		crearChart('#chart_bu_fp4', 'C1', 'C2', coor_line1_bu_fp_gf4, coor_line2_bu_fp_gf4, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf4=[];
		for(var i in json_bu2.bu[3].cap[0].coordenadas){
		    coor_line1_bu_cap_gf4.push([json_bu2.bu[3].cap[0].coordenadas[i]['x'], json_bu2.bu[3].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[3].cap[0].coordenadas).map(function(e) {return json_bu2.bu[3].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[3].cap[0].coordenadas).map(function(e) {return json_bu2.bu[3].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf4)

		var coor_line2_bu_cap_gf4=[];
		for(var i in json_bu2.bu[3].cap[1].coordenadas){
		    coor_line2_bu_cap_gf4.push([json_bu2.bu[3].cap[1].coordenadas[i]['x'], json_bu2.bu[3].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[3].cap[1].coordenadas).map(function(e) {return json_bu2.bu[3].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[3].cap[1].coordenadas).map(function(e) {return json_bu2.bu[3].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf4)
		crearChart('#chart_bu_cap4', 'C1', 'C2', coor_line1_bu_cap_gf4, coor_line2_bu_cap_gf4, min, max);

		// grafico 5 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf5=[];
		for(var i in json_bu2.bu[4].fp[0].coordenadas){
		    coor_line1_bu_fp_gf5.push([json_bu2.bu[4].fp[0].coordenadas[i]['x'], json_bu2.bu[4].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[4].fp[0].coordenadas).map(function(e) {return json_bu2.bu[4].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[4].fp[0].coordenadas).map(function(e) {return json_bu2.bu[4].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf5)

		var coor_line2_bu_fp_gf5=[];
		for(var i in json_bu2.bu[4].fp[1].coordenadas){
		    coor_line2_bu_fp_gf5.push([json_bu2.bu[4].fp[1].coordenadas[i]['x'], json_bu2.bu[4].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[4].fp[1].coordenadas).map(function(e) {return json_bu2.bu[4].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[4].fp[1].coordenadas).map(function(e) {return json_bu2.bu[4].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf5)
		crearChart('#chart_bu_fp5', 'C1', 'C2', coor_line1_bu_fp_gf5, coor_line2_bu_fp_gf5, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf5=[];
		for(var i in json_bu2.bu[4].cap[0].coordenadas){
		    coor_line1_bu_cap_gf5.push([json_bu2.bu[4].cap[0].coordenadas[i]['x'], json_bu2.bu[4].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[4].cap[0].coordenadas).map(function(e) {return json_bu2.bu[4].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[4].cap[0].coordenadas).map(function(e) {return json_bu2.bu[4].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf5)

		var coor_line2_bu_cap_gf5=[];
		for(var i in json_bu2.bu[4].cap[1].coordenadas){
		    coor_line2_bu_cap_gf5.push([json_bu2.bu[4].cap[1].coordenadas[i]['x'], json_bu2.bu[4].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[4].cap[1].coordenadas).map(function(e) {return json_bu2.bu[4].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[4].cap[1].coordenadas).map(function(e) {return json_bu2.bu[4].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf5)
		crearChart('#chart_bu_cap5', 'C1', 'C2', coor_line1_bu_cap_gf5, coor_line2_bu_cap_gf5, min, max);

		// grafico 6 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf6=[];
		for(var i in json_bu2.bu[5].fp[0].coordenadas){
		    coor_line1_bu_fp_gf6.push([json_bu2.bu[5].fp[0].coordenadas[i]['x'], json_bu2.bu[5].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[5].fp[0].coordenadas).map(function(e) {return json_bu2.bu[5].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[5].fp[0].coordenadas).map(function(e) {return json_bu2.bu[5].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf6)

		var coor_line2_bu_fp_gf6=[];
		for(var i in json_bu2.bu[5].fp[1].coordenadas){
		    coor_line2_bu_fp_gf6.push([json_bu2.bu[5].fp[1].coordenadas[i]['x'], json_bu2.bu[5].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[5].fp[1].coordenadas).map(function(e) {return json_bu2.bu[5].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[5].fp[1].coordenadas).map(function(e) {return json_bu2.bu[5].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf6)
		crearChart('#chart_bu_fp6', 'C1', 'C2', coor_line1_bu_fp_gf6, coor_line2_bu_fp_gf6, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf6=[];
		for(var i in json_bu2.bu[5].cap[0].coordenadas){
		    coor_line1_bu_cap_gf6.push([json_bu2.bu[5].cap[0].coordenadas[i]['x'], json_bu2.bu[5].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[5].cap[0].coordenadas).map(function(e) {return json_bu2.bu[5].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[5].cap[0].coordenadas).map(function(e) {return json_bu2.bu[5].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf6)

		var coor_line2_bu_cap_gf6=[];
		for(var i in json_bu2.bu[5].cap[1].coordenadas){
		    coor_line2_bu_cap_gf6.push([json_bu2.bu[5].cap[1].coordenadas[i]['x'], json_bu2.bu[5].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[5].cap[1].coordenadas).map(function(e) {return json_bu2.bu[5].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[5].cap[1].coordenadas).map(function(e) {return json_bu2.bu[5].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf6)
		crearChart('#chart_bu_cap6', 'C1', 'C2', coor_line1_bu_cap_gf6, coor_line2_bu_cap_gf6, min, max);

		// grafico 7 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf7=[];
		for(var i in json_bu2.bu[6].fp[0].coordenadas){
		    coor_line1_bu_fp_gf7.push([json_bu2.bu[6].fp[0].coordenadas[i]['x'], json_bu2.bu[6].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[6].fp[0].coordenadas).map(function(e) {return json_bu2.bu[6].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[6].fp[0].coordenadas).map(function(e) {return json_bu2.bu[6].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf7)

		var coor_line2_bu_fp_gf7=[];
		for(var i in json_bu2.bu[6].fp[1].coordenadas){
		    coor_line2_bu_fp_gf7.push([json_bu2.bu[6].fp[1].coordenadas[i]['x'], json_bu2.bu[6].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[6].fp[1].coordenadas).map(function(e) {return json_bu2.bu[6].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[6].fp[1].coordenadas).map(function(e) {return json_bu2.bu[6].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf7)
		crearChart('#chart_bu_fp7', 'C1', 'C2', coor_line1_bu_fp_gf7, coor_line2_bu_fp_gf7, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf7=[];
		for(var i in json_bu2.bu[6].cap[0].coordenadas){
		    coor_line1_bu_cap_gf7.push([json_bu2.bu[6].cap[0].coordenadas[i]['x'], json_bu2.bu[6].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[6].cap[0].coordenadas).map(function(e) {return json_bu2.bu[6].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[6].cap[0].coordenadas).map(function(e) {return json_bu2.bu[6].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf7)

		var coor_line2_bu_cap_gf7=[];
		for(var i in json_bu2.bu[6].cap[1].coordenadas){
		    coor_line2_bu_cap_gf7.push([json_bu2.bu[6].cap[1].coordenadas[i]['x'], json_bu2.bu[6].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[6].cap[1].coordenadas).map(function(e) {return json_bu2.bu[6].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[6].cap[1].coordenadas).map(function(e) {return json_bu2.bu[6].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf7)
		crearChart('#chart_bu_cap7', 'C1', 'C2', coor_line1_bu_cap_gf7, coor_line2_bu_cap_gf7, min, max);

		// grafico 8 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf8=[];
		for(var i in json_bu2.bu[7].fp[0].coordenadas){
		    coor_line1_bu_fp_gf8.push([json_bu2.bu[7].fp[0].coordenadas[i]['x'], json_bu2.bu[7].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[7].fp[0].coordenadas).map(function(e) {return json_bu2.bu[7].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[7].fp[0].coordenadas).map(function(e) {return json_bu2.bu[7].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf8)

		var coor_line2_bu_fp_gf8=[];
		for(var i in json_bu2.bu[7].fp[1].coordenadas){
		    coor_line2_bu_fp_gf8.push([json_bu2.bu[7].fp[1].coordenadas[i]['x'], json_bu2.bu[7].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[7].fp[1].coordenadas).map(function(e) {return json_bu2.bu[7].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[7].fp[1].coordenadas).map(function(e) {return json_bu2.bu[7].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf8)
		crearChart('#chart_bu_fp8', 'C1', 'C2', coor_line1_bu_fp_gf8, coor_line2_bu_fp_gf8, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf8=[];
		for(var i in json_bu2.bu[7].cap[0].coordenadas){
		    coor_line1_bu_cap_gf8.push([json_bu2.bu[7].cap[0].coordenadas[i]['x'], json_bu2.bu[7].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[7].cap[0].coordenadas).map(function(e) {return json_bu2.bu[7].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[7].cap[0].coordenadas).map(function(e) {return json_bu2.bu[7].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf8)

		var coor_line2_bu_cap_gf8=[];
		for(var i in json_bu2.bu[7].cap[1].coordenadas){
		    coor_line2_bu_cap_gf8.push([json_bu2.bu[7].cap[1].coordenadas[i]['x'], json_bu2.bu[7].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu2.bu[7].cap[1].coordenadas).map(function(e) {return json_bu2.bu[7].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu2.bu[7].cap[1].coordenadas).map(function(e) {return json_bu2.bu[7].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf8)
		crearChart('#chart_bu_cap8', 'C1', 'C2', coor_line1_bu_cap_gf8, coor_line2_bu_cap_gf8, min, max);
/*********************************************************************************************************************************************/
		//aislamiento
		var json_ais=JSON.parse('<?php echo $json_ais ?>');
		// grafico 1 aislamiento
		min=0; max=0;
		var coor_line1_ais_g1=[];
		for(var i in json_ais.ais[0].htierra[0].coordenadas){
		    coor_line1_ais_g1.push([json_ais.ais[0].htierra[0].coordenadas[i]['x'], json_ais.ais[0].htierra[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].htierra[0].coordenadas).map(function(e) {return json_ais.ais[0].htierra[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].htierra[0].coordenadas).map(function(e) {return json_ais.ais[0].htierra[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g1)
		crearChart2('#chart_ais1', 'H vs Tierra', coor_line1_ais_g1, min, max);

		// grafico 2 aislamiento
		min=0; max=0;
		var coor_line1_ais_g2=[];
		for(var i in json_ais.ais[0].xtierra[0].coordenadas){
		    coor_line1_ais_g2.push([json_ais.ais[0].xtierra[0].coordenadas[i]['x'], json_ais.ais[0].xtierra[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].xtierra[0].coordenadas).map(function(e) {return json_ais.ais[0].xtierra[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].xtierra[0].coordenadas).map(function(e) {return json_ais.ais[0].xtierra[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g2)
		crearChart2('#chart_ais2', 'X vs Tierra', coor_line1_ais_g2, min, max);

		// grafico 3 aislamiento
		min=0; max=0;
		var coor_line1_ais_g3=[];
		for(var i in json_ais.ais[0].hx[0].coordenadas){
		    coor_line1_ais_g3.push([json_ais.ais[0].hx[0].coordenadas[i]['x'], json_ais.ais[0].hx[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].hx[0].coordenadas).map(function(e) {return json_ais.ais[0].hx[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].hx[0].coordenadas).map(function(e) {return json_ais.ais[0].hx[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g3)
		crearChart2('#chart_ais3', 'H vs X', coor_line1_ais_g3, min, max);


	<?php }else if($equipo->devanados==3){?>
		var json_td3=JSON.parse('<?php echo $json_td3 ?>');
		// grafico 1
		var coor_line1_fp_gf1=[];
		for(var i in json_td3.td[0].fp[0].coordenadas){
		    coor_line1_fp_gf1.push([json_td3.td[0].fp[0].coordenadas[i]['x'], json_td3.td[0].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[0].fp[0].coordenadas).map(function(e) {return json_td3.td[0].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[0].fp[0].coordenadas).map(function(e) {return json_td3.td[0].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf1)

		var coor_line2_fp_gf1=[];
		for(var i in json_td3.td[0].fp[1].coordenadas){
		    coor_line2_fp_gf1.push([json_td3.td[0].fp[1].coordenadas[i]['x'], json_td3.td[0].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[0].fp[1].coordenadas).map(function(e) {return json_td3.td[0].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[0].fp[1].coordenadas).map(function(e) {return json_td3.td[0].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf1)
		crearChart('#chartfp1', 'FP V1', 'FP V2', coor_line1_fp_gf1, coor_line2_fp_gf1, min, max);

		min=0; max=0;
		var coor_line1_cap_gf1=[];
		for(var i in json_td3.td[0].cap[0].coordenadas){
		    coor_line1_cap_gf1.push([json_td3.td[0].cap[0].coordenadas[i]['x'], json_td3.td[0].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[0].cap[0].coordenadas).map(function(e) {return json_td3.td[0].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[0].cap[0].coordenadas).map(function(e) {return json_td3.td[0].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf1)

		var coor_line2_cap_gf1=[];
		for(var i in json_td3.td[0].cap[1].coordenadas){
		    coor_line2_cap_gf1.push([json_td3.td[0].cap[1].coordenadas[i]['x'], json_td3.td[0].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[0].cap[1].coordenadas).map(function(e) {return json_td3.td[0].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[0].cap[1].coordenadas).map(function(e) {return json_td3.td[0].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf1)
		crearChart('#chartcap1', 'CAP V1', 'CAP V2', coor_line1_cap_gf1, coor_line2_cap_gf1, min, max);
		

		// grafico 2
		min=0; max=0;
		var coor_line1_fp_gf2=[];
		for(var i in json_td3.td[1].fp[0].coordenadas){
		    coor_line1_fp_gf2.push([json_td3.td[1].fp[0].coordenadas[i]['x'], json_td3.td[1].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[1].fp[0].coordenadas).map(function(e) {return json_td3.td[1].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[1].fp[0].coordenadas).map(function(e) {return json_td3.td[1].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf2)

		var coor_line2_fp_gf2=[];
		for(var i in json_td3.td[1].fp[1].coordenadas){
		    coor_line2_fp_gf2.push([json_td3.td[1].fp[1].coordenadas[i]['x'], json_td3.td[1].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[1].fp[1].coordenadas).map(function(e) {return json_td3.td[1].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[1].fp[1].coordenadas).map(function(e) {return json_td3.td[1].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf2)
		crearChart('#chartfp2', 'FP V1', 'FP V2', coor_line1_fp_gf2, coor_line2_fp_gf2, min, max);

		min=0; max=0;
		var coor_line1_cap_gf2=[];
		for(var i in json_td3.td[1].cap[0].coordenadas){
		    coor_line1_cap_gf2.push([json_td3.td[1].cap[0].coordenadas[i]['x'], json_td3.td[1].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[1].cap[0].coordenadas).map(function(e) {return json_td3.td[1].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[1].cap[0].coordenadas).map(function(e) {return json_td3.td[1].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf2)

		var coor_line2_cap_gf2=[];
		for(var i in json_td3.td[1].cap[1].coordenadas){
		    coor_line2_cap_gf2.push([json_td3.td[1].cap[1].coordenadas[i]['x'], json_td3.td[1].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[1].cap[1].coordenadas).map(function(e) {return json_td3.td[1].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[1].cap[1].coordenadas).map(function(e) {return json_td3.td[1].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf2)
		crearChart('#chartcap2', 'CAP V1', 'CAP V2', coor_line1_cap_gf2, coor_line2_cap_gf2, min, max);
		
		// grafico 3
		min=0; max=0;
		var coor_line1_fp_gf3=[];
		for(var i in json_td3.td[2].fp[0].coordenadas){
		    coor_line1_fp_gf3.push([json_td3.td[2].fp[0].coordenadas[i]['x'], json_td3.td[2].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[2].fp[0].coordenadas).map(function(e) {return json_td3.td[2].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[2].fp[0].coordenadas).map(function(e) {return json_td3.td[2].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf3)

		var coor_line2_fp_gf3=[];
		for(var i in json_td3.td[2].fp[1].coordenadas){
		    coor_line2_fp_gf3.push([json_td3.td[2].fp[1].coordenadas[i]['x'], json_td3.td[2].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[2].fp[1].coordenadas).map(function(e) {return json_td3.td[2].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[2].fp[1].coordenadas).map(function(e) {return json_td3.td[2].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf3)
		crearChart('#chartfp3', 'FP V1', 'FP V2', coor_line1_fp_gf3, coor_line2_fp_gf3, min, max);
		

		min=0; max=0;
		var coor_line1_cap_gf3=[];
		for(var i in json_td3.td[2].cap[0].coordenadas){
		    coor_line1_cap_gf3.push([json_td3.td[2].cap[0].coordenadas[i]['x'], json_td3.td[2].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[2].cap[0].coordenadas).map(function(e) {return json_td3.td[2].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[2].cap[0].coordenadas).map(function(e) {return json_td3.td[2].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf3)

		var coor_line2_cap_gf3=[];
		for(var i in json_td3.td[2].cap[1].coordenadas){
		    coor_line2_cap_gf3.push([json_td3.td[2].cap[1].coordenadas[i]['x'], json_td3.td[2].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[2].cap[1].coordenadas).map(function(e) {return json_td3.td[2].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[2].cap[1].coordenadas).map(function(e) {return json_td3.td[2].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf3)
		crearChart('#chartcap3', 'CAP V1', 'CAP V2', coor_line1_cap_gf3, coor_line2_cap_gf3, min, max);
		

		// grafico 4
		min=0; max=0;
		var coor_line1_fp_gf4=[];
		for(var i in json_td3.td[3].fp[0].coordenadas){
		    coor_line1_fp_gf4.push([json_td3.td[3].fp[0].coordenadas[i]['x'], json_td3.td[3].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[3].fp[0].coordenadas).map(function(e) {return json_td3.td[3].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[3].fp[0].coordenadas).map(function(e) {return json_td3.td[3].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf4)

		var coor_line2_fp_gf4=[];
		for(var i in json_td3.td[3].fp[1].coordenadas){
		    coor_line2_fp_gf4.push([json_td3.td[3].fp[1].coordenadas[i]['x'], json_td3.td[3].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[3].fp[1].coordenadas).map(function(e) {return json_td3.td[3].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[3].fp[1].coordenadas).map(function(e) {return json_td3.td[3].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf4)
		crearChart('#chartfp4', 'FP V1', 'FP V2', coor_line1_fp_gf4, coor_line2_fp_gf4, min, max);

		min=0; max=0;
		var coor_line1_cap_gf4=[];
		for(var i in json_td3.td[3].cap[0].coordenadas){
		    coor_line1_cap_gf4.push([json_td3.td[3].cap[0].coordenadas[i]['x'], json_td3.td[3].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[3].cap[0].coordenadas).map(function(e) {return json_td3.td[3].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[3].cap[0].coordenadas).map(function(e) {return json_td3.td[3].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf4)

		var coor_line2_cap_gf4=[];
		for(var i in json_td3.td[3].cap[1].coordenadas){
		    coor_line2_cap_gf4.push([json_td3.td[3].cap[1].coordenadas[i]['x'], json_td3.td[3].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[3].cap[1].coordenadas).map(function(e) {return json_td3.td[3].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[3].cap[1].coordenadas).map(function(e) {return json_td3.td[3].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf4)
		crearChart('#chartcap4', 'CAP V1', 'CAP V2', coor_line1_cap_gf4, coor_line2_cap_gf4, min, max);
		

		// grafico 5
		min=0; max=0;
		var coor_line1_fp_gf5=[];
		for(var i in json_td3.td[4].fp[0].coordenadas){
		    coor_line1_fp_gf5.push([json_td3.td[4].fp[0].coordenadas[i]['x'], json_td3.td[4].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[4].fp[0].coordenadas).map(function(e) {return json_td3.td[4].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[4].fp[0].coordenadas).map(function(e) {return json_td3.td[4].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf5)

		var coor_line2_fp_gf5=[];
		for(var i in json_td3.td[4].fp[1].coordenadas){
		    coor_line2_fp_gf5.push([json_td3.td[4].fp[1].coordenadas[i]['x'], json_td3.td[4].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[4].fp[1].coordenadas).map(function(e) {return json_td3.td[4].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[4].fp[1].coordenadas).map(function(e) {return json_td3.td[4].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf5)
		crearChart('#chartfp5', 'FP V1', 'FP V2', coor_line1_fp_gf5, coor_line2_fp_gf5, min, max);
		
		min=0; max=0;
		var coor_line1_cap_gf5=[];
		for(var i in json_td3.td[4].cap[0].coordenadas){
		    coor_line1_cap_gf5.push([json_td3.td[4].cap[0].coordenadas[i]['x'], json_td3.td[4].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[4].cap[0].coordenadas).map(function(e) {return json_td3.td[4].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[4].cap[0].coordenadas).map(function(e) {return json_td3.td[4].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf5)

		var coor_line2_cap_gf5=[];
		for(var i in json_td3.td[4].cap[1].coordenadas){
		    coor_line2_cap_gf5.push([json_td3.td[4].cap[1].coordenadas[i]['x'], json_td3.td[4].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[4].cap[1].coordenadas).map(function(e) {return json_td3.td[4].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[4].cap[1].coordenadas).map(function(e) {return json_td3.td[4].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf5)
		crearChart('#chartcap5', 'CAP V1', 'CAP V2', coor_line1_cap_gf5, coor_line2_cap_gf5, min, max);
		

		// grafico 6
		var coor_line1_fp_gf6=[];
		min=0; max=0;
		for(var i in json_td3.td[5].fp[0].coordenadas){
		    coor_line1_fp_gf6.push([json_td3.td[5].fp[0].coordenadas[i]['x'], json_td3.td[5].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[5].fp[0].coordenadas).map(function(e) {return json_td3.td[5].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[5].fp[0].coordenadas).map(function(e) {return json_td3.td[5].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf6)

		var coor_line2_fp_gf6=[];
		for(var i in json_td3.td[5].fp[1].coordenadas){
		    coor_line2_fp_gf6.push([json_td3.td[5].fp[1].coordenadas[i]['x'], json_td3.td[5].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[5].fp[1].coordenadas).map(function(e) {return json_td3.td[5].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[5].fp[1].coordenadas).map(function(e) {return json_td3.td[5].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf6)
		crearChart('#chartfp6', 'FP V1', 'FP V2', coor_line1_fp_gf6, coor_line2_fp_gf6, min, max);
		
		min=0; max=0;
		var coor_line1_cap_gf6=[];
		for(var i in json_td3.td[5].cap[0].coordenadas){
		    coor_line1_cap_gf6.push([json_td3.td[5].cap[0].coordenadas[i]['x'], json_td3.td[5].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[5].cap[0].coordenadas).map(function(e) {return json_td3.td[5].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[5].cap[0].coordenadas).map(function(e) {return json_td3.td[5].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf6)

		var coor_line2_cap_gf6=[];
		for(var i in json_td3.td[5].cap[1].coordenadas){
		    coor_line2_cap_gf6.push([json_td3.td[5].cap[1].coordenadas[i]['x'], json_td3.td[5].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[5].cap[1].coordenadas).map(function(e) {return json_td3.td[5].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[5].cap[1].coordenadas).map(function(e) {return json_td3.td[5].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf6)
		crearChart('#chartcap6', 'CAP V1', 'CAP V2', coor_line1_cap_gf6, coor_line2_cap_gf6, min, max);

		// grafico 7
		var coor_line1_fp_gf7=[];
		min=0; max=0;
		for(var i in json_td3.td[6].fp[0].coordenadas){
		    coor_line1_fp_gf7.push([json_td3.td[6].fp[0].coordenadas[i]['x'], json_td3.td[6].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[6].fp[0].coordenadas).map(function(e) {return json_td3.td[6].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[6].fp[0].coordenadas).map(function(e) {return json_td3.td[6].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf7)

		var coor_line2_fp_gf7=[];
		for(var i in json_td3.td[6].fp[1].coordenadas){
		    coor_line2_fp_gf7.push([json_td3.td[6].fp[1].coordenadas[i]['x'], json_td3.td[6].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[6].fp[1].coordenadas).map(function(e) {return json_td3.td[6].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[6].fp[1].coordenadas).map(function(e) {return json_td3.td[6].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf7)
		crearChart('#chartfp7', 'FP V1', 'FP V2', coor_line1_fp_gf7, coor_line2_fp_gf7, min, max);
		
		min=0; max=0;
		var coor_line1_cap_gf7=[];
		for(var i in json_td3.td[6].cap[0].coordenadas){
		    coor_line1_cap_gf7.push([json_td3.td[6].cap[0].coordenadas[i]['x'], json_td3.td[6].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[6].cap[0].coordenadas).map(function(e) {return json_td3.td[6].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[6].cap[0].coordenadas).map(function(e) {return json_td3.td[6].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf7)

		var coor_line2_cap_gf7=[];
		for(var i in json_td3.td[6].cap[1].coordenadas){
		    coor_line2_cap_gf7.push([json_td3.td[6].cap[1].coordenadas[i]['x'], json_td3.td[6].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[6].cap[1].coordenadas).map(function(e) {return json_td3.td[6].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[6].cap[1].coordenadas).map(function(e) {return json_td3.td[6].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf7)
		crearChart('#chartcap7', 'CAP V1', 'CAP V2', coor_line1_cap_gf7, coor_line2_cap_gf7, min, max);
		
		// grafico 8
		var coor_line1_fp_gf8=[];
		min=0; max=0;
		for(var i in json_td3.td[7].fp[0].coordenadas){
		    coor_line1_fp_gf8.push([json_td3.td[7].fp[0].coordenadas[i]['x'], json_td3.td[7].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[7].fp[0].coordenadas).map(function(e) {return json_td3.td[7].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[7].fp[0].coordenadas).map(function(e) {return json_td3.td[7].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf8)

		var coor_line2_fp_gf8=[];
		for(var i in json_td3.td[7].fp[1].coordenadas){
		    coor_line2_fp_gf8.push([json_td3.td[7].fp[1].coordenadas[i]['x'], json_td3.td[7].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[7].fp[1].coordenadas).map(function(e) {return json_td3.td[7].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[7].fp[1].coordenadas).map(function(e) {return json_td3.td[7].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf8)
		crearChart('#chartfp8', 'FP V1', 'FP V2', coor_line1_fp_gf8, coor_line2_fp_gf8, min, max);

		min=0; max=0;
		var coor_line1_cap_gf8=[];
		for(var i in json_td3.td[7].cap[0].coordenadas){
		    coor_line1_cap_gf8.push([json_td3.td[7].cap[0].coordenadas[i]['x'], json_td3.td[7].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[7].cap[0].coordenadas).map(function(e) {return json_td3.td[7].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[7].cap[0].coordenadas).map(function(e) {return json_td3.td[7].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf8)

		var coor_line2_cap_gf8=[];
		for(var i in json_td3.td[7].cap[1].coordenadas){
		    coor_line2_cap_gf8.push([json_td3.td[7].cap[1].coordenadas[i]['x'], json_td3.td[7].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[7].cap[1].coordenadas).map(function(e) {return json_td3.td[7].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[7].cap[1].coordenadas).map(function(e) {return json_td3.td[7].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf8)
		crearChart('#chartcap8', 'CAP V1', 'CAP V2', coor_line1_cap_gf8, coor_line2_cap_gf8, min, max);
		

		// grafico 9
		var coor_line1_fp_gf9=[];
		min=0; max=0;
		for(var i in json_td3.td[8].fp[0].coordenadas){
		    coor_line1_fp_gf9.push([json_td3.td[8].fp[0].coordenadas[i]['x'], json_td3.td[8].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[8].fp[0].coordenadas).map(function(e) {return json_td3.td[8].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[8].fp[0].coordenadas).map(function(e) {return json_td3.td[8].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_fp_gf9)

		var coor_line2_fp_gf9=[];
		for(var i in json_td3.td[8].fp[1].coordenadas){
		    coor_line2_fp_gf9.push([json_td3.td[8].fp[1].coordenadas[i]['x'], json_td3.td[8].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[8].fp[1].coordenadas).map(function(e) {return json_td3.td[8].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[8].fp[1].coordenadas).map(function(e) {return json_td3.td[8].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_fp_gf9)
		crearChart('#chartfp9', 'FP V1', 'FP V2', coor_line1_fp_gf9, coor_line2_fp_gf9, min, max);
		
		min=0; max=0;
		var coor_line1_cap_gf9=[];
		for(var i in json_td3.td[8].cap[0].coordenadas){
		    coor_line1_cap_gf9.push([json_td3.td[8].cap[0].coordenadas[i]['x'], json_td3.td[8].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[8].cap[0].coordenadas).map(function(e) {return json_td3.td[8].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[8].cap[0].coordenadas).map(function(e) {return json_td3.td[8].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_cap_gf9)

		var coor_line2_cap_gf9=[];
		for(var i in json_td3.td[8].cap[1].coordenadas){
		    coor_line2_cap_gf9.push([json_td3.td[8].cap[1].coordenadas[i]['x'], json_td3.td[8].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_td3.td[8].cap[1].coordenadas).map(function(e) {return json_td3.td[8].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_td3.td[8].cap[1].coordenadas).map(function(e) {return json_td3.td[8].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_cap_gf9)
		crearChart('#chartcap9', 'CAP V1', 'CAP V2', coor_line1_cap_gf9, coor_line2_cap_gf9, min, max);
/******************************************************************************************************************************************/
		//bushing

		var json_bu3=JSON.parse('<?php echo $json_bush3 ?>');
		// grafico 1 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf1=[];
		for(var i in json_bu3.bu[0].fp[0].coordenadas){
		    coor_line1_bu_fp_gf1.push([json_bu3.bu[0].fp[0].coordenadas[i]['x'], json_bu3.bu[0].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[0].fp[0].coordenadas).map(function(e) {return json_bu3.bu[0].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[0].fp[0].coordenadas).map(function(e) {return json_bu3.bu[0].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf1)

		var coor_line2_bu_fp_gf1=[];
		for(var i in json_bu3.bu[0].fp[1].coordenadas){
		    coor_line2_bu_fp_gf1.push([json_bu3.bu[0].fp[1].coordenadas[i]['x'], json_bu3.bu[0].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[0].fp[1].coordenadas).map(function(e) {return json_bu3.bu[0].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[0].fp[1].coordenadas).map(function(e) {return json_bu3.bu[0].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf1)
		crearChart('#chart_bu_fp1', 'C1', 'C2', coor_line1_bu_fp_gf1, coor_line2_bu_fp_gf1, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf1=[];
		for(var i in json_bu3.bu[0].cap[0].coordenadas){
		    coor_line1_bu_cap_gf1.push([json_bu3.bu[0].cap[0].coordenadas[i]['x'], json_bu3.bu[0].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[0].cap[0].coordenadas).map(function(e) {return json_bu3.bu[0].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[0].cap[0].coordenadas).map(function(e) {return json_bu3.bu[0].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf1)

		var coor_line2_bu_cap_gf1=[];
		for(var i in json_bu3.bu[0].cap[1].coordenadas){
		    coor_line2_bu_cap_gf1.push([json_bu3.bu[0].cap[1].coordenadas[i]['x'], json_bu3.bu[0].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[0].cap[1].coordenadas).map(function(e) {return json_bu3.bu[0].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[0].cap[1].coordenadas).map(function(e) {return json_bu3.bu[0].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf1)
		crearChart('#chart_bu_cap1', 'C1', 'C2', coor_line1_bu_cap_gf1, coor_line2_bu_cap_gf1, min, max);

		// grafico 2 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf2=[];
		for(var i in json_bu3.bu[1].fp[0].coordenadas){
		    coor_line1_bu_fp_gf2.push([json_bu3.bu[1].fp[0].coordenadas[i]['x'], json_bu3.bu[1].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[1].fp[0].coordenadas).map(function(e) {return json_bu3.bu[1].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[1].fp[0].coordenadas).map(function(e) {return json_bu3.bu[1].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf2)

		var coor_line2_bu_fp_gf2=[];
		for(var i in json_bu3.bu[1].fp[1].coordenadas){
		    coor_line2_bu_fp_gf2.push([json_bu3.bu[1].fp[1].coordenadas[i]['x'], json_bu3.bu[1].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[1].fp[1].coordenadas).map(function(e) {return json_bu3.bu[1].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[1].fp[1].coordenadas).map(function(e) {return json_bu3.bu[1].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf2)
		crearChart('#chart_bu_fp2', 'C1', 'C2', coor_line1_bu_fp_gf2, coor_line2_bu_fp_gf2, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf2=[];
		for(var i in json_bu3.bu[1].cap[0].coordenadas){
		    coor_line1_bu_cap_gf2.push([json_bu3.bu[1].cap[0].coordenadas[i]['x'], json_bu3.bu[1].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[1].cap[0].coordenadas).map(function(e) {return json_bu3.bu[1].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[1].cap[0].coordenadas).map(function(e) {return json_bu3.bu[1].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf2)

		var coor_line2_bu_cap_gf2=[];
		for(var i in json_bu3.bu[1].cap[1].coordenadas){
		    coor_line2_bu_cap_gf2.push([json_bu3.bu[1].cap[1].coordenadas[i]['x'], json_bu3.bu[1].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[1].cap[1].coordenadas).map(function(e) {return json_bu3.bu[1].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[1].cap[1].coordenadas).map(function(e) {return json_bu3.bu[1].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf2)
		crearChart('#chart_bu_cap2', 'C1', 'C2', coor_line1_bu_cap_gf2, coor_line2_bu_cap_gf2, min, max);

		// grafico 3 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf3=[];
		for(var i in json_bu3.bu[2].fp[0].coordenadas){
		    coor_line1_bu_fp_gf3.push([json_bu3.bu[2].fp[0].coordenadas[i]['x'], json_bu3.bu[2].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[2].fp[0].coordenadas).map(function(e) {return json_bu3.bu[2].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[2].fp[0].coordenadas).map(function(e) {return json_bu3.bu[2].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf3)

		var coor_line2_bu_fp_gf3=[];
		for(var i in json_bu3.bu[2].fp[1].coordenadas){
		    coor_line2_bu_fp_gf3.push([json_bu3.bu[2].fp[1].coordenadas[i]['x'], json_bu3.bu[2].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[2].fp[1].coordenadas).map(function(e) {return json_bu3.bu[2].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[2].fp[1].coordenadas).map(function(e) {return json_bu3.bu[2].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf3)
		crearChart('#chart_bu_fp3', 'C1', 'C2', coor_line1_bu_fp_gf3, coor_line2_bu_fp_gf3, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf3=[];
		for(var i in json_bu3.bu[2].cap[0].coordenadas){
		    coor_line1_bu_cap_gf3.push([json_bu3.bu[2].cap[0].coordenadas[i]['x'], json_bu3.bu[2].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[2].cap[0].coordenadas).map(function(e) {return json_bu3.bu[2].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[2].cap[0].coordenadas).map(function(e) {return json_bu3.bu[2].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf3)

		var coor_line2_bu_cap_gf3=[];
		for(var i in json_bu3.bu[2].cap[1].coordenadas){
		    coor_line2_bu_cap_gf3.push([json_bu3.bu[2].cap[1].coordenadas[i]['x'], json_bu3.bu[2].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[2].cap[1].coordenadas).map(function(e) {return json_bu3.bu[2].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[2].cap[1].coordenadas).map(function(e) {return json_bu3.bu[2].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf3)
		crearChart('#chart_bu_cap3', 'C1', 'C2', coor_line1_bu_cap_gf3, coor_line2_bu_cap_gf3, min, max);

		// grafico 4 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf4=[];
		for(var i in json_bu3.bu[3].fp[0].coordenadas){
		    coor_line1_bu_fp_gf4.push([json_bu3.bu[3].fp[0].coordenadas[i]['x'], json_bu3.bu[3].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[3].fp[0].coordenadas).map(function(e) {return json_bu3.bu[3].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[3].fp[0].coordenadas).map(function(e) {return json_bu3.bu[3].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf4)

		var coor_line2_bu_fp_gf4=[];
		for(var i in json_bu3.bu[3].fp[1].coordenadas){
		    coor_line2_bu_fp_gf4.push([json_bu3.bu[3].fp[1].coordenadas[i]['x'], json_bu3.bu[3].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[3].fp[1].coordenadas).map(function(e) {return json_bu3.bu[3].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[3].fp[1].coordenadas).map(function(e) {return json_bu3.bu[3].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf4)
		crearChart('#chart_bu_fp4', 'C1', 'C2', coor_line1_bu_fp_gf4, coor_line2_bu_fp_gf4, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf4=[];
		for(var i in json_bu3.bu[3].cap[0].coordenadas){
		    coor_line1_bu_cap_gf4.push([json_bu3.bu[3].cap[0].coordenadas[i]['x'], json_bu3.bu[3].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[3].cap[0].coordenadas).map(function(e) {return json_bu3.bu[3].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[3].cap[0].coordenadas).map(function(e) {return json_bu3.bu[3].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf4)

		var coor_line2_bu_cap_gf4=[];
		for(var i in json_bu3.bu[3].cap[1].coordenadas){
		    coor_line2_bu_cap_gf4.push([json_bu3.bu[3].cap[1].coordenadas[i]['x'], json_bu3.bu[3].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[3].cap[1].coordenadas).map(function(e) {return json_bu3.bu[3].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[3].cap[1].coordenadas).map(function(e) {return json_bu3.bu[3].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf4)
		crearChart('#chart_bu_cap4', 'C1', 'C2', coor_line1_bu_cap_gf4, coor_line2_bu_cap_gf4, min, max);

		// grafico 5 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf5=[];
		for(var i in json_bu3.bu[4].fp[0].coordenadas){
		    coor_line1_bu_fp_gf5.push([json_bu3.bu[4].fp[0].coordenadas[i]['x'], json_bu3.bu[4].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[4].fp[0].coordenadas).map(function(e) {return json_bu3.bu[4].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[4].fp[0].coordenadas).map(function(e) {return json_bu3.bu[4].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf5)

		var coor_line2_bu_fp_gf5=[];
		for(var i in json_bu3.bu[4].fp[1].coordenadas){
		    coor_line2_bu_fp_gf5.push([json_bu3.bu[4].fp[1].coordenadas[i]['x'], json_bu3.bu[4].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[4].fp[1].coordenadas).map(function(e) {return json_bu3.bu[4].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[4].fp[1].coordenadas).map(function(e) {return json_bu3.bu[4].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf5)
		crearChart('#chart_bu_fp5', 'C1', 'C2', coor_line1_bu_fp_gf5, coor_line2_bu_fp_gf5, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf5=[];
		for(var i in json_bu3.bu[4].cap[0].coordenadas){
		    coor_line1_bu_cap_gf5.push([json_bu3.bu[4].cap[0].coordenadas[i]['x'], json_bu3.bu[4].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[4].cap[0].coordenadas).map(function(e) {return json_bu3.bu[4].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[4].cap[0].coordenadas).map(function(e) {return json_bu3.bu[4].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf5)

		var coor_line2_bu_cap_gf5=[];
		for(var i in json_bu3.bu[4].cap[1].coordenadas){
		    coor_line2_bu_cap_gf5.push([json_bu3.bu[4].cap[1].coordenadas[i]['x'], json_bu3.bu[4].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[4].cap[1].coordenadas).map(function(e) {return json_bu3.bu[4].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[4].cap[1].coordenadas).map(function(e) {return json_bu3.bu[4].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf5)
		crearChart('#chart_bu_cap5', 'C1', 'C2', coor_line1_bu_cap_gf5, coor_line2_bu_cap_gf5, min, max);

		// grafico 6 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf6=[];
		for(var i in json_bu3.bu[5].fp[0].coordenadas){
		    coor_line1_bu_fp_gf6.push([json_bu3.bu[5].fp[0].coordenadas[i]['x'], json_bu3.bu[5].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[5].fp[0].coordenadas).map(function(e) {return json_bu3.bu[5].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[5].fp[0].coordenadas).map(function(e) {return json_bu3.bu[5].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf6)

		var coor_line2_bu_fp_gf6=[];
		for(var i in json_bu3.bu[5].fp[1].coordenadas){
		    coor_line2_bu_fp_gf6.push([json_bu3.bu[5].fp[1].coordenadas[i]['x'], json_bu3.bu[5].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[5].fp[1].coordenadas).map(function(e) {return json_bu3.bu[5].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[5].fp[1].coordenadas).map(function(e) {return json_bu3.bu[5].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf6)
		crearChart('#chart_bu_fp6', 'C1', 'C2', coor_line1_bu_fp_gf6, coor_line2_bu_fp_gf6, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf6=[];
		for(var i in json_bu3.bu[5].cap[0].coordenadas){
		    coor_line1_bu_cap_gf6.push([json_bu3.bu[5].cap[0].coordenadas[i]['x'], json_bu3.bu[5].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[5].cap[0].coordenadas).map(function(e) {return json_bu3.bu[5].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[5].cap[0].coordenadas).map(function(e) {return json_bu3.bu[5].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf6)

		var coor_line2_bu_cap_gf6=[];
		for(var i in json_bu3.bu[5].cap[1].coordenadas){
		    coor_line2_bu_cap_gf6.push([json_bu3.bu[5].cap[1].coordenadas[i]['x'], json_bu3.bu[5].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[5].cap[1].coordenadas).map(function(e) {return json_bu3.bu[5].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[5].cap[1].coordenadas).map(function(e) {return json_bu3.bu[5].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf6)
		crearChart('#chart_bu_cap6', 'C1', 'C2', coor_line1_bu_cap_gf6, coor_line2_bu_cap_gf6, min, max);

		// grafico 7 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf7=[];
		for(var i in json_bu3.bu[6].fp[0].coordenadas){
		    coor_line1_bu_fp_gf7.push([json_bu3.bu[6].fp[0].coordenadas[i]['x'], json_bu3.bu[6].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[6].fp[0].coordenadas).map(function(e) {return json_bu3.bu[6].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[6].fp[0].coordenadas).map(function(e) {return json_bu3.bu[6].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf7)

		var coor_line2_bu_fp_gf7=[];
		for(var i in json_bu3.bu[6].fp[1].coordenadas){
		    coor_line2_bu_fp_gf7.push([json_bu3.bu[6].fp[1].coordenadas[i]['x'], json_bu3.bu[6].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[6].fp[1].coordenadas).map(function(e) {return json_bu3.bu[6].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[6].fp[1].coordenadas).map(function(e) {return json_bu3.bu[6].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf7)
		crearChart('#chart_bu_fp7', 'C1', 'C2', coor_line1_bu_fp_gf7, coor_line2_bu_fp_gf7, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf7=[];
		for(var i in json_bu3.bu[6].cap[0].coordenadas){
		    coor_line1_bu_cap_gf7.push([json_bu3.bu[6].cap[0].coordenadas[i]['x'], json_bu3.bu[6].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[6].cap[0].coordenadas).map(function(e) {return json_bu3.bu[6].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[6].cap[0].coordenadas).map(function(e) {return json_bu3.bu[6].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf7)

		var coor_line2_bu_cap_gf7=[];
		for(var i in json_bu3.bu[6].cap[1].coordenadas){
		    coor_line2_bu_cap_gf7.push([json_bu3.bu[6].cap[1].coordenadas[i]['x'], json_bu3.bu[6].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[6].cap[1].coordenadas).map(function(e) {return json_bu3.bu[6].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[6].cap[1].coordenadas).map(function(e) {return json_bu3.bu[6].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf7)
		crearChart('#chart_bu_cap7', 'C1', 'C2', coor_line1_bu_cap_gf7, coor_line2_bu_cap_gf7, min, max);

		// grafico 8 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf8=[];
		for(var i in json_bu3.bu[7].fp[0].coordenadas){
		    coor_line1_bu_fp_gf8.push([json_bu3.bu[7].fp[0].coordenadas[i]['x'], json_bu3.bu[7].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[7].fp[0].coordenadas).map(function(e) {return json_bu3.bu[7].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[7].fp[0].coordenadas).map(function(e) {return json_bu3.bu[7].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf8)

		var coor_line2_bu_fp_gf8=[];
		for(var i in json_bu3.bu[7].fp[1].coordenadas){
		    coor_line2_bu_fp_gf8.push([json_bu3.bu[7].fp[1].coordenadas[i]['x'], json_bu3.bu[7].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[7].fp[1].coordenadas).map(function(e) {return json_bu3.bu[7].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[7].fp[1].coordenadas).map(function(e) {return json_bu3.bu[7].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf8)
		crearChart('#chart_bu_fp8', 'C1', 'C2', coor_line1_bu_fp_gf8, coor_line2_bu_fp_gf8, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf8=[];
		for(var i in json_bu3.bu[7].cap[0].coordenadas){
		    coor_line1_bu_cap_gf8.push([json_bu3.bu[7].cap[0].coordenadas[i]['x'], json_bu3.bu[7].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[7].cap[0].coordenadas).map(function(e) {return json_bu3.bu[7].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[7].cap[0].coordenadas).map(function(e) {return json_bu3.bu[7].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf8)

		var coor_line2_bu_cap_gf8=[];
		for(var i in json_bu3.bu[7].cap[1].coordenadas){
		    coor_line2_bu_cap_gf8.push([json_bu3.bu[7].cap[1].coordenadas[i]['x'], json_bu3.bu[7].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[7].cap[1].coordenadas).map(function(e) {return json_bu3.bu[7].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[7].cap[1].coordenadas).map(function(e) {return json_bu3.bu[7].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf8)
		crearChart('#chart_bu_cap8', 'C1', 'C2', coor_line1_bu_cap_gf8, coor_line2_bu_cap_gf8, min, max);

		// grafico 9 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf9=[];
		for(var i in json_bu3.bu[8].fp[0].coordenadas){
		    coor_line1_bu_fp_gf9.push([json_bu3.bu[8].fp[0].coordenadas[i]['x'], json_bu3.bu[8].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[8].fp[0].coordenadas).map(function(e) {return json_bu3.bu[8].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[8].fp[0].coordenadas).map(function(e) {return json_bu3.bu[8].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf9)

		var coor_line2_bu_fp_gf9=[];
		for(var i in json_bu3.bu[8].fp[1].coordenadas){
		    coor_line2_bu_fp_gf9.push([json_bu3.bu[8].fp[1].coordenadas[i]['x'], json_bu3.bu[8].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[8].fp[1].coordenadas).map(function(e) {return json_bu3.bu[8].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[8].fp[1].coordenadas).map(function(e) {return json_bu3.bu[8].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf9)
		crearChart('#chart_bu_fp9', 'C1', 'C2', coor_line1_bu_fp_gf9, coor_line2_bu_fp_gf9, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf9=[];
		for(var i in json_bu3.bu[8].cap[0].coordenadas){
		    coor_line1_bu_cap_gf9.push([json_bu3.bu[8].cap[0].coordenadas[i]['x'], json_bu3.bu[8].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[8].cap[0].coordenadas).map(function(e) {return json_bu3.bu[8].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[8].cap[0].coordenadas).map(function(e) {return json_bu3.bu[8].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf9)

		var coor_line2_bu_cap_gf9=[];
		for(var i in json_bu3.bu[8].cap[1].coordenadas){
		    coor_line2_bu_cap_gf9.push([json_bu3.bu[8].cap[1].coordenadas[i]['x'], json_bu3.bu[8].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[8].cap[1].coordenadas).map(function(e) {return json_bu3.bu[8].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[8].cap[1].coordenadas).map(function(e) {return json_bu3.bu[8].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf9)
		crearChart('#chart_bu_cap9', 'C1', 'C2', coor_line1_bu_cap_gf9, coor_line2_bu_cap_gf9, min, max);

		// grafico 10 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf10=[];
		for(var i in json_bu3.bu[9].fp[0].coordenadas){
		    coor_line1_bu_fp_gf10.push([json_bu3.bu[9].fp[0].coordenadas[i]['x'], json_bu3.bu[9].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[9].fp[0].coordenadas).map(function(e) {return json_bu3.bu[9].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[9].fp[0].coordenadas).map(function(e) {return json_bu3.bu[9].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf10)

		var coor_line2_bu_fp_gf10=[];
		for(var i in json_bu3.bu[9].fp[1].coordenadas){
		    coor_line2_bu_fp_gf10.push([json_bu3.bu[9].fp[1].coordenadas[i]['x'], json_bu3.bu[9].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[9].fp[1].coordenadas).map(function(e) {return json_bu3.bu[9].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[9].fp[1].coordenadas).map(function(e) {return json_bu3.bu[9].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf10)
		crearChart('#chart_bu_fp10', 'C1', 'C2', coor_line1_bu_fp_gf10, coor_line2_bu_fp_gf10, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf10=[];
		for(var i in json_bu3.bu[9].cap[0].coordenadas){
		    coor_line1_bu_cap_gf10.push([json_bu3.bu[9].cap[0].coordenadas[i]['x'], json_bu3.bu[9].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[9].cap[0].coordenadas).map(function(e) {return json_bu3.bu[9].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[9].cap[0].coordenadas).map(function(e) {return json_bu3.bu[9].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf10)

		var coor_line2_bu_cap_gf10=[];
		for(var i in json_bu3.bu[9].cap[1].coordenadas){
		    coor_line2_bu_cap_gf10.push([json_bu3.bu[9].cap[1].coordenadas[i]['x'], json_bu3.bu[9].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[9].cap[1].coordenadas).map(function(e) {return json_bu3.bu[9].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[9].cap[1].coordenadas).map(function(e) {return json_bu3.bu[9].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf10)
		crearChart('#chart_bu_cap10', 'C1', 'C2', coor_line1_bu_cap_gf10, coor_line2_bu_cap_gf10, min, max);

		// grafico 11 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf11=[];
		for(var i in json_bu3.bu[10].fp[0].coordenadas){
		    coor_line1_bu_fp_gf11.push([json_bu3.bu[10].fp[0].coordenadas[i]['x'], json_bu3.bu[10].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[10].fp[0].coordenadas).map(function(e) {return json_bu3.bu[10].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[10].fp[0].coordenadas).map(function(e) {return json_bu3.bu[10].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf11)

		var coor_line2_bu_fp_gf11=[];
		for(var i in json_bu3.bu[10].fp[1].coordenadas){
		    coor_line2_bu_fp_gf11.push([json_bu3.bu[10].fp[1].coordenadas[i]['x'], json_bu3.bu[10].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[10].fp[1].coordenadas).map(function(e) {return json_bu3.bu[10].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[10].fp[1].coordenadas).map(function(e) {return json_bu3.bu[10].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf11)
		crearChart('#chart_bu_fp11', 'C1', 'C2', coor_line1_bu_fp_gf11, coor_line2_bu_fp_gf11, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf11=[];
		for(var i in json_bu3.bu[10].cap[0].coordenadas){
		    coor_line1_bu_cap_gf11.push([json_bu3.bu[10].cap[0].coordenadas[i]['x'], json_bu3.bu[10].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[10].cap[0].coordenadas).map(function(e) {return json_bu3.bu[10].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[10].cap[0].coordenadas).map(function(e) {return json_bu3.bu[10].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf11)

		var coor_line2_bu_cap_gf11=[];
		for(var i in json_bu3.bu[10].cap[1].coordenadas){
		    coor_line2_bu_cap_gf11.push([json_bu3.bu[10].cap[1].coordenadas[i]['x'], json_bu3.bu[10].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[10].cap[1].coordenadas).map(function(e) {return json_bu3.bu[10].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[10].cap[1].coordenadas).map(function(e) {return json_bu3.bu[10].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf11)
		crearChart('#chart_bu_cap11', 'C1', 'C2', coor_line1_bu_cap_gf11, coor_line2_bu_cap_gf11, min, max);

		// grafico 12 bushing
		min=0; max=0;
		var coor_line1_bu_fp_gf12=[];
		for(var i in json_bu3.bu[11].fp[0].coordenadas){
		    coor_line1_bu_fp_gf12.push([json_bu3.bu[11].fp[0].coordenadas[i]['x'], json_bu3.bu[11].fp[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[11].fp[0].coordenadas).map(function(e) {return json_bu3.bu[11].fp[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[11].fp[0].coordenadas).map(function(e) {return json_bu3.bu[11].fp[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_fp_gf12)

		var coor_line2_bu_fp_gf12=[];
		for(var i in json_bu3.bu[11].fp[1].coordenadas){
		    coor_line2_bu_fp_gf12.push([json_bu3.bu[11].fp[1].coordenadas[i]['x'], json_bu3.bu[11].fp[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[11].fp[1].coordenadas).map(function(e) {return json_bu3.bu[11].fp[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[11].fp[1].coordenadas).map(function(e) {return json_bu3.bu[11].fp[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_fp_gf12)
		crearChart('#chart_bu_fp12', 'C1', 'C2', coor_line1_bu_fp_gf12, coor_line2_bu_fp_gf12, min, max);

		min=0; max=0;
		var coor_line1_bu_cap_gf12=[];
		for(var i in json_bu3.bu[11].cap[0].coordenadas){
		    coor_line1_bu_cap_gf12.push([json_bu3.bu[11].cap[0].coordenadas[i]['x'], json_bu3.bu[11].cap[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[11].cap[0].coordenadas).map(function(e) {return json_bu3.bu[11].cap[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[11].cap[0].coordenadas).map(function(e) {return json_bu3.bu[11].cap[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_bu_cap_gf12)

		var coor_line2_bu_cap_gf12=[];
		for(var i in json_bu3.bu[11].cap[1].coordenadas){
		    coor_line2_bu_cap_gf12.push([json_bu3.bu[11].cap[1].coordenadas[i]['x'], json_bu3.bu[11].cap[1].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_bu3.bu[11].cap[1].coordenadas).map(function(e) {return json_bu3.bu[11].cap[1].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_bu3.bu[11].cap[1].coordenadas).map(function(e) {return json_bu3.bu[11].cap[1].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line2_bu_cap_gf12)
		crearChart('#chart_bu_cap12', 'C1', 'C2', coor_line1_bu_cap_gf12, coor_line2_bu_cap_gf12, min, max);

/********************************************************************************************************************************************/
		//aislamiento
		var json_ais=JSON.parse('<?php echo $json_ais ?>');
		// grafico 1 aislamiento
		min=0; max=0;
		var coor_line1_ais_g1=[];
		for(var i in json_ais.ais[0].htierra[0].coordenadas){
		    coor_line1_ais_g1.push([json_ais.ais[0].htierra[0].coordenadas[i]['x'], json_ais.ais[0].htierra[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].htierra[0].coordenadas).map(function(e) {return json_ais.ais[0].htierra[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].htierra[0].coordenadas).map(function(e) {return json_ais.ais[0].htierra[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g1)
		crearChart2('#chart_ais1', 'H vs Tierra', coor_line1_ais_g1, min, max);

		// grafico 2 aislamiento
		min=0; max=0;
		var coor_line1_ais_g2=[];
		for(var i in json_ais.ais[0].xtierra[0].coordenadas){
		    coor_line1_ais_g2.push([json_ais.ais[0].xtierra[0].coordenadas[i]['x'], json_ais.ais[0].xtierra[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].xtierra[0].coordenadas).map(function(e) {return json_ais.ais[0].xtierra[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].xtierra[0].coordenadas).map(function(e) {return json_ais.ais[0].xtierra[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g2)
		crearChart2('#chart_ais2', 'X vs Tierra', coor_line1_ais_g2, min, max);

		// grafico 3 aislamiento
		min=0; max=0;
		var coor_line1_ais_g3=[];
		for(var i in json_ais.ais[0].hx[0].coordenadas){
		    coor_line1_ais_g3.push([json_ais.ais[0].hx[0].coordenadas[i]['x'], json_ais.ais[0].hx[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].hx[0].coordenadas).map(function(e) {return json_ais.ais[0].hx[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].hx[0].coordenadas).map(function(e) {return json_ais.ais[0].hx[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g3)
		crearChart2('#chart_ais3', 'H vs X', coor_line1_ais_g3, min, max);

		// grafico 4 aislamiento
		min=0; max=0;
		var coor_line1_ais_g4=[];
		for(var i in json_ais.ais[0].ytierra[0].coordenadas){
		    coor_line1_ais_g4.push([json_ais.ais[0].ytierra[0].coordenadas[i]['x'], json_ais.ais[0].ytierra[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].ytierra[0].coordenadas).map(function(e) {return json_ais.ais[0].ytierra[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].ytierra[0].coordenadas).map(function(e) {return json_ais.ais[0].ytierra[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g4)
		crearChart2('#chart_ais4', 'Y vs Tierra', coor_line1_ais_g4, min, max);

		// grafico 5 aislamiento
		min=0; max=0;
		var coor_line1_ais_g5=[];
		for(var i in json_ais.ais[0].hy[0].coordenadas){
		    coor_line1_ais_g5.push([json_ais.ais[0].hy[0].coordenadas[i]['x'], json_ais.ais[0].hy[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].hy[0].coordenadas).map(function(e) {return json_ais.ais[0].hy[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].hy[0].coordenadas).map(function(e) {return json_ais.ais[0].hy[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g5)
		crearChart2('#chart_ais5', 'H vs Y', coor_line1_ais_g5, min, max);

		// grafico 6 aislamiento
		min=0; max=0;
		var coor_line1_ais_g6=[];
		for(var i in json_ais.ais[0].xy[0].coordenadas){
		    coor_line1_ais_g6.push([json_ais.ais[0].xy[0].coordenadas[i]['x'], json_ais.ais[0].xy[0].coordenadas[i]['y']]);
		}
		min_aux=Math.min.apply(null,Object.keys(json_ais.ais[0].xy[0].coordenadas).map(function(e) {return json_ais.ais[0].xy[0].coordenadas[e]['y'];}));
		max_aux=Math.max.apply(null,Object.keys(json_ais.ais[0].xy[0].coordenadas).map(function(e) {return json_ais.ais[0].xy[0].coordenadas[e]['y'];}));
		if(min_aux<min){
			min=min_aux;
		}else if(max_aux>max){
			max=max_aux;
		}
		//console.log(coor_line1_ais_g6)
		crearChart2('#chart_ais6', 'X vs Y', coor_line1_ais_g6, min, max);

	<?php }?>
	
});
function showTooltip(x,y,contents, colour){
	$('<div id="value">' +  contents + '</div>').css( {
	    position: 'absolute',
	    display: 'none',
	    top: y,
	    left: x,
	    'border-style': 'solid',
	    'border-width': '2px',
	    'border-color': colour,
	    'border-radius': '5px',
	    'background-color': '#ffffff',
	    'font-size': '9px',
	    color: '#262626',
	    padding: '2px'
	}).appendTo("body").fadeIn(200);
}
function crearChart(chart, label1, label2, line_data1, line_data2, min2, max2){
	var data=[
			{ label: label1, data: line_data1, color: '#603AF7' },
			{ label: label2, data: line_data2, color: '#F73A43' }
			];
	var graph = $.plot(chart, data, {	
		hoverable: true,
		shadowSize: 0,
		series: {
			lines: { show: true },
			points: { show: true }
		},
		xaxis: {
			ticks: [[1, "P1"], [2, "P2"], [3, "P3"], [4, "P4"], [5, "P5"], [6, "P6"]],
		},
		yaxis: {
			ticks: 10,
			min: (min2/2),
			max: max2,
			tickDecimals: 0
		},
		grid: {
			backgroundColor: { colors: [ "#fff", "#fff" ] },
			borderWidth: 1,
			borderColor:'#555'
		}
	});
	var points = graph.getData();
	 var graphx = $(chart).offset().left;
	 graphx = graphx + 30; // replace with offset of canvas on graph
	 var graphy = $(chart).offset().top;
	 graphy = graphy + 10; // how low you want the label to hang underneath the point
	 for(var k = 0; k < points.length; k++){
		  for(var m = 0; m < points[k].data.length; m++){
			if(points[k].data[m][0] != null && points[k].data[m][1] != null){
			  if(k == 0){
				  showTooltip(graphx + points[k].xaxis.p2c(points[k].data[m][0]) - 15, graphy + points[k].yaxis.p2c(points[k].data[m][1]) + 10,points[k].data[m][1], data[k].color)
			  }else{
				 showTooltip(graphx + points[k].xaxis.p2c(points[k].data[m][0]) - 15, graphy + points[k].yaxis.p2c(points[k].data[m][1]) - 45,points[k].data[m][1], data[k].color) 
			  }
				
			}
		}
	  }
}
function crearChart2(chart, label1, line_data1, min2, max2){
	var data=[
			{ label: label1, data: line_data1, color: '#603AF7' }
			];
	var graph = $.plot(chart, data, {	
		hoverable: true,
		shadowSize: 0,
		series: {
			lines: { show: true },
			points: { show: true }
		},
		xaxis: {
			ticks: [[1, "P1"], [2, "P2"], [3, "P3"], [4, "P4"], [5, "P5"], [6, "P6"]],
		},
		yaxis: {
			ticks: 10,
			min: (min2/2),
			max: max2,
			tickDecimals: 0
		},
		grid: {
			backgroundColor: { colors: [ "#fff", "#fff" ] },
			borderWidth: 1,
			borderColor:'#555'
		}
	});
	var points = graph.getData();
	 var graphx = $(chart).offset().left;
	 graphx = graphx + 30; // replace with offset of canvas on graph
	 var graphy = $(chart).offset().top;
	 graphy = graphy + 10; // how low you want the label to hang underneath the point
	 for(var k = 0; k < points.length; k++){
		  for(var m = 0; m < points[k].data.length; m++){
			if(points[k].data[m][0] != null && points[k].data[m][1] != null){
			  if(k == 0){
				  showTooltip(graphx + points[k].xaxis.p2c(points[k].data[m][0]) - 15, graphy + points[k].yaxis.p2c(points[k].data[m][1]) + 10,points[k].data[m][1], data[k].color)
			  }else{
				 showTooltip(graphx + points[k].xaxis.p2c(points[k].data[m][0]) - 15, graphy + points[k].yaxis.p2c(points[k].data[m][1]) - 45,points[k].data[m][1], data[k].color) 
			  }
				
			}
		}
	  }
}
</script>
<?php 
$count_enclaves=count($enclaves);
for ($i=1; $i<=$count_enclaves; $i++) {
	//echo $enclaves["P".$i]."<br>";
}


?>

<?php if($equipo->devanados==2){?>
<h3>Tangente Delta</h3>
<hr>
<div class="row-fluid">
	<div class="span6">CHL + CH (GST) ALTA FP<div id="chartfp1"></div></div>
	<div class="span6">CHL + CH (GST) ALTA CAP<div id="chartcap1"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CH (GST -G) ALTA FP<div id="chartfp2"></div></div>
	<div class="span6">CH (GST -G) ALTA CAP<div id="chartcap2"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CHL (UST) ALTA FP<div id="chartfp3"></div></div>
	<div class="span6">CHL (UST) ALTA CAP<div id="chartcap3"></div></div>
</div>

<div class="row-fluid">
	<div class="span6">CL + CHL (GST) BAJA FP<div id="chartfp4"></div></div>
	<div class="span6">CL + CHL (GST) BAJA CAP<div id="chartcap4"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CL (GST -G) BAJA FP<div id="chartfp5"></div></div>
	<div class="span6">CL (GST -G) BAJA CAP<div id="chartcap5"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CHL (UST) BAJA FP<div id="chartfp6"></div></div>
	<div class="span6">CHL (UST) BAJA CAP<div id="chartcap6"></div></div>
</div>
<br>
<h3>Bushing</h3>
<hr>
<div class="row-fluid">
	<div class="span6">H0 FP<div id="chart_bu_fp1"></div></div>
	<div class="span6">H0 CAP<div id="chart_bu_cap1"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">H1 FP<div id="chart_bu_fp2"></div></div>
	<div class="span6">H1 CAP<div id="chart_bu_cap2"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">H2 FP<div id="chart_bu_fp3"></div></div>
	<div class="span6">H2 CAP<div id="chart_bu_cap3"></div></div>
</div>

<div class="row-fluid">
	<div class="span6">H3 FP<div id="chart_bu_fp4"></div></div>
	<div class="span6">H3 CAP<div id="chart_bu_cap4"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X0 FP<div id="chart_bu_fp5"></div></div>
	<div class="span6">X0 CAP<div id="chart_bu_cap5"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X1 FP<div id="chart_bu_fp6"></div></div>
	<div class="span6">X1 CAP<div id="chart_bu_cap6"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X2 FP<div id="chart_bu_fp7"></div></div>
	<div class="span6">X2 CAP<div id="chart_bu_cap7"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X3 FP<div id="chart_bu_fp8"></div></div>
	<div class="span6">X3 CAP<div id="chart_bu_cap8"></div></div>
</div>
<h3>Resistencia de Aislamiento</h3>
<hr>
<div class="row-fluid">
	<div class="span6">H vs Tierra<div id="chart_ais1"></div></div>
	<div class="span6">X vs Tierra<div id="chart_ais2"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">H vs X<div id="chart_ais3"></div></div>
</div>
<?php }else if($equipo->devanados==3){?>
<h3>Tangente Delta</h3>
<hr>
<div class="row-fluid">
	<div class="span6">CHL + CH (GST) H BAJA/TIERRA TER/GUARDA GND/GAR FP<div id="chartfp1"></div></div>
	<div class="span6">CHL + CH (GST) H BAJA/TIERRA TER/GUARDA GND/GAR CAP<div id="chartcap1"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CH (GST -G) H BAJA-TER/GUARDA GAR FP<div id="chartfp2"></div></div>
	<div class="span6">CH (GST -G) H BAJA-TER/GUARDA GAR CAP<div id="chartcap2"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CHL (UST) H TER/TIERRA BAJA/UST UST FP<div id="chartfp3"></div></div>
	<div class="span6">CHL (UST) H TER/TIERRA BAJA/UST UST CAP<div id="chartcap3"></div></div>
</div>

<div class="row-fluid">
	<div class="span6">CL + CLT (GST) FP<div id="chartfp4"></div></div>
	<div class="span6">CL + CLT (GST) CAP<div id="chartcap4"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CL (GST - G) FP<div id="chartfp5"></div></div>
	<div class="span6">CL (GST - G) CAP<div id="chartcap5"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CLT (UST) FP<div id="chartfp6"></div></div>
	<div class="span6">CLT (UST) CAP<div id="chartcap6"></div></div>
</div>

<div class="row-fluid">
	<div class="span6">CT + CHT (GST) FP<div id="chartfp7"></div></div>
	<div class="span6">CT + CHT (GST) CAP<div id="chartcap7"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CT (GST -G) FP<div id="chartfp8"></div></div>
	<div class="span6">CT (GST -G) CAP<div id="chartcap8"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">CHT (UST) FP<div id="chartfp9"></div></div>
	<div class="span6">CHT (UST) CAP<div id="chartcap9"></div></div>
</div>
<br>
<h3>Bushing</h3>
<hr>
<div class="row-fluid">
	<div class="span6">H0 FP<div id="chart_bu_fp1"></div></div>
	<div class="span6">H0 CAP<div id="chart_bu_cap1"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">H1 FP<div id="chart_bu_fp2"></div></div>
	<div class="span6">H1 CAP<div id="chart_bu_cap2"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">H2 FP<div id="chart_bu_fp3"></div></div>
	<div class="span6">H2 CAP<div id="chart_bu_cap3"></div></div>
</div>

<div class="row-fluid">
	<div class="span6">H3 FP<div id="chart_bu_fp4"></div></div>
	<div class="span6">H3 CAP<div id="chart_bu_cap4"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X0 FP<div id="chart_bu_fp5"></div></div>
	<div class="span6">X0 CAP<div id="chart_bu_cap5"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X1 FP<div id="chart_bu_fp6"></div></div>
	<div class="span6">X1 CAP<div id="chart_bu_cap6"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X2 FP<div id="chart_bu_fp7"></div></div>
	<div class="span6">X2 CAP<div id="chart_bu_cap7"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">X3 FP<div id="chart_bu_fp8"></div></div>
	<div class="span6">X3 CAP<div id="chart_bu_cap8"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">Y0 FP<div id="chart_bu_fp9"></div></div>
	<div class="span6">Y0 CAP<div id="chart_bu_cap9"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">Y1 FP<div id="chart_bu_fp10"></div></div>
	<div class="span6">Y1 CAP<div id="chart_bu_cap10"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">Y2 FP<div id="chart_bu_fp11"></div></div>
	<div class="span6">Y2 CAP<div id="chart_bu_cap11"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">Y3 FP<div id="chart_bu_fp12"></div></div>
	<div class="span6">Y3 CAP<div id="chart_bu_cap12"></div></div>
</div>
<h3>Resistencia de Aislamiento</h3>
<hr>
<div class="row-fluid">
	<div class="span6">H vs Tierra<div id="chart_ais1"></div></div>
	<div class="span6">X vs Tierra<div id="chart_ais2"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">H vs X<div id="chart_ais3"></div></div>
	<div class="span6">Y vs Tierra<div id="chart_ais4"></div></div>
</div>
<div class="row-fluid">
	<div class="span6">H vs Y<div id="chart_ais5"></div></div>
	<div class="span6">X vs Y<div id="chart_ais6"></div></div>
</div>
<?php }?>
<h3>Corriente de Excitacion</h3>
<hr>
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="6" class="center">Taps Mal Estado</th>
		</tr>
		<tr>
			<th>Prueba</th>
			<th>Fecha</th>
			<th>Tap</th>
			<th>H1</th>
			<th>H3</th>
			<th>Resultado</th>
		</tr>
	</thead>
	<tbody>
				
<?php 
$json_corriente_ext=json_decode($json_ext, true );
$size_rows=count($json_corriente_ext);
for ($i=0; $i < $size_rows; $i++) { ?>
	<tr>
		<td class="center"><?php echo $json_corriente_ext[$i]['prueba']?></td>
		<td class="center"><?php echo $json_corriente_ext[$i]['fecha']?></td>
		<td class="center"><?php echo $json_corriente_ext[$i]['tap']?></td>
		<td class="center"><?php echo $json_corriente_ext[$i]['h1']?></td>
		<td class="center"><?php echo $json_corriente_ext[$i]['h3']?></td>
		<td class="center" style="color:red;"><?php echo $json_corriente_ext[$i]['res']?></td>
	</tr>
	
<?php }

?>
	</tbody>
</table>

<h3>Relacion de Transformacion</h3>
<hr>
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="18" class="center">Taps Mal Estado</th>
		</tr>
		<tr>
			<th>Prueba</th>
			<th>Fecha</th>
			<th>Tabla</th>
			<th>Tap</th>
			<th>Hvolt</th>
			<th>Xvolt</th>
			<th>Cal</th>
			<th>R1</th>
			<th>%ER1</th>
			<th>R2</th>
			<th>%ER2</th>
			<th>R3</th>
			<th>%ER3</th>
			<th>Min</th>
			<th>Max</th>
			<th>R1</th>
			<th>R2</th>
			<th>R3</th>
		</tr>
	</thead>
	<tbody>
				
<?php 
$json_rt=json_decode($json_rel_tranfs, true );
$size_rows=count($json_rt);
for ($i=0; $i < $size_rows; $i++) { ?>
	<tr>
		<td class="center"><?php echo $json_rt[$i]['prueba']?></td>
		<td class="center"><?php echo $json_rt[$i]['fecha']?></td>
		<td class="center"><?php echo $json_rt[$i]['tabla']?></td>
		<td class="center"><?php echo $json_rt[$i]['tap1']?></td>
		<td class="center"><?php echo $json_rt[$i]['hvolt']?></td>
		<td class="center"><?php echo $json_rt[$i]['xvolt']?></td>
		<td class="center"><?php echo $json_rt[$i]['calculado']?></td>
		<td class="center"><?php echo $json_rt[$i]['ratio1']?></td>
		<td class="center"><?php echo $json_rt[$i]['error_ratio1']?></td>
		<td class="center"><?php echo $json_rt[$i]['ratio2']?></td>
		<td class="center"><?php echo $json_rt[$i]['error_ratio2']?></td>
		<td class="center"><?php echo $json_rt[$i]['ratio3']?></td>
		<td class="center"><?php echo $json_rt[$i]['error_ratio3']?></td>
		<td class="center"><?php echo $json_rt[$i]['minlim']?></td>
		<td class="center"><?php echo $json_rt[$i]['maxlim']?></td>
		<?php if($json_rt[$i]['t_ratio1']=='ACEPTABLE'){?>
		<td class="center" style="color:green;"><?php echo $json_rt[$i]['t_ratio1']?></td>
		<?php }else{?>
		<td class="center" style="color:red;"><?php echo $json_rt[$i]['t_ratio1']?></td>
		<?php }?>

		<?php if($json_rt[$i]['t_ratio2']=='ACEPTABLE'){?>
		<td class="center" style="color:green;"><?php echo $json_rt[$i]['t_ratio2']?></td>
		<?php }else{?>
		<td class="center" style="color:red;"><?php echo $json_rt[$i]['t_ratio2']?></td>
		<?php }?>

		<?php if($json_rt[$i]['t_ratio3']=='ACEPTABLE'){?>
		<td class="center" style="color:green;"><?php echo $json_rt[$i]['t_ratio3']?></td>
		<?php }else{?>
		<td class="center" style="color:red;"><?php echo $json_rt[$i]['t_ratio3']?></td>
		<?php }?>
	</tr>
	
<?php }

?>
	</tbody>
</table>

<h3>Resistencia de Devanados</h3>
<hr>
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="20" class="center">Taps Mal Estado</th>
		</tr>
		<tr>
			<th>Prueba</th>
			<th>Fecha</th>
			<th>Devanado</th>
			<th>Tap</th>
			<th>Medido1</th>
			<th>Adj1</th>
			<th>Corregido1</th>
			<th>Medido2</th>
			<th>Adj2</th>
			<th>Corregido2</th>
			<th>Medido3</th>
			<th>Adj3</th>
			<th>Corregido3</th>
			<th>Prom</th>
			<th>B1</th>
			<th>B2</th>
			<th>B3</th>
			<th>%B1</th>
			<th>%B2</th>
			<th>%B3</th>
		</tr>
	</thead>
	<tbody>
				
<?php 
$json_resist=json_decode($json_resd, true );
$size_rows=count($json_resist);
for ($i=0; $i < $size_rows; $i++) { ?>
	<tr>
		<td class="center"><?php echo $json_resist[$i]['prueba']?></td>
		<td class="center"><?php echo $json_resist[$i]['fecha']?></td>
		<td class="center"><?php echo $json_resist[$i]['devanado']?></td>
		<td class="center"><?php echo $json_resist[$i]['tap']?></td>
		<td class="center"><?php echo $json_resist[$i]['f1_medido']?></td>
		<td class="center"><?php echo $json_resist[$i]['f1_adj']?></td>
		<td class="center"><?php echo $json_resist[$i]['f1_corregido']?></td>
		<td class="center"><?php echo $json_resist[$i]['f2_medido']?></td>
		<td class="center"><?php echo $json_resist[$i]['f2_adj']?></td>
		<td class="center"><?php echo $json_resist[$i]['f2_corregido']?></td>
		<td class="center"><?php echo $json_resist[$i]['f3_medido']?></td>
		<td class="center"><?php echo $json_resist[$i]['f3_adj']?></td>
		<td class="center"><?php echo $json_resist[$i]['f3_corregido']?></td>
		<td class="center"><?php echo $json_resist[$i]['vcorregido']?></td>

		<?php if($json_resist[$i]['b1']=='OK'){?>
		<td class="center" style="color:green;"><?php echo $json_resist[$i]['b1']?></td>
		<?php }else{?>
		<td class="center" style="color:red;"><?php echo $json_resist[$i]['b1']?></td>
		<?php }?>

		<?php if($json_resist[$i]['b2']=='OK'){?>
		<td class="center" style="color:green;"><?php echo $json_resist[$i]['b2']?></td>
		<?php }else{?>
		<td class="center" style="color:red;"><?php echo $json_resist[$i]['b2']?></td>
		<?php }?>

		<?php if($json_resist[$i]['b3']=='OK'){?>
		<td class="center" style="color:green;"><?php echo $json_resist[$i]['b3']?></td>
		<?php }else{?>
		<td class="center" style="color:red;"><?php echo $json_resist[$i]['b3']?></td>
		<?php }?>

		<td class="center"><?php echo $json_resist[$i]['p_b1']?></td>
		<td class="center"><?php echo $json_resist[$i]['p_b2']?></td>
		<td class="center"><?php echo $json_resist[$i]['p_b3']?></td>
		
	</tr>
	
<?php }

?>
	</tbody>
</table>