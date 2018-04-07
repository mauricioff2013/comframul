<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Update Usuarios: ' . $model->idusuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusuario, 'url' => ['view', 'id' => $model->idusuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsUsuariosPermisos'=>$itemsUsuariosPermisos,
        'usuario_permisos'=>$usuario_permisos,
        'itemsPermisos'=>$itemsPermisos,
        'Objpermisos'=>$Objpermisos,
    ]) ?>

</div>
