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
</table>
<br>


<h4>Temperaturas</h4>
<?php 
    if(isset($json_equipo['tipo'])){
        if($json_equipo['tipo']=="1" || $json_equipo['tipo']=="2" || $json_equipo['tipo']=="3"){
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
        }else if($json_equipo['tipo']=="4" || $json_equipo['tipo']=="5"){
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
