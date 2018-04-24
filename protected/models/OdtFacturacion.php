<?php

/**
 * This is the model class for table "odt_facturacion".
 *
 * The followings are the available columns in table 'odt_facturacion':
 * @property integer $id
 * @property integer $odt_fk
 * @property integer $facturacion_fk
 * @property string $criterio
 * @property integer $dividendo
 */
class OdtFacturacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OdtFacturacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'odt_facturacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, odt_fk, facturacion_fk, criterio, dividendo', 'required'),
			array('id, odt_fk, facturacion_fk, dividendo', 'numerical', 'integerOnly'=>true),
			array('criterio', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, odt_fk, facturacion_fk, criterio, dividendo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'fk_odt_fk' => array(self::BELONGS_TO, 'Odt', 'odt_fk'),
			'fk_item' => array(self::BELONGS_TO, 'InfoFacturacion', 'facturacion_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'odt_fk' => 'Odt Fk',
			'facturacion_fk' => 'Facturacion Fk',
			'criterio' => 'Criterio',
			'dividendo' => 'Dividendo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('odt_fk',$this->odt_fk);
		$criteria->compare('facturacion_fk',$this->facturacion_fk);
		$criteria->compare('criterio',$this->criterio,true);
		$criteria->compare('dividendo',$this->dividendo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}