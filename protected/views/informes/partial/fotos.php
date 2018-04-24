<?php 
$ruta_imagenes = Yii::app() -> params['ruta_fotos_equipos'];

$fotos = json_decode( $fotos_equipo, true );
$foto1=$ruta_imagenes.$id.'/'.$fotos['foto1'];
if (file_exists($foto1)) {
    $foto1='<img style="width:300px;height:300px;" src="'.$foto1.'">';
}else{
    $foto1="";
}
$foto2=$ruta_imagenes.$id.'/'.$fotos['foto2'];
if (file_exists($foto2)) {
    $foto2='<img style="width:300px;height:300px;" src="'.$foto2.'">';
}else{
    $foto2="";
}
$foto3=$ruta_imagenes.$id.'/'.$fotos['foto3'];
if (file_exists($foto3)) {
    $foto3='<img style="width:300px;height:300px;" src="'.$foto3.'">';
}else{
    $foto3="";
}
$foto4=$ruta_imagenes.$id.'/'.$fotos['foto4'];
if (file_exists($foto4)) {
    $foto4='<img style="width:300px;height:300px;" src="'.$foto4.'">';
}else{
    $foto4="";
}
?>
<?php
if($foto1!="" || $foto2!="" || $foto3="" || $foto4=""){
?>
<h3>Imagenes del Equipo</h3>
<table border="0" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td>
                <?php echo $foto1?>
            </td>
            <td>
                <?php echo $foto2?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $foto3?>
            </td>
            <td>
                <?php echo $foto4?>
            </td>
        </tr>
    </tbody>
</table>
<?php 
}
?>
