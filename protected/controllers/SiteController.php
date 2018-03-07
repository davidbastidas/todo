<?php

class SiteController extends Controller {

	/**
	 * Declares class-based actions.
	 */
	public $layout = '//layouts/column1';
	public function actions() {
		return array(
		// captcha action renders the CAPTCHA image displayed on the contact page
		'captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF, ),
		// page action renders "static" pages stored under 'protected/views/site/pages'
		// They can be accessed via: index.php?r=site/page&view=FileName
		'page' => array('class' => 'CViewAction', ), );
	}

	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		if (Yii::app() -> user -> id > 0) {
			if (Yii::app()->authManager->checkAccess('rol_administrador', Yii::app()->user->id)) {
				$pruebas=Pruebas::model()->findAll("fk_estado!=5 AND fk_usuario>0 ORDER BY fecha DESC LIMIT 10");
			}else if (Yii::app()->authManager->checkAccess('rol_digitador', Yii::app()->user->id)) {
				$pruebas=Pruebas::model()->findAll("fk_estado!=5 AND fk_usuario>0 ORDER BY fecha DESC LIMIT 10");
			}else if (Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {
				$pruebas=Pruebas::model()->findAll("fk_estado!=5 AND fk_usuario>0 ORDER BY fecha DESC LIMIT 10");
			}else if (Yii::app()->authManager->checkAccess('rol_analista_odt', Yii::app()->user->id)) {
				$pruebas=Pruebas::model()->findAll("fk_estado!=5 AND fk_usuario>0 ORDER BY fecha DESC LIMIT 10");
			}

			if (Yii::app()->authManager->checkAccess('rol_analista_odt', Yii::app()->user->id)) {
				$this->redirect(array('odt/index'));
			}else if (Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)) {
				$this->redirect(array('odt/brigada'));
			}else{
				$this -> render('index',array('pruebas'=>$pruebas));
			}
		} else {
			$this -> redirect(array('login'));
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app() -> errorHandler -> error) {
			if (Yii::app() -> request -> isAjaxRequest)
				echo $error['message'];
			else
				$this -> render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model -> attributes = $_POST['ContactForm'];
			if ($model -> validate()) {
				$headers = "From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app() -> params['adminEmail'], $model -> subject, $model -> body, $headers);
				Yii::app() -> user -> setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this -> refresh();
			}
		}
		$this -> render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		if (Yii::app()->user->id=='') {
			$model = new LoginForm;

			// if it is ajax validation request
			if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
				echo CActiveForm::validate($model);
				Yii::app() -> end();
			}

			// collect user input data
			if (isset($_POST['LoginForm'])) {
				$model -> attributes = $_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if ($model -> validate() && $model -> login())
					$this -> redirect(Yii::app() -> user -> returnUrl);
			}
			// display the login form
			$this -> render('login', array('model' => $model));
		}else{
			$this -> redirect(array('index'));
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app() -> user -> logout();
		$this -> redirect(Yii::app() -> homeUrl);
	}
}
