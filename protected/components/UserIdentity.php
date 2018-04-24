<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = Usuarios::model()->find('LOWER(nickname)=? AND estado=1', array(strtolower($this->username)));
        //echo $this->username;
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if (!$user->validatePassword($this->password)) {
                //echo $user->contrasena;
                //exit();
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->_id = $user->id; //aqui todo debe loguear
                //echo Yii:app()->user->id;//id del usuario logueado
                $this->setState('nombre', $user->nombre);
                $this->setState('email', $user->email);
                $this->setState('brigada', $user->fk_brigada);
                //echo Yii:app()->user->getState('id');//id del usuario logueado

                $this->username = $user->nickname;
                $this->errorCode = self::ERROR_NONE;
            }
            return $this->errorCode == self::ERROR_NONE;
        }
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}