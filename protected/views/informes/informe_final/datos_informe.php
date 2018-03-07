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
			'<a href="'.$nameProyect.'/informes/index">Informes</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Generador de Informes</li>'.
	'</ul>'.
'</div>';
?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.colorbox-min.js"></script>
<script>
$(document).on("cut copy paste","input,textarea",function(e) {
	e.preventDefault();
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

	$('textarea[class*=limited]').each(function() {
		var limit = parseInt($(this).attr('data-maxlength')) || 100;
		$(this).inputlimiter({
			"limit": limit,
			remText: '%n caracteres disponibles...',
			limitText: 'maximo : %n.'
		});
	});
	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});

});
function quitarEquipo(elemento){
	var option=$(elemento).parent().find("herr").html();
	$("#equipo").append('<option val="'+option+'">'+option+'</option>');
	$(elemento).parent().remove();
}
function agregarEquipo(){
	if($("#equipo").val()!="0"){
		$("equipos").append('<p><herr>'+$("#equipo").val()+'</herr> <a href="#" onclick="quitarEquipo(this)">remover</a></p>');
		$("#equipo option:selected").remove();
	}
}
function generarInforme(){
	var pasa=true;
	var motivo="";
	var countinput=0;
	$(".validar").each(function(){
	    if($.trim(this.value) === ""){
	    	countinput++;
	    }
	});
	if (countinput>0) {
        motivo="Por favor llena los campos vacios";
        pasa=false;
    }
    if(pasa){
    	var recomendaciones=$("#recomendacion").val();
    	var json='{'+
			'"elaboradopor": "'+$("#elaboradopor").val()+'",'+
			'"revisadopor": "'+$("#revisadopor").val()+'",'+
		    '"aprobadopor": "'+$("#aprobadopor").val()+'",'+
		    '"fecha_elaboradopor": "'+$("#fecha_elaboradopor").val()+'",'+
			'"fecha_revisadopor": "'+$("#fecha_revisadopor").val()+'",'+
		    '"fecha_aprobadopor": "'+$("#fecha_aprobadopor").val()+'",'+
		    '"tecnico": "'+$("#tecnico").val()+'",'+
		    '"recomendaciones": "'+recomendaciones.replace(new RegExp("\n","g"), "<br>")+'"';

		var countequipos=0;
		$('equipos p herr').each(function() {
			countequipos++;
		});
		if(countequipos>0){
			json+=',"equipos": [';
			countequipos=0;
			$('equipos p herr').each(function() {
				if(countequipos==0){
					json+='{"nombre": "'+$(this).html()+'"}';
				}else{
					json+=',{"nombre": "'+$(this).html()+'"}';
				}
				countequipos++;
			});
			json+=']';
		}

		var countsatisfactorios=0;
		$('input[name="tipoBox[]"]').each(function() {
			countsatisfactorios++;
		});
		if(countsatisfactorios>0){
			json+=',"satisfactorio": [';
			countsatisfactorios=0;
			$('input[name="tipoBox[]"]').each(function() {
				if(countsatisfactorios==0){
					json+='{"fk_prueba": "'+$(this).val()+'","comentario":"'+$('#comentario_'+$(this).val()).val()+'","estado":"'+$(this).is(":checked")+'"}';
				}else{
					json+=',{"fk_prueba": "'+$(this).val()+'","comentario":"'+$('#comentario_'+$(this).val()).val()+'","estado":"'+$(this).is(":checked")+'"}';
				}
				countsatisfactorios++;
			});
			json+=']';
		}
		json+='}';
		//console.log(json);
		$("input").prop('disabled',true);
		$("button").prop('disabled',true);
		$("textarea").prop('disabled',true);
		$("select").prop('disabled',true);
		$.ajax({
	        url:"<?php echo $nameProyect?>/Informes/ImprimirPdf/<?php echo $id?>",
	        type:'POST',
	        dataType:"json",
	        cache:false,
	        data: {
	            json: json
	        },
	        beforeSend:  function() {
	            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
	        },
	        success: function(data){
	        	if(parseInt(data.update)>0){
	        		var html='<div class="alert alert-block alert-success">'+
			    			'<button class="close" data-dismiss="alert" type="button">'+
			    			'<i class="icon-remove"></i>'+
			    			'</button>'+
			    			'<strong>'+
			    			'<i class="icon-ok"></i>'+
			    			'Completado! '+
			    			'</strong> Descarga el Informe. '+ data.filename+
			    			'<br>'+
			    			'</div>';
					$("#info").html(html);

	        		
			    	$(".descargar").html('<a class="btn btn-danger btn-large pull-right" href="<?php echo $nameProyect?>/Informes/DescargarPdf/<?php echo $id?>">'+
										'Descargar'+
										'<i class="	icon-download-alt icon-on-right bigger-110"></i>'+
									'</a>');
	        		//location.href="<?php echo $nameProyect?>/Informes/index";
	        	}else{
	        		$("input").prop('disabled',false);
					$("button").prop('disabled',false);
					$("textarea").prop('disabled',false);
					$("select").prop('disabled',false);
	        		var html='<div class="alert alert-error">'+
			    			'<button class="close" data-dismiss="alert" type="button">'+
			    			'<i class="icon-remove"></i>'+
			    			'</button>'+
			    			'<strong>'+
			    			'<i class="icon-remove"></i>'+
			    			'Error! '+
			    			'</strong>'+
			    			'No se pudo generar el informe '+
			    			'<br>'+
			    			'</div>';
			    	$("#info").html(html);
	        	}
	        }
	    });
    } else {
		var html='<div class="alert alert-error">'+
    			'<button class="close" data-dismiss="alert" type="button">'+
    			'<i class="icon-remove"></i>'+
    			'</button>'+
    			'<strong>'+
    			'<i class="icon-remove"></i>'+
    			'Error! '+
    			'</strong>'+
    			motivo+
    			'<br>'+
    			'</div>';
    	$("#info").html(html);
	}
	
}
function comprobar(){
	var estado='<?php echo $estado ?>';
	if(estado=="3"){
		$("input").prop('disabled',true);
		$("button").prop('disabled',true);
		$("textarea").prop('disabled',true);
		$("select").prop('disabled',true);
	}
}
function regenerarInforme(){
    	var json='<?php echo str_replace("\n", "<br>", $pruebas->datos_informe)?>';
		$.ajax({
	        url:"<?php echo $nameProyect?>/Informes/ImprimirPdf/<?php echo $id?>",
	        type:'POST',
	        dataType:"json",
	        cache:false,
	        data: {
	            json: json
	        },
	        beforeSend:  function() {
	            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
	        },
	        success: function(data){
	        	if(parseInt(data.update)>0){
	        		var html='<div class="alert alert-block alert-success">'+
			    			'<button class="close" data-dismiss="alert" type="button">'+
			    			'<i class="icon-remove"></i>'+
			    			'</button>'+
			    			'<strong>'+
			    			'<i class="icon-ok"></i>'+
			    			'Completado! '+
			    			'</strong> Descarga el Informe. '+ data.filename+
			    			'<br>'+
			    			'</div>';
					$("#info").html(html);

	        		
			    	$(".descargar").html('<a class="btn btn-danger btn-large pull-right" href="<?php echo $nameProyect?>/Informes/DescargarPdf/<?php echo $id?>">'+
										'Descargar'+
										'<i class="	icon-download-alt icon-on-right bigger-110"></i>'+
									'</a>');
	        		//location.href="<?php echo $nameProyect?>/Informes/index";
	        	}else{
	        		$("input").prop('disabled',false);
					$("button").prop('disabled',false);
					$("textarea").prop('disabled',false);
					$("select").prop('disabled',false);
	        		var html='<div class="alert alert-error">'+
			    			'<button class="close" data-dismiss="alert" type="button">'+
			    			'<i class="icon-remove"></i>'+
			    			'</button>'+
			    			'<strong>'+
			    			'<i class="icon-remove"></i>'+
			    			'Error! '+
			    			'</strong>'+
			    			'No se pudo generar el informe '+
			    			'<br>'+
			    			'</div>';
			    	$("#info").html(html);
	        	}
	        }
	    });
}
</script>


