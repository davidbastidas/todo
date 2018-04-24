<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];?>
<table id="table" class="table table-bordered">
    <thead>
        <tr>
            <th class="center">Equipo</th>
        </tr>
    </thead>
                
                
    <tbody>
        <?php
        foreach ($equipos as $key) {
            $json_equipo = json_decode( $key->datosjson, true );
            ?>
            <tr>
                <td class="center">
                    <a class="btn btn-block btn-link" href="<?php echo $nameProyect?>/Graficos/Generador/<?php echo $key->id?>">
                        Ver graficos del Equipo <?php
                                                if(isset($json_equipo['nombre_eq'])){
                                                    echo $json_equipo['nombre_eq'];
                                                }else{
                                                   echo $key->serie; 
                                                }
                                                 ?>
                        <i class="icon-bar-chart icon-on-right bigger-110"></i>
                    </a>
                </td>
            </tr>
        <?php
            
        }
        ?>
       
    </tbody>
</table>
<?php //echo $json_equipo['nombre_eq']?>