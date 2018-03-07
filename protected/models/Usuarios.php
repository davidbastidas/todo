<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $nickname
 * @property string $nombre
 * @property integer $fk_tipo
 * @property string $contrasena
 * @property string $sesion
 * @property string $email
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Pruebas[] $pruebases
 * @property TipoUsuario $fkTipo
 */
class Usuarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
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
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nickname, nombre, fk_tipo, contrasena, email, estado', 'required'),
			array('fk_tipo, estado', 'numerical', 'integerOnly'=>true),
			array('nickname, nombre, contrasena, sesion, email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nickname, nombre, fk_tipo, contrasena, sesion, email, estado', 'safe', 'on'=>'search'),
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
			'pruebases' => array(self::HAS_MANY, 'Pruebas', 'fk_usuario'),
			'fk_tipo_u' => array(self::BELONGS_TO, 'TipoUsuario', 'fk_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nickname' => 'Nickname',
			'nombre' => 'Nombre',
			'fk_tipo' => 'Fk Tipo',
			'contrasena' => 'Contrasena',
			'sesion' => 'Sesion',
			'email' => 'Email',
			'estado' => 'Estado',
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
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fk_tipo',$this->fk_tipo);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('sesion',$this->sesion,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('estado',$this->estado);
		$criteria->addCondition('id!=1');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function validatePassword($password) {
        return $this->hashPassword($password, $this->sesion) === $this->contrasena;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    /**
     * Generates a salt that can be used to generate a password hash.
     * @return string the salt
     */
    public function generateSalt() {
        return uniqid('', true);
    }
}