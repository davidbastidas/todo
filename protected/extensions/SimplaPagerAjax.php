<?php

class SimplaPagerAjax extends CLinkPager {

	const CSS_HIDDEN_PAGE='hidden';
	const CSS_SELECTED_PAGE='selected';

    /**
     * Creates a page button.
     * You may override this method to customize the page buttons.
     * @param string the text label for the button
     * @param integer the page number
     * @param string the CSS class for the page button. This could be 'page', 'first', 'last', 'next' or 'previous'.
     * @param boolean whether this page button is visible
     * @param boolean whether this page button is selected
     * @return string the generated button
     */
    protected function createPageButton($label, $page, $class, $hidden, $selected) {
    	$nameProyect = "/" . Yii::app() -> params['nameproyect'];
        if($hidden || $selected)
			$class.=' '.($hidden ? self::CSS_HIDDEN_PAGE : self::CSS_SELECTED_PAGE);

        return '<li class="'.$class.'">'.CHtml::ajaxLink($label,$nameProyect.'/ftp/index?page='.$page,array('update'=>'#resultados')).'</li>';
    }
}