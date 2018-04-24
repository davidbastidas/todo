<?php $this -> pageTitle = Yii::app() -> name . ' - Entrada';
$this -> breadcrumbs = array('Entrada', );
?>
<style>
.login-layout {
    background: #EEEEEE none repeat scroll 0 0;
}
.logo1{
    width: 250px;
    height: auto;
}
</style>
<div class="main-container container-fluid">
	<div class="main-content">
		<div class="row-fluid">
			<div class="span12">
				<div class="login-container">
					<div class="row-fluid">
						<div class="center">
							<img class="logo1" src="<?php echo Yii::app()->baseUrl.'/images/';?>logo_applus2.png">
							<h4 class="black">&#169; Applus</h4>
						</div>
					</div>
					<div class="space-6"></div>
					<div class="row-fluid">
						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger"><i class="icon-lock blue"></i> Ingrese su usuario </h4>
										<div class="space-6"></div>
										<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'login-form', 'enableClientValidation' => true, 'clientOptions' => array('validateOnSubmit' => true, ), )); ?>
										<fieldset>
											<label>
												<span class="block input-icon input-icon-right"> 
													<?php echo $form -> textField($model, 'username', array('class' => 'span12', 'placeholder' => 'Usuario', )); ?>
													<i class="icon-user"></i>
												</span>
											</label>
											<label>
												<span class="block input-icon input-icon-right">
													<?php echo $form -> passwordField($model, 'password', array('class' => 'span12', 'placeholder' => 'Contraseña', )); ?>
													<i class="icon-lock"></i>
												</span>
											</label>
											<div class="space"></div>
											<div class="clearfix">
												<?php echo CHtml::submitButton('Entrar', array('class' => 'width-35 pull-right btn btn-small btn-primary',)); ?>
												<i class="icon-key"></i>
												Login
											</div>
											<?php echo $form -> error($model, 'username', array('class' => 'span12',)); ?>
											<?php echo $form -> error($model, 'password', array('class' => 'span12',)); ?>
											<div class="space-4"></div>
										</fieldset>
										<?php $this -> endWidget(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

