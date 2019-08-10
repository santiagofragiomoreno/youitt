<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$script = <<<JS
    //Activate iCheck
    $(document).ready(function(){
        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_square-grey',
        });
    });
JS;
$this->registerJs($script,$this::POS_END,'icheck');
hiqdev\assets\icheck\iCheckAsset::register($this);
?>
<div class="login-box">
    <div class="login-logo" style="margin-bottom: 0px;">
        <img src="/images/logo-back-white.png" alt="Logo" style="width: 200px;">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border: 1px solid #c57d00;">
        <p class="login-box-msg">Iniciar sesión en el Panel de Control</p>

        <?php $form = ActiveForm::begin([]) ?>
            <div class="form-group has-feedback">
                <?= Html::activeInput('email', $model, 'email', ['placeholder' => 'Email', 'class' => 'form-control']) ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?= Html::activeInput('password', $model, 'password', ['placeholder' => 'Contraseña', 'class' => 'form-control']) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <?= $form->field($model, 'rememberMe')->checkbox([]) ?>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-block btn-flat'])?>
                </div>
                <!-- /.col -->
            </div>
        <?php ActiveForm::end() ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->