<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title>Printed document</title>
<?php
$pagina=false;
$ruta_imagenes = Yii::app() -> params['imagenes_proyecto'];
$informe = json_decode($datos_form, true );
$ruta_fotos = Yii::app()->params['ruta_fotos'];

$json_equipo = json_decode( $equipo->datosjson, true );
?>
<style>
@page {
  margin: 0;
}

body {
  margin-top: 3.5cm;
  margin-bottom: 2cm;
  margin-left: 1cm;
  margin-right: 1cm;
  font-family: DejaVu Sans, sans-serif;
  text-align: justify;
  font-size: 9px;
}

div.header,
div.footer {
  position: fixed;
  background: #fff;
  width: 100%;
  border: 0px solid #888;
  overflow: hidden;
  padding: 0.1cm;
  margin-left: 1cm;
  margin-right: 1cm;
}

div.header {
  top: 0cm;
  left: 0cm;
  height: 2.5cm;
}

div.footer {
  bottom: 0cm;
    left: 0cm;
  height: 1.9cm;
}
div.footer .page:after { content: "Pagina " counter(page); font-size: 9px;}
hr {
  page-break-after: always;
  border: 0;
}

.border_equipo {
    border: 0.5pt solid black;
}
.border {
    border: 0.5pt solid black;
    /*width: 100%;*/
}
.bordertd{
    border: 1px solid black;
    font-size: 9px;
}
.bordertd_size9{
    border: 1px solid black;
    font-size: 9px;
    padding: 5px;
}
.critica_r{
    font-size: 9px;
}
.encabezado{
    width: 100%;
    border: 0px solid black;
    outline:none;
}
.texto_cabeza{
    font-size: 9px;
}
.logo_cabeza{
    width: 200px;
    height: 70px;
    text-align: right;
}
.foto1{
    width: 450px;
    height: 350px;
}
.foto2{
    width: 250px;
    height: 150px;
}
.foto3{
    width: 250px;
    height: 200px;
}
.image_resultado{
    width: 100%;
}
.bordertd_naranja{
    border: 1px solid #F79646;
    font-size: 9px;
    background: #FCB67C;
    padding: 5px;
}
.bordertd_abajo_naranja{
    border-bottom: 1px solid #F79646;
    font-size: 9px;
    background: #FCB67C;
    padding: 5px;
}
.justificado{
    text-align : justify;
}

.h500{height: 430;}

</style>
</head>

