<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Permisos */

$this->title = 'Update Permisos: ' . $model->idpermiso;
$this->params['breadcrumbs'][] = ['label' => 'Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpermiso, 'url' => ['view', 'id' => $model->idpermiso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="permisos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
