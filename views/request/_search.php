<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RequestSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_request') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'id_status') ?>

    <?php // echo $form->field($model, 'id_department') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
