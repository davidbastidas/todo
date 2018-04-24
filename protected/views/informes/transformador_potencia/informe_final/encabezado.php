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
            INFORME DE ENSAYO DE MANTENIMIENTO PREDICTIVO EN TRANSFORMADORES DE TENSIÓN<br>
            <?php echo $json_equipo['nombre_eq']?>
        </td>
    </tr>
    <tr>
        <td class="bordertd_size9">Este documento y los anexos en el referenciados tienen paginacion independiente con indicacion del numero total de paginas en cada uno de ellos (tipo pagina X de Y)</td>
        <td class="bordertd_size9">Este documento no debera reproducirse sin la aprobacion por escrito de NORCONTROL y del cliente</td>
    </tr>
</table>

    <!--<hr>-->

    <dl>
        <dt>1. DESCRIPCIÓN DE TRABAJOS</dt>
        <dd>1.1 Objetos: </dd>
    </dl>
    <p class="justificado">
        El objetivo de este documento es informar el estado de los Transformadores de Tensión  de la Subestación Eléctrica <?php echo $equipo->fk_subestacion_e->nombre?>, mediante la aplicación de ensayos dieléctricos, con el fin de dar a conocer un diagnostico general del estado de los mismos.
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
            if(isset($json_equipo['clase'])){
                $nombre_mecanismo="";
                if($json_equipo['clase']=="Inmerso en Aceite"){
                    $nombre_mecanismo="Inmerso en Aceite";
                }else if($json_equipo['clase']=="Solido"){
                    $nombre_mecanismo="Solido";
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
            if(isset($json_equipo['tipo'])){
            if($json_equipo['tipo']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Tipo:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['tipo']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['relacion'])){
            if($json_equipo['relacion']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Relacion:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['relacion']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['frecuencia'])){
            if($json_equipo['frecuencia']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Frecuencia:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['frecuencia']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['voltaje_nominal_primario'])){
            if($json_equipo['voltaje_nominal_primario']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Voltaje nominal primario:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['voltaje_nominal_primario']?></td>
                </tr>
            <?php } }?>
            <?php 
            if(isset($json_equipo['voltaje_nominal_secundario'])){
            if($json_equipo['voltaje_nominal_secundario']!=""){?>
                <tr>
                    <td style="text-align:left" class="bordertd_size9">Voltaje nominal secundario:</td>
                    <td style="text-align:left" class="bordertd_size9"><?php echo $json_equipo['voltaje_nominal_secundario']?></td>
                </tr>
            <?php } }?>
        </tbody>
    </table>
    <br>
    
    ANEXO 1.
    <dl>
        <?php 
            foreach ($datos_pruebas as $key1) {
                if($key1->fk_tipo_pruebas==5){//relacion de transformacion
                    echo '<dt>- MEDIDA DE RELACION DE TRANSFORMACION.</dt>'.
                         '<dd>Resistencia de Aislamiento (G&#937;)</dd>';
                }else if($key1->fk_tipo_pruebas==1){//tangente delta
                    echo "<dt>- ENSAYO DE FACTOR DE POTENCIA/CAPACITANCIA</dt>";
                }else if($key1->fk_tipo_pruebas==2){//collar_caliente
                    echo "<dt>- COLLAR CALIENTE</dt>";
                }else if($key1->fk_tipo_pruebas==7){//resistencia de aislamiento
                    echo '<dt>- ENSAYOS DIELÉCTRICOS EN CORRIENTE CONTINUA.</dt>'.
                         '<dd>Resistencia de Aislamiento (G&#937;)</dd>';
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
        El objetivo de este documento es informar el estado del transformador de tensión  destinados a la Subestación <?php echo $equipo->fk_subestacion_e->nombre?> por solicitud del cliente, se detallan y se analizan a continuación:
    </p>
    <?php 
foreach ($datos_pruebas as $key2) {
    if($key2->fk_tipo_pruebas==5){//relacion de transformacion?>
        <strong style="text-align:center">- ENSAYO DE RELACIÓN DE TRANSFORMACIÓN</strong>
        <p class="justificado">
            La relación de transformación se determinará de conformidad con la norma IEC 60044-6, anexo E. El error en la relación de transformación no podrá ser superior al valor indicado en 14.1-c (El error de relación de vueltas no excederá de &#177; 0,25&#37;). 
        </p><br>

     <?php }else if($key2->fk_tipo_pruebas==1){//tangente delta?>
        <strong style="text-align:center">- ENSAYO DE FACTOR DE POTENCIA/CAPACITANCIA</strong>
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
            La evaluación de factor de disipación (tan &#948;) solo aplica a los transformadores con líquido inmerso aislamiento del devanado primario que tiene Um &#8805; 72,5 kV. Los valores de capacitancia y factor de disipación dieléctrica  se remitirán a la frecuencia nominal y para un nivel de tensión en el rango de 10 kV a Um / 3. El propósito de la prueba es verificar la uniformidad en la inyección de dos valores de tensión de prueba. 
        </p><br>

     <?php }else if($key2->fk_tipo_pruebas==2){//collar_caliente?>
        <strong style="text-align:center">- COLLAR CALIENTE</strong>

        <p class="justificado">
            Los valores obtenidos en los anteriores ensayos se aprecian en el anexo 1.
        </p><br>

     <?php }else if($key2->fk_tipo_pruebas==7){//resistencia de aislamiento?>
        <strong style="text-align:center">- ENSAYOS DIELÉCTRICOS EN CORRIENTE CONTINUA</strong>
        
        <p class="justificado">
            Los valores de resistencia de aislamiento deben estar por encima límite Mínimo para este tipo de aparamenta eléctrica según la Tabla 100.1 descrita en la norma NETA 2003 (valor mínimo 5G&#937;). 
        </p><br>
        <img class="image_resultado" src="<?php echo $ruta_imagenes?>it_table100.jpg"><br>

        <p class="justificado">
            Nota: Para transformadores de instrumento de tipo interior se utilizara la tabla 100.14.1 y para transformadores de instrumento tipo exterior se utilizara la tabla 100.14.2 para la corrección por factor de temperatura  del valor de resistencia de aislamiento
        </p><br>
     <?php }
}
?>

    <strong>6. RECOMENDACIONES Y CONCLUSIONES</strong>

    <dl class="justificado">
        <dt>
            <strong>Conclusiones:</strong><br>
            Del análisis detallado realizado a los resultados de la prueba del transformador de tensión se concluye lo siguiente:
        </dt>
            <?php
                $count_satisfactorio=count($informe['satisfactorio']);
                for ($y=0; $y < $count_satisfactorio; $y++) {
                    if($informe['satisfactorio'][$y]['fk_prueba']==5){//relacion de transformacion
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Relacion de Transformacion</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Relacion de Transformacion</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==1){//tangente delta
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Tangente Delta</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Tangente Delta</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }
                    }else if($informe['satisfactorio'][$y]['fk_prueba']==2){//collar_caliente
                        if($informe['satisfactorio'][$y]['estado']=="true"){
                            echo "<dd>- La prueba para <strong>Collar Caliente</strong> Se encontro <strong>Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
                        }else{
                            echo "<dd>- La prueba para <strong>Collar Caliente</strong> Se encontro <strong>No Satisfactorio</strong>. ".$informe['satisfactorio'][$y]['comentario']."</dd>";
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

    
    <strong>7. NOTAS TECNICAS</strong><br>
    <strong>Importancia del mantenimiento preventivo en los TP</strong>
    <p class="justificado">
        Los transformadores de medida permiten aislar los dispositivos de medida y protección de la alta tensión. Trabajan con corrientes o tensiones proporcionales  a las que son objeto de medida, y consiguen evitar las perturbaciones que los campos magnéticos pueden producir sobre los instrumentos de medida.
    </p>

    <p class="justificado">
        La importancia de las pruebas de transformadores se subestima con frecuencia. Mediante una prueba antes del uso inicial pueden reducirse significativamente los riesgos como el de confundir los transformadores de medida para medición y protección o el de mezclar las conexiones. Al mismo tiempo, pueden detectarse los daños en el interior de un transformador de medida causados, por ejemplo, durante el transporte.  También pueden identificarse en una fase temprana los cambios en un transformador de medida causados, por ejemplo, por el envejecimiento del aislamiento.
    </p>
    
    <!--<hr>-->
    <strong>8. ANEXOS</strong><br>
    <strong>ANEXO 1.</strong><br>
    <?php 
        $div="";
        $div.= $this->renderPartial('../informes/transformador_potencia/partial/equipo_temperaturas', array('temperaturas' => $temperaturas, 'equipo'=>$equipo), true);
        //$div.='<!-- pagina 15-->';
        foreach ($datos_pruebas as $key) {
            if($key->fk_tipo_pruebas==5){//relacion de transformacion
                $div.= $this->renderPartial('../informes/transformador_potencia/partial/relacion_transformacion', array('datos' => $key->datos), true);
            }else if($key->fk_tipo_pruebas==1){//tangente delta
                $div.= $this->renderPartial('../informes/transformador_potencia/partial/tangente_delta', array('datos' => $key->datos), true);
            }else if($key->fk_tipo_pruebas==2){//collar_caliente
                $div.= $this->renderPartial('../informes/transformador_potencia/partial/collar_caliente', array('datos' => $key->datos), true);
            }else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
                $div.= $this->renderPartial('../informes/transformador_potencia/partial/resistencia_aislamiento', array('datos' => $key->datos,), true);
            }
        }
        $div.= $this->renderPartial('../informes/transformador_potencia/partial/fotos_anexo', 
                    array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
        echo $div;
    ?>
</body></html>
