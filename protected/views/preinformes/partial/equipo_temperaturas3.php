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
</table>
<br>

<h4>Temperaturas</h4>
<table class="border">
		<tr>
			<th>Temperatura Aceite</th>
			<th>Temperatura Devanado H</th>
			<th>Temperatura Devanado X</th>
			<th>Temperatura Devanado Y</th>
			<th>Temperatura Ambiente</th>
		</tr>
	<tbody>
		<tr>
			<td><?php echo $array['temperaturas'][0]['temp_aceite']?></td>
			<td><?php echo $array['temperaturas'][0]['temp_devh']?></td>
			<td><?php echo $array['temperaturas'][0]['temp_devx']?></td>
			<td><?php echo $array['temperaturas'][0]['temp_devy']?></td>
			<td><?php echo $array['temperaturas'][0]['temp_ambiente']?></td>
		</tr>
	</tbody>
</table>
<hr>