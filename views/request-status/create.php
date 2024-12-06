<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RequestStatus $model */

$this->title = 'Create Request Status';
$this->params['breadcrumbs'][] = ['label' => 'Request Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
