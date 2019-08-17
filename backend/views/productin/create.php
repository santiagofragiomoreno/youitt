<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Productin */

$this->title = Yii::t('app', 'Create Productin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
