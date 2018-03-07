<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];?>
<table id="table" class="table table-bordered">
    <thead>
        <tr>
            <th class="center">Prueba</th>
            <th class="center">Accion</th>
            <th class="center">Equipo</th>
            <th class="center">Usuario</th>
            <th class="center">Tipo</th>
            <th class="center">Subestacion</th>
            <th class="center">Fecha</th>
        </tr>
    </thead>
                
                
    <tbody>
        <?php
        foreach ($pruebas as $key) {?>
            <tr>
                <td class="center"><?php echo $key->id?></td>
                <td class="center">
                    <?php if($key->filename!=""){?>
                    <a class="btn btn-small btn-danger" href="<?php echo $nameProyect.'/Aceite/DescargarDigital/'.$key->id;?>" onclick="">
                        <i class="icon-print bigger-120"></i>
                        Ver Digital
                    </a>
                    <?php }?>
                    <?php if (!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {?>
                    <button class="btn btn-small btn-primary" onclick="verPrueba(<?php echo $key->id?>);">
                        Ver
                        <i class="icon-folder-open-alt icon-on-right bigger-110"></i>
                    </button>
                    <?php }?>
                </td>
                <td class="center"><?php echo $key->fk_equipo_a->serie?></td>
                <td class="center"><?php echo $key->fk_usuario_a->nombre?></td>
                <td class="center"><?php echo $key->fk_tipo_a->nombre?></td>
                <td class="center"><?php echo $key->fk_equipo_a->fk_sub_estacion?></td>
                <td class="center"><?php echo $key->fecha?></td>
            </tr>
        <?php
        }
        ?>
       
    </tbody>
</table>