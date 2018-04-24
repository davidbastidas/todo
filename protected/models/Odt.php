<?php

/**
 * This is the model class for table "odt".
 *
 * The followings are the available columns in table 'odt':
 * @property string $id
 * @property string $empresa
 * @property string $numero
 * @property string $consignacion
 * @property string $tipo_trabajo
 * @property string $trazabilidad
 * @property string $tipo_mantenimiento
 * @property string $categoria
 * @property string $fecha
 * @property string $hora_prevista_inicio
 * @property string $hora_prevista_fin
 * @property string $fecha_zona_protegida
 * @property string $fecha_zona_trabajo
 * @property string $firma_zona_protegida
 * @property string $firma_zona_trabajo
 * @property string $jefe_zona_protegida
 * @property string $jefe_zona_trabajo
 * @property string $firma_jefe_zp
 * @property string $firma_jefe_zt
 * @property integer $fk_equipo
 * @property string $bahia_ln
 * @property string $lugar_trabajo
 * @property integer $estado
 * @property string $brigada_json
 * @property integer $fk_usuario_brigada
 * @property integer $fk_usuario_analista
 *
 * The followings are the available model relations:
 * @property Usuarios $fkUsuarioAnalista
 * @property Equipos $fkEquipo
 * @property Usuarios $fkUsuarioBrigada
 */
class Odt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Odt the static model class
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
		return 'odt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brigada_json, fk_usuario_brigada, fk_usuario_analista, fk_brigada', 'required'),
			array('fk_equipo, estado, fk_usuario_brigada, fk_usuario_analista', 'numerical', 'integerOnly'=>true),
			array('empresa, numero, consignacion, tipo_trabajo, trazabilidad, tipo_mantenimiento, categoria, firma_zona_protegida, firma_zona_trabajo, firma_jefe_zp, firma_jefe_zt, bahia_ln, lugar_trabajo', 'length', 'max'=>150),
			array('fecha, hora_prevista_inicio, hora_prevista_fin, fecha_zona_protegida, fecha_zona_trabajo, jefe_zona_protegida, jefe_zona_trabajo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, empresa, numero, consignacion, tipo_trabajo, trazabilidad, tipo_mantenimiento, categoria, fecha, hora_prevista_inicio, hora_prevista_fin, fecha_zona_protegida, fecha_zona_trabajo, firma_zona_protegida, firma_zona_trabajo, jefe_zona_protegida, jefe_zona_trabajo, firma_jefe_zp, firma_jefe_zt, fk_equipo, bahia_ln, lugar_trabajo, estado, brigada_json, fk_usuario_brigada, fk_usuario_analista, fk_brigada', 'safe', 'on'=>'search'),
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
			'fk_brigada_fk' => array(self::BELONGS_TO, 'Brigadas', 'fk_brigada'),
			'fk_usuario_fk' => array(self::BELONGS_TO, 'Usuarios', 'fk_usuario_analista'),
			'fk_equipo_fk' => array(self::BELONGS_TO, 'Equipos', 'fk_equipo'),
			'fk_usuario_brigada_fk' => array(self::BELONGS_TO, 'Usuarios', 'fk_usuario_brigada'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'empresa' => 'Empresa',
			'numero' => 'Numero',
			'consignacion' => 'Consignacion',
			'tipo_trabajo' => 'Tipo Trabajo',
			'trazabilidad' => 'Trazabilidad',
			'tipo_mantenimiento' => 'Tipo Mantenimiento',
			'categoria' => 'Categoria',
			'fecha' => 'Fecha',
			'hora_prevista_inicio' => 'Hora Prevista Inicio',
			'hora_prevista_fin' => 'Hora Prevista Fin',
			'fecha_zona_protegida' => 'Fecha Zona Protegida',
			'fecha_zona_trabajo' => 'Fecha Zona Trabajo',
			'firma_zona_protegida' => 'Firma Zona Protegida',
			'firma_zona_trabajo' => 'Firma Zona Trabajo',
			'jefe_zona_protegida' => 'Jefe Zona Protegida',
			'jefe_zona_trabajo' => 'Jefe Zona Trabajo',
			'firma_jefe_zp' => 'Firma Jefe Zp',
			'firma_jefe_zt' => 'Firma Jefe Zt',
			'fk_equipo' => 'Fk Equipo',
			'bahia_ln' => 'Bahia Ln',
			'lugar_trabajo' => 'Lugar Trabajo',
			'estado' => 'Estado',
			'brigada_json' => 'Brigada Json',
			'fk_usuario_brigada' => 'Fk Usuario Brigada',
			'fk_usuario_analista' => 'Fk Usuario Analista',
			'fk_brigada' => 'Brigada',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('consignacion',$this->consignacion,true);
		$criteria->compare('tipo_trabajo',$this->tipo_trabajo,true);
		$criteria->compare('trazabilidad',$this->trazabilidad,true);
		$criteria->compare('tipo_mantenimiento',$this->tipo_mantenimiento,true);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora_prevista_inicio',$this->hora_prevista_inicio,true);
		$criteria->compare('hora_prevista_fin',$this->hora_prevista_fin,true);
		$criteria->compare('fecha_zona_protegida',$this->fecha_zona_protegida,true);
		$criteria->compare('fecha_zona_trabajo',$this->fecha_zona_trabajo,true);
		$criteria->compare('firma_zona_protegida',$this->firma_zona_protegida,true);
		$criteria->compare('firma_zona_trabajo',$this->firma_zona_trabajo,true);
		$criteria->compare('jefe_zona_protegida',$this->jefe_zona_protegida,true);
		$criteria->compare('jefe_zona_trabajo',$this->jefe_zona_trabajo,true);
		$criteria->compare('firma_jefe_zp',$this->firma_jefe_zp,true);
		$criteria->compare('firma_jefe_zt',$this->firma_jefe_zt,true);
		$criteria->compare('fk_equipo',$this->fk_equipo);
		$criteria->compare('bahia_ln',$this->bahia_ln,true);
		$criteria->compare('lugar_trabajo',$this->lugar_trabajo,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('brigada_json',$this->brigada_json,true);
		$criteria->compare('fk_usuario_brigada',$this->fk_usuario_brigada);
		$criteria->compare('fk_usuario_analista',$this->fk_usuario_analista);
		$criteria->compare('fk_brigada',$this->fk_brigada);
		$criteria->compare('json',$this->json,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}