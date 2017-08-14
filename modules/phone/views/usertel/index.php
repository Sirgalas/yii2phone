<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use \yii\widgets\MaskedInput;
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

            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'nameLastName',
                'editableOptions'=> function ($model, $key, $index) {
                    return [
                        'header'=>'Name Last Name Family',
                        'size'=>'md',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ];
                }
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'country',
                'filterType' => GridView::FILTER_SELECT2,
                'filter'     => $country,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'value'=>function($model){
                    return $model->countrys->name;
                },
                'editableOptions'=> function ($model, $key, $index) use ($country) {
                    return [
                        'header'=>'Country',
                        'data'=>$country,
                        'size'=>'md',
                        'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    ];
                }
            ],

            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'tel',
                'editableOptions'=> function ($model, $key, $index) {
                    return [
                        'header'=>'Telephone',
                        'size'=>'md',
                        'inputType'=>\kartik\editable\Editable::INPUT_WIDGET,
                        'widgetClass' => MaskedInput::className(),
                        'options' => [
                            'class'=>'form-control',
                            'mask' => '+9 (999) 999-99-99',
                        ],
                    ];
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'],
        ],
    ]); ?>
</div>
