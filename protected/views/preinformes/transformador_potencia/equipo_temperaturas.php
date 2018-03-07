<?php 
$array = json_decode( $temperaturas, true );

$json_equipo = json_decode( $equipo->datosjson, true );
?>
<h4>Subestacion <?php echo $equipo->fk_subestacion_e->nombre?></h4>
<h4>Equipo</h4>
<table class="border">
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
</table>
<br>


<h4>Temperaturas</h4>
<?php 
    if(isset($json_equipo['clase'])){
        if($json_equipo['clase']=="Solido"){
?>
        <table class="border">
            <thead>
                <tr>
                    <th>Temperatura Ambiente</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $array['temperaturas'][0]['temp_ambiente']?></td>
                </tr>
            </tbody>
        </table>
<?php 
        }else if($json_equipo['clase']=="Inmerso en Aceite"){
?>
        <table class="border">
            <thead>
                <tr>
                    <th>Temperatura Ambiente</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $array['temperaturas'][0]['temp_aceite']?></td>
                </tr>
            </tbody>
        </table>
<?php
        }
    }
?>
