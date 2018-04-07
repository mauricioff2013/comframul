<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosHasPermisos */

$this->title = 'Update Usuarios Has Permisos: ' . $model2->idpermiso_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Has Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model2->idpermiso_usuario, 'url' => ['view', 'id' => $model2->idpermiso_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-has-permisos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model2' => $model2,
        'permisos' =>$permisos,
        'items'=>$items,
    ]) ?>

</div>
