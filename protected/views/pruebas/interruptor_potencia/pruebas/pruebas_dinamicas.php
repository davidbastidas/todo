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
			'Pruebas Dinamicas Interruptor Potencia'.
		'</li>'.
	'</ul>'.
'</div>';
$json_equipo = json_decode( $datosjson, true );
?>
<?php $this->pageTitle = Yii::app()->name; ?>
<style>
.owerflowy {overflow-y: auto;}
</style>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.colorbox-min.js"></script>
<script>
var tiempo_apertura_maximo="<?php echo $json_equipo['t_apertura_max']?>";
var tiempo_apertura_minimo="<?php echo $json_equipo['t_apertura_min']?>";
var tiempo_cierre_maximo="<?php echo $json_equipo['t_cierre_max']?>";
var tiempo_cierre_minimo="<?php echo $json_equipo['t_cierre_min']?>";
var tiempo_cierre_aca="<?php echo $json_equipo['t_cierre_aca']?>";
function aplicarReglas(){
	$('.decimal').keypress(function(event) {
	    if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46){
	        return true;
	    }else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
	        event.preventDefault();
	    }
	});
	$('.entero').keypress(function(e) {
	    var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9]/);
        if (verified) {e.preventDefault();}
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
var colorbox_params ;
$(function() {
		colorbox_params = {
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="icon-arrow-left"></i>',
		next:'<i class="icon-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'50%',
		maxHeight:'50%',
		onOpen:function(){
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};
	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon
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
$(document).on("click", ".eliminafoto", function(){
	var r = confirm("¿Desea Eliminar la Iamgen?");
	if (r == true) {
		$(this).parent().parent().parent().parent().find(".subir_foto").prop("disabled", false);
	    $(this).parent().parent().parent().html("");
	}
});
$(document).on("keyup", ".tad_tiempos", function(){
	validarTAD($(this));
});
function validarTAD(obj){
	var idattr=obj.attr("id");
	var value=parseInt(obj.val());
	if(value<=tiempo_apertura_maximo && value>=tiempo_apertura_minimo){
		obj.css({
		   'text-decoration': 'underline',
		   'color': 'green',
		   'font-weight': 'bold'
		});
	}else {
		obj.css({
		   'text-decoration': 'underline',
		   'color': 'red',
		   'font-weight': 'bold'
		});
	}
}
$(document).on("keyup", ".tcd_tiempos", function(){
	validarTCD($(this));
});
function validarTCD(obj){
	var idattr=obj.attr("id");
	var value=parseInt(obj.val());
	if(value<=tiempo_cierre_maximo && value>=tiempo_cierre_minimo){
		obj.css({
		   'text-decoration': 'underline',
		   'color': 'green',
		   'font-weight': 'bold'
		});
	}else {
		obj.css({
		   'text-decoration': 'underline',
		   'color': 'red',
		   'font-weight': 'bold'
		});
	}
}
$(document).on("keyup", ".aca_tiempos", function(){
	validarACA($(this));
});
function validarACA(obj){
	var idattr=obj.attr("id");
	var value=parseInt(obj.val());
	if(value>=tiempo_cierre_aca){
		obj.css({
		   'text-decoration': 'underline',
		   'color': 'green',
		   'font-weight': 'bold'
		});
	}else {
		obj.css({
		   'text-decoration': 'underline',
		   'color': 'red',
		   'font-weight': 'bold'
		});
	}
}
$(document).on("change", ".subir_foto", function(){
	var file_input=$(this);
	var info_archivo=$(this).parent().parent().find('#info_archivo');
	var extensiones_permitidas = new Array(".jpg",".jpeg");
    
    if(comprobarArchivo(file_input.val(),extensiones_permitidas)){
        var inputFileImage = file_input[0];

	    var file = inputFileImage.files[0];
	    //console.log(file.size);
	    if(file.size>2097152){
	    	info_archivo.html('<div class="alert alert-error">'+
	            '<button class="close" data-dismiss="alert" type="button">'+
	                '<i class="icon-remove"></i>'+
	            '</button>'+
	            '<strong>'+
	                '<i class="icon-remove"></i>'+
	                'Error! '+
	            '</strong>'+
	            'Ha superado el tamaño. Limite 2MB'+
	            '<br>'+
	            '</div>');
	    	file_input.val("");
	    }
    }else{
    	file_input.val("");
        alert (mierror);
    }
});
function crearJson(){
	var json='{'+
			 '"observaciones": "'+$("#observacion").val()+'", "tablas": [';
	var i=1;
	var curTable;
	var foto1,foto2;
	var fotos_g1, fotos_g2;
	$("table").each(function(){
	  	curTable = $(this);
  		if(i==1){
  			if(curTable.attr('tipo_tabla')=="1"){
  				fotos_g1=curTable.parent().parent().find('.fotos_g a').length;
  				if(fotos_g1>0){
  					fotos_g1=curTable.parent().parent().find('.fotos_g');
  					foto1=fotos_g1.find('.cboxElement').html();
  				}else{
  					foto1=curTable.parent().parent().find('#fileg').val().replace("C:\\fakepath\\", "");
  				}
  				console.log(foto1)
  				json+='{"tipo": "'+curTable.attr('tipo_tabla')+'", '+
						'"tad_ocb_a":"'+curTable.find("#tad-ocb-a").val()+'",'+
						'"tad_ocb_b":"'+curTable.find("#tad-ocb-b").val()+'",'+
						'"tad_ocb_c":"'+curTable.find("#tad-ocb-c").val()+'",'+
						'"tad_contacto":"'+curTable.find("#tad-contacto").val()+'",'+
						'"tad_discrepancia":"'+curTable.find("#tad-discrepancia").val()+'",'+
						'"tad_corriente_pico":"'+curTable.find("#tad-corriente-pico").val()+'",'+
						'"foto":"'+foto1+'"'+
					   	'}';
  			}else if(curTable.attr('tipo_tabla')=="2"){
  				fotos_g1=curTable.parent().parent().find('.fotos_g1 a').length;
  				if(fotos_g1>0){
  					fotos_g1=curTable.parent().parent().find('.fotos_g1');
  					foto1=fotos_g1.find('.cboxElement').html();
  				}else{
  					foto1=curTable.parent().parent().find('#fileg1').val().replace("C:\\fakepath\\", "");
  				}
  				fotos_g2=curTable.parent().parent().find('.fotos_g2 a').length;
  				if(fotos_g2>0){
  					fotos_g2=curTable.parent().parent().find('.fotos_g2');
  					foto2=fotos_g2.find('.cboxElement').html();
  				}else{
  					foto2=curTable.parent().parent().find('#fileg2').val().replace("C:\\fakepath\\", "");
  				}
  				json+='{"tipo": "'+curTable.attr('tipo_tabla')+'", '+
						'"tcd_ocb_a":"'+curTable.find("#tcd-ocb-a").val()+'",'+
						'"tcd_rebote_a":"'+curTable.find("#tcd-rebote-a").val()+'",'+
						'"tcd_ocb_b":"'+curTable.find("#tcd-ocb-b").val()+'",'+
						'"tcd_rebote_b":"'+curTable.find("#tcd-rebote-b").val()+'",'+
						'"tcd_ocb_c":"'+curTable.find("#tcd-ocb-c").val()+'",'+
						'"tcd_rebote_c":"'+curTable.find("#tcd-rebote-c").val()+'",'+
						'"tcd_contacto":"'+curTable.find("#tcd-contacto").val()+'",'+
						'"tcd_discrepancia":"'+curTable.find("#tcd-discrepancia").val()+'",'+
						'"tcd_corriente_pico":"'+curTable.find("#tcd-corriente-pico").val()+'",'+
						'"tcd_corriente_pico_motor":"'+curTable.find("#tcd-corriente-pico-motor").val()+'",'+
						'"foto1":"'+foto1+'",'+
						'"foto2":"'+foto2+'"'+
					   	'}';
  			}else if(curTable.attr('tipo_tabla')=="3"){
  				fotos_g1=curTable.parent().parent().find('.fotos_g3 a').length;
  				if(fotos_g1>0){
  					fotos_g1=curTable.parent().parent().find('.fotos_g3');
  					foto1=fotos_g1.find('.cboxElement').html();
  				}else{
  					foto1=curTable.parent().parent().find('#fileg3').val().replace("C:\\fakepath\\", "");
  				}
  				json+='{"tipo": "'+curTable.attr('tipo_tabla')+'", '+
						'"aca_ocb_a":"'+curTable.find("#aca-ocb-a").val()+'",'+
						'"aca_ocb_b":"'+curTable.find("#aca-ocb-b").val()+'",'+
						'"aca_ocb_c":"'+curTable.find("#aca-ocb-c").val()+'",'+
						'"foto1":"'+foto1+'"'+
					   	'}';
  			}
  		}else{
  			if(curTable.attr('tipo_tabla')=="1"){
  				fotos_g1=curTable.parent().parent().find('.fotos_g a').length;
  				if(fotos_g1>0){
  					fotos_g1=curTable.parent().parent().find('.fotos_g');
  					foto1=fotos_g1.find('.cboxElement').html();
  				}else{
  					foto1=curTable.parent().parent().find('#fileg').val().replace("C:\\fakepath\\", "");
  				}
  				json+=',{"tipo": "'+curTable.attr('tipo_tabla')+'", '+
						'"tad_ocb_a":"'+curTable.find("#tad-ocb-a").val()+'",'+
						'"tad_ocb_b":"'+curTable.find("#tad-ocb-b").val()+'",'+
						'"tad_ocb_c":"'+curTable.find("#tad-ocb-c").val()+'",'+
						'"tad_contacto":"'+curTable.find("#tad-contacto").val()+'",'+
						'"tad_discrepancia":"'+curTable.find("#tad-discrepancia").val()+'",'+
						'"tad_corriente_pico":"'+curTable.find("#tad-corriente-pico").val()+'",'+
						'"foto":"'+foto1+'"'+
					   	'}';
  			}else if(curTable.attr('tipo_tabla')=="2"){
  				fotos_g1=curTable.parent().parent().find('.fotos_g1 a').length;
  				if(fotos_g1>0){
  					fotos_g1=curTable.parent().parent().find('.fotos_g1');
  					foto1=fotos_g1.find('.cboxElement').html();
  				}else{
  					foto1=curTable.parent().parent().find('#fileg1').val().replace("C:\\fakepath\\", "");
  				}
  				fotos_g2=curTable.parent().parent().find('.fotos_g2 a').length;
  				if(fotos_g2>0){
  					fotos_g2=curTable.parent().parent().find('.fotos_g2');
  					foto2=fotos_g2.find('.cboxElement').html();
  				}else{
  					foto2=curTable.parent().parent().find('#fileg2').val().replace("C:\\fakepath\\", "");
  				}
  				json+=',{"tipo": "'+curTable.attr('tipo_tabla')+'", '+
						'"tcd_ocb_a":"'+curTable.find("#tcd-ocb-a").val()+'",'+
						'"tcd_rebote_a":"'+curTable.find("#tcd-rebote-a").val()+'",'+
						'"tcd_ocb_b":"'+curTable.find("#tcd-ocb-b").val()+'",'+
						'"tcd_rebote_b":"'+curTable.find("#tcd-rebote-b").val()+'",'+
						'"tcd_ocb_c":"'+curTable.find("#tcd-ocb-c").val()+'",'+
						'"tcd_rebote_c":"'+curTable.find("#tcd-rebote-c").val()+'",'+
						'"tcd_contacto":"'+curTable.find("#tcd-contacto").val()+'",'+
						'"tcd_discrepancia":"'+curTable.find("#tcd-discrepancia").val()+'",'+
						'"tcd_corriente_pico":"'+curTable.find("#tcd-corriente-pico").val()+'",'+
						'"tcd_corriente_pico_motor":"'+curTable.find("#tcd-corriente-pico-motor").val()+'",'+
						'"foto1":"'+foto1+'",'+
						'"foto2":"'+foto2+'"'+
					   	'}';
  			}else if(curTable.attr('tipo_tabla')=="3"){
  				fotos_g1=curTable.parent().parent().find('.fotos_g3 a').length;
  				if(fotos_g1>0){
  					fotos_g1=curTable.parent().parent().find('.fotos_g3');
  					foto1=fotos_g1.find('.cboxElement').html();
  				}else{
  					foto1=curTable.parent().parent().find('#fileg3').val().replace("C:\\fakepath\\", "");
  				}
  				json+=',{"tipo": "'+curTable.attr('tipo_tabla')+'", '+
						'"aca_ocb_a":"'+curTable.find("#aca-ocb-a").val()+'",'+
						'"aca_ocb_b":"'+curTable.find("#aca-ocb-b").val()+'",'+
						'"aca_ocb_c":"'+curTable.find("#aca-ocb-c").val()+'",'+
						'"foto1":"'+foto1+'"'+
					   	'}';
  			}
  		}
	  	i++;
	});
	json+=']}';

	console.log(json);
	var data = new FormData();
    var motivo="";
    data.append('id',<?php echo $model_datos->id?>);
    data.append('json',json);

    //buscamos todas las fotos que hay en las tablas
    var x=1;
    $(".subir_foto").each(function(){
    	var file_input = $(this);
    	if(file_input.val()!=""){
    		data.append('foto_'+x,file_input[0].files[0]);
    		x++;
    	}
    });
    $.ajax({
        url:"<?php echo $nameProyect?>/Pruebas/ActualizarTipoPrueba",
        type:'POST',
        data:data,
        cache:false,
        contentType:false,
        processData:false,
        beforeSend:  function() {
            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
		    console.log(XMLHttpRequest.statusText);
			console.log(textStatus);
			console.log(errorThrown);
			$("#info").html('<div class="alert alert-error">'+
        			'<button class="close" data-dismiss="alert" type="button">'+
					'<i class="icon-remove"></i>'+
					'</button>'+
					'<strong>'+
					'<i class="icon-remove"></i>'+
					'No se guardo!'+
					'</strong>'+
					errorThrown+
					'<br>'+
					'</div>');
	    },
        success: function(data_response){
        	console.log(data_response);
        	var obj = JSON.parse(data_response);
            if(obj.update=="1" || obj.update=="0"){
            	
        		location.href="<?php echo $nameProyect?>/Pruebas/ListarPrueba/<?php echo $model_datos->fk_pruebas?>";
        	}else{
        		$("#info").html('<div class="alert alert-error">'+
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
		var table="";
		var disable="",disable2="";
		var html_foto1,html_foto2;
		for (var i = 0; i < n_tablas; i++) {
			if(obj.tablas[i].tipo==1){
				disable="";
				html_foto1="";
				if(obj.tablas[i].foto!=""){
					disable="disabled";
					html_foto1='<ul class="ace-thumbnails">'+
								'<a href="<?php echo "../../../archivos/fotos_interruptor_potencia/".$model_datos->id."/"?>'+obj.tablas[i].foto+'" data-rel="colorbox">'+
									obj.tablas[i].foto+
								'</a>'+
								'<a href="#">'+
									'<i class="icon-remove red eliminafoto"></i>'+
								'</a>'+
								'<br>'+
								'</ul>';
				}
				table+='<div class="widget-box" id="contenedor_tabla">'+
					'<div class="widget-header widget-header-small header-color-orange">'+
						'<h6>Tiempo de Apertura y discrepancia de Polos</h6>'+
						'<div class="widget-toolbar">'+
							'<a data-action="collapse" href="#">'+
								'<i class="icon-chevron-up"></i>'+
							'</a>'+
							'<a href="#" class="borrar_tabla">'+
								'<i class="icon-remove borrartabla"></i>'+
							'</a>'+
						'</div>'+
					'</div>'+
					'<div class="widget-body owerflowy">'+
						'<div class="widget-body-inner" style="display: block;">'+
							'<div class="widget-main" id="div_tabla_'+n_tablas+'">';
				table+='<div class="row-fluid">'+
						'<div class="span4">'+
							'<p>TIEMPO DE APERTURA MAXIMO FABRICANTE:'+
								'<span class="label label-success arrowed-in arrowed-in-right">'+
									'<?php echo $json_equipo['t_apertura_max']?>'+
								'</span>'+
							'</p>'+
							'<p>TIEMPO DE APERTURA MINIMO FABRICANTE:'+
								'<span class="label label-warning arrowed arrowed-right">'+
									'<?php echo $json_equipo["t_apertura_min"]?>'+
								'</span>'+
							'</p>'+
							'<table class="table table-bordered" tipo_tabla="1">'+
								'<thead>'+
									'<tr>'+
										'<th colspan="3" class="center">TIEMPO DE APERTURA Y DISCREPANCIA DE POLOS</th>'+
									'</tr>'+
									'<tr>'+
										'<th class="center">FASE</th>'+
										'<th class="center">LABEL</th>'+
										'<th class="center">TIEMPO DE APERTURA(ms)</th>'+
									'</tr>'+
								'</thead>'+
								'<tbody>'+
									'<tr>'+
										'<td class="center">A</td>'+
										'<td class="center">OCB-A</td>'+
										'<td class="center">'+
											'<input value="'+obj.tablas[i].tad_ocb_a+'" type="text" id="tad-ocb-a" name="tad-ocb-a" class="input-mini tad_tiempos entero textomax"/>'+
										'</td>'+
									'</tr>'+
									'<tr>'+
										'<td class="center">B</td>'+
										'<td class="center">OCB-B</td>'+
										'<td class="center">'+
											'<input value="'+obj.tablas[i].tad_ocb_b+'" type="text" id="tad-ocb-b" name="tad-ocb-b" class="input-mini tad_tiempos entero textomax"/>'+
										'</td>'+
									'</tr>'+
									'<tr>'+
										'<td class="center">C</td>'+
										'<td class="center">OCB-C</td>'+
										'<td class="center">'+
											'<input value="'+obj.tablas[i].tad_ocb_c+'" type="text" id="tad-ocb-c" name="tad-ocb-c" class="input-mini tad_tiempos entero textomax"/>'+
										'</td>'+
									'</tr>'+
									'<tr>'+
										'<td class="center" colspan="2">Contacto Aux a</td>'+
										'<td class="center">'+
											'<input value="'+obj.tablas[i].tad_contacto+'" type="text" id="tad-contacto" name="tad-contacto" class="input-mini textomax"/>'+
										'</td>'+
									'</tr>'+
									'<tr>'+
										'<td class="center" colspan="2">DISCREPANCIA DE POLOS</td>'+
										'<td class="center">'+
											'<input value="'+obj.tablas[i].tad_contacto+'" type="text" id="tad-discrepancia" name="tad-discrepancia" class="input-mini textomax"/>'+
										'</td>'+
									'</tr>'+
									'<tr>'+
										'<td class="center" colspan="2">CORRIENTE PICO BOBINA</td>'+
										'<td class="center">'+
											'<input value="'+obj.tablas[i].tad_corriente_pico+'" type="text" id="tad-corriente-pico" name="tad-corriente-pico" class="input-mini textomax"/>'+
										'</td>'+
									'</tr>'+
								'</tbody>'+
							'</table>'+
						'</div>'+
						'<div class="span4">'+
							'<h2>Grafica operacion bobina pico</h2>'+
							'<div id="info_archivo"></div>'+
							'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
								'<input id="fileg" type="file" name="fileg" class="subir_foto" '+disable+'>'+
							'</div>'+
							'<hr>'+
							'<div id="fotos_g" class="fotos_g">'+
								html_foto1+
							'</div>'+
						'</div>'+
					'</div>';
			}else if(obj.tablas[i].tipo==2){
				disable="";
				html_foto1="";
				if(obj.tablas[i].foto1!=""){
					disable="disabled";
					html_foto1='<ul class="ace-thumbnails">'+
							'<a href="<?php echo "../../../archivos/fotos_interruptor_potencia/".$model_datos->id."/"?>'+obj.tablas[i].foto1+'" data-rel="colorbox">'+
								obj.tablas[i].foto1+
							'</a>'+
							'<a href="#">'+
								'<i class="icon-remove red eliminafoto"></i>'+
							'</a>'+
							'<br>'+
							'</ul>';
				}
				disable2="";
				html_foto2="";
				if(obj.tablas[i].foto2!=""){
					disable2="disabled";
					html_foto2='<ul class="ace-thumbnails">'+
							'<a href="<?php echo "../../../archivos/fotos_interruptor_potencia/".$model_datos->id."/"?>'+obj.tablas[i].foto2+'" data-rel="colorbox">'+
								obj.tablas[i].foto2+
							'</a>'+
							'<a href="#">'+
								'<i class="icon-remove red eliminafoto"></i>'+
							'</a>'+
							'<br>'+
							'</ul>';
				}
				table+='<div class="widget-box" id="contenedor_tabla">'+
					'<div class="widget-header widget-header-small header-color-orange">'+
						'<h6>Tiempo de cierre y discrepancia de Polos</h6>'+
						'<div class="widget-toolbar">'+
							'<a data-action="collapse" href="#">'+
								'<i class="icon-chevron-up"></i>'+
							'</a>'+
							'<a href="#" class="borrar_tabla">'+
								'<i class="icon-remove borrartabla"></i>'+
							'</a>'+
						'</div>'+
					'</div>'+
					'<div class="widget-body owerflowy">'+
						'<div class="widget-body-inner" style="display: block;">'+
							'<div class="widget-main" id="div_tabla_'+n_tablas+'">';
				table+='<div class="row-fluid">'+
							'<div class="span4">'+
								'<p>TIEMPO DE CIERRE MAXIMO FABRICANTE:'+
									'<span class="label label-success arrowed-in arrowed-in-right">'+
										'<?php echo $json_equipo["t_cierre_max"]?>'+
									'</span>'+
								'</p>'+
								'<p>TIEMPO DE CIERRE MINIMO FABRICANTE:'+
									'<span class="label label-warning arrowed arrowed-right">'+
										'<?php echo $json_equipo["t_cierre_min"]?>'+
									'</span>'+
								'</p>'+
								'<table tipo_tabla="2" class="table table-bordered">'+
									'<thead>'+
										'<tr>'+
											'<th colspan="3" class="center">TIEMPO DE CIERRE Y DISCREPANCIA DE POLOS</th>'+
										'</tr>'+
										'<tr>'+
											'<th class="center">FASE</th>'+
											'<th class="center">LABEL</th>'+
											'<th class="center">TIEMPO DE CIERRE (ms)</th>'+
										'</tr>'+
									'</thead>'+
									'<tbody>'+
										'<tr>'+
											'<td class="center">A</td>'+
											'<td class="center">OCB-A</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_ocb_a+'" type="text" id="tcd-ocb-a" name="tcd-ocb-a" class="input-mini tcd_tiempos entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center" colspan="2">Rebote A</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_rebote_a+'" type="text" id="tcd-rebote-a" name="tcd-rebote-a" class="input-mini entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center">B</td>'+
											'<td class="center">OCB-B</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_ocb_b+'" type="text" id="tcd-ocb-b" name="tcd-ocb-b" class="input-mini tcd_tiempos entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center" colspan="2">Rebote B</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_rebote_b+'" type="text" id="tcd-rebote-b" name="tcd-rebote-b" class="input-mini entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center">C</td>'+
											'<td class="center">OCB-C</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_ocb_c+'" type="text" id="tcd-ocb-c" name="tcd-ocb-c" class="input-mini tcd_tiempos entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center" colspan="2">Rebote C</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_rebote_c+'" type="text" id="tcd-rebote-c" name="tcd-rebote-c" class="input-mini entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center" colspan="2">Contacto Aux b</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_contacto+'" type="text" id="tcd-contacto" name="tcd-contacto" class="input-mini textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center" colspan="2">DISCREPANCIA DE POLOS</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_discrepancia+'" type="text" id="tcd-discrepancia" name="tcd-discrepancia" class="input-mini textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center" colspan="2">CORRIENTE PICO BOBINA</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_corriente_pico+'" type="text" id="tcd-corriente-pico" name="tcd-corriente-pico" class="input-mini textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center" colspan="2">CORRIENTE PICO MOTOR</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].tcd_corriente_pico_motor+'" type="text" id="tcd-corriente-pico-motor" name="tcd-corriente-pico-motor" class="input-mini textomax"/>'+
											'</td>'+
										'</tr>'+
									'</tbody>'+
								'</table>'+
							'</div>'+
							'<div class="span4">'+
								'<h2>Grafica corriente operacion BOBINA</h2>'+
								'<div id="info_archivo"></div>'+
								'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
									'<input id="fileg1" type="file" name="fileg1" class="subir_foto g1" '+disable+'>'+
								'</div>'+
								'<hr>'+
								'<div id="fotos_g1" class="fotos_g1">'+
									html_foto1+
								'</div>'+
							'</div>'+
							'<div class="span4">'+
								'<h2>Grafica corriente operacion MOTOR</h2>'+
								'<div id="info_archivo"></div>'+
								'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
									'<input id="fileg2" type="file" name="fileg2" class="subir_foto g2" '+disable+'>'+
								'</div>'+
								'<hr>'+
								'<div id="fotos_g2" class="fotos_g2">'+
									html_foto2+
								'</div>'+
							'</div>'+
						'</div>';
			}else if(obj.tablas[i].tipo==3){
				disable="";
				html_foto1="";
				if(obj.tablas[i].foto1!=""){
					disable="disabled";
					html_foto1='<ul class="ace-thumbnails">'+
							'<a href="<?php echo "../../../archivos/fotos_interruptor_potencia/".$model_datos->id."/"?>'+obj.tablas[i].foto1+'" data-rel="colorbox">'+
								obj.tablas[i].foto1+
							'</a>'+
							'<a href="#">'+
								'<i class="icon-remove red eliminafoto"></i>'+
							'</a>'+
							'<br>'+
							'</ul>';
				}
				table+='<div class="widget-box" id="contenedor_tabla">'+
					'<div class="widget-header widget-header-small header-color-orange">'+
						'<h6>Apertura - Cierre - Apertura</h6>'+
						'<div class="widget-toolbar">'+
							'<a data-action="collapse" href="#">'+
								'<i class="icon-chevron-up"></i>'+
							'</a>'+
							'<a href="#" class="borrar_tabla">'+
								'<i class="icon-remove borrartabla"></i>'+
							'</a>'+
						'</div>'+
					'</div>'+
					'<div class="widget-body owerflowy">'+
						'<div class="widget-body-inner" style="display: block;">'+
							'<div class="widget-main" id="div_tabla_'+n_tablas+'">';
				table+='<div class="row-fluid">'+
							'<div class="span4">'+
								'<p>TIEMPO DE CIERRE MINIMO ACA FABRICANTE:'+
									'<span class="label label-warning arrowed arrowed-right">'+
										'<?php echo $json_equipo["t_cierre_aca"]?>'+
									'</span>'+
								'</p>'+
								'<table tipo_tabla="3" class="table table-bordered">'+
									'<thead>'+
										'<tr>'+
											'<th colspan="3" class="center">APERTURA - CIERRE - APERTURA</th>'+
										'</tr>'+
										'<tr>'+
											'<th class="center">FASE</th>'+
											'<th class="center">LABEL</th>'+
											'<th class="center">TIEMPOS DE OPERACION (ms)</th>'+
										'</tr>'+
									'</thead>'+
									'<tbody>'+
										'<tr>'+
											'<td class="center">A</td>'+
											'<td class="center">OCB-A</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].aca_ocb_a+'" type="text" id="aca-ocb-a" name="aca-ocb-a" class="input-mini aca_tiempos entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center">B</td>'+
											'<td class="center">OCB-B</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].aca_ocb_b+'" type="text" id="aca-ocb-b" name="aca-ocb-b" class="input-mini aca_tiempos entero textomax"/>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td class="center">C</td>'+
											'<td class="center">OCB-C</td>'+
											'<td class="center">'+
												'<input value="'+obj.tablas[i].aca_ocb_c+'" type="text" id="aca-ocb-c" name="aca-ocb-c" class="input-mini aca_tiempos entero textomax"/>'+
											'</td>'+
										'</tr>'+
									'</tbody>'+
								'</table>'+
							'</div>'+
							'<div class="span4">'+
								'<h2>Grafica tiempos Apertura - Cierre</h2>'+
								'<div id="info_archivo"></div>'+
								'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
									'<input id="fileg3" type="file" name="fileg3" class="subir_foto" '+disable+'>'+
								'</div>'+
								'<hr>'+
								'<div id="fotos_g3" class="fotos_g3">'+
									html_foto1+
								'</div>'+
							'</div>'+
						'</div>';
			}

			table+='</div>'+
						'</div>'+
					'</div>'+
				'</div>';
			$("#grupo_tablas").append(table);
			table="";
		}
		$(".tad_tiempos").each(function(){
	    	validarTAD($(this));
	    });
	    $(".tcd_tiempos").each(function(){
	    	validarTCD($(this));
	    });
	    $(".aca_tiempos").each(function(){
	    	validarACA($(this));
	    });
		$("#observacion").val(obj.observaciones);
		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	}
	var estado='<?php echo $estado?>';
	if (estado==3){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
var n_tablas=0;
function nueva_tabla(nombre,val){
	var table='';
	var nom_tabla="";
	var value=0;
	if(nombre==""){
		nom_tabla=$("#tipo_prueba option:selected").text();
	}else{
		nom_tabla=nombre;
	}
	if(val>0){
		value=val;
	}else{
		value=$("#tipo_prueba").val();
	}
	n_tablas++;
	table+='<div class="widget-box" id="contenedor_tabla">'+
			'<div class="widget-header widget-header-small header-color-orange">'+
				'<h6>'+nom_tabla+'</h6>'+
				'<div class="widget-toolbar">'+
					'<a data-action="collapse" href="#">'+
						'<i class="icon-chevron-up"></i>'+
					'</a>'+
					'<a href="#" class="borrar_tabla">'+
						'<i class="icon-remove borrartabla"></i>'+
					'</a>'+
				'</div>'+
			'</div>'+
			'<div class="widget-body owerflowy">'+
				'<div class="widget-body-inner" style="display: block;">'+
					'<div class="widget-main" id="div_tabla_'+n_tablas+'">';
	if(value==1){
		table+='<div class="row-fluid">'+
				'<div class="span4">'+
					'<p>TIEMPO DE APERTURA MAXIMO FABRICANTE:'+
						'<span class="label label-success arrowed-in arrowed-in-right">'+
							'<?php echo $json_equipo['t_apertura_max']?>'+
						'</span>'+
					'</p>'+
					'<p>TIEMPO DE APERTURA MINIMO FABRICANTE:'+
						'<span class="label label-warning arrowed arrowed-right">'+
							'<?php echo $json_equipo["t_apertura_min"]?>'+
						'</span>'+
					'</p>'+
					'<table class="table table-bordered" tipo_tabla="'+value+'">'+
						'<thead>'+
							'<tr>'+
								'<th colspan="3" class="center">TIEMPO DE APERTURA Y DISCREPANCIA DE POLOS</th>'+
							'</tr>'+
							'<tr>'+
								'<th class="center">FASE</th>'+
								'<th class="center">LABEL</th>'+
								'<th class="center">TIEMPO DE APERTURA(ms)</th>'+
							'</tr>'+
						'</thead>'+
						'<tbody>'+
							'<tr>'+
								'<td class="center">A</td>'+
								'<td class="center">OCB-A</td>'+
								'<td class="center">'+
									'<input type="text" id="tad-ocb-a" name="tad-ocb-a" class="input-mini tad_tiempos entero textomax"/>'+
								'</td>'+
							'</tr>'+
							'<tr>'+
								'<td class="center">B</td>'+
								'<td class="center">OCB-B</td>'+
								'<td class="center">'+
									'<input type="text" id="tad-ocb-b" name="tad-ocb-b" class="input-mini tad_tiempos entero textomax"/>'+
								'</td>'+
							'</tr>'+
							'<tr>'+
								'<td class="center">C</td>'+
								'<td class="center">OCB-C</td>'+
								'<td class="center">'+
									'<input type="text" id="tad-ocb-c" name="tad-ocb-c" class="input-mini tad_tiempos entero textomax"/>'+
								'</td>'+
							'</tr>'+
							'<tr>'+
								'<td class="center" colspan="2">Contacto Aux a</td>'+
								'<td class="center">'+
									'<input type="text" id="tad-contacto" name="tad-contacto" class="input-mini textomax"/>'+
								'</td>'+
							'</tr>'+
							'<tr>'+
								'<td class="center" colspan="2">DISCREPANCIA DE POLOS</td>'+
								'<td class="center">'+
									'<input type="text" id="tad-discrepancia" name="tad-discrepancia" class="input-mini textomax"/>'+
								'</td>'+
							'</tr>'+
							'<tr>'+
								'<td class="center" colspan="2">CORRIENTE PICO BOBINA</td>'+
								'<td class="center">'+
									'<input type="text" id="tad-corriente-pico" name="tad-corriente-pico" class="input-mini textomax"/>'+
								'</td>'+
							'</tr>'+
						'</tbody>'+
					'</table>'+
				'</div>'+
				'<div class="span4">'+
					'<h2>Grafica operacion bobina pico</h2>'+
					'<div id="info_archivo"></div>'+
					'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
						'<input id="fileg" type="file" name="fileg" class="subir_foto">'+
					'</div>'+
					'<hr>'+
					'<div id="fotos_g"></div>'+
				'</div>'+
			'</div>';
	}else if(value==2){
		table+='<div class="row-fluid">'+
					'<div class="span4">'+
						'<p>TIEMPO DE CIERRE MAXIMO FABRICANTE:'+
							'<span class="label label-success arrowed-in arrowed-in-right">'+
								'<?php echo $json_equipo["t_cierre_max"]?>'+
							'</span>'+
						'</p>'+
						'<p>TIEMPO DE CIERRE MINIMO FABRICANTE:'+
							'<span class="label label-warning arrowed arrowed-right">'+
								'<?php echo $json_equipo["t_cierre_min"]?>'+
							'</span>'+
						'</p>'+
						'<table tipo_tabla="'+value+'" class="table table-bordered">'+
							'<thead>'+
								'<tr>'+
									'<th colspan="3" class="center">TIEMPO DE CIERRE Y DISCREPANCIA DE POLOS</th>'+
								'</tr>'+
								'<tr>'+
									'<th class="center">FASE</th>'+
									'<th class="center">LABEL</th>'+
									'<th class="center">TIEMPO DE CIERRE (ms)</th>'+
								'</tr>'+
							'</thead>'+
							'<tbody>'+
								'<tr>'+
									'<td class="center">A</td>'+
									'<td class="center">OCB-A</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-ocb-a" name="tcd-ocb-a" class="input-mini tcd_tiempos entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center" colspan="2">Rebote A</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-rebote-a" name="tcd-rebote-a" class="input-mini entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center">B</td>'+
									'<td class="center">OCB-B</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-ocb-b" name="tcd-ocb-b" class="input-mini tcd_tiempos entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center" colspan="2">Rebote B</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-rebote-b" name="tcd-rebote-b" class="input-mini entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center">C</td>'+
									'<td class="center">OCB-C</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-ocb-c" name="tcd-ocb-c" class="input-mini tcd_tiempos entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center" colspan="2">Rebote C</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-rebote-c" name="tcd-rebote-c" class="input-mini entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center" colspan="2">Contacto Aux b</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-contacto" name="tcd-contacto" class="input-mini textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center" colspan="2">DISCREPANCIA DE POLOS</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-discrepancia" name="tcd-discrepancia" class="input-mini textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center" colspan="2">CORRIENTE PICO BOBINA</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-corriente-pico" name="tcd-corriente-pico" class="input-mini textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center" colspan="2">CORRIENTE PICO MOTOR</td>'+
									'<td class="center">'+
										'<input type="text" id="tcd-corriente-pico-motor" name="tcd-corriente-pico-motor" class="input-mini textomax"/>'+
									'</td>'+
								'</tr>'+
							'</tbody>'+
						'</table>'+
					'</div>'+
					'<div class="span4">'+
						'<h2>Grafica corriente operacion BOBINA</h2>'+
						'<div id="info_archivo"></div>'+
						'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
							'<input id="fileg1" type="file" name="fileg1" class="subir_foto">'+
						'</div>'+
						'<hr>'+
						'<div id="fotos_g1"></div>'+
					'</div>'+
					'<div class="span4">'+
						'<h2>Grafica corriente operacion MOTOR</h2>'+
						'<div id="info_archivo"></div>'+
						'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
							'<input id="fileg2" type="file" name="fileg2" class="subir_foto">'+
						'</div>'+
						'<hr>'+
						'<div id="fotos_g2"></div>'+
					'</div>'+
				'</div>';
	}else if(value==3){
		table+='<div class="row-fluid">'+
					'<div class="span4">'+
						'<p>TIEMPO DE CIERRE MINIMO ACA FABRICANTE:'+
							'<span class="label label-warning arrowed arrowed-right">'+
								'<?php echo $json_equipo["t_cierre_aca"]?>'+
							'</span>'+
						'</p>'+
						'<table tipo_tabla="'+value+'" class="table table-bordered">'+
							'<thead>'+
								'<tr>'+
									'<th colspan="3" class="center">APERTURA - CIERRE - APERTURA</th>'+
								'</tr>'+
								'<tr>'+
									'<th class="center">FASE</th>'+
									'<th class="center">LABEL</th>'+
									'<th class="center">TIEMPOS DE OPERACION (ms)</th>'+
								'</tr>'+
							'</thead>'+
							'<tbody>'+
								'<tr>'+
									'<td class="center">A</td>'+
									'<td class="center">OCB-A</td>'+
									'<td class="center">'+
										'<input type="text" id="aca-ocb-a" name="aca-ocb-a" class="input-mini aca_tiempos entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center">B</td>'+
									'<td class="center">OCB-B</td>'+
									'<td class="center">'+
										'<input type="text" id="aca-ocb-b" name="aca-ocb-b" class="input-mini aca_tiempos entero textomax"/>'+
									'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="center">C</td>'+
									'<td class="center">OCB-C</td>'+
									'<td class="center">'+
										'<input type="text" id="aca-ocb-c" name="aca-ocb-c" class="input-mini aca_tiempos entero textomax"/>'+
									'</td>'+
								'</tr>'+
							'</tbody>'+
						'</table>'+
					'</div>'+
					'<div class="span4">'+
						'<h2>Grafica tiempos Apertura - Cierre</h2>'+
						'<div id="info_archivo"></div>'+
						'<div name="form_subir" method="post" action="" enctype="multipart/form-data">'+
							'<input id="fileg3" type="file" name="fileg3" class="subir_foto">'+
						'</div>'+
						'<hr>'+
						'<div id="fotos_g3"></div>'+
					'</div>'+
				'</div>';
	}

	table+='</div>'+
				'</div>'+
			'</div>'+
		'</div>';
	$("#grupo_tablas").append(table);
}

function comprobarArchivo(archivo,extensiones_permitidas){
    mierror = "";
    if (!archivo) {
        //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
        mierror = "No has seleccionado ningun archivo"; 
    }else{
        //recupero la extensi�n de este nombre de archivo 
        var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
        //alert (extension); 
        //compruebo si la extensi�n est� entre las permitidas 
        var permitida = false;
        for (var i = 0; i < extensiones_permitidas.length; i++) {
            if (extensiones_permitidas[i] == extension) {
                permitida = true; 
                break; 
            }
        }
        if (!permitida) {
            mierror = "Comprueba la extension de los archivos a subir. \nSolo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 
        }else{ 
            //correcto subir
            return true; 
        }
    }
    return false;
}

</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Pruebas Dinamicas</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<label for="tipo_prueba">Tipo de Prueba</label>
<div class="form-search">
	<select id="tipo_prueba" name="tipo_prueba">
		<option value="1">Tiempo de Apertura y discrepancia de Polos</option>
		<option value="2">Tiempo de cierre y discrepancia de Polos</option>
		<option value="3">Apertura - Cierre - Apertura</option>
	</select>
	<button class="btn btn-small btn-danger" onclick="nueva_tabla('',0)">
		<i class="icon-bolt"></i>
		Agregar Tabla
		<i class="icon-arrow-right icon-on-right"></i>
	</button>
</div>
<div id="grupo_tablas">

</div>
<br>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>