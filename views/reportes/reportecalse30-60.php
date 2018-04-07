<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Reportes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reportes-form">
<h1>Generar Reporte de Calse 30/60</h1>
    <form action="../generar/1" method="get">
    	<?php 

echo '<label class="control-label">Fecha Inicial</label>';
echo DatePicker::widget([
	'language' => 'es',
    'name' => 'fechainicial',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'value' => date("Y/m/d"),
    'pluginOptions' => [
        'autoclose'=>true,

        'format' => 'yyyy-m-dd'
    ]
]);

echo '<label class="control-label">Fecha Final</label>';
echo DatePicker::widget([
	'language' => 'es',
    'name' => 'fechafinal',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'value' => date("Y/m/d"),
    'pluginOptions' => [
        'autoclose'=>true,

        'format' => 'yyyy-m-dd'
    ]
]);
    	

    	?>

<button type="submit" class="btn btn-primary">Generar Reporte</button>

    </form>

</div>
