<?php

namespace app\controllers;

use Yii;
use app\models\Permisos;
use app\models\UsuariosHasPermisos;
use app\models\UsuariosHasPermisosSearch;
use app\models\Marcaciones;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UsuariosHasPermisosController implements the CRUD actions for UsuariosHasPermisos model.
 */
class TalentoHumanoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

 

    /**
     * Lists all UsuariosHasPermisos models.
     * @return mixed
     */
    public function actionIndex()
    {    

        return $this->render('index');
    }

public function actionMarcador(){
$marcaciones = new Marcaciones();
$marcaciones = Marcaciones::find()->where(['fecha' => date('Y-m-d'),'usuario'=>Yii::$app->user->identity->usuario])->one();
return $this->render('marcar', [ 'marcaciones' => $marcaciones, ]);
}



public function actionMarcar()
    { if(isset($_POST['marcar'])){
$marcaciones = new Marcaciones();
$marcaciones = Marcaciones::find()->where(['fecha' => date('Y-m-d'),'usuario'=>Yii::$app->user->identity->usuario])->one();
//var_dump($marcaciones);
//exit();

if (isset($marcaciones)) {

//echo "<script>alert('existe no sehace nada');</script>";
}else{
    $marcaciones = new Marcaciones();
  //  echo "<script>alert('No existe se creara');</script>";
    $marcaciones->fecha=date('Y-m-d');
    $marcaciones->usuario=Yii::$app->user->identity->usuario;
    $marcaciones->Nombre=Yii::$app->user->identity->nombre;
    $marcaciones->save();

}


switch ($_POST['marcar']) {

    case '1':
if (isset($marcaciones->hora_inicio)) {
     echo "<script>alert('Ya marco la Hora de Entrada');</script>";
}else{

    $marcaciones->hora_inicio=date( 'H:i:s');
    $marcaciones->save();
    echo "<script>alert('Entrada Marcada con exito');</script>";
}
        break;
    
    case '2':
       if (isset($marcaciones->inicio_almuerzo)) {
     echo "<script>alert('Ya marco el inicio del almuerzo');</script>";
}else{

    $marcaciones->inicio_almuerzo=date( 'H:i:s');
    $marcaciones->save();
    echo "<script>alert('Inicio de almuerzo marcado con exito');</script>";
}
        break;
        case '3':
        if (isset($marcaciones->fin_almuerzo)) {
     echo "<script>alert('El final del almuerzo ya fue marcado');</script>";
}else{

    $marcaciones->fin_almuerzo=date( 'H:i:s');
    $marcaciones->save();
    echo "<script>alert('Fin de almuerzo Marcada con exito');</script>";
}
        # code...
        break;
        case '4':
        
    $marcaciones->hora_final=date( 'H:i:s');
    $marcaciones->save();
    echo "<script>alert('Salida Marcada con exito');</script>";

        # code...
        break;
    default:
echo "<script>alert('Debe seleccionar una opcion');</script>";
        break;
}



    }else{
        echo "<script>alert('Debe seleccionar una opcion');</script>";
      $marcaciones = Marcaciones::find()->where(['fecha' => date('Y-m-d'),'usuario'=>Yii::$app->user->identity->usuario])->one();
return $this->render('marcar', [ 'marcaciones' => $marcaciones, ]); 
    }

return $this->render('marcar', [
            'marcaciones' => $marcaciones,
        ]);
    
   }
    
}
