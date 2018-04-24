<?php

/**
 * This is the model class for table "fotos_pruebas".
 *
 * The followings are the available columns in table 'fotos_pruebas':
 * @property integer $id
 * @property string $nombre
 * @property integer $fk_pruebas
 *
 * The followings are the available model relations:
 * @property Pruebas $fkPruebas
 */
class FotosPruebas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FotosPruebas the static model class
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
		return 'fotos_pruebas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fk_pruebas', 'required'),
			array('fk_pruebas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fk_pruebas', 'safe', 'on'=>'search'),
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
			'fkPruebas' => array(self::BELONGS_TO, 'Pruebas', 'fk_pruebas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'fk_pruebas' => 'Fk Pruebas',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fk_pruebas',$this->fk_pruebas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}