<?php

class DActiveRecord extends CActiveRecord {
	
	public static $ftp;
	
	protected static function getNuevaDbConnection(){
		if(self::$ftp !== null){
			return self::$ftp;
		}else{
			self::$ftp = Yii::app()->ftp;
			if(self::$ftp instanceOf CDbConnection){
				self::$ftp->setActive(true);
				return self::$ftp;
			}else{
				throw new CDbException(Yii::t('yii',"Active Record requires a '$ftp' CDbConnection application component."));
			}
		}
	}
}