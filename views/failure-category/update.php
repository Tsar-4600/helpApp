<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FailureCategory $model */

$this->title = 'Update Failure Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Failure Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_category' => $model->id_category]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="failure-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
