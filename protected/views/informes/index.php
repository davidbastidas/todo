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
		'<li>Informes</li>'.
	'</ul>'.
'</div>';

?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/chosen.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/chosen.jquery.min.js"></script>
<script type="text/javascript">
$(document).on( "click", "#partial .pagination li", function() {
    var page = $(this).attr('p');
    consultar(page);
});
var idPrueba=0;
function setPrueba(prueba){
    idPrueba=prueba;
}
function consultar(page){
	var desde=$('#desde').val();
	var hasta=$('#hasta').val();
    var equipo=$("#equipo").val();
	var pasa=true;
	var motivo="";

	if(equipo=="0"){
        pasa=false;
        motivo="Elija el Equipo";
    }
	if(pasa){
		$.ajax({
            url:"<?php echo $nameProyect?>/Informes/ListarPruebas",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                desde: desde,
                hasta: hasta,
                equipo: equipo,
                page: page
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                $("#partial").html(data.respuesta);
                $("#info").html('');
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
    	$("#info").html(html);
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
    $('#zona').on('change', function() {
        $.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Subestacion",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                zona: this.value
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                console.log(data.response)
                $("#subestacion2").html(data.response);
                $("#info").html('');
            }
        });
    });
    $('#categoria').on('change', function() {
        $.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Equipos",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                subestacion: $('#subestacion2').val(),
                categoria: this.value
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                console.log(data.response)
                $("#equipo").html(data.response);
                $("#info").html('');
            }
        });
    });
    $('#subestacion2').on('change', function() {
        $('#categoria').val(0);
        $('#equipo')
                .find('option')
                .remove()
                .end()
                .append('<option value="0">[Seleccione]</option>')
                .val('0');
    });
});
function listarPrueba(prueba){
    location.href="<?php echo $nameProyect?>/Pruebas/ListarPrueba/"+prueba;
}
function comprueba_extension(formulario) {
    var extensiones_permitidas = new Array(".pdf");
    
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
    var htmlError='<div class="alert alert-error">'+
                    '<button class="close" data-dismiss="alert" type="button">'+
                        '<i class="icon-remove"></i>'+
                    '</button>'+
                    '<strong>'+
                        '<i class="icon-remove"></i>'+
                        'Error! '+
                    '</strong>'+
                    'No se pudo actualizar la subida del archivo'+
                    '<br>'+
                    '</div>';
    var htmlSuccess='<div class="alert alert-block alert-success">'+
                        '<button class="close" data-dismiss="alert" type="button">'+
                            '<i class="icon-remove"></i>'+
                        '</button>'+
                        '<strong>'+
                        '<i class="icon-ok"></i>'+
                        'Hecho! '+
                        '</strong>'+
                        'Archivo actualizado.'+
                        '<br>'+
                    '</div>';
    var inputFileImage = $("#LiFormato_UPLOAD")[0];

    var file = inputFileImage.files[0];
    var data = new FormData();
    var motivo="";
    data.append('archivo',file);
    data.append('prueba',idPrueba);
    var url = "<?php echo $nameProyect?>/Informes/SubirPdf";
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
            if(data=="1"){
                $("#info_archivo").html(htmlSuccess);
                consultar();
            }else{
                $("#info_archivo").html(htmlError);
            }
            
        }
    });
}
function limpiar(){
    $("#info_archivo").html('');
    $("#LiFormato_UPLOAD").val('');
    $("#ytLiFormato_UPLOAD").val('');
}
</script>
<h3>Imprima el informe buscando la prueba por fechas</h3>
<div id="info"></div>
<div class="form-inline">
    <label for="zona">Ubicacion</label>
    <select id="zona">
        <option value="0">[Seleccione]</option>
        <?php 
            foreach ($ubicacion as $key) {?>
            <option value="<?php echo $key->id?>"><?php echo $key->nombre?></option>
        <?php
            }
        ?>
    </select>
    <label for="subestacion2">Subestaciones</label>
    <select id="subestacion2" name="subestacion2"><option value="0">[Seleccione]</option></select>

    <label for="categoria">Categoria</label>
    <select id="categoria" name="categoria">
        <option value="0">[Seleccione]</option>
        <option value="1">Transformadores</option>
        <option value="2">Interruptor de Potencia</option>
        <option value="3">Transformador de Corriente</option>
        <option value="4">Transformador de Potencia</option>
    </select>
    
    <label for="equipo">Equipo</label>
    <select id="equipo" name="equipo"><option value="0">[Seleccione]</option></select>

    <br><br>
    <label class="control-label">Desde</label>
    <div class="input-append bootstrap-timepicker">
        <input class="span6 date-picker" id="desde" name="desde" type="text" data-date-format="yyyy-mm-dd" />
        <span class="add-on">
            <i class="icon-calendar"></i>
        </span>
    </div>
    <label class="control-label">Hasta</label>
    <div class="input-append bootstrap-timepicker">
        <input class="span6 date-picker" id="hasta" name="hasta" type="text" data-date-format="yyyy-mm-dd" />
        <span class="add-on">
            <i class="icon-calendar"></i>
        </span>
    </div>
    <button class="btn btn-small btn-primary" onclick="consultar()">
        Buscar
    </button>
</div>
<hr>
<div id="partial"></div>
<?php
$this->renderPartial('dialogos/nuevo_pdf',array());
?>