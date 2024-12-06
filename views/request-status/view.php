<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RequestStatus $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Request Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-status-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_status' => $model->id_status], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_status' => $model->id_status], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_status',
            'name',
        ],
    ]) ?>

</div>
