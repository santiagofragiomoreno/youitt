<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Productin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pantry_clients_id')->textInput() ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'productos_codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productos_peso_producto')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
