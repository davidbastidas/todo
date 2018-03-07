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
			'Resistencia Devanados'.
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>
<style>
.owerflowy {overflow-y: auto;}
</style>
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
	$(document).on("click", ".borrar_fila", function(){
		var idtr=$(this).parent().parent().attr("id");
		var idtable=$(this).parent().parent().parent().parent().attr("id");
		var idtable_eva="table_eva_"+$(this).parent().parent().parent().parent().attr("name");
		console.log(idtable_eva);
		var n=$('#'+idtable+' >tbody >tr').length;
		$("#"+idtable).find('#n_taps').html((n-1)+" taps");

		$("#"+idtable+" #"+idtr).remove();
		$("#"+idtable_eva+" #"+idtr).remove();
	});
	$(document).on("click", ".borrar_tabla", function(){
		var r = confirm("¿Desea Eliminar la Tabla?");
		if (r == true) {
			/*var texto=$(this).parent().parent().find("h6").html();
			if(texto.indexOf("Devanado H")!=-1){
				$('#tabla_devanado').append('<option value="h">Devanado H</option>');
			} else if(texto.indexOf("Devanado X")!=-1){
				$('#tabla_devanado').append('<option value="x">Devanado X</option>');
			} else if(texto.indexOf("Devanado Y")!=-1){
				$('#tabla_devanado').append('<option value="y">Devanado Y</option>');
			}*/
			n_tablas--;
		    $(this).parent().parent().parent().remove();
		}
		
	});
	$(document).on("keyup", "#f1_medido, #f2_medido, #f3_medido, #tap_input", function(){

		var idmedido=$(this).attr("id");
		var idtr=$(this).parent().parent().attr("id");
		var nametable=$(this).parent().parent().parent().parent().attr("name");
		var promedio=$('#table_eva_'+nametable+' #'+idtr).find('vcorregido');
		var nombre_devanado=$(this).parent().parent().parent().parent().find("nombre_devanado").html();

		var texto_tap=$(this).closest('td').siblings().find('#tap_input');
		$('#table_eva_'+nametable+' #'+idtr).find('tap_texto').html(texto_tap.val());

		var adj1=$(this).closest('td').siblings().find('f1_adj');
		var adj2=$(this).closest('td').siblings().find('f2_adj');
		var adj3=$(this).closest('td').siblings().find('f3_adj');

		var corregido1=$(this).closest('td').siblings().find('f1_corregido');
		var corregido2=$(this).closest('td').siblings().find('f2_corregido');
		var corregido3=$(this).closest('td').siblings().find('f3_corregido');

		var pb1=$('#table_eva_'+nametable+' #'+idtr).find('p_b1');
		var pb2=$('#table_eva_'+nametable+' #'+idtr).find('p_b2');
		var pb3=$('#table_eva_'+nametable+' #'+idtr).find('p_b3');

		var b1=$('#table_eva_'+nametable+' #'+idtr).find('b1');
		var b2=$('#table_eva_'+nametable+' #'+idtr).find('b2');
		var b3=$('#table_eva_'+nametable+' #'+idtr).find('b3');

		//variables para calculos
		var medido=parseFloat($(this).val());
		var c_adj;
		var c_corregido;
		var c_promedio;
		var c_pb1;
		var c_pb2;
		var c_pb3;
		if(nombre_devanado=="H"){//X ADJ T Centigrados
			c_adj=(234.5+temperatura_ambiente)/(234.5+temperatura_h);
		}else if(nombre_devanado=="X"){
			c_adj=(234.5+temperatura_ambiente)/(234.5+temperatura_x);
		}else if(nombre_devanado=="Y"){
			c_adj=(234.5+temperatura_ambiente)/(234.5+temperatura_y);
		}
		c_corregido=medido*c_adj;//columna corregido
		console.log(c_adj);
		if(idmedido=="f1_medido"){//colocar los valores donde corresponde
			corregido1.html(c_corregido.toFixed(3));
			adj1.html(c_adj.toFixed(3));
		}else if(idmedido=="f2_medido"){
			corregido2.html(c_corregido.toFixed(3));
			adj2.html(c_adj.toFixed(3));
		}else if(idmedido=="f3_medido"){
			corregido3.html(c_corregido.toFixed(3));
			adj3.html(c_adj.toFixed(3));
		}
		c_promedio=(parseFloat(corregido1.html())+parseFloat(corregido2.html())+parseFloat(corregido3.html()))/3; //promedio
		promedio.html(c_promedio.toFixed(3));

		var c_corregido1=parseFloat(corregido1.html());
		var c_corregido2=parseFloat(corregido2.html());
		var c_corregido3=parseFloat(corregido3.html());

		c_pb1=((c_promedio-c_corregido1)/c_corregido1)*100;
		pb1.html(Math.abs(c_pb1).toFixed(4));
		//console.log(c_pb1);
		if(c_pb1>5 ){
			b1.html("< 5% Prom");
			b1.css("color", "red");
		}else if(c_pb1<-5){
			b1.html("> 5% Prom");
			b1.css("color", "red");
		}else{
			b1.html("OK");
			b1.css("color", "green");
		}

		c_pb2=((c_promedio-c_corregido2)/c_corregido2)*100;
		pb2.html(Math.abs(c_pb2).toFixed(4));
		if(c_pb2>5 ){
			b2.html("< 5% Prom");
			b2.css("color", "red");
		}else if(c_pb2<-5){
			b2.html("> 5% Prom");
			b2.css("color", "red");
		}else{
			b2.html("OK");
			b2.css("color", "green");
		}

		c_pb3=((c_promedio-c_corregido3)/c_corregido3)*100;
		pb3.html(Math.abs(c_pb3).toFixed(4));
		if(c_pb3>5 ){
			b3.html("< 5% Prom");
			b3.css("color", "red");
		}else if( c_pb3<-5){
			b3.html("> 5% Prom");
			b3.css("color", "red");
		}else{
			b3.html("OK");
			b3.css("color", "green");
		}
	});
	function crearJson(){
		var tablas='{"tablas":[';
		var x=1;
		$("table").each(function(){
		  	var curTable = $(this);
		  	if(curTable.attr('id').indexOf("eva")>=0){
		  		tablas+=', "tabla_eva":"'+curTable.attr('id')+'"}';
		  	}else{
		  		if(x==1){
		  			tablas+='{"tabla":"'+curTable.attr('id')+'"';
		  		}else{
		  			tablas+=',{"tabla":"'+curTable.attr('id')+'"';
		  		}
		  	}
		  	x++;
		});
		tablas+=']}';
		if(tablas.length>0){

			var data = JSON.parse(tablas);
			var json='{'+
  					'"observaciones": "'+$("#observacion").val()+'", "tablas": [';
  			console.log(n_tablas);
			for (var i = 0; i < n_tablas; i++) {
				if(i==0){
					json+='{"corriente": "'+$("#"+data.tablas[i].tabla).find("#corriente").val()+'",'+
						  ' "devanado":"'+$("#"+data.tablas[i].tabla).find("nombre_devanado").html()+'", "filas": [';
				}else{
					json+=',{"corriente": "'+$("#"+data.tablas[i].tabla).find("#corriente").val()+'",'+
						  ' "devanado":"'+$("#"+data.tablas[i].tabla).find("nombre_devanado").html()+'", "filas": [';
				}
				
				var n=$('#'+data.tablas[i].tabla+' >tbody >tr').length;

				for (var y = 1; y <= n; y++) {
					if(y==1){
						json+='{'+
					        '"tap": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#tap_input").val()+'",'+
					        '"f1_medido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#f1_medido").val()+'",'+
					        '"f1_adj": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f1_adj").html()+'",'+
					        '"f1_corregido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f1_corregido").html()+'",'+
					        '"f2_medido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#f2_medido").val()+'",'+
					        '"f2_adj": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f2_adj").html()+'",'+
					        '"f2_corregido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f2_corregido").html()+'",'+
					        '"f3_medido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#f3_medido").val()+'",'+
					        '"f3_adj": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f3_adj").html()+'",'+
					        '"f3_corregido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f3_corregido").html()+'",'+
					        '"vcorregido": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("vcorregido").html()+'",'+
					        '"b1": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("b1").html()+'",'+
					        '"b2": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("b2").html()+'",'+
					        '"b3": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("b3").html()+'",'+
					        '"p_b1": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("p_b1").html()+'",'+
					        '"p_b2": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("p_b2").html()+'",'+
					        '"p_b3": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("p_b3").html()+'"'+
					      '}';
					}else{
						json+=',{'+
					        '"tap": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#tap_input").val()+'",'+
					        '"f1_medido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#f1_medido").val()+'",'+
					        '"f1_adj": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f1_adj").html()+'",'+
					        '"f1_corregido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f1_corregido").html()+'",'+
					        '"f2_medido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#f2_medido").val()+'",'+
					        '"f2_adj": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f2_adj").html()+'",'+
					        '"f2_corregido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f2_corregido").html()+'",'+
					        '"f3_medido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("#f3_medido").val()+'",'+
					        '"f3_adj": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f3_adj").html()+'",'+
					        '"f3_corregido": "'+$('#'+data.tablas[i].tabla+' #tr_'+y).find("f3_corregido").html()+'",'+
					        '"vcorregido": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("vcorregido").html()+'",'+
					        '"b1": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("b1").html()+'",'+
					        '"b2": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("b2").html()+'",'+
					        '"b3": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("b3").html()+'",'+
					        '"p_b1": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("p_b1").html()+'",'+
					        '"p_b2": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("p_b2").html()+'",'+
					        '"p_b3": "'+$('#'+data.tablas[i].tabla_eva+' #tr_'+y).find("p_b3").html()+'"'+
					      '}';
					}
				}
				json+=']}';
			}
			json+=']}';
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
	}
	var temperatura_h;
	var temperatura_x;
	var temperatura_y;
	var temperatura_ambiente;
	function cargarDatos(){
		var devanados=parseInt('<?php echo $devanados?>');
		if(devanados==2){
			$('#tabla_devanado').append(
				'<option value="h">Devanado H</option><option value="x">Devanado X</option>'
			);
		}else{
			$('#tabla_devanado').append(
				'<option value="h">Devanado H</option><option value="x">Devanado X</option><option value="y">Devanado Y</option>'
			);
		}

		var temperaturas='<?php echo $temperaturas?>';
		if(temperaturas.length>0){
			var obj_temp = JSON.parse(temperaturas);
			//obj_temp.temperaturas[0].temp_aceite
			temperatura_h=parseFloat(obj_temp.temperaturas[0].temp_devh);
			temperatura_x=parseFloat(obj_temp.temperaturas[0].temp_devx);
			temperatura_y=parseFloat(obj_temp.temperaturas[0].temp_devy);
			temperatura_ambiente=parseFloat(obj_temp.temperaturas[0].temp_ambiente);
		}

		var text='<?php echo $model_datos->datos?>';
		if(text.length>0){
			var data = JSON.parse(text);
			var n_tablas=data.tablas.length;
			var n_filas=0;
			for (var i = 0; i < n_tablas; i++) {
				if(data.tablas[i].devanado=="H"){
					$("#tabla_devanado").val("h");
				}else if(data.tablas[i].devanado=="X"){
					$("#tabla_devanado").val("x");
				}else if(data.tablas[i].devanado=="Y"){
					$("#tabla_devanado").val("y");
				}
				nueva_tabla(data.tablas[i].corriente);
				n_filas=data.tablas[i].filas.length;
				for (var y = 0; y < n_filas; y++) {
					$('#table_'+(i+1)+' tbody').append(
						'<tr id="tr_'+(y+1)+'">'+
							'<td class="center input-mini"><input id="tap_input" class="input-mini textomax" type="text" value="'+data.tablas[i].filas[y].tap+'"/></td>'+
							'<td class="center input-mini"><input id="f1_medido" class="input-mini decimal decimalmax" type="text" value="'+data.tablas[i].filas[y].f1_medido+'"/></td>'+
							'<td class="center input-mini"><f1_adj>'+data.tablas[i].filas[y].f1_adj+'</f1_adj></td>'+
							'<td class="center input-mini"><f1_corregido>'+data.tablas[i].filas[y].f1_corregido+'</f1_corregido></td>'+

							'<td class="center input-mini"><input id="f2_medido" class="input-mini decimal decimalmax" type="text" value="'+data.tablas[i].filas[y].f2_medido+'"/></td>'+
							'<td class="center input-mini"><f2_adj>'+data.tablas[i].filas[y].f2_adj+'</f2_adj></td>'+
							'<td class="center input-mini"><f2_corregido>'+data.tablas[i].filas[y].f2_corregido+'</f2_corregido></td>'+

							'<td class="center input-mini"><input id="f3_medido" class="input-mini decimal decimalmax" type="text" value="'+data.tablas[i].filas[y].f3_medido+'"/></td>'+
							'<td class="center input-mini"><f3_adj>'+data.tablas[i].filas[y].f3_adj+'</f3_adj></td>'+
							'<td class="center input-mini"><f3_corregido>'+data.tablas[i].filas[y].f3_corregido+'</f3_corregido></td>'+
							'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila")"><i class="icon-trash bigger-120"></i></button></td>'+
						'</tr>'
					);
					$('#table_eva_'+(i+1)+' tbody').append(
						'<tr id="tr_'+(y+1)+'">'+
							'<td class="center input-mini"><tap_texto>'+data.tablas[i].filas[y].tap+'</tap_texto></td>'+
							'<td class="center input-mini"><vcorregido>'+data.tablas[i].filas[y].vcorregido+'</vcorregido></td>'+
							'<td class="center input-mini"><b1>'+data.tablas[i].filas[y].b1+'</b1></td>'+
							'<td class="center input-mini"><b2>'+data.tablas[i].filas[y].b2+'</b2></td>'+
							'<td class="center input-mini"><b3>'+data.tablas[i].filas[y].b3+'</b3></td>'+

							'<td class="center input-mini"><p_b1>'+data.tablas[i].filas[y].p_b1+'</p_b1></td>'+
							'<td class="center input-mini"><p_b2>'+data.tablas[i].filas[y].p_b2+'</p_b2></td>'+
							'<td class="center input-mini"><p_b3>'+data.tablas[i].filas[y].p_b3+'</p_b3></td>'+
						'</tr>'
					);
				}
				$('#table_'+(i+1)).find('#n_taps').html(n_filas+" taps");
				$("#table_eva_"+(i+1)+" tbody b1,b2,b3").each(function() {
					if($(this).html()=="OK"){
						$(this).css("color", "green");
					}else{
						$(this).css("color", "red");
					}
				});
			}

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
	function nuevotap(tabla,tabla_eva){
		
		var padreid=$("#"+tabla.id).parent().parent().parent().attr("id");
		var n_taps=parseInt($("#"+padreid).find('#taps').val());

		
		var n=$('#'+tabla.id+' >tbody >tr').length;
		
		for (var i = (n+1); i <=(n+n_taps); i++) {
			$('#'+tabla.id+' tbody').append(
				'<tr id="tr_'+i+'">'+
					'<td class="center input-mini"><input id="tap_input" class="input-mini textomax" type="text"/></td>'+
					'<td class="center input-mini"><input id="f1_medido" class="input-mini decimal decimalmax" type="text"/></td>'+
					'<td class="center input-mini"><f1_adj></f1_adj></td>'+
					'<td class="center input-mini"><f1_corregido></f1_corregido></td>'+

					'<td class="center input-mini"><input id="f2_medido" class="input-mini decimal decimalmax" type="text"/></td>'+
					'<td class="center input-mini"><f2_adj></f2_adj></td>'+
					'<td class="center input-mini"><f2_corregido></f2_corregido></td>'+

					'<td class="center input-mini"><input id="f3_medido" class="input-mini decimal decimalmax" type="text"/></td>'+
					'<td class="center input-mini"><f3_adj></f3_adj></td>'+
					'<td class="center input-mini"><f3_corregido></f3_corregido></td>'+
					'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila")"><i class="icon-trash bigger-120"></i></button></td>'+
				'</tr>'
			);
			$('#'+tabla_eva.id+' tbody').append(
				'<tr id="tr_'+i+'">'+
					'<td class="center input-mini"><tap_texto></tap_texto></td>'+
					'<td class="center input-mini"><vcorregido></vcorregido></td>'+
					'<td class="center input-mini"><b1></b1></td>'+
					'<td class="center input-mini"><b2></b2></td>'+
					'<td class="center input-mini"><b3></b3></td>'+

					'<td class="center input-mini"><p_b1></p_b1></td>'+
					'<td class="center input-mini"><p_b2></p_b2></td>'+
					'<td class="center input-mini"><p_b3></p_b3></td>'+
				'</tr>'
			);
		}
		$("#"+tabla.id).find('#n_taps').html((n+n_taps)+" taps");
	}
	var n_tablas=0;
	function nueva_tabla(corriente){
		var devanado_seleccionado=$('#tabla_devanado').val();
		var conexion="- Conexión "+$('#conexion').val();
		var texto_devanado="";
		var texto_div="";
		var fase1="";
		var fase2="";
		var fase3="";
		var pasa=true;
		if(devanado_seleccionado=="h"){
			texto_div="H "+conexion;
			texto_devanado="H";
			if($('#conexion').val()=="Delta"){
				fase1="FASES (H1-H2) = B1";
				fase2="FASES (H2-H3) = B2";
				fase3="FASES (H3-H0) = B3";
			}else{
				fase1="FASES (H1-H0) = B1";
				fase2="FASES (H2-H0) = B2";
				fase3="FASES (H3-H0) = B3";
			}
		}else if(devanado_seleccionado=="x"){
			texto_div="X "+conexion;
			texto_devanado="X";
			if($('#conexion').val()=="Delta"){
				fase1="FASES (X1-X2) = B1";
				fase2="FASES (X2-X3) = B2";
				fase3="FASES (X3-X0) = B3";
			}else{
				fase1="FASES (X1-X0) = B1";
				fase2="FASES (X2-X0) = B2";
				fase3="FASES (X3-X0) = B3";
			}
			
		}else if(devanado_seleccionado=="y"){
			texto_div="Y "+conexion;
			texto_devanado="Y";
			if($('#conexion').val()=="Delta"){
				fase1="FASES (Y1-Y2) = B1";
				fase2="FASES (Y2-Y3) = B2";
				fase3="FASES (Y3-Y0) = B3";
			}else{
				fase1="FASES (Y1-Y0) = B1";
				fase2="FASES (Y2-Y0) = B2";
				fase3="FASES (Y3-Y0) = B3";
			}
			
		}else{
			pasa=false;
		}
		if(pasa){
			//$('option:selected', '#tabla_devanado').remove();
			n_tablas++;
			$("#grupo_tablas").append(
				'<div class="widget-box" id="contenedor_tabla">'+
					'<div class="widget-header widget-header-small header-color-orange">'+
						'<h6>Tabla '+n_tablas+' Devanado '+texto_div+'</h6>'+
						'<div class="widget-toolbar">'+
							'<a data-action="collapse" href="#">'+
								'<i class="icon-chevron-up"></i>'+
							'</a>'+
							'<a href="#" class="borrar_tabla">'+
								'<i class="icon-remove"></i>'+
							'</a>'+
						'</div>'+
					'</div>'+
					'<div class="widget-body owerflowy">'+
						'<div class="widget-body-inner" style="display: block;">'+
							'<div class="widget-main" id="div_tabla_'+n_tablas+'">'+
								'<div class="row-fluid">'+
								  	'<div class="span12 form-inline">'+
								  		'<label for="taps">Agrega la cantidad de taps</label>'+
								  		'<div class="form-inline">'+
								  			'<input id="taps" class="input-mini decimal decimalmax" type="text" placeholder="N de taps"/>'+
										  	'<button class="btn btn-small btn-info" onclick="nuevotap(table_'+n_tablas+',table_eva_'+n_tablas+')">'+
												'<i class="icon-bolt bigger-125"></i>'+
												'Agregar Taps'+
											'</button>'+
								  		'</div>'+
								  	'</div>'+
								'</div>'+
								
								'<hr>'+
								'<div class="row-fluid">'+
									'<div class="span10">'+
										'<table id="table_'+n_tablas+'" class="table table-bordered" name="'+n_tablas+'">'+
											'<thead>'+
												'<tr>'+
													'<th colspan="3" class="center"><input id="corriente" class="input-medium textomax" type="text" placeholder="Corriente Inyectada" value="'+corriente+'"/></th>'+
													'<th colspan="8" class="center">Resistencia de Devanado <nombre_devanado>'+texto_devanado+'</nombre_devanado> <span class="label label-inverse arrowed-in" id="n_taps"></th>'+
												'</tr>'+
												'<tr>'+
													'<th class="center" rowspan="3">Tap</th>'+
													'<th class="center" colspan="3">'+fase1+'</th>'+
													'<th class="center" colspan="3">'+fase2+'</th>'+
													'<th class="center" colspan="4">'+fase3+'</th>'+
												'</tr>'+
												'<tr>'+
													'<th class="center" colspan="2">RD DE PLACA  m &#937;</th>'+
													'<th class="center">&#937; *1000</th>'+
													'<th class="center" colspan="2">RD DE PLACA  m &#937;</th>'+
													'<th class="center"> &#937;*1000</th>'+
													'<th class="center" colspan="2">RD DE PLACA  m &#937;</th>'+
													'<th class="center">&#937; *1000</th>'+
													'<th class="center"></th>'+
												'</tr>'+
												'<tr>'+
													'<th class="center">MEDIDO</th>'+
													'<th class="center">X ADJ T &#8451;</th>'+
													'<th class="center">CORREGIDO</th>'+

													'<th class="center">MEDIDO</th>'+
													'<th class="center">X ADJ T &#8451;</th>'+
													'<th class="center">CORREGIDO</th>'+

													'<th class="center">MEDIDO</th>'+
													'<th class="center">X ADJ T &#8451;</th>'+
													'<th class="center">CORREGIDO</th>'+
													'<th class="center">Accion</th>'+
												'</tr>'+
											'</thead>'+
											'<tbody>'+
											'</tbody>'+
										'</table>'+
									'</div>'+
									'<div class="span2">'+
										'<table id="table_eva_'+n_tablas+'" class="table table-bordered">'+
											'<thead>'+
												'<tr>'+
													'<th colspan="8" class="center">Evaluado En base al Promedio </th>'+
												'</tr>'+
												'<tr>'+
													'<th class="center">Tap</th>'+
													'<th class="center">Promedio</th>'+
													'<th class="center">B1</th>'+
													'<th class="center">B2</th>'+
													'<th class="center">B3</th>'+
													'<th colspan="3" class="center">%</th>'+
												'</tr>'+
												'<tr>'+
													'<th class="center"></th>'+
													'<th class="center">Valor corregido</th>'+
													'<th class="center">valor</th>'+
													'<th class="center">valor</th>'+
													'<th class="center">valor</th>'+
													'<th class="center">B1</th>'+
													'<th class="center">B2</th>'+
													'<th class="center">B3</th>'+
												'</tr>'+
											'</thead>'+
											'<tbody>'+
											'</tbody>'+
										'</table>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'
				);
		}
		
	}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Resistencia de Devanado</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
  
</div>
<div class="row-fluid">
	<label for="tabla_devanado">Elija el devanado para crear tabla</label>
  	<div class="span12 form-inline">
		<select id="tabla_devanado">
		</select>
		<select id="conexion">
			<option value="Delta">Delta</option>
			<option value="Estrella">Estrella</option>
		</select>
		<button class="btn btn-small btn-danger" onclick="nueva_tabla('')">
			<i class="icon-bolt"></i>
			Agregar Tabla
			<i class="icon-arrow-right icon-on-right"></i>
		</button>
  	</div>
</div>
<hr>
<div id="grupo_tablas" class="grupo_tablas" >

</div>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>