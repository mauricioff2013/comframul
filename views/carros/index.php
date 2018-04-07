<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Carros', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'marca',
            'year',
            'model',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
