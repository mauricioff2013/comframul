<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Create Menu';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php 
$idmenu=2;
$descripcion='Creditos';
echo Html::a( "Reporte de menu", 
                    Url::toRoute(['reportico/mode/execute',
                    	  'target_format' => "csv",
                        'project_password' => 'Asdf1234',
                        'project' => 'comframul',
                        'idmenu'=>$idmenu,
                        'descripcion'=>$descripcion, 
                        'report' => 'menu.xml']),
                        array("target" => "_blank"))."<br>";
echo Html::a( "Reporte de usuarios", 
                    Url::toRoute(['reportico/mode/execute',
                          'target_format' => "csv",
                        'project_password' => 'Asdf1234',
                        'project' => 'comframul',
                        'nombre'=>'%a%',
                        'report' => 'usuarios.xml']),
                        array("target" => "_blank"));
            


?>

