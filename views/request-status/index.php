<?php

use app\models\RequestStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RequestStatusSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Request Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_status',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RequestStatus $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_status' => $model->id_status]);
                 }
            ],
        ],
    ]); ?>


</div>
