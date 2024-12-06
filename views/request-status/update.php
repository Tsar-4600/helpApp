<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RequestStatus $model */

$this->title = 'Update Request Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Request Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_status' => $model->id_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
