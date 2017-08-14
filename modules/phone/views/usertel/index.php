<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\phone\models\UserTelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Tels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Tel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nameLastName',
            'country',
            'tel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
