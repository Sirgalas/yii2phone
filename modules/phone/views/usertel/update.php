<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\phone\models\UserTel */

$this->title = 'Update User Tel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Tels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-tel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'country'=>$country,
        'dataCountry'=>$dataCountry
    ]) ?>

</div>
