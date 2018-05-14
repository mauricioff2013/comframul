<?php
/* @var $this yii\web\View */


use fedemotta\datatables\DataTables;
use yii\grid\GridView
?>
<h1>Fechas de Pago</h1>



<?= DataTables::widget([


    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    
'clientOptions' => [
    "lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
    "info"=>false,
    "responsive"=>true, 
    "dom"=> 'lfTrtip',
    "tableTools"=>[
        "aButtons"=> [  
            /*[
            "sExtends"=> "copy",
            "sButtonText"=> Yii::t('app',"Copy to clipboard")
            ],

            [
            "sExtends"=> "print",
            "sButtonText"=> Yii::t('app',"Print")
            ],

            */
            [
            "sExtends"=> "csv",
            "sButtonText"=> Yii::t('app',"Save to CSV")
            ],[
            "sExtends"=> "xls",
            "oSelectorOpts"=> ["page"=> 'current']
            ],[
            "sExtends"=> "pdf",
            "sButtonText"=> Yii::t('app',"Save to PDF")
            ],

        ]
    ]
],

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'Codigo','Cuenta','Nombre','Telefono1','Telefono2','Correo','FechaPago','Saldo',
        ['class' => 'yii\grid\ActionColumn'],
    ],



]);?>
