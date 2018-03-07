
<?php
$titulo="";
if($prueba==1){
	$titulo="Prueba de Aceite DGA";
}else if($prueba==2){
	$titulo="Prueba de Aceite FQ";
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
		'<li>'.
			'<a href="'.$nameProyect.'/Equipos/view/'.$id.'">Equipo</a>'.
			'<span class="divider">'.
				'<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>'.
			''.$titulo.
		'</li>'.
	'</ul>'.
'</div>';

?>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/chosen.jquery.min.js"></script>
<script>
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
var upload=false;
function crearJson(){
	<?php 
	if($prueba==1){?>
		var json=''
		  	+'{'
			     +'"reporte": "'+$("#reporte").val()+'",'
			     +'"fecha_muestreo": "'+$("#fecha_muestreo").val()+'",'
			     +'"fecha_prueba": "'+$("#fecha_prueba").val()+'",'
			     +'"estado_equipo": "'+$("#estado_equipo").val()+'",'
			     +'"analista": "'+$("#analista").val()+'",'
			     +'"cliente": "'+$("#cliente").val()+'",'
			     +'"posicion_medida": "'+$("#posicion_medida").val()+'",'
			     +'"hidrogeno": "'+$("#hidrogeno").val()+'",'
			     +'"oxigeno": "'+$("#oxigeno").val()+'",'
			     +'"nitrogeno": "'+$("#nitrogeno").val()+'",'
			     +'"metano": "'+$("#metano").val()+'",'
			     +'"monoxido_carbono": "'+$("#monoxido_carbono").val()+'",'
			     +'"dioxido_carbono": "'+$("#dioxido_carbono").val()+'",'
			     +'"acetileno": "'+$("#acetileno").val()+'",'
			     +'"etileno": "'+$("#etileno").val()+'",'
			     +'"etano": "'+$("#etano").val()+'",'
			     +'"propano": "'+$("#propano").val()+'",'
			     +'"total_gases": "'+$("#total_gases").val()+'",'
			     +'"realizado_por": "'+$("#realizado_por").val()+'",'
			     +'"subestacion": "'+$("#subestacion2").val()+'",'
			     +'"temp_aceite_sup": "'+$("#temp_aceite_sup").val()+'",'
			     +'"temp_aceite_inf": "'+$("#temp_aceite_inf").val()+'",'
			     +'"observacion": "'+$("#observacion").val()+'"'
			+'}';
	<?php }else if($prueba==2){?>
		var json=''
		  	+'{'
			     +'"reporte": "'+$("#reporte").val()+'",'
			     +'"fecha_muestreo": "'+$("#fecha_muestreo").val()+'",'
			     +'"fecha_prueba": "'+$("#fecha_prueba").val()+'",'
			     +'"estado_equipo": "'+$("#estado_equipo").val()+'",'
			     +'"analista": "'+$("#analista").val()+'",'
			     +'"cliente": "'+$("#cliente").val()+'",'
			     +'"posicion_medida": "'+$("#posicion_medida").val()+'",'
			     +'"temp_aceite_sup": "'+$("#temp_aceite_sup").val()+'",'
			     +'"temp_aceite_inf": "'+$("#temp_aceite_inf").val()+'",'
			     +'"indice_color": "'+$("#indice_color").val()+'",'
			     +'"n_neutralizacion": "'+$("#n_neutralizacion").val()+'",'
			     +'"tension_interfacial": "'+$("#tension_interfacial").val()+'",'
			     +'"contenido_humedad": "'+$("#contenido_humedad").val()+'",'
			     +'"r_dielectrica": "'+$("#r_dielectrica").val()+'",'
			     +'"norma_rd": "'+$("#norma_rd").val()+'",'
			     +'"factor_potencia": "'+$("#factor_potencia").val()+'",'
			     +'"hidroximentil": "'+$("#hidroximentil").val()+'",'
			     +'"furfuril": "'+$("#furfuril").val()+'",'
			     +'"furaldehido": "'+$("#furaldehido").val()+'",'
			     +'"acetil": "'+$("#acetil").val()+'",'
			     +'"metil": "'+$("#metil").val()+'",'
			     +'"humedad_celulosa": "'+$("#humedad_celulosa").val()+'",'
			     +'"contenido_pcbs": "'+$("#contenido_pcbs").val()+'",'
			     +'"indice_calidad": "'+$("#indice_calidad").val()+'",'
			     +'"observacion": "'+$("#observacion").val()+'"'
			+'}';
	<?php }
	?>
	
	var inputFileImage = $("#LiFormato_UPLOAD")[0];
	if(inputFileImage.files.length!=0){
		var file = inputFileImage.files[0];
	    var data = new FormData();
	    var motivo="";
	    data.append('archivo',file);
	    data.append('json',json);

		$.ajax({
	        url:"<?php echo $nameProyect?>/Aceite/update/<?php echo $id?>",
	        type:'POST',
	        dataType:"json",
	        cache:false,
	        data: data,
	        contentType:false,
	    	processData:false,
	        beforeSend:  function() {
	            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
			    console.log(XMLHttpRequest.statusText);
				console.log(textStatus);
				console.log(errorThrown);
		    },
	        success: function(data){
	        	console.log(data.update);
	        	if(data.update=="1"){
	        		location.href="<?php echo $nameProyect?>/Equipos/view/<?php echo $id?>";
	        	}else{
	        		$(".info").html('<div class="alert alert-error">'+
	        			'<button class="close" data-dismiss="alert" type="button">'+
						'<i class="icon-remove"></i>'+
						'</button>'+
						'<strong>'+
						'<i class="icon-remove"></i>'+
						'</strong>'+
						'No se pudo guardar.'+
						'<br>'+
						'</div>');
	        	}
	            
	        }
	    });
	}else{
		$(".info").html('<div class="alert alert-error">'+
	        			'<button class="close" data-dismiss="alert" type="button">'+
						'<i class="icon-remove"></i>'+
						'</button>'+
						'<strong>'+
						'<i class="icon-remove"></i>'+
						'</strong>'+
						'Verifique el archivo a Subir.'+
						'<br>'+
						'</div>');
	}
    
}
function comprueba_extension(formulario) {
    var extensiones_permitidas = new Array(".pdf");
    
    var archivo=document.getElementById('LiFormato_UPLOAD').value;
    if(comprobarArchivo(archivo,extensiones_permitidas)){
        crearJson();
        return 1;
    }else{
        alert (mierror);
    }
    //si estoy aqui es que no se ha podido subir
    return 0;
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
	<h3><?php echo $titulo?></h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="comprueba_extension($('#form_subir'))">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<hr>
<?php 
if($prueba==1){
	echo $this->renderPartial('_aceite_dga', array('model' =>$model, 'nameProyect' =>$nameProyect,), true);
}else if($prueba==2){
	echo $this->renderPartial('_aceite_fq', array('model' =>$model, 'nameProyect' =>$nameProyect,), true);
}
?>
