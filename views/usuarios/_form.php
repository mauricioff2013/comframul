<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UsuariosHasPermisos;
/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php $items = array();
//var_dump($itemsUsuariosPermisos);
//var_dump(ArrayHelper::map($itemsPermisos,'idpermiso','descripcion'));

 $form = ActiveForm::begin(); 



foreach((Yii::$app->db->createCommand('SELECT * FROM menu')->queryAll()) as $menu){
    
foreach((Yii::$app->db->createCommand('select * from permisos
where idmenu='.$menu['idmenu'])->queryAll()) as $permisos){
echo "<br>";
    echo "<h3>".$menu['descripcion']."</h3>";
    ?>
   
<div class="form-check form-check-inline">
  <label class="form-check-label">
   



<?php if (  UsuariosHasPermisos::find()->where(['idpermiso'=>$permisos['idpermiso'],'idusuario'=>$model->id])->count()){ ?>
    <input class="form-check-input" checked name="permisos"    type="checkbox" id=<?php echo $permisos['idpermiso'];?> value=<?php echo $permisos['idpermiso'];?>> <?php echo $permisos['descripcion'];?></label>
    <?php }else{?>
    <input class="form-check-input"     type="checkbox" name="permisos" id=<?php echo $permisos['idpermiso'];?> value=<?php echo $permisos['idpermiso'];?>> <?php echo $permisos['descripcion'];?></label>
<?php } ?>

</div>


<?php }

}

?>
 <button id="btnMiBotonsito">Click me</button> 










<script >
$(document).ready(function () {

    $("#btnMiBotonsito").click(function() {
    var lista=[];
    
    $("input[name=permisos]").each(function (index) {  
       if($(this).is(':checked')){

         lista.push($(this).val()); 
      // alert($(this).val());
       }
    })
    $.ajax({ 
        type: "POST",
        url: "http://localhost/comframul/web/usuarios/guardarp/"+<?php echo $model->id; ?>,
        data: {collection : lista  },
        cache: false,
        success: function(response)
        {
            console.log(response);
            alert('success');
            window.location = 'http://localhost/comframul/web/usuarios/update/'+<?php echo $model->id; ?>;
        }
    });
});
});




   


</script>




</div>
