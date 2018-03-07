<?php

/**
 * This is the model class for table "equipos".
 *
 * The followings are the available columns in table 'equipos':
 * @property integer $id
 * @property integer $fk_sub_estacion
 * @property string $capacidad
 * @property string $serie
 * @property string $observaciones
 * @property integer $devanados
 * @property integer $fk_categoria
 * @property string $datosjson
 * @property string $datosfotos
 *
 * The followings are the available model relations:
 * @property CategoriaEquipo $fkCategoria
 * @property SubEstacion $fkSubEstacion
 * @property Pruebas[] $pruebases
 */
class Equipos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Equipos the static model class
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
		return 'equipos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_sub_estacion, serie, fk_categoria', 'required'),
			array('fk_sub_estacion, devanados, fk_categoria', 'numerical', 'integerOnly'=>true),
			array('capacidad', 'length', 'max'=>45),
			array('serie', 'length', 'max'=>100),
			array('serie', 'unique'),
			array('observaciones, datosjson', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fk_sub_estacion, capacidad, serie, observaciones, devanados, fk_categoria, datosjson', 'safe', 'on'=>'search'),
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
			'fk_categoria_e' => array(self::BELONGS_TO, 'CategoriaEquipo', 'fk_categoria'),
			'fk_subestacion_e' => array(self::BELONGS_TO, 'SubEstacion', 'fk_sub_estacion'),
			'pruebases' => array(self::HAS_MANY, 'Pruebas', 'fk_equipos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fk_sub_estacion' => 'Fk Sub Estacion',
			'capacidad' => 'Capacidad',
			'serie' => 'Serie',
			'observaciones' => 'Observaciones',
			'devanados' => 'Devanados',
			'fk_categoria' => 'Fk Categoria',
			'datosjson' => 'Datosjson',
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
		$criteria->compare('fk_sub_estacion',$this->fk_sub_estacion);
		$criteria->compare('capacidad',$this->capacidad,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('devanados',$this->devanados);
		$criteria->compare('fk_categoria',$this->fk_categoria);
		$criteria->compare('datosjson',$this->datosjson,true);
		$criteria->compare('datosfotos',$this->datosfotos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}