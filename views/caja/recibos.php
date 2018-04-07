<?php
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Buscar Recibo</h1>

<?php $form = ActiveForm::begin(); ?>
<?= Html::textInput('nrecibo','',array('class'=>'form-control' )) ?>

<?= Html::a('Submit', ['caja/recibos'], [
        'data' => [
            'method' => 'post',
            'params' => [
                'action' => 'createNew'
            ]
        ]
    ])?>

 <?php ActiveForm::end(); ?>
