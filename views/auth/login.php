<?php

/**
 * @var $this yii\web\View
 * @var $model webvimark\modules\UserManagement\models\forms\LoginForm
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin([
  'id'      => 'form-signin',
  'options' => ['autocomplete' => 'off'],
  'validateOnBlur' => false,
  'fieldConfig' => [
    'template' => "{input}\n{label}",
    // 'template' => "{input}",
  ],
]) ?>

<div class="text-center mb-4">
  <?= Html::img('https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg', ['class' => 'mb-4', 'alt' => '', 'width' => '72', 'height' => '72']); ?>
  <?= Html::tag('h1', Yii::$app->name, ['class' => 'h3 mb-3 font-weight-normal']) ?>
</div>

<?= $form->field($model, 'username', ['options' => ['class' => 'form-label-group']])
  ->textInput(['placeholder' => $model->getAttributeLabel('username'), 'autocomplete' => 'off']) ?>

<?= $form->field($model, 'password', ['options' => ['class' => 'form-label-group']])
  ->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'autocomplete' => 'off']) ?>

<?= (isset(Yii::$app->user->enableAutoLogin) && Yii::$app->user->enableAutoLogin) ? $form->field($model, 'rememberMe')->checkbox(['value' => true]) : '' ?>

<?= Html::submitButton(UserManagementModule::t('front', 'Login'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>

<div class="text-center mt-2 mb-4 d-flex">
  <div>
    <?= GhostHtml::a(UserManagementModule::t('front', "Registration"),  ['/user-management/auth/registration']) ?>
  </div>
  <div class="ml-auto">
    <?= GhostHtml::a(UserManagementModule::t('front', "Forgot password"), ['/user-management/auth/password-recovery']) ?>
  </div>
</div>

<?php ActiveForm::end() ?>

<?php
$css = <<<CSS
:root {
  --input-padding-x: .75rem;
  --input-padding-y: .75rem;
}
html, body {
	height: 100%;
}
body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}
#form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: 0 auto;
}
.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}
.form-label-group > input,
.form-label-group > label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: 50px;
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}
CSS;

$this->registerCss($css);
?>