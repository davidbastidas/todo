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
			'Relacion Transformacion'.
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
	console.log(idtable);
	var n=$('#'+idtable+' >tbody >tr').length;
	$("#"+idtable).find('#n_taps').html((n-1)+" taps");

	$("#"+idtable+" #"+idtr).remove();
});
$(document).on("click", ".borrar_tabla", function(){
	var r = confirm("¿Desea Eliminar la Tabla?");
	if (r == true) {
		n_tablas--;
	    $(this).parent().parent().parent().remove();
	}
	
});
$(document).on("change", "#calculo_ratio", function(){
	var iddivtable=$(this).parent().parent().parent().attr("id");
	var idtabla=$("#"+iddivtable).find('table').attr("id");
	//recorrer la tabla y calcular todo
	var n=$('#'+idtabla+' >tbody >tr').length;

	var hvolt=0;
	var xvolt=0;
	var campo_cal;
	var ratio1=0;
	var ratio2=0;
	var ratio3=0;
	var error_ratio1=0;
	var error_ratio2=0;
	var error_ratio3=0;
	var minlim;
	var maxlim;
	var t_ratio1;
	var t_ratio2;
	var t_ratio3;
	var combinacion=$(this).val();
	
	for (var i = 1; i <= n; i++) {
		hvolt=$('#'+idtabla+' #tr_'+i).find(".calhvolt").val();
		xvolt=$('#'+idtabla+' #tr_'+i).find(".calxvolt").val();
		campo_cal=$('#'+idtabla+' #tr_'+i).find("calculado");
		minlim=$('#'+idtabla+' #tr_'+i).find("minlim");
		maxlim=$('#'+idtabla+' #tr_'+i).find("maxlim");
		
		ratio1=$('#'+idtabla+' #tr_'+i).find("#ratio1").val();
		error_ratio1=$('#'+idtabla+' #tr_'+i).find("error_ratio1");
		console.log(error_ratio1)
		ratio2=$('#'+idtabla+' #tr_'+i).find("#ratio2").val();
		error_ratio2=$('#'+idtabla+' #tr_'+i).find("error_ratio2");
		ratio3=$('#'+idtabla+' #tr_'+i).find("#ratio3").val();
		error_ratio3=$('#'+idtabla+' #tr_'+i).find("error_ratio3");
		t_ratio1=$('#'+idtabla+' #tr_'+i).find("ratio1");
		t_ratio2=$('#'+idtabla+' #tr_'+i).find("ratio2");
		t_ratio3=$('#'+idtabla+' #tr_'+i).find("ratio3");
		calculandoConexion(hvolt,xvolt,campo_cal,minlim,maxlim,combinacion,ratio1,ratio2,ratio3,t_ratio1,t_ratio2,t_ratio3,
						  error_ratio1,error_ratio2,error_ratio3);
	}
});
$(document).on("keyup", ".calhvolt, .calxvolt, .ratio", function(){
	var hvolt=0;
	if($(this).attr("class").indexOf("calhvolt")!=-1){
		hvolt=$(this).val();
	}else{
		hvolt=$(this).closest('td').siblings().find('.calhvolt').val();
	}

	var xvolt=0;
	if($(this).attr("class").indexOf("calxvolt")!=-1){
		xvolt=$(this).val();
	}else{
		xvolt=$(this).closest('td').siblings().find('.calxvolt').val();
	}

	var campo_cal=$(this).closest('td').siblings().find('calculado');
	
	var error_ratio1=0;
	var error_ratio2=0;
	var error_ratio3=0;
	error_ratio1=$(this).closest('td').siblings().find("error_ratio1");
	error_ratio2=$(this).closest('td').siblings().find("error_ratio2");
	error_ratio3=$(this).closest('td').siblings().find("error_ratio3");
	var ratio1=0;
	if($(this).attr("id")=="ratio1"){
		ratio1=$(this).val();
	}else{
		ratio1=$(this).closest('td').siblings().find('#ratio1').val();
	}
	
	var ratio2=0;
	if($(this).attr("id")=="ratio2"){
		ratio2=$(this).val();
	}else{
		ratio2=$(this).closest('td').siblings().find('#ratio2').val();
	}

	var ratio3=0;
	if($(this).attr("id")=="ratio3"){
		ratio3=$(this).val();
	}else{
		ratio3=$(this).closest('td').siblings().find('#ratio3').val();
	}
	var minlim=$(this).closest('td').siblings().find('minlim');
	var maxlim=$(this).closest('td').siblings().find('maxlim');
	var t_ratio1=$(this).closest('td').siblings().find('ratio1');
	var t_ratio2=$(this).closest('td').siblings().find('ratio2');
	var t_ratio3=$(this).closest('td').siblings().find('ratio3');
	var combinacion=$(this).closest(".widget-box").find('#calculo_ratio').val();
	calculandoConexion(hvolt,xvolt,campo_cal,minlim,maxlim,combinacion,ratio1,ratio2,ratio3,t_ratio1,t_ratio2,t_ratio3,
					   error_ratio1,error_ratio2,error_ratio3);
	
});
function calculandoConexion(hvolt,xvolt,campo_cal,minlim,maxlim,combinacion,ratio1,ratio2,ratio3,t_ratio1,t_ratio2,t_ratio3,
							error_ratio1,error_ratio2,error_ratio3){
	var calculo=0;
	if(combinacion=="ddn"){
		calculo=parseFloat(hvolt)/parseFloat(xvolt);
	}else if(combinacion=="dyn"){
		calculo=(parseFloat(hvolt)*1.732)/parseFloat(xvolt);
	}else if(combinacion=="ydn"){
		calculo=parseFloat(hvolt)/(parseFloat(xvolt)*1.732);
	}else if(combinacion=="yyn"){
		calculo=parseFloat(hvolt)/parseFloat(xvolt);
	}
	campo_cal.html(calculo.toFixed(5));
	var c_minlim=Math.abs(calculo-((calculo*0.5)/100)).toFixed(5);
	var c_maxlim=Math.abs(calculo+((calculo*0.5)/100)).toFixed(5);
	minlim.html(c_minlim);
	maxlim.html(c_maxlim);
	error_ratio1.html((((ratio1-calculo)/calculo)*100).toFixed(4));
	error_ratio2.html((((ratio2-calculo)/calculo)*100).toFixed(4));
	error_ratio3.html((((ratio3-calculo)/calculo)*100).toFixed(4));
	if(parseFloat(ratio1)>=c_minlim && parseFloat(ratio1)<=c_maxlim){
		t_ratio1.html('<span class="label label-success arrowed">ACEPTABLE</span>');
	}else{
		t_ratio1.html('<span class="label label-important arrowed-in">NO ACEPTABLE</span>');
	}
	if(parseFloat(ratio2)>=c_minlim && parseFloat(ratio2)<=c_maxlim){
		t_ratio2.html('<span class="label label-success arrowed">ACEPTABLE</span>');
	}else{
		t_ratio2.html('<span class="label label-important arrowed-in">NO ACEPTABLE</span>');
	}
	if(parseFloat(ratio3)>=c_minlim && parseFloat(ratio3)<=c_maxlim){
		t_ratio3.html('<span class="label label-success arrowed">ACEPTABLE</span>');
	}else{
		t_ratio3.html('<span class="label label-important arrowed-in">NO ACEPTABLE</span>');
	}
}
//5 parents coger el attr id y buscar id calculo_ratio, elegir el que esta value y reaizar formula
function crearJson(){
	var tablas='{"tablas":[';
	var x=1;
	$("table").each(function(){
	  	var curTable = $(this);
  		if(x==1){
  			tablas+='{"tabla":"'+curTable.attr('id')+'"}';
  		}else{
  			tablas+=',{"tabla":"'+curTable.attr('id')+'"}';
  		}
	  	x++;
	});
	tablas+=']}';
	if(tablas.length>0){
		var data = JSON.parse(tablas);
	}

	var json='{'+
			 '"observaciones": "", "tablas": [';
	for (var i = 0; i < n_tablas; i++) {
		if(i==0){
			json+='{"combinacion": "'+$("#"+data.tablas[i].tabla).parent().find("#calculo_ratio").val()+'", '+
			'"nombre":"'+$("#"+data.tablas[i].tabla).parent().parent().parent().parent().find("h6").html()+'",'+
			'"filas": [';
		}else{
			json+=',{"combinacion": "'+$("#"+data.tablas[i].tabla).parent().find("#calculo_ratio").val()+'", '+
			'"nombre":"'+$("#"+data.tablas[i].tabla).parent().parent().parent().parent().find("h6").html()+'",'+
			'"filas": [';
		}
		
		var n=$('#'+data.tablas[i].tabla+' >tbody >tr').length;
		for (var y = 1; y <= n; y++) {
			if(y==1){
				json+='{'+
			        '"tap1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".tap1").val()+'",'+
			        '"hvolt": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".calhvolt").val()+'",'+
			        '"tap2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".tap2").val()+'",'+
			        '"xvolt": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".calxvolt").val()+'",'+
			        '"calculado": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("calculado").html()+'",'+
			        '"ratio1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("#ratio1").val()+'",'+
			        '"error_ratio1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("error_ratio1").html()+'",'+
			        '"ratio2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("#ratio2").val()+'",'+
			        '"error_ratio2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("error_ratio2").html()+'",'+
			        '"ratio3": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("#ratio3").val()+'",'+
			        '"error_ratio3": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("error_ratio3").html()+'",'+
			        '"minlim": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("minlim").html()+'",'+
			        '"maxlim": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("maxlim").html()+'",'+
			        '"t_ratio1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("ratio1 span").html()+'",'+
			        '"t_ratio2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("ratio2 span").html()+'",'+
			        '"t_ratio3": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("ratio3 span").html()+'"'+
			      '}';
			}else{
				json+=',{'+
			        '"tap1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".tap1").val()+'",'+
			        '"hvolt": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".calhvolt").val()+'",'+
			        '"tap2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".tap2").val()+'",'+
			        '"xvolt": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find(".calxvolt").val()+'",'+
			        '"calculado": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("calculado").html()+'",'+
			        '"ratio1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("#ratio1").val()+'",'+
			        '"error_ratio1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("error_ratio1").html()+'",'+
			        '"ratio2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("#ratio2").val()+'",'+
			        '"error_ratio2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("error_ratio2").html()+'",'+
			        '"ratio3": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("#ratio3").val()+'",'+
			        '"error_ratio3": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("error_ratio3").html()+'",'+
			        '"minlim": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("minlim").html()+'",'+
			        '"maxlim": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("maxlim").html()+'",'+
			        '"t_ratio1": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("ratio1 span").html()+'",'+
			        '"t_ratio2": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("ratio2 span").html()+'",'+
			        '"t_ratio3": "'+$("#"+data.tablas[i].tabla+' #tr_'+y).find("ratio3 span").html()+'"'+
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
function cargarDatos(){
	var text='<?php echo $model_datos->datos?>';
	if(text.length>0){
		var obj = JSON.parse(text);
		var n_tablas=obj.tablas.length;
		var n_filas=0;
		var t_ratio1="";
		var t_ratio2="";
		var t_ratio3="";
		for (var i = 0; i < n_tablas; i++) {
			nueva_tabla(obj.tablas[i].nombre);
			n_filas=obj.tablas[i].filas.length;
			$("#table_"+(i+1)).parent().find("#calculo_ratio").val(obj.tablas[i].combinacion);
			for (var y = 0; y < n_filas; y++) {
				if(obj.tablas[i].filas[y].t_ratio1=="NO ACEPTABLE"){
					t_ratio1='<span class="label label-important arrowed-in">NO ACEPTABLE</span>';
				}else if(obj.tablas[i].filas[y].t_ratio1=="ACEPTABLE"){
					t_ratio1='<span class="label label-success arrowed">ACEPTABLE</span>';
				}
				if(obj.tablas[i].filas[y].t_ratio2=="NO ACEPTABLE"){
					t_ratio2='<span class="label label-important arrowed-in">NO ACEPTABLE</span>';
				}else if(obj.tablas[i].filas[y].t_ratio2=="ACEPTABLE"){
					t_ratio2='<span class="label label-success arrowed">ACEPTABLE</span>';
				}
				if(obj.tablas[i].filas[y].t_ratio3=="NO ACEPTABLE"){
					t_ratio3='<span class="label label-important arrowed-in">NO ACEPTABLE</span>';
				}else if(obj.tablas[i].filas[y].t_ratio3=="ACEPTABLE"){
					t_ratio3='<span class="label label-success arrowed">ACEPTABLE</span>';
				}
				$('#table_'+(i+1)+' tbody').append(
					'<tr id="tr_'+(y+1)+'">'+
						'<td class="center input-mini"><input id="ntap_'+(y+1)+'" class="input-mini textomax tap1" type="text" name="'+(y+1)+'" value="'+obj.tablas[i].filas[y].tap1+'"/></td>'+
						'<td class="center input-mini"><input id="hvolt_'+(y+1)+'" class="input-mini decimal decimalmax calhvolt" type="text" value="'+obj.tablas[i].filas[y].hvolt+'"/></td>'+
						'<td class="center input-mini"><input id="tap_'+(y+1)+'" class="input-mini textomax tap2" type="text" name="'+(y+1)+'" value="'+obj.tablas[i].filas[y].tap2+'"/></td>'+
						'<td class="center input-mini"><input id="xvolt_'+(y+1)+'" class="input-mini decimal decimalmax calxvolt" type="text" value="'+obj.tablas[i].filas[y].xvolt+'"/></td>'+
						'<td class="center input-mini"><calculado id="cal_'+(y+1)+'">'+obj.tablas[i].filas[y].calculado+'</calculado></td>'+
						'<td class="center input-mini"><input id="ratio1" class="input-mini decimal decimalmax ratio" type="text" value="'+obj.tablas[i].filas[y].ratio1+'"/></td>'+
						'<td class="center input-mini"><error_ratio1>'+obj.tablas[i].filas[y].error_ratio1+'</error_ratio1></td>'+
						'<td class="center input-mini"><input id="ratio2" class="input-mini decimal decimalmax ratio" type="text" value="'+obj.tablas[i].filas[y].ratio2+'"/></td>'+
						'<td class="center input-mini"><error_ratio2>'+obj.tablas[i].filas[y].error_ratio2+'</error_ratio2></td>'+
						'<td class="center input-mini"><input id="ratio3" class="input-mini decimal decimalmax ratio" type="text" value="'+obj.tablas[i].filas[y].ratio3+'"/></td>'+
						'<td class="center input-mini"><error_ratio3>'+obj.tablas[i].filas[y].error_ratio3+'</error_ratio3></td>'+
						'<td class="center input-mini"><minlim id="minlim_'+(y+1)+'">'+obj.tablas[i].filas[y].minlim+'</minlim></td>'+
						'<td class="center input-mini"><maxlim id="maxlim_'+(y+1)+'">'+obj.tablas[i].filas[y].maxlim+'</maxlim></td>'+
						'<td class="center input-mini"><ratio1 id="t_ratio1_'+(y+1)+'">'+t_ratio1+'</ratio1></td>'+
						'<td class="center input-mini"><ratio2 id="t_ratio2_'+(y+1)+'">'+t_ratio2+'</ratio2></td>'+
						'<td class="center input-mini"><ratio3 id="t_ratio3_'+(y+1)+'">'+t_ratio3+'</ratio3></td>'+
						'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila")"><i class="icon-trash bigger-120"></i></button></td>'+
					'</tr>'
				);
			}
		}
		$("#observacion").val(obj.observaciones);
	}
	var estado='<?php echo $estado?>';
	if (estado==3){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
function nuevotap(tabla){
	
	var padreid=$("#"+tabla.id).parent().attr("id");
	var n_taps=parseInt($("#"+padreid).find('#taps').val());

	
	var n=$('#'+tabla.id+' >tbody >tr').length;
	
	for (var i = (n+1); i <=(n+n_taps); i++) {
		$('#'+tabla.id+' tbody').append(
			'<tr id="tr_'+i+'">'+
				'<td class="center input-mini"><input id="ntap_'+i+'" class="input-mini textomax tap1" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="hvolt_'+i+'" class="input-mini decimal decimalmax calhvolt" type="text"/></td>'+
				'<td class="center input-mini"><input id="tap_'+i+'" class="input-mini textomax tap2" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="xvolt_'+i+'" class="input-mini decimal decimalmax calxvolt" type="text"></td>'+
				'<td class="center input-mini"><calculado id="cal_'+i+'"></calculado></td>'+
				'<td class="center input-mini"><input id="ratio1" class="input-mini decimal decimalmax ratio" type="text"></td>'+
				'<td class="center input-mini"><error_ratio1></error_ratio1></td>'+
				'<td class="center input-mini"><input id="ratio2" class="input-mini decimal decimalmax ratio" type="text"></td>'+
				'<td class="center input-mini"><error_ratio2></error_ratio2></td>'+
				'<td class="center input-mini"><input id="ratio3" class="input-mini decimal decimalmax ratio" type="text"></td>'+
				'<td class="center input-mini"><error_ratio3></error_ratio3></td>'+
				'<td class="center input-mini"><minlim id="minlim_'+i+'"></minlim></td>'+
				'<td class="center input-mini"><maxlim id="maxlim_'+i+'"></maxlim></td>'+
				'<td class="center input-mini"><ratio1 id="t_ratio1_'+i+'"></ratio1></td>'+
				'<td class="center input-mini"><ratio2 id="t_ratio2_'+i+'"></ratio2></td>'+
				'<td class="center input-mini"><ratio3 id="t_ratio3_'+i+'"></ratio3></td>'+
				'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila")"><i class="icon-trash bigger-120"></i></button></td>'+
			'</tr>'
			);
	}
	$("#"+tabla.id).find('#n_taps').html((n+n_taps)+" taps");
}
var n_tablas=0;
function nueva_tabla(nombre){
	var nom_tabla="";
	if(nombre==""){
		nom_tabla=$("#nombre_tabla option:selected").text();
	}else{
		nom_tabla=nombre;
	}
	n_tablas++;
	$("#grupo_tablas").append(
		'<div class="widget-box" id="contenedor_tabla">'+
			'<div class="widget-header widget-header-small header-color-orange">'+
				'<h6>'+nom_tabla+'</h6>'+
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
						  	'<div class="span6">'+
								'<label for="calculo_ratio">Carcular Ratio</label>'+
								'<select id="calculo_ratio">'+
									'<option value="ddn">Delta/Delta(Ddn)</option>'+
									'<option value="dyn">Delta/Estrella(Dyn)</option>'+
									'<option value="ydn">Estrella/Delta(Ydn)</option>'+
									'<option value="yyn">Estrella/Estrella(Yyn)</option>'+
								'</select>'+
						  	'</div>'+
						  	'<div class="span6 form-inline">'+
						  		'<label for="taps">Agrega la cantidad de taps</label>'+
						  		'<div class="form-inline">'+
						  			'<input id="taps" class="input-mini decimalmax decimal" type="text" placeholder="N de taps"/>'+
								  	'<button class="btn btn-small btn-info" onclick="nuevotap(table_'+n_tablas+')">'+
										'<i class="icon-bolt bigger-125"></i>'+
										'Agregar Taps'+
									'</button>'+
						  		'</div>'+
						  	'</div>'+
						'</div>'+
						
						'<hr>'+
						'<table id="table_'+n_tablas+'" class="table table-bordered">'+
							'<thead>'+
								'<tr>'+
									'<th colspan="17" class="center">Calculadora de Ratio <span class="label label-inverse arrowed-in" id="n_taps"></span></th>'+
								'</tr>'+
								'<tr>'+
									'<th class="center">Tap</th>'+
									'<th class="center">Hvolt</th>'+
									'<th class="center">Tap</th>'+
									'<th class="center">Xvolt</th>'+
									'<th class="center">Cal</th>'+
									'<th class="center">Ratio1</th>'+
									'<th class="center">%Error</th>'+
									'<th class="center">Ratio2</th>'+
									'<th class="center">%Error</th>'+
									'<th class="center">Ratio3</th>'+
									'<th class="center">%Error</th>'+
									'<th class="center">Min.Lim</th>'+
									'<th class="center">Max.Lim</th>'+
									'<th class="center">Ratio1</th>'+
									'<th class="center">Ratio2</th>'+
									'<th class="center">Ratio3</th>'+
									'<th class="center"></th>'+
								'</tr>'+
							'</thead>'+
							'<tbody>'+
							'</tbody>'+
						'</table>'+
					'</div>'+
				'</div>'+
			'</div>'+
		'</div>'
		);
}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Relacion de Transformacion</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<label for="nombre_tabla">Seleccione el Nombre de la Tabla</label>
<select id="nombre_tabla" name="nombre_tabla">
	<option value="1">Primario VS Secundario</option>
	<option value="2">Primario VS Terciario</option>
	<option value="3">Secundario VS Terciario</option>
</select>
<button class="btn btn-danger" onclick="nueva_tabla('')">
	<i class="icon-bolt"></i>
	Agregar Tabla
	<i class="icon-arrow-right icon-on-right"></i>
</button>
<div id="grupo_tablas">

</div>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>