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
		'<li>Planillas</li>'.
	'</ul>'.
'</div>';

?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/chosen.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/chosen.jquery.min.js"></script>
<script type="text/javascript">
function nuevaPlanilla(){
	var fecha=$('#fecha_realizar').val();
	var mensajero=$('#select_mensajeros').val();
	var pasa=true;
	var motivo="";

	if(fecha.length < 1){
		pasa=false;
		motivo="Ingrese la fecha";
	}else if(mensajero==0){
		pasa=false;
		motivo="Elija el mensajero";
	}
	if(pasa){
		$.ajax({
            url:"<?php echo $nameProyect?>/Planilla/NuevaPlanilla",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                fecha: fecha,
                mensajero: mensajero
            },
            beforeSend:  function() {
                $("#info_create").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                if(data.respuesta=='ok'){
                    location.href="<?echo $nameProyect?>/Planilla/NuevoRegistro/"+data.registro;
                }else{
                	var html='<div class="alert alert-error">'+
                			'<button class="close" data-dismiss="alert" type="button">'+
                			'<i class="icon-remove"></i>'+
                			'</button>'+
                			'<strong>'+
                			'<i class="icon-remove"></i>'+
                			'Error! '+
                			'</strong>'+
                			'Registro Erroneo '+data.respuesta+
                			'<br>'+
                			'</div>';
                	$("#info_create").html(html);
                }
            }
	    });
	}else{
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
    	$("#info_create").html(html);
	}
}
function busquedaPlanilla(){
	location.href="<?echo $nameProyect?>/Planilla/Busqueda";
}
function comprueba_extensionExcel(formulario) {
    var extensiones_permitidas = new Array(".xls", ".xlsx");
    
    var archivo=document.getElementById('LiFormato_UPLOAD').value;
    if(comprobarArchivo(archivo,extensiones_permitidas)){
        subirArchivo();
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
function subirArchivo(){
    var inputFileImage = $("#LiFormato_UPLOAD")[0];
    var file = inputFileImage.files[0];
    var data = new FormData();
    var fecha = $("#fecha_realizar2").val();
    var pasa=true;
    var motivo="";
    if(fecha.length < 1){
        pasa=false;
        motivo="Ingrese la fecha";
    }
    if(pasa){
        data.append('archivo',file);
        data.append('fecha',fecha);
        var url = "<?echo $nameProyect?>/Planilla/SubirPendientes";
        document.getElementById('LiFormato_UPLOAD').disabled=true;
        document.getElementById('SubirA').disabled=true;
        $("#info_archivo").html('');
        $.ajax({
            url:url,
            type:'POST',
            data:data,
            cache:false,
            contentType:false,
            processData:false,
            beforeSend:  function() {
                $("#info_archivo").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                document.getElementById('LiFormato_UPLOAD').disabled=false;
                document.getElementById('SubirA').disabled=false;
                $("#info_archivo").html(data);
            }
        });
    }else{
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
        $("#info_archivo").html(html);
    }
}
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$(".chzn-select").chosen();
	$('#modal-form').on('show', function () {
		$(this).find('.chzn-container').each(function(){
			$(this).find('a:first-child').css('width' , '200px');
			$(this).find('.chzn-drop').css('width' , '210px');
			$(this).find('.chzn-search input').css('width' , '200px');
		});
	});
});
</script>
<h3>
	Elije una opcion
</h3>
<a href="#modal-form" class="btn btn-primary" onclick="return false;" data-toggle="modal">
	<i class="icon-file bigger-125"></i>
	Nueva Planilla
</a>
<a href="#" class="btn btn-primary" onclick="busquedaPlanilla();return false;">
	<i class="icon-eye-open  bigger-125"></i>
	Ver Planillas
</a>
<a href="#modal-pendientes" class="btn btn-primary" onclick="return false;" data-toggle="modal">
	<i class="icon-cloud-upload bigger-125"></i>
	Subir Pendientes
</a>
<?php
$this->renderPartial('dialogos/nueva_planilla',array());
$this->renderPartial('dialogos/pendientes',array());
?>
