<div class="row-fluid">
  <div class="span6">
	<h4>Ingrese los datos para generar el informe</h4>
  </div>
  <div class="span2">
	<?php 
  	if($estado==3){?>
  	<a href="#" onclick="regenerarInforme();">
		Rehacer Informe
	</a>
  	<?php } ?>
  </div>
  <div class="span4 descargar">
  	<?php 
  	if($estado==3){?>
  	<a class="btn btn-danger btn-large pull-right" href="<?php echo $nameProyect?>/Informes/DescargarPdf/<?php echo $id?>">
		Descargar
		<i class="	icon-download-alt icon-on-right bigger-110"></i>
	</a>
  	<?php }else{?>
  	<button class="btn btn-success btn-large pull-right" onclick="generarInforme();">
		Generar
		<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>
	<?php }?>
  </div>
</div>
<hr>
<div id="info"></div>
<div class="row-fluid formulario">
	<div class="span3">
		<label for="elaboradopor">Elaborado por:</label>
		<input type="text" id="elaboradopor" name="elaboradopor" maxlength="100" class="validar"/>

		<label for="control-label">Fecha Elaborado por:</label>
	    <div class="input-append bootstrap-timepicker">
	        <input class="span6 date-picker" id="fecha_elaboradopor" name="fecha_elaboradopor" type="text" data-date-format="yy-mm-dd" />
	        <span class="add-on">
	            <i class="icon-calendar"></i>
	        </span>
	    </div>

		<label for="revisadopor">Revisado por:</label>
		<input type="text" id="revisadopor" name="revisadopor" maxlength="100" class="validar"/>

		<label for="control-label">Fecha Revisado por:</label>
	    <div class="input-append bootstrap-timepicker">
	        <input class="span6 date-picker" id="fecha_revisadopor" name="fecha_revisadopor" type="text" data-date-format="yy-mm-dd" />
	        <span class="add-on">
	            <i class="icon-calendar"></i>
	        </span>
	    </div>

		<label for="aprobadopor">Aprobado por:</label>
		<input type="text" id="aprobadopor" name="aprobadopor" maxlength="100" class="validar"/>

		<label for="control-label">Fecha Aprobado por:</label>
	    <div class="input-append bootstrap-timepicker">
	        <input class="span6 date-picker" id="fecha_aprobadopor" name="fecha_aprobadopor" type="text" data-date-format="yy-mm-dd" />
	        <span class="add-on">
	            <i class="icon-calendar"></i>
	        </span>
	    </div>

		<label for="tecnico">Tecnico o Auxiliar</label>
		<input type="text" id="tecnico" name="tecnico" maxlength="100"/ class="validar">

		<label for="recomendacion">Recomendaciones(Limite 1000 caracteres)</label>
		<textarea class="span12 limited" id="recomendacion" data-maxlength="1000" class="validar"></textarea>
	</div>
	<div class="span3">
		<label for="">Fotos del Anexo</label>
		<ul class="ace-thumbnails">
		<?php 
		$ruta_fotos = Yii::app()->params['ruta_fotos'];
		foreach ($fotos_pruebas as $key) {?>
			<a href="<?php echo '../../../archivos/fotos/'.$key->fk_pruebas.'/'.$key->nombre ?>" data-rel="colorbox">
				<?php echo $key->nombre; ?>
			</a>
			<br>
		<?php 
		}
		?>
		</ul>
	</div>
	<div class="span3">
		<label for="equipo">Elija los equipos usados:</label>
		<div class="form-inline">
			<select id="equipo">
				<option value="0">[Seleccione el Equipo]</option>
				<option value="SVERKER 650[5503828]">SVERKER 650[5503828]</option>
				<option value="ATRT-01[15160]">ATRT-01[15160]</option>
				<option value="TM-1760[1200033]">TM-1760[1200033]</option>
				<option value="WRM-10[97095]">WRM-10[97095]</option>
				<option value="BM-11D[6410-792/031203/5947]">BM-11D[6410-792/031203/5947]</option>
				<option value="ERA- 5000[10104515]">ERA- 5000[10104515]</option>
				<option value="CMC-256[HD306Q]">CMC-256[HD306Q]</option>
				<option value="EL CID digital[6139]">EL CID digital[6139]</option>
				<option value="CMC-356[GK349N]">CMC-356[GK349N]</option>
				<option value="CPC -100[PG107W]">CPC -100[PG107W]</option>
				<option value="CPTD-1[LE683T]">CPTD-1[LE683T]</option>
				<option value="T-440[62104660]">T-440[62104660]</option>
				<option value="E-60[49036807]">E-60[49036807]</option>
				<option value="CPM-500[EK313N]">CPM-500[EK313N]</option>
				<option value="MICRO-OHMETER[132276LKDV]">MICRO-OHMETER[132276LKDV]</option>
				<option value="SDRM202[1200487]">SDRM202[1200487]</option>
				<option value="MIT 1025[1001944101309320]">MIT 1025[1001944101309320]</option>
				<option value="ATRT-03 S2[20510]">ATRT-03 S2[20510]</option>
				<option value="TM-25R[14F2302]">TM-25R[14F2302]</option>
				<option value="BAUR VIOLA[1246408002]">BAUR VIOLA[1246408002]</option>
			</select>
			<button class="btn btn-small btn-warning" onclick="agregarEquipo()">
				<i class="icon-bolt"></i>
				Agregar Equipo
			</button>
		</div>
		<br>
		<equipos></equipos>
	</div>
	<div class="span3">
		<label>Elija si ha sido satisfactoria o no la prueba:</label>
		<?php 
			foreach ($pruebas_datos as $key) {?>
				<label>
					<input type="checkbox" name="tipoBox[]" value="<?php echo $key->fk_tipo_pruebas?>">
					<span class="lbl"> <?php echo $key->fk_tipo_prueba_p->nombre?></span>
				</label><br>
				<textarea class="span12 limited" id="comentario_<?php echo $key->fk_tipo_pruebas?>" name="<?php echo $key->fk_tipo_pruebas?>" data-maxlength="1000" class="validar"></textarea>
		<?php 
			}
		?>
	</div>
</div>
<script>
comprobar();
</script>