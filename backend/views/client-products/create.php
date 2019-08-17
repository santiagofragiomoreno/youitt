<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClientProducts */

$this->title = Yii::t('app', 'Create Client Products');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Client Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
