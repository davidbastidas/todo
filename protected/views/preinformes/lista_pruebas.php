<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];?>
<table id="table" class="table table-bordered">
    <thead>
        <tr>
            <th class="center">Prueba</th>
            <th class="center">Accion</th>
            <th class="center">Equipo</th>
            <th class="center">Usuario</th>
            <th class="center">Estado</th>
            <th class="center">Subestacion</th>
            <th class="center">Fecha</th>
            <?php if (Yii::app()->authManager->checkAccess('rol_administrador', Yii::app()->user->id)) {?>
            <th class="center"></th>
            <?php }?>
        </tr>
    </thead>
                
                
    <tbody>
        <?php
        foreach ($pruebas as $key) {?>
            <tr>
                <td class="center"><?php echo $key->id?></td>
                <td class="center">
                    <a class="btn btn-small btn-danger" href="<?php echo $nameProyect.'/Preinformes/ImprimirWord/'.$key->id;?>" onclick="">
                        <i class="icon-print bigger-120"></i>
                        Generar PDF
                    </a>
                    <?php if (!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {?>
                    <button class="btn btn-small btn-primary" onclick="listarPrueba(<?php echo $key->id?>);">
                        Ver
                        <i class="icon-folder-open-alt icon-on-right bigger-110"></i>
                    </button>
                    <?php }?>
                    
                </td>
                <td class="center"><?php echo $key->fk_equipo_p->serie?></td>
                <td class="center"><?php echo $key->fk_usuario_p->nombre?></td>
                <td class="center"><?php echo $key->fk_estado_p->nombre?></td>
                <td class="center"><?php echo $key->fk_equipo_p->fk_sub_estacion?></td>
                <td class="center"><?php echo $key->fecha?></td>
                <?php if (Yii::app()->authManager->checkAccess('rol_administrador', Yii::app()->user->id)) {?>
                <td class="center">
                    <button class="btn btn-small btn-danger" onclick="eliminar(<?php echo $key->id?>);">
                        <i class="icon-trash bigger-120"></i>
                    </button>
                </td>
                <?php }?>
            </tr>
        <?php
        }
        ?>
       
    </tbody>
</table>