<body>
<div class="header">
    <table class="encabezado" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="width: 70%;">
                    <p class="texto_cabeza">
                        Applus Norcontrol Colombia Ltda.<br>
                        Carrera 11 No. 73-32 Piso 2 Bogota<br>
                        PBX: (571) 3212944 - FAX:(571) 3212942<br>
                        Calle 58 N 59B-09   Barranquilla<br>
                        PBX: (575 3851256<br>
                        www.appluscorp.com
                    </p>
                </td>
                <td style="width: 30%;"><img class="logo_cabeza" src="<?php echo $ruta_imagenes?>logo1.jpg"></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="footer">
    <div style="font-size: 6px;">Garantía de Calidad de Servicio</div>
    <div style="border: 1px solid black;font-size: 6px;" class="justificado">
        Applus+, garantiza que este trabajo se ha realizado dentro de lo exigido por nuestro Sistema de Calidad y Sostenibilidad, habiéndose cumplido las condiciones contractuales y la normativa legal.<br>
        En el marco de nuestro programa de mejora les agradecemos nos transmitan cualquier comentario que consideren oportuno, dirigiéndose al responsable que firma este escrito, o bien, al Coordinador de SGI de Applus+, Javier Blanco, en la dirección: javier.blanco.esteban@applus.com  
        <br>
        <p class="page"></p>
    </div>
</div>

<table class="border" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="bordertd_size9">
            <img class="h500" src="<?php echo $ruta_imagenes?>logo3.jpg">
        </td>
        <td class="bordertd_size9">
            <p>INFORME O CERTIFICADO: MANTENIMIENTO PREDICTIVO</p>
            <p style="border-top: 1px solid #000;">
                <dt>1. DESCRIPCION DE LOS TRABAJOS</dt>
                    <dd>1.1 Objetos</dd>
                    <dd>1.2 Trabajos realizados</dd>
                    <dd>1.3 Fechas de Inspeccion</dd>
                    <dd>1.4 Lugar de inspeccion</dd>
                <dt>2. DOCUMENTACION APLICABLE</dt>
                <dt>3. PERSONAL</dt>
                <dt>4. EQUIPOS</dt>
                <dt>5. RESULTADOS</dt>
                <dt>6. RECOMENDACIONES Y CONCLUSIONES</dt>
                <dt>7. NOTAS TECNICAS</dt>
                </dl>
            </p>
            <p style="border-top: 1px solid #000;">8. ANEXOS</p>
            <p style="border-top: 1px solid #000;">ANEXO 1.<br>PRUEBA A INTERRUPTOR DE POTENCIA</p>
        </td>
    </tr>
    <tr>
        <td rowspan="2" class="bordertd_size9">
            <table class="encabezado" style="padding: 3px;" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Elaborado por:</td>
                        <td>Fecha / Firma:</td>
                    </tr>
                    <tr>
                        <td><?php echo $informe['elaboradopor']?></td>
                        <td><?php echo $informe['fecha_elaboradopor']?></td>
                    </tr>
                    <tr>
                        <td>Revisado por:</td>
                        <td>Fecha / Firma:</td>
                    </tr>
                    <tr>
                        <td><?php echo $informe['revisadopor']?></td>
                        <td><?php echo $informe['fecha_revisadopor']?></td>
                    </tr>
                    <tr>
                        <td>Aprobado por:</td>
                        <td>Fecha / Firma:</td>
                    </tr>
                    <tr>
                        <td><?php echo $informe['aprobadopor']?></td>
                        <td><?php echo $informe['fecha_aprobadopor']?></td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td class="bordertd_size9">CLIENTE: <br>ELECTRICARIBE S.A. E.S.P.</td>
    </tr>
    <tr>
        <td class="bordertd_size9">
            ASUNTO:<br>
            INFORME DE ENSAYO DE MANTENIMIENTO PREDICTIVO A INTERRUPTOR DE POTENCIA<br>
            <?php echo $json_equipo['nombre_eq']?>
        </td>
    </tr>
    <tr>
        <td class="bordertd_size9">Este documento y los anexos en el referenciados tienen paginacion independiente con indicacion del numero total de paginas en cada uno de ellos (tipo pagina X de Y)</td>
        <td class="bordertd_size9">Este documento no debera reproducirse sin la aprobacion por escrito de NORCONTROL y del cliente</td>
    </tr>
</table>

    <hr>

    <dl>
        <dt>1. DESCRIPCIÓN DE TRABAJOS</dt>
        <dd>1.1 Objetos: </dd>
    </dl>
    <p class="justificado">
        El objetivo de este documento es informar el estado del Interruptor de Potencia de la Subestación Eléctrica <?php echo $equipo->fk_subestacion_e->nombre?>, mediante la aplicación de ensayos dieléctricos en el interruptor y sus componentes principales, con el fin de dar a conocer un diagnostico general del estado de los mismos.
    </p>
    <dl>
        <dt></dt>
        <dd>1.2 Trabajos realizados</dd>
    </dl>
    <p class="justificado">
        Se realizaron ensayos de mantenimiento predictivo al siguiente equipo:
    </p>

    <?php 
    echo $this->renderPartial('../informes/interruptor_potencia/partial/fotos', 
                    array('fotos_equipo' => $fotos_equipo, 'id'=>$equipo->id), true);//imagenes equipo
    ?>

        <h4>Equipo</h4>
        <table class="border_equipo" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Serie:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $equipo->serie?></td>
                </tr>
            <?php 
            if(isset($json_equipo['tipo'])){
                $nombre_mecanismo="";
            if($json_equipo['tipo']==1){
                $nombre_mecanismo="ACB";
            }else if($json_equipo['tipo']==2){
                $nombre_mecanismo="SFG";
            }else if($json_equipo['tipo']==3){
                $nombre_mecanismo="VACIO";
            }else if($json_equipo['tipo']==4){
                $nombre_mecanismo="GRAN VOLUMEN ACEITE";
            }else if($json_equipo['tipo']==5){
                $nombre_mecanismo="MINIMO VOLUMEN ACEITE";
            }
            ?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tipo de Mecanismo:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $nombre_mecanismo?></td>
                </tr>
            <?php 

            }?>
            <?php 
            if(isset($json_equipo['fabricante'])){
            if($json_equipo['fabricante']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Fabricante/Reparador:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['fabricante']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['nombre_eq'])){
            if($json_equipo['nombre_eq']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Nombre Equipo:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['nombre_eq']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['fecha_fab'])){
            if($json_equipo['fecha_fab']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Fecha Fabricacion:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['fecha_fab']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['corriente_nominal'])){
            if($json_equipo['corriente_nominal']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Corriente Nominal:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['corriente_nominal']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['voltaje_nominal'])){
            if($json_equipo['voltaje_nominal']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Voltaje Nominal:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['voltaje_nominal']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['frecuencia_nominal'])){
            if($json_equipo['frecuencia_nominal']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Frecuencia Nominal:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['frecuencia_nominal']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['corriente_corto'])){
            if($json_equipo['corriente_corto']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Corriente Corto:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['corriente_corto']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['extincion_arco'])){
            if($json_equipo['extincion_arco']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tipo de Extincion de Arco:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['extincion_arco']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['capacidad_interruptiva'])){
            if($json_equipo['capacidad_interruptiva']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Capacidad Interruptiva:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['capacidad_interruptiva']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['tension_nominal'])){
            if($json_equipo['tension_nominal']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tension nominal de control:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['tension_nominal']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['n_operaciones'])){
            if($json_equipo['n_operaciones']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Numero de Operaciones:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['n_operaciones']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['t_apertura_min'])){
            if($json_equipo['t_apertura_min']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tiempo de Apertura Minimo(Segundos):</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['t_apertura_min']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['t_apertura_max'])){
            if($json_equipo['t_apertura_max']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tiempo de Apertura Maximo(Segundos):</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['t_apertura_max']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['t_cierre_min'])){
            if($json_equipo['t_cierre_min']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tiempo de Cierre Minimo(Segundos):</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['t_cierre_min']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['t_cierre_max'])){
            if($json_equipo['t_cierre_max']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tiempo de Cierre Maximo(Segundos):</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['t_cierre_max']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['t_cierre_aca'])){
            if($json_equipo['t_cierre_aca']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tiempo de Apertura - Cierre - Apertura(Segundos):</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['t_cierre_aca']?></td>
                </tr>
            <?php } }?>
        </tbody>
    </table>
    <br>
    
    ANEXO 1.
    <dl>
        <?php 
            foreach ($datos_pruebas as $key1) {
                if($key1->fk_tipo_pruebas==7){//resistencia de aislamiento
                    echo '<dt>- ENSAYOS DIELÉCTRICOS EN CORRIENTE CONTINUA.</dt>'.
                         '<dd>Resistencia de Aislamiento (G&#937;)</dd>';
                }else if($key1->fk_tipo_pruebas==10){//resistencia de contactos
                    echo "<dt>- MEDIDA DE RESISTENCIA DE CONTACTOS</dt>";
                }else if($key1->fk_tipo_pruebas==8){//factor de disipacion
                    echo "<dt>- ENSAYOS DIELÉCTRICOS EN CORRIENTE ALTERNA (Factor de Disipación mW)</dt>";
                }else if($key1->fk_tipo_pruebas==9){//pruebas dinamicas
                    echo "<dt>- TIEMPO DE APERTURA Y CIERRE</dt>";
                }else if($key1->fk_tipo_pruebas==2){//collar caliente
                    echo "<dt>- COLLAR CALIENTE</dt>";
                }
            }
        ?>
        <dt>1.3 Fecha de inspección</dt>
            <dd><?php echo $pruebas->fecha?></dd>
        <dt>1.4 Lugar de Inspección</dt>
            <dd>Subestacion <?php echo $equipo->fk_subestacion_e->nombre?></dd>
    </dl><br>
    
    2. DOCUMENTACIÓN APLICABLE
    <dl>
        <dt class="justificado">Para la realización del informe se tuvo en cuenta las siguientes disposiciones legislativas y documentos de referencia: </dt>
            <dd>- Los manuales de los equipos de ensayo.</dd>
            <dd>- Reglamento Técnico de Instalaciones Eléctricas Colombia (RETIE). Artículos 2; 8 y 18.</dd>
            <dd>- ANSI-IEEE Std 4-1978  "Standard techniques for high voltage testing".</dd>
            <dd>- Código Eléctrico Colombiano NTC 2050. Sección 445.</dd>
            <dd>- IEC 56: 1987, High-voltage alternating-current circuit-breakers.</dd>
            <dd>- IEC 60694 Medición de Resistencia de contacto en el circuito principal.</dd>
            <dd>- IEC 62271-100 High-voltage switchgear and controlgear – Part 100: Alternating-current circuit-breakers.</dd>
            <dd>- CPC 100 User Manual - PTM User Manual - CP TD1 Reference Manual</dd>
            <dd>- IEEE Std C37.09-1999 Standard Test Procedure for AC High-Voltage Circuit Breakers Rated on a Symmetrical Current Basis</dd>
            <dd>- NETA ATS-2003 Acceptance Testing Specifications</dd>
    </dl><br>

    
    3. PERSONAL<br>
    <p class="justificado">
        Las actividades correspondientes a la realización de los ensayos estuvieron a cargo del Ingeniero <?php echo $informe['elaboradopor']?> y los técnicos <?php echo $informe['tecnico']?>, la interpretación de los resultados y la elaboración del informe estuvo a cargo del ingeniero <?php echo $informe['elaboradopor']?>, todos los anteriores trabajadores activos de APPLUS NORCONTROL COLOMBIA.<br><br>
        La revisión del informe estuvo a cargo del ingeniero <?php echo $informe['revisadopor']?>, la posterior aprobación del informe, estuvo a cargo del ingeniero <?php echo $informe['aprobadopor']?> trabajadores de APPLUS NORCONTROL COLOMBIA.

    </p>

    4. EQUIPOS
    <dl class="justificado">
        <dt>Para la realización de los trabajos se emplearon los siguientes equipos:</dt>
            <?php 
                if(isset($informe['equipos'])){
                    $count=count($informe['equipos']);
                    if($count>0){
                        for ($i=0; $i < $count; $i++) {
                            echo "<dd>".$informe['equipos'][$i]['nombre'].".</dd>";
                        }
                    }else{
                        echo "No se encontraron Equipos.";
                    }
                }else{
                    echo "No se encontraron Equipos.";
                }
            ?>
    </dl><br>

    5. RESULTADOS<br>
    <p class="justificado">
        Se realizaron los ensayos de mantenimiento predictivo en el siguiente interruptor de la subestación eléctrica <?php echo $equipo->fk_subestacion_e->nombre?> por solicitud del cliente, a continuación se detallan y se analizan los resultados obtenidos de las pruebas realizadas:
    </p>
    <strong>Criterios de Evaluación de Resultados</strong>
    <?php 
foreach ($datos_pruebas as $key2) {
    if($key2->fk_tipo_pruebas==8){//factor de disipacion?>
        <strong style="text-align:center">- ENSAYOS DIELÉCTRICOS EN CORRIENTE ALTERNA.</strong>
        <p class="justificado">
            Las pérdidas en los materiales dieléctricos se presentan debido a que son sometidos a tensión eléctrica, que provocan corrientes de fuga, que a su vez dependen de la tensión aplicada y de la resistencia del aislante en cuestión. Al paso de esta corriente el dieléctrico sufre el efecto Joule que se traduce en una pérdida de energía en forma de calor. Esta pérdida se expresa en función de la corriente, constante de resistencia del aislante y el tiempo de inyección en segundos, la formula que corresponde a esto es la siguiente:
        </p>
        <p style="text-align:center;">
        W=I2*R*t
        </p>
        <p class="justificado">
        Donde:<br>
        R: Resistencia del aislante<br>
        I: Corriente de Fuga<br>
        t: Tiempo de inyección en segundos<br>
        </p>
        <p class="justificado">
            La magnitud de la pérdida en el aislamiento suele ser muy pequeña y suele acarrear importancia cuando las magnitudes de estos valores son altos, los fabricantes como Siemens y ABB recomiendan que estos valores deben permanecer en unidades muy bajas; esto va ligado a los materiales aislantes utilizados en la construcción de estos elementos. Los fabricantes aseguran que la calidad de los materiales que ellos utilizan en la creación de estos elementos es cada vez mejor. 
        </p>
        <p class="justificado">
            Teniendo en cuenta las recomendaciones dadas por el Test Data Reference Book (Secc 4 Circuit Breakers),  acerca del factor de disipación, Doble toma como referencia los datos enviados por sus clientes y dejan claro que los valores de perdida no sobrepasan los 100 mw en ninguno de los casos;  según NETA ATS 2007, si el fabricante no relaciona este dato en su placa característica o en su manual de mantenimiento, se toma como valor referente pruebas realizadas en otros interruptores similares.
        </p>
        <p class="justificado">
            Para efectos de evaluación se toma como rango de buen estado de la botella, cámara de extinción de arco y aisladores los valores de pérdidas en el aislamiento comprendidos entre 0 y 100 mW (miliWatts), por fuera de este rango se considera defectuosa y se recomienda cambio inmediato.
        </p>
        <p class="justificado">
            Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
        </p><br>

     <?php }else if($key2->fk_tipo_pruebas==10){//resistencia de contactos?>
        <strong style="text-align:center">- ENSAYO DE RESISTENCIA DE CONTACTOS.</strong>
        <p class="justificado">
            Actualmente no existe una norma IEEE o IEC que trate de frente el tema de la prueba de Interruptores de Potencia en campo, ante esa falencia se tiene en cuenta las recomendaciones de los fabricantes (Pruebas en Fábrica), sin embargo estos entes normativos no han dejado de lado por completo este tema, actualmente existen normas como es el caso de la IEEE Std. C37.09&#8482;-1999 (R2007), que recomienda que la resistencia de contacto debe realizarse con inyección de corriente DC a partir de 100A; el interruptor debe estar en posición "CERRADO" y la prueba debe realizarse entre cada polo superior e inferior  del interruptor, teniendo en cuenta que esta inyección de corriente no debe exceder los límites establecidos en la placa característica del interruptor.
        </p>
        <p class="justificado">
            Por otro lado fabricantes reconocidos de interruptores como, Siemens, ABB, Alstom, Schneider, recomiendan valores de resistencias de contactos entre 20 y 80 ; para efectos de evaluación y teniendo en cuenta las recomendaciones de los fabricantes, Applus Norcontrol Colombia Ltda, establece los siguientes rangos de evaluación para la prueba de resistencia de contactos:
        </p>
        <dl class="justificado">
            <dt>- 0-40 &#181;&#937; Estado Operativo Excelente (No realizar Mantenimiento Mecanico)</dt>
            <dt>- 41-70 &#181;&#937; Estado Operativo Bueno (Seguimiento)</dt>
            <dt>- 71-100 &#181;&#937; Estado Operativo Aceptable (Realizar Mantenimiento Mecanico exhaustivo o sustitucion,Repetir prueba)</dt>
        </dl>
        <p class="justificado">
            Para valores de resistencia de contacto superiores a 100&#181;&#937;, se recomienda el cambio inmediato, claro está que esta evaluación está sujeta a las condiciones operativas del cliente.
        </p>

        <p class="justificado">
            Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
        </p><br>

     <?php }else if($key2->fk_tipo_pruebas==7){//resistencia de aislamiento?>
        <strong style="text-align:center">- ENSAYOS DIELÉCTRICO EN CORRIENTE CONTINUA</strong>
        <p class="justificado">
            Los valores de resistencia de aislamiento deben estar por encima límite Mínimo para este tipo de aparamenta eléctrica según la Tabla 100.1 descrita en la norma NETA 2003 (valor mínimo 5G&#937;). 
        </p><br>
        <img class="image_resultado" src="<?php echo $ruta_imagenes?>it_table100.jpg"><br>

        <p class="justificado">
            Nota: Para interruptores de tipo interior se utilizara la tabla 100.14.1 y para interruptores tipo exterior se utilizara la tabla 100.14.2 para la corrección por factor de temperatura  del valor de resistencia de aislamiento  
        </p><br>

        <p class="justificado">
            Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
        </p><br>

     <?php }else if($key2->fk_tipo_pruebas==9){//pruebas dinamicas?>
        <strong style="text-align:center">- ENSAYOS TIEMPOS DE APERTURA Y CIERRE</strong>
        <p class="justificado">
            Los valores obtenidos de tiempo de apertura y cierre en los polos del interruptor se deben encontrar dentro de los límites promedio establecidos por los fabricantes (Tiempos Promedios: 33 - 60 ms (Open) /  60 - 80 ms (Closed) - discrepancia promedio (1/4 de un ciclo (60Hz)) - 2,7 ms para la operación de cierre  - (1/6 de un ciclo (60Hz)) – 4.2 ms para la operación de apertura según recomendación de la norma IEC62271-100.
        </p>
        <p class="justificado">
            Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
        </p><br>

     <?php }else if($key2->fk_tipo_pruebas==2){//collar caliente?>
        <strong style="text-align:center">- COLLAR CALIENTE</strong>
        
        <p class="justificado">
            Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
        </p>
     <?php }
}
?>

    <strong>6. RECOMENDACIONES Y CONCLUSIONES</strong>

    <dl class="justificado">
        <dt>
            <strong>Conclusiones:</strong><br>
            Del análisis detallado, realizado a los resultados de la prueba del interruptor se concluye lo siguiente:
        </dt>
            <?php
                $count_satisfactorio=count($informe['satisfactorio']);
                for ($y=0; $y < $count_satisfactorio; $y++) {
                    if($informe['satisfactorio'][$y]['fk_prueba']==2){//collar caliente
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Collar Caliente</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Collar Caliente</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==7){//resistencia aislamiento
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Resistencia de Aislamiento</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Resistencia de Aislamiento</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==8){//Factor Disipacion
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Factor Disipacion</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Factor Disipacion</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==9){//Pruebas Dinamicas
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Pruebas Dinamicas</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Pruebas Dinamicas</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==10){//Resistencia de Contactos
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Resistencia de Contactos</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Resistencia de Contactos</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }
                }
            ?>            
    </dl><br>
    <dl class="justificado">
        <dt><strong>Recomendaciones</strong></dt>
            <dd><strong><?php echo $informe['recomendaciones']?></strong></dd>
    </dl><br>

    
    <strong>7. NOTAS TECNICAS</strong><br>
    <strong>Fallas tipos fallas en interruptores</strong>
    <p class="justificado">
        Las fallas más comunes se relacionan a continuación, atascamiento de barras de accionamiento, explosión de cámaras de extinción de arco, debida a rebotes de los contactos internos, fallos en los circuitos de control, falla en los equipos de monitoreo, perdida de presión en el gas SF6, aceite y aire, fallas en falso debido a aterramientos de los cables de control.
    </p>

    <strong>Desgaste de contactos Móviles en los Polos del interruptor</strong>
    <p class="justificado">
        A menudo los equipos que están sometidos a niveles de tensiones superiores a 13,8 kV sufren mayores degastes en sus contactos en comparación de los equipos que están por debajo de este umbral. Para el caso de los interruptores esto no ha sido la excepción, los polos de estos equipos son sometidos a fallas causantes de grandes desgastes en los contactos móviles. Las fallas más comunes en los contactos móviles y fijos son las siguientes:
    </p>

    <dl class="justificado">
        <dt></dt>
            <dd>- Desgastes excesivo en la corona de los contactos móviles de cada polo</dd>
            <dd>- Contacto fijos desgastados o incompletos</dd>
            <dd>- Falla de la cámara de extinción de arco eléctrico</dd>
            <dd>- Contactos móviles incompletos</dd>
    </dl><br>
    
    <!--<hr>-->
    <strong>8. ANEXOS</strong><br>
    <strong>ANEXO 1.</strong><br>
    <?php 
        $div="";
        $div.= $this->renderPartial('../informes/interruptor_potencia/partial/equipo_temperaturas', array('temperaturas' => $temperaturas, 'equipo'=>$equipo), true);
        //$div.='<!-- pagina 15-->';
        foreach ($datos_pruebas as $key) {
            if($key->fk_tipo_pruebas==8){//factor disipacion
                $div.= $this->renderPartial('../informes/interruptor_potencia/partial/factor_disipacion', array('datos' => $key->datos), true);
            }else if($key->fk_tipo_pruebas==2){//collar caliente
                $div.= $this->renderPartial('../informes/interruptor_potencia/partial/collar_caliente', array('datos' => $key->datos), true);
            }else if($key->fk_tipo_pruebas==10){//resistencia de contactos
                $div.= $this->renderPartial('../informes/interruptor_potencia/partial/resistencia_contacto', array('datos' => $key->datos), true);
            }else if($key->fk_tipo_pruebas==9){//pruebas dinamicas
                $div.= $this->renderPartial(
                    '../informes/interruptor_potencia/partial/pruebas_dinamicas', 
                    array(
                        'datos' => $key->datos,
                        'datosequipo' => $equipo->datosjson,
                        'id' => $key->id,
                        ), true);
            }else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
                $div.= $this->renderPartial(
                    '../informes/interruptor_potencia/partial/resistencia_aislamiento', 
                    array(
                        'datos' => $key->datos,
                        'temperaturas' => $pruebas->datos,), true);
            }
        }
        $div.= $this->renderPartial('../informes/interruptor_potencia/partial/fotos_anexo', 
                    array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
        echo $div;
    ?>
</body></html>
