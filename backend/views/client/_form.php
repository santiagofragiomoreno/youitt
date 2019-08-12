<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Country;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>
    
    <div class="col-lg-3">
	 <?= $form->field($model, 'country_code')->widget(Select2::className(), [
				'data'      => ArrayHelper::map(Country::find()->select(['country_code','name'])->asArray(true)->orderBy('name')->all(), 'country_code', 'name'),
			    'options'   => ['placeholder' => ''],
			    'pluginOptions' => ['allowClear' => true],
			])->label(Yii::t('app', 'Country Code'))?>
	</div>
    <div class="col-lg-3">
    <?= $form->field($model, 'password')->passwordInput() ?>
     </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
