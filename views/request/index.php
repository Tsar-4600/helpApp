<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(Yii::$app->user->identity->id_role == 1): ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_request',
            'id_user',
            [
                'attribute'=> 'ФИО',
                'value' => function($model)
                {
                        return $model->user->SNP;
                }
            ],
           
            'id_category',
            'description:ntext',
            [
                'attribute'=> 'id_status',
                'value' => function($model)
                {
                        return $model->status->name;
                }
            ],
            //'id_department',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_request' => $model->id_request]);
                 }
            ],
            [
            
            'class' => ActionColumn::className(),
            'template' => '{cancel} {confirm} {inprogress}', // Убедитесь, что имена кнопок правильные
            'buttons' => [
                'cancel' => function($url, $model) {
                    if ($model->id_status == 1 || $model->id_status == 2) {
                        return Html::a('Отменить', [
                            'cancel',
                            'id' => $model->id_request
                            
                        ],
                        [
                            'class' => 'btn btn-danger'
                        ]
                        );
                    }
                },
                'confirm' => function($url, $model) {
                    if ($model->id_status == 1 || $model->id_status == 2) { // Замените условие, если нужно
                        return Html::a('Подтвердить', [
                            'confirm',
                            'id' => $model->id_request
                            

                        ],
                        [
                            'class' => 'btn btn-success'
                        ]
                        );
                    }
                    
                },
                'inprogress' => function($url, $model){
                    if ($model->id_status == 1) { // Замените условие, если нужно
                        return Html::a('Начать обработку', [
                            'inprogress',
                            'id' => $model->id_request
                            

                        ],
                        [
                            'class' => 'btn btn-warning'
                        ]
                        );
                    }
                }
            ],
            
        ]
        ],
    ]); ?>
    <?php else: ?>
    <?= 
        GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_request',
            'id_category',
            'description:ntext',
            [
                'attribute' => 'id_status',
                'value' => function($model){
                    return $model->status->name;
                }
            ],
            //'id_department',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_request' => $model->id_request]);
                    }
            ],
        ],
        ]); 
    ?>
    <?php endif;?>
</div>
