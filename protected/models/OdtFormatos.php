<?php

/**
 * This is the model class for table "odt_formatos".
 *
 * The followings are the available columns in table 'odt_formatos':
 * @property integer $id
 * @property string $nombre
 * @property string $json
 * @property string $fk_odt
 * @property string $categoria
 *
 * The followings are the available model relations:
 * @property Odt $fkOdt
 */
class OdtFormatos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OdtFormatos the static model class
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
		return 'odt_formatos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, json, fk_odt, categoria', 'required'),
			array('nombre', 'length', 'max'=>150),
			array('fk_odt', 'length', 'max'=>20),
			array('categoria', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, json, fk_odt, categoria', 'safe', 'on'=>'search'),
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
			'fkOdt' => array(self::BELONGS_TO, 'Odt', 'fk_odt'),
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
			'json' => 'Json',
			'fk_odt' => 'Fk Odt',
			'categoria' => 'Categoria',
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
		$criteria->compare('json',$this->json,true);
		$criteria->compare('fk_odt',$this->fk_odt,true);
		$criteria->compare('categoria',$this->categoria,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}