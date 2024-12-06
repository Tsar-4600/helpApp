<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FailureCategory $model */

$this->title = 'Create Failure Category';
$this->params['breadcrumbs'][] = ['label' => 'Failure Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="failure-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
