<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните поля для регистрации в системе:</p>

    <div class="row">
        <div class="col-lg-5">
            
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'login')->textInput()?>

            <?= $form->field($model, 'telephone')->widget(MaskedInput::className(),['mask' => '+7(999)-999-99-99'] )->textInput(['placeholder' => '+7(999)-999-99-99', 'class' =>'']);?>
            <?= $form->field($model, 'SNP')->textInput()?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'passwordConfirm')->passwordInput() ?>
            <?= $form->field($model, 'agree')->checkbox(); ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Зарегестрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div style="color:#999;">
                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                To modify the username/password, please check out the code <code>app\models\User::$users</code>.
            </div>

        </div>
    </div>
</div>
