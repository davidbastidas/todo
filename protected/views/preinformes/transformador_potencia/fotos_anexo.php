<?php 
$ruta_imagenes = Yii::app() -> params['ruta_fotos'];

$count =1;
$foto1="";$foto2="";$foto3="";
foreach ($fotos_anexo as $value) {
    if($count==1){
        $foto1='<img style="width:300px;height:300px;" src="'.$ruta_imagenes.$id.'/'.$value->nombre.'">';
    } else if($count==2){
        $foto2='<img style="width:300px;height:300px;" src="'.$ruta_imagenes.$id.'/'.$value->nombre.'">';
    } else if($count==3){
        $foto3='<img style="width:300px;height:300px;" src="'.$ruta_imagenes.$id.'/'.$value->nombre.'">';
    }
    $count++;
}


?>
<?php
if($foto1!="" || $foto2!="" || $foto3=""){
?>
<hr>
<h3>Anexo Fotografico</h3>
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
        </tr>
    </tbody>
</table>
<?php 
}
?>