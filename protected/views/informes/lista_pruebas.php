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
        </tr>
    </thead>
                
                
    <tbody>
        <?php
        foreach ($pruebas as $key) {?>
            <tr>
                <td class="center"><?php echo $key->id?></td>
                <td class="center">
                    <?php if (!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {?>
                        <button class="btn btn-small btn-primary" onclick="listarPrueba(<?php echo $key->id?>);">
                            Ver
                            <i class="icon-folder-open-alt icon-on-right bigger-110"></i>
                        </button>
                    <?php }?>
                    <?php if(!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id) && $key->fk_estado!=3){ //mostrar generar word y subir pdf?>
                        <a class="btn btn-small btn-purple" href="<?php echo $nameProyect.'/Informes/DatosInforme/'.$key->id;?>" onclick="">
                            <i class="icon-print bigger-120"></i>
                            Generar Informe
                        </a>
                    <?php }
                    /*if(!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id) && $key->fk_estado==4){ //si esta digitado y no es consultas?>
                        <a href="#modal-pdf" class="btn btn-small btn-success" onclick="setPrueba(<?php echo $key->id?>);" data-toggle="modal">
                            <i class="icon-cloud-upload bigger-125"></i>
                            Subir PDF
                        </a>

                    <?php }*/

                    if($key->fk_estado==3){ //mostrar solo descargar pdf?>
                        <a class="btn btn-small btn-danger" href="<?php echo $nameProyect.'/Informes/DescargarPdf/'.$key->id;?>" onclick="">
                            <i class="icon-file bigger-120"></i>
                            Descargar Pdf
                        </a>

                    <?php }?>
                </td>
                <td class="center"><?php echo $key->fk_equipo_p->serie?></td>
                <td class="center"><?php echo $key->fk_usuario_p->nombre?></td>
                <td class="center"><?php echo $key->fk_estado_p->nombre?></td>
                <td class="center"><?php echo $key->fk_equipo_p->fk_sub_estacion?></td>
                <td class="center"><?php echo $key->fecha?></td>
            </tr>
        <?php
        }
        ?>
       
    </tbody>
</table>