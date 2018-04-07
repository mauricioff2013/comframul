<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosHasPermisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Has Permisos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-has-permisos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuarios Has Permisos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpermiso_usuario',
            'idpermiso',
            'idusuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
