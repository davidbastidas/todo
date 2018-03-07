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
    <tbody>
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
                <p style="border-top: 1px solid #000;">ANEXO 1.<br>PRUEBA A TRANSFORMADOR DE POTENCIA</p>
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
                INFORME DE ENSAYO DE MANTENIMIENTO PREDICTIVO A TRANSFORMADOR DE POTENCIA<br>
                <?php echo $json_equipo['nombre_eq']?>
            </td>
        </tr>
        <tr>
            <td class="bordertd_size9">Este documento y los anexos en el referenciados tienen paginacion independiente con indicacion del numero total de paginas en cada uno de ellos (tipo pagina X de Y)</td>
            <td class="bordertd_size9">Este documento no debera reproducirse sin la aprobacion por escrito de NORCONTROL y del cliente</td>
        </tr>
    </tbody>
</table>
    <hr>
    
    <!-- pagina 2-->
    <dl>
        <dt>1. DESCRIPCIÓN DE TRABAJOS</dt>
        <dd>1.1 Objetos: </dd>
    </dl>
    <p class="justificado">
        El objetivo de este documento es informar el estado del Transformador de Potencia de la Subestación Eléctrica <?php echo $equipo->fk_subestacion_e->nombre?>, mediante la aplicación de ensayos dieléctricos en el transformador y sus componentes principales, con el fin de dar a conocer un diagnostico general del estado de los mismos.
    </p>
    <dl>
        <dt></dt>
        <dd>1.2 Trabajos realizados</dd>
    </dl>
    <p class="justificado">
        Se realizaron ensayos de mantenimiento predictivo al siguiente equipo:
    </p>

    <?php 
    echo $this->renderPartial('../informes/partial/fotos', 
                    array('fotos_equipo' => $fotos_equipo, 'id'=>$equipo->id), true);//imagenes equipo
    ?>
    
    <!-- pagina 3-->
        <h4>Equipo</h4>
        <table class="border_equipo" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td style="text-align:left" class="bordertd_size9">Serie:</td>
                <td style="text-align:left" class="bordertd_size9"><?php echo $equipo->serie?></td>
            </tr>
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
            if(isset($json_equipo['potencia1'])){
            if($json_equipo['potencia1']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Potencia 1:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['potencia1']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['potencia2'])){
            if($json_equipo['potencia2']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Potencia 2:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['potencia2']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['potencia3'])){
            if($json_equipo['potencia3']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Potencia 3:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['potencia3']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['conexion1'])){
            if($json_equipo['conexion1']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Conexion 1:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['conexion1']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['conexion2'])){
            if($json_equipo['conexion2']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Conexion 2:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['conexion2']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['ntension1'])){
            if($json_equipo['ntension1']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Nivel Tension 1:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['ntension1']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['ntension2'])){
            if($json_equipo['ntension2']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Nivel Tension 2:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['ntension2']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['ntension3'])){
            if($json_equipo['ntension3']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Nivel Tension 3:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['ntension3']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['nposiciones'])){
            if($json_equipo['nposiciones']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Numero Posiciones:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['nposiciones']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['nfases'])){
            if($json_equipo['nfases']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Numero Fases:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['nfases']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['pesototal'])){
            if($json_equipo['pesototal']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Peso Total:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['pesototal']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['pesoaceite'])){
            if($json_equipo['pesoaceite']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Peso Aceite:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['pesoaceite']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['impedancia1'])){
            if($json_equipo['impedancia1']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Impendancia 1:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['impedancia1']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['impedancia2'])){
            if($json_equipo['impedancia2']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Impendancia 2:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['impedancia2']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['impedancia3'])){
            if($json_equipo['impedancia3']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Impendancia 3:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['impedancia3']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['fosoaceite'])){
            if($json_equipo['fosoaceite']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Foso de Aceite:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['fosoaceite']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['tipocomunicacion'])){
            if($json_equipo['tipocomunicacion']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tipo Comunicacion:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['tipocomunicacion']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['serialconmutador'])){
            if($json_equipo['serialconmutador']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Serial Conmutador:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['serialconmutador']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['fabricanteconmutador'])){
            if($json_equipo['fabricanteconmutador']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Fabricante Conmutador:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['fabricanteconmutador']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['operacionesconmutador'])){
            if($json_equipo['operacionesconmutador']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Operaciones Conmutador:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['operacionesconmutador']?></td>
                </tr>
            <?php } }?>
        </tbody>
    </table>
    <br>
    
    <!-- pagina 4-->
    ANEXO 1.
    <dl>
        <?php 
            foreach ($datos_pruebas as $key1) {
                if($key1->fk_tipo_pruebas==1){//tangente delta
                    echo '<dt>- ENSAYOS DIELECTRICOS EN CORRIENTE ALTERNA (Factor de Potencia &#952;)).</dt>'.
                         "<dd>En corriente alterna:</dd><dd>Factor de potencia/tan (%)</dd>".
                         "<dd>Capacitancia (pF)</dd><dd>Corriente de pérdidas en el dieléctrico (mA)</dd><dd>Potencia de pérdidas en el dieléctrico (mW)</dd>";
                }else if($key1->fk_tipo_pruebas==2){//collar caliente
                    echo "<dt>- ENSAYO DE COLLAR CALIENTE</dt>";
                }else if($key1->fk_tipo_pruebas==3){//bushing
                    echo "<dt>- ENSAYO BUSHING (C1-C2)</dt>";
                }else if($key1->fk_tipo_pruebas==4){//corriente de excitacion
                    echo "<dt>- ENSAYO DE CORRIENTE DE EXCITACIÓN</dt>";
                }else if($key1->fk_tipo_pruebas==5){//relacion de transformacion
                    echo "<dt>- MEDIDA DE RELACIÓN DE TRANSFORMACION</dt>";
                }else if($key1->fk_tipo_pruebas==6){//resistencia de devanados
                    echo "<dt>- MEDIDA DE RESISTENCIA DE DEVANADOS</dt>";
                }else if($key1->fk_tipo_pruebas==7){//resistencia de aislamiento
                    echo '<dt>- ENSAYOS DIELÉCTRICOS EN CORRIENTE CONTINUA.</dt><dd>Resistencia de Aislamiento (G &#937;)</dd>';
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
            <dd>- IEEE Std 62-1995    Guide for diagnostic field testing power apparatus- part 1: oil filled power transformers, regulators and reactors</dd>
            <dd>- ANSI/IEEE C57.12.00-1987 Standard general requirements for liquid immersed distribution, power and regulating transformers.</dd>
            <dd>- ANSI/IEEE C57.12.90-1987 Test code for liquid-immersed distribution, power and regulating transformers and guide for short-circuit testing of distribution and power transformers.</dd>
            <dd>- ANSI/IEEE C57.19.100-1995 Guide for application of power apparatus bushings.</dd>
            <dd>- IEC60076-1 Power Transformer - General</dd>
            <dd>- ANSI/IEEE C57.12.90 - 1987 Winding Resistance Test.</dd>
            <dd>- IEC 354 Loading guide for oil-immersed power transformers</dd>
            <dd>- ICONTEC  Compendio de transformadores tomos 1 y 2.</dd>
            <dd>- ABB Testing  of power transformers</dd>
            <dd>- Código Eléctrico Colombiano NTC 2050. Sección 445.</dd>
            <dd>- CPC 100 User Manual - PTM User Manual - CP TD1 Reference Manual</dd>
            <dd>- Test data Reference Book (Secc 8 power Transformer)</dd>
            <dd>- IEC60076-1 Power Transformer</dd>
            <dd>- IEEE 62 IEEE Guide for Diagnostic Field Testing of Electric Power Apparatus - Part 1: Oil Filled Power Transformers, Regulators, and Reactors</dd>
            <dd>- Facilities Instructions Standards, and Techniques Volume 3-31 (Transformer Diagnostic)</dd>

    </dl><br>

    
    <!-- pagina 5-->
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
        Se realizaron los ensayos de mantenimiento predictivo en el siguiente transformador de potencia de la subestación eléctrica <?php echo $equipo->fk_subestacion_e->nombre?> por solicitud del cliente, a continuación se detallan y se analizan los resultados obtenidos de las pruebas realizadas:
    </p>
    <strong>Criterios de Evaluación de Resultados</strong>
    <?php 
            foreach ($datos_pruebas as $key2) {
                if($key2->fk_tipo_pruebas==1){//tangente delta?>
                    <strong style="text-align:center">- ENSAYOS DIELECTRICOS EN CORRIENTE ALTERNA (Factor de Potencia (tan⁡ &#952;)).</strong>
                    <P class="justificado">
                        En ausencia de normas de consenso frente a los valores de disipación de factor transformador o de factor de potencia, el NETA Consejo de Revisión de Normas sugiere los valores representativos de la siguiente tabla.
                    </P>
                    <img class="image_resultado" src="<?php echo $ruta_imagenes?>resultado1.jpg"><br>
                    <p class="justificado">
                        Teniendo en cuenta los valores mostrados en la tabla bajo el amparo de la norma NETA ATS 2007 y luego de la aplicar corrección a los valores obtenidos en campo se evaluara el estado del transformador, bajo los siguientes criterios señalados por el Test Data Reference Book (Secc 8 Power Transformer):
                    </p>

                    
                    <!-- pagina 6-->
                    <dl class="justificado">
                        <dt></dt>
                            <dd>- Transformadores construidos después de 1957, deben presentar un FP menor ó igual a 0.5% corregido a 20° C.</dd>
                            <dd>- Transformadores construidos antes de 1957 podrían presentar FP mayor a 0.5%.</dd>
                            <dd>- La Capacitancia es una función de la geometría del espécimen y no se esperan cambios con la edad.  Cambios de capacitancia son indicativos de cambios físicos.</dd>
                            <dd>- Factor de Potencia anormal (muy alto, muy bajo, ó negativo), puede ser indicativo de aterrizamiento dudoso ó blindaje entre devanados.</dd>
                            <dd>- Analizador de aislamiento en CC, MEGGER MIT 1025 ( Serial No. 1001944101309328)</dd>
                            <dd>- Los datos obtenidos deben de compararse con datos de placa (fábrica), resultados previos, unidades similares.</dd>
                    </dl><br>
                    <p class="justificado">
                        Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
                    </p><br>

                 <?php }else if($key2->fk_tipo_pruebas==2){//collar caliente?>
                    <strong style="text-align:center">- ENSAYO DE COLLAR CALIENTE</strong>
                    <p class="justificado">
                        Las bornas de alta tensión son elementos fundamentales de los transformadores de potencia, interruptores de potencia y otros dispositivos eléctricos. Más del 10% de todas las averías de transformadores se deben a bornas defectuosas. Aunque el precio de una borna es bajo comparado con el coste de un transformador completo, el fallo de una borna puede dañar totalmente un transformador. Se recomienda encarecidamente una medida periódica de la capacitancia y el DF.
                    </p><br>
                    <p class="justificado">
                        Esta prueba mide el estado de una determinada sección pequeña del aislamiento de la borna entre una zona de la cubierta superior de porcelana y el conductor portador de corriente o central. La prueba se efectúa energizando uno o varios electrodos situados alrededor de la porcelana de la borna con el conductor central de la borna puesto a tierra. Esta prueba se utiliza como complemento. Se utiliza también para probar bornas de dispositivos cuando las pruebas son inaplicables o resultan poco prácticas, como por ejemplo en el caso de bornas SF6. En bornas SF6 realice una prueba de electrodo caliente en cada tercer faldón. Las pruebas de electrodo caliente son eficaces para localizar grietas en porcelana, deterioro o contaminación del aislamiento en la sección superior de una borna, bajo nivel de compuesto o líquido y cavidades en el compuesto, a menudo antes de que dichos defectos se puedan advertir con las pruebas anteriores.
                    </p><br>
                    <p class="justificado">
                        Este ensayo se realizó en los bujes los valores de pérdidas de potencia obtenidos en la prueba no deben  100 mW en magnitud esto debido a recomendaciones realizadas por "Test Data Reference Book (Secc 8 Power Transformer)".
                    </p><br>
                    <p class="justificado">
                        Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
                    </p>

                 <?php }else if($key2->fk_tipo_pruebas==3){//bushing?>
                    <strong style="text-align:center">- ENSAYO BUSHING (C1-C2)</strong>
                    <dl class="justificado">
                        <dt>Según recomendaciones de DOBLE las pruebas que normalmente se realizan a los bushing son las siguientes:</dt>
                            <dd>- General (Overall) (conductor central a brida)</dd>
                            <dd>- Conductor centarl al tap, C1 (UST)</dd>
                            <dd>- C1 invertido (tap al conductor central.  No exceder el voltaje nominal del tap)</dd>
                            <dd>- Pruebas de Tip-up (repetir C1 a 2 & 10 kV, ó 2 & L-G kV si menor de 10kV)</dd>
                            <dd>- Aislamiento del Tap (tap a brida, C2)</dd>
                            <dd>- Prueba de Collar Caliente (aplicada externamente con una banda de neopreno semiconductor)</dd>
                    </dl><br>
                    <img class="image_resultado" src="<?php echo $ruta_imagenes?>bushing.jpg"><br>
                    <dl class="justificado">
                        <dt><strong>Factor de Potencia:</strong> sustantialmente como valores de placa (menos de 0.5%)</dt>
                            <dd>- Prueba Overall </dd>
                            <dd>- Prueba C1</dd>
                            <dd>- Prueba C2 ( hasta 1.0% bushing condensador) (hasta 2.0% bushing con compuestos)</dd>
                    </dl><br>

                    <p class="justificado">
                        <strong>Capacitancia o Corriente de Carga:</strong>
                        comparable a pruebas anteriores Cambios en el orden de +/- 5% deben ser investigados de inmediato.
                    </p><br>

                     <dl class="justificado">
                        <dt><strong>Prueba Collar Caliente</strong> no presenta valores anormales de corriente y/o perdidas </dt>
                            <dd>- Pérdidas por debajo de 0.100 watts (6 milliwatts a 2.5 kV)</dd>
                            <dd>­ Aumento en pérdidas (watts); contaminación del aislamiento</dd>
                            <dd>- Reducción en corriente (Amperes); vanos, bajo nivel de líquido o compuesto</dd>
                    </dl><br>

                     <dl class="justificado">
                        <dt><strong>Inspección Visual</strong> no demuestra liqueos, rajaduras, ect.</dt>
                            <dd>- Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.</dd>
                    </dl><br>
                 <?php }else if($key2->fk_tipo_pruebas==4){//corriente de excitacion?>
                    
                    <!-- pagina 7-->
                    <strong style="text-align:center">C. ENSAYO DE CORRIENTE DE EXCITACIÓN</strong>
                    <p class="justificado">
                        El propósito de esta prueba es detectar giros cortocircuitados, conexiones eléctricas defectuosas, de-laminación de núcleo (Separación), problemas del cambiador de tomas y problemas de bobinado. En transformadores trifásicos, los resultados son comparados entre las fases. Esta prueba mide la corriente necesaria para magnetizar el núcleo y generar el campo magnético en los bobinados. En un transformador trifásico, Estrella / Delta o Delta / Estrella, el patrón de la corriente de excitación será de dos fases más alta que la fase restante. Se comparara las dos fases con mayores corrientes solamente. Si la corriente de excitación es de menos de 50 miliamperios (mA), la diferencia entre las dos corrientes más altas debe ser inferior a 10%. Si la corriente de excitación es más de 50 mA, la diferencia debe ser inferior a 5%. En general, si hay un problema interno, estas diferencias serán mayores. Cuando esto sucede, otras pruebas también deben mostrar anomalías, y una inspección interna debería ser considerado. Los resultados, como con todos los demás, deben compararse con fábrica y pruebas de campo anteriores.
                    </p>
                    <p class="justificado">
                        Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
                    </p><br>

                 <?php }else if($key2->fk_tipo_pruebas==5){//relacion de transformacion?>
                    <strong style="text-align:center">E. MEDIDA DE RELACIÓN DE TRANSFORMACION</strong>
                    <p class="justificado">
                        Según norma IEC60076-1 el valor de relación de transformación entre los devanados debe estar comprendido entre  &#177; 0,5% respecto a valores de placa, teniendo en cuenta esto los resultados obtenidos serán evaluados bajo esa condición.  
                    </p>
                    <p class="justificado">Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.</p>

                 <?php }else if($key2->fk_tipo_pruebas==6){//resistencia de devanados?>
                    <strong style="text-align:center">D. MEDIDA DE RESISTENCIA DE DEVANADOS</strong>
                    <p class="justificado">
                        La resistencia de cada devanado, se mide entre los terminales de cada devanado y  se tendrá en cuenta la temperatura de los arrollamientos mostrada en los indicadores del transformador. La medición se realizara inyectando corriente directa. En todas las mediciones de la resistencia, se tendrá cuidado de que los efectos de auto-inducción son minimizado. IEEE 62 recomienda que los valores comparativos no excedan de una diferencia del 5%, por lo tanto el presente documento calificara los resultados teniendo en cuenta lo expresado por la norma.
                    </p>
                    <p class="justificado">Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.</p>

                 <?php }else if($key2->fk_tipo_pruebas==7){//resistencia de aislamiento?>
                    
                    <!-- pagina 8-->
                    <strong style="text-align:center">F. ENSAYOS DIELÉCTRICOS EN CORRIENTE CONTINUA.</strong>
                    <p class="justificado">
                        En ausencia de normas de consenso, el Consejo de Revisión de Normas NETA sugiere el representante anterior valores.<br>
                        Véase la Tabla 100.14 para los factores de corrección de la temperatura.<br>
                        NOTA: Dado que la resistencia de aislamiento Depende de las características de aislamiento (kV) y la capacidad de bobinado (kVA), valores obtenidos deben compararse con los datos publicados por el fabricante.
                    </p>
                    <p class="justificado">Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.</p>
                    <img class="image_resultado" src="<?php echo $ruta_imagenes?>resultado2.jpg"><br>
                    <p class="justificado">Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.</p>

                 <?php }
            }
        ?>

    <strong>6. RECOMENDACIONES Y CONCLUSIONES</strong>
    <dl class="justificado">
        <dt><strong>Conclusiones:</strong></dt>
            <?php
                $count_satisfactorio=count($informe['satisfactorio']);
                for ($y=0; $y < $count_satisfactorio; $y++) {
                    if($informe['satisfactorio'][$y]['fk_prueba']==1){//tangente delta
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Tangente Delta</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Tangente Delta</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==2){//collar caliente
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Collar Caliente</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Collar Caliente</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==3){//bushing
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Bushing</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Bushing</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==4){//corriente de excitacion
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Corriente de Excitacion</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Corriente de Excitacion</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==5){//relacion de transformacion
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Relacion de Transformacion</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Relacion de Transformacion</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==6){//resistencia de devanados
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Resistencia de Devanados</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Resistencia de Devanados</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==7){//resistencia de aislamiento
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Resistencia de Aislamiento</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Resistencia de Aislamiento</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }
                }
            ?>            
    </dl><br>
    <dl class="justificado">
        <dt><strong>Recomendaciones</strong></dt>
            <dd><strong><?php echo $informe['recomendaciones']?></strong></dd>
    </dl><br>

    
    <!-- pagina 9-->
    <strong>7. NOTAS TECNICAS</strong><br>
    <strong>Medida de capacitancia y factor de disipación/ factor de potencia </strong>
    <p class="justificado">
        La medida de la capacitancia (C) y del factor de disipación (DF) es un reconocido e importante método de diagnostico de aislamientos, puede detectar:
    </p>
    <dl class="justificado">
        <dt></dt>
            <dd>- Fallos de aislamiento</dd>
            <dd>- Envejecimiento de aislamiento</dd>
            <dd>- Contaminación por partículas de los líquidos del aislamiento</dd>
            <dd>- Agua en aislamiento solido y liquido</dd>
            <dd>- Descargas parciales</dd><br>
    </dl><br>
    <strong>Influencia de diversos parámetros como humedad, temperatura y envejecimiento en el DF</strong>
    <p class="justificado">
        En la figura se muestra la tensión de ruptura y el DF del aceite, en función de la humedad. Con poca humedad, la tensión de ruptura es muy sensible; con mayor humedad, el DF es un buen indicativo.
    </p>
    <img class="image_resultado" src="<?php echo $ruta_imagenes?>grafico1.jpg"><br>
    <strong style="text-align:center">Figura 1. Tensión de ruptura y DF del aceite, en función de la humedad</strong>
    <p class="justificado">
        En la figura se muestra el DF de aceite nuevo y usado, en función de la temperatura. Con temperaturas más altas, la viscosidad del aceite disminuye, por lo que las partículas, iones y electrones se pueden mover con más facilidad y rapidez. Por consiguiente, el DF aumenta con la temperatura.
    </p>

    
    <!-- pagina 10-->
    <img class="image_resultado" src="<?php echo $ruta_imagenes?>grafico2.jpg"><br>
    <strong style="text-align:center">Figura 2. DF de aceite nuevo y antiguo, en función de la temperatura</strong><br>
    <p class="justificado">
        Factor de disipación: Dependencia de la temperatura:
    </p>
    <dl class="justificado">
        <dt></dt>
            <dd>1 = aceite nuevo</dd>
            <dd>2, 3 y 4 = aceite usado</dd>
    </dl><br>
    <!--<hr>-->
    <p class="justificado">
        Ilustraciones tomadas de la data Reference Book (Secc 8 power Transformer), donde representa gráficamente la geometría física para un transformador de dos devanados y tres devanados:
    </p>

    
    <!-- pagina 11-->
    <table class="encabezado" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="width: 50%;"><img class="foto3" src="<?php echo $ruta_imagenes?>grafico3.jpg"></td>
                <td style="width: 50%;"><img class="foto3" src="<?php echo $ruta_imagenes?>grafico4.jpg"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">Figura 3. Representación grafica de un transformador de dos devanados</td>
            </tr>
        </tbody>
    </table>
    <dl class="justificado">
        <dt></dt>
            <dd>- CH - Aislamiento entre conductores de Alta y Tierra (Núcleo más el Tanque aterrizado, incluyendo Boquillas de Alta, Devanado, elementos estructurales y  Aceite).</dd>
            <dd>- CL - Aislamiento entre conductores de Baja y tierra (Núcleo más el Tanque aterrizado, incluyendo Boquillas de Baja, Devanado, elementos estructurales, y  Aceite).</dd>
            <dd>- CHL - Aislamiento entre Devanados (Barreras aislantes, Aceite).</dd>
    </dl><br>
    <!--<hr>-->
    <img class="image_resultado" src="<?php echo $ruta_imagenes?>grafico5.jpg"><br>

    
    <!-- pagina 12-->
    <table class="encabezado" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="width: 50%;"><img class="foto3" src="<?php echo $ruta_imagenes?>grafico6.jpg"></td>
                <td style="width: 50%;"><img class="foto3" src="<?php echo $ruta_imagenes?>grafico7.jpg"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">Figura 4. Representación grafica de un transformador de dos devanados</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><img style="width: 500px;height: 300px;" src="<?php echo $ruta_imagenes?>grafico8.jpg"></td>
            </tr>
        </tbody>
    </table><br>
    
    
    <!-- pagina 13-->
    <strong>Fallas en transformadores</strong><br>
    <table class="justificado" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td class="bordertd_abajo_naranja">Falta</td>
                <td class="bordertd_naranja">Ejemplos</td>
            </tr>
            <tr>
                <td class="bordertd_abajo_naranja">Descargas Parciales</td>
                <td class="bordertd_naranja">Descargas en cavidades llenas de gas del aislamiento, a consecuencia de impregnación incompleta, elevada humedad del papel, gas en sobresaturación o cavitación de aceite (burbujas de gas en el aceite), que provocan formación de cera X en el papel.</td>
            </tr>
            <tr>
                <td class="bordertd_abajo_naranja">Descarga de baja energía</td>
                <td class="bordertd_naranja">Chispas o formación de arco entre conexiones defectuosas de distinto potencial flotante, de anillos protectores, toroides, discos o conductores contiguos de devanados distintos, soldadura rota, circuitos cerrados del núcleo. Conexiones  adicionales a tierra del núcleo. Descargas entre piezas de fijación, borna y tanque, alta tensión y tierra, dentro de los devanados. Carbonización superficial en bloques de madera, pegamento de barra aislante, separadores de devanado. Ruptura dieléctrica del aceite, contacto de interrupción del cambiador de tomas de carga.</td>
            </tr>
            <tr>
                <td class="bordertd_abajo_naranja">Descarga de alta energía</td>
                <td class="bordertd_naranja">Descarga disruptiva, carbonización superficial o formación de arco de alta energía local o con descarga de corriente de iniciación del arco. Cortocircuitos entre baja tensión y tierra, conectores, devanados, bornas y tanque, devanados y núcleo, barra de cobre y tanque, en el conducto del aceite. Circuitos cerrados entre dos conductores contiguos alrededor del flujo magnético principal, pernos aislados del núcleo, anillos metálicos que sujetan catetos del núcleo.</td>
            </tr>
            <tr>
                <td class="bordertd_abajo_naranja">Sobrecalentamiento a menos de 300°C</td>
                <td class="bordertd_naranja">Sobrecarga del transformador en situaciones de emergencia. Paso de aceite bloqueado o limitado en los devanados. Otros problemas de enfriamiento, válvulas de bombas, etc. Flujo disperso en barras amortiguadoras de culata.</td>
            </tr>
            <tr>
                <td class="bordertd_abajo_naranja">Sobrecalentamiento 300°C - 700°C</td>
                <td class="bordertd_naranja">Contactos defectuosos en conexiones empernadas (específicamente la barra), contactos con cambiador de tomas, conexiones entre cable y varilla de tracción de bornas. Corrientes   circulantes entre pinzas abrazaderas y pernos de culatas, abrazaderas y laminados, en cableado de tierra, soldaduras defectuosas o abrazaderas de pantallas magnéticas. Aislamiento desgastado entre conductores paralelos contiguos de devanados.</td>
            </tr>
            <tr>
                <td class="bordertd_abajo_naranja">Sobrecalentamiento a más de 700°C</td>
                <td class="bordertd_naranja">Grandes corrientes circulantes en tanque y núcleo. Corrientes menores en paredes del tanque generadas por gran campo magnético no compensado. Laminados del núcleo cortocircuitados.</td>
            </tr>
        </tbody>
    </table><br>

    
    <!-- pagina 14-->
    <dl class="justificado">
        <dt><strong>Notas sobre la tabla:</strong></dt>
            <dd>
                - La formación de cera X proviene de aceites paranínficos (con base de parafina). Actualmente no se usan en transformadores en los Estados Unidos, pero predominan en Europa.
            </dd>
            <dd>
                - En el último problema por sobrecalentamiento de la tabla se dice "más de 700°C". Recientemente se ha descubierto en laboratorio que se puede generar acetilo en cantidades trazables a 500°C, lo que no se refleja en esta tabla. Tenemos varios transformadores que presentan cantidades trazables de acetileno que probablemente no participan activamente en la formación de arcos, sino que son resultado de fallos térmicos a alta temperatura como en el ejemplo. También puede ser el resultado de un arco, debido a una caída de rayos o a una sobretensión en las proximidades.
            </dd>
            <dd>
                - Una conexión defectuosa en la parte inferior de una borna se puede confirmar comparando inspecciones de infrarrojos de la parte superior de una borna con una borna gemela. Cuando está cargado, el calor procedente de una conexión defectuosa en la parte inferior se traslada a la parte superior de la borna, que presentará una temperatura notablemente mayor. Si se verifica la conexión de la parte superior y se descubre que está bien sujeta, el problema es probablemente una conexión defectuosa en la parte inferior de la borna. sobrecalentamiento lo provocan  contactos defectuosos en el selector de tomas.  Para averiguar la causa de cifras de gases altas, se deben efectuar más pruebas en el transformador. Los métodos de prueba habituales son:
                <dl>
                    <dt>- Medición de la resistencia del devanado</dt>
                    <dt>- Prueba del cambiador de tomas en carga (On-Load Tap Changer (OLTC)</dt>
                    <dt>- Medición de la relación de transformación</dt>
                    <dt>- Medición de la corriente de excitación</dt>
                    <dt>- Medición de la reactancia de fuga</dt>
                    <dt>- Medición de capacitancia y factor de disipación</dt>
                </dl>
            </dd>
    </dl><br>
    <strong>Fallas detectadas por corriente de excitación</strong><br>
    <dl class="justificado">
        <dt>Otras fallas que pueden ser detectadas son las siguientes</dt>
            <dd>
                - Detectar aislamiento cortocircuitado vuelta a vuelta. (Cuanto mayor sea el estrés de la vuelta a su vez la tensión)
            </dd>
            <dd>
                - Detectar laminaciones centrales cortocircuitadas. (La excitación de corriente se compone de un componente de magnetización y una componente de pérdida. 
            </dd>
            <dd>
                - Laminaciones en cortocircuito aumentarían el componente de pérdida y, por tanto, el total de corriente de excitación.
            </dd>
            <dd>
                - Aflojamiento de la fijación central. (Esto introducirá espacios de aire en el circuito de hierro y aumentar la componente de magnetización y, por tanto, la excitación total.)
            </dd>
    </dl><br>
    <!--<hr>-->
    <strong>8. ANEXOS</strong><br>
    <strong>ANEXO 1.</strong><br>
    <?php 
        $div="";
        if($equipo->devanados==2){
            $div.= $this->renderPartial('../informes/partial/equipo_temperaturas2', array('temperaturas' => $temperaturas, 'equipo'=>$equipo), true);
            //$div.='<!-- pagina 15-->';
            foreach ($datos_pruebas as $key) {
                if($key->fk_tipo_pruebas==1){//tangente delta
                    $div.= $this->renderPartial('../informes/partial/tangente_delta2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==2){//collar caliente
                    $div.= $this->renderPartial('../informes/partial/collar_caliente2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==3){//bushing
                    $div.= $this->renderPartial('../informes/partial/bushing2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==4){//corriente de excitacion
                    $div.= $this->renderPartial('../informes/partial/corriente_excitacion2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==5){//relacion de transformacion
                    $div.= $this->renderPartial('../informes/partial/relacion_transformacion2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==6){//resistencia de devanados
                    $div.= $this->renderPartial('../informes/partial/resistencia_devanado2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
                    $div.= $this->renderPartial('../informes/partial/resistencia_aislamiento', array('datos' => $key->datos, 'devanados'=>2), true);
                }
            }
            $div.= $this->renderPartial('../informes/partial/fotos_anexo', 
                    array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
        }else if($equipo->devanados==3){
            $div.= $this->renderPartial('../informes/partial/equipo_temperaturas3', array('temperaturas' => $temperaturas, 'equipo'=>$equipo), true);
            foreach ($datos_pruebas as $key) {
                if($key->fk_tipo_pruebas==1){//tangente delta
                    $div.= $this->renderPartial('../informes/partial/tangente_delta3', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==2){//collar caliente
                    $div.= $this->renderPartial('../informes/partial/collar_caliente3', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==3){//bushing
                    $div.= $this->renderPartial('../informes/partial/bushing3', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==4){//corriente de excitacion
                    $div.= $this->renderPartial('../informes/partial/corriente_excitacion2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==5){//relacion de transformacion
                    $div.= $this->renderPartial('../informes/partial/relacion_transformacion2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==6){//resistencia de devanados
                    $div.= $this->renderPartial('../informes/partial/resistencia_devanado2', array('datos' => $key->datos), true);
                }else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
                    $div.= $this->renderPartial('../informes/partial/resistencia_aislamiento', array('datos' => $key->datos, 'devanados'=>3), true);
                }
            }
            $div.= $this->renderPartial('../informes/partial/fotos_anexo', 
                    array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
        }
        echo $div;
    ?>


</body></html>
