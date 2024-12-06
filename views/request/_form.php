<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id_category')->dropDownList([
        1 =>  "Поломка запчасти (Явно видно неиспрваность обрудования в его запчасти)",
        2 => 'Причинна неисправнности (Непонятно, что вызвало неисправность оборудования, требуется диагностика)',
        3 => 'Обновление (Срок запчасти истек, необходима обновление запчасти или самого оборудования'
        // Add more statuses as needed
    ], ['prompt' => 'Выберите вид работы для техподдержки']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

  
    <?= $form->field($model, 'id_department')->dropDownList([
        1 =>  "Первый отдел",
        2 => 'Второй отдел',
        3 =>'Третий отдел',
        // Add more statuses as needed
    ], ['prompt' => 'Выберите отедл, в котором работаете']) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать заявку', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
