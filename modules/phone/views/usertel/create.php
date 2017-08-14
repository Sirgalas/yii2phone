<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\phone\models\UserTel */

$this->title = 'Create User Tel';
$this->params['breadcrumbs'][] = ['label' => 'User Tels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'country'=>$country
    ]) ?>

</div>
