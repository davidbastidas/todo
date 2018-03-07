<?php
$MENU=array(
    array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/Home.png"/>Inicio', 'url' => array('/site/index')),
    array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/buscaroperarios.png"/>Buscador', 'url' => array('/buscador/index')),
    array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/novedad.png"/>Novedades', 'url' => array('/novedades/index')),
    array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/aprobar.png"/>Aprobaciones', 'url' => array('/aprobacion/index')),
    array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/empleados.png"/>Empleados', 'url' => array('/#'), 'visible' => !Yii::app()->user->isGuest,
        'items' => array(
            array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/empleado.png"/>Cargo<br><br>', 'url' => array('/cargo/index'), 'visible' => !Yii::app()->user->isGuest),
            array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/empresa.png"/>Empresa<br><br>', 'url' => array('/empresa/index'), 'visible' => !Yii::app()->user->isGuest),
            array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/empleados.png"/>Operarios<br><br>', 'url' => array('/operarios/index'), 'visible' => !Yii::app()->user->isGuest),
    )),
    array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/agenda.png"/>Agenda', 'url' => array('#'), 'visible' => !Yii::app()->user->isGuest,
        'items' => array(
            array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/tipotrabajo.png"/>Tipo de<br> trabajo', 'url' => array('/tipoTrabajo/index')),
    )),
    array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/admin.png"/>Administracion', 'url' => array('#'), 'visible' => !Yii::app()->user->isGuest,
        'items' => array(
            array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/database.png"/>Areas<br><br>', 'url' => array('/area/index')),
            array('label' => '<img style="float: left;margin-right: 5px;" src="'.$nameProyect.'/images/icons/database.png"/>Tipo de<br> Novedades', 'url' => array('/tipoNovedades/index')),
    )),
);

?>