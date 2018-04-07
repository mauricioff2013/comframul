<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\UsuariosHasPermisos */
/* @var $permisos app\models\Permisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-has-permisos-form">

    <?php $form = ActiveForm::begin(); ?>



 <?= $form->field($model2, 'idpermiso')->dropDownList($items) ?>



    <?//= $form->field($model2, 'idpermiso')->textInput() ?>

    <?= $form->field($model2, 'idusuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model2->isNewRecord ? 'Create' : 'Update', ['class' => $model2->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
