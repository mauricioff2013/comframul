<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Carros */

$this->title = 'Create Carros';
$this->params['breadcrumbs'][] = ['label' => 'Carros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
