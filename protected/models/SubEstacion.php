<?php

/**
 * This is the model class for table "sub_estacion".
 *
 * The followings are the available columns in table 'sub_estacion':
 * @property integer $id
 * @property string $nombre
 * @property integer $fk_ubicacion
 *
 * The followings are the available model relations:
 * @property Equipos[] $equiposes
 * @property Ubicacion $fkUbicacion
 */
class SubEstacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubEstacion the static model class
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
		return 'sub_estacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('nombre', 'unique'),
			array('fk_ubicacion', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fk_ubicacion', 'safe', 'on'=>'search'),
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
			'equiposes' => array(self::HAS_MANY, 'Equipos', 'fk_sub_estacion'),
			'fk_ubicacion_s' => array(self::BELONGS_TO, 'Ubicacion', 'fk_ubicacion'),
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
			'fk_ubicacion' => 'Fk Ubicacion',
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
		$criteria->compare('fk_ubicacion',$this->fk_ubicacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}