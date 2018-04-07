<?php
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Marcador</h1>
<div class="reportes-form">
<?php $form = ActiveForm::begin(); ?>
<?= HTML::radio('marcar', false, ['label' => 'Entrada', 'id' => 'marcar','value'=>1 ]); ?>
<br>
<?= HTML::radio('marcar', false, ['label' => 'Inicio Almuerzo', 'id' => 'marcar','value'=>2,'required']); ?>
<br>
<?= HTML::radio('marcar', false, ['label' => 'Finalizar Almuerzo', 'id' => 'marcar','value'=>3,'required']); ?>
<br>
<?= HTML::radio('marcar', false, ['label' => 'Salida', 'id' => '`marcar','value'=>4],'required'); ?>


<div class="form-group">
<?= Html::a('Marcar', ['talento-humano/marcar'], [
        'class'=>'btn btn-primary',

        'data' => [
        	'method' => 'post',
            'params' => [
                'action' => 'marcar'
                
            ]
        ]
    ])?>
</div>
 <?php ActiveForm::end(); ?>

</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th><h1>Marcaciones del dia: <?=date('Y-m-d');?></h1></th>
         
        </tr>
        <tr>
            <th>Tipo</th>
            <th>Hora</th>
        </tr>
    </thead>
    <tbody>
<?php if(isset($marcaciones)){?>
    	<td>Entrada</td>
            <td><?=$marcaciones->hora_inicio;?></td>
        <tr>
            <td>Inicio Almuerzo</td>
            <td><?=$marcaciones->inicio_almuerzo;?></td>
        </tr>
        <tr>
            <td>Fin Almuerzo</td>
            <td><?=$marcaciones->fin_almuerzo;?></td>
        </tr>
        <tr>
            <td>Salida</td>
            <td><?=$marcaciones->hora_final;?></td>
        </tr>
       
    </tbody>
<?php }?>
</table>
