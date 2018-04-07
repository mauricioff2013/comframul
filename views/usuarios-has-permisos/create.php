<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsuariosHasPermisos */

$this->title = 'Create Usuarios Has Permisos';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Has Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-has-permisos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model2' => $model2,
        'permisos' =>$permisos,
        'items'=>$items,
    ]) ?>

</div>
