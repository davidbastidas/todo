<?php ?>

<?php

if ($this->menu != null) {
    $this->beginContent('//layouts/main');
    echo '<div class="row-fluid">';
    echo '<div class="span12">';
	echo '<div class="span8">';
    echo $content;
    echo '</div>';
	echo '<div class="span4">';
	echo '<h3 class="header smaller lighter blue">Acciones</h3>';
	echo '<div class="dropdown dropdown-preview">';
    $this->widget('zii.widgets.CMenu', array(
        'items' => $this->menu,
        'htmlOptions' => array('class' => 'dropdown-menu'),
    ));
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
    $this->endContent();
} else {
    $this->beginContent('//layouts/main');
    echo $content;
    $this->endContent();
}
?>