<?php

/**
 * This is the model class for table "pruebas_aceite".
 *
 * The followings are the available columns in table 'pruebas_aceite':
 * @property integer $id
 * @property integer $fk_equipo
 * @property string $fecha
 * @property string $hora
 * @property integer $fk_usuario
 * @property string $datos
 * @property integer $fk_tipo
 *
 * The followings are the available model relations:
 * @property Equipos $fkEquipo
 * @property Usuarios $fkUsuario
 * @property TipoPruebasAceite $fkTipo
 */
class PruebasAceite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PruebasAceite the static model class
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
		return 'pruebas_aceite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_equipo, fecha, hora, fk_usuario, fk_tipo', 'required'),
			array('fk_equipo, fk_usuario, fk_tipo', 'numerical', 'integerOnly'=>true),
			array('datos', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fk_equipo, fecha, hora, fk_usuario, datos, fk_tipo', 'safe', 'on'=>'search'),
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
			'fk_equipo_a' => array(self::BELONGS_TO, 'Equipos', 'fk_equipo'),
			'fk_usuario_a' => array(self::BELONGS_TO, 'Usuarios', 'fk_usuario'),
			'fk_tipo_a' => array(self::BELONGS_TO, 'TipoPruebasAceite', 'fk_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fk_equipo' => 'Fk Equipo',
			'fecha' => 'Fecha',
			'hora' => 'Hora',
			'fk_usuario' => 'Fk Usuario',
			'datos' => 'Datos',
			'fk_tipo' => 'Fk Tipo',
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
		$criteria->compare('fk_equipo',$this->fk_equipo);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('fk_usuario',$this->fk_usuario);
		$criteria->compare('datos',$this->datos,true);
		$criteria->compare('fk_tipo',$this->fk_tipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}