<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use app\models\Permisos;
use app\models\UsuariosSearch;
use app\models\UsuariosHasPermisos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
{
    /**
     * @inheritdoc
     */
    

/**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionGuardarp($id)
    {

 $model=new UsuariosHasPermisos();
Yii::$app
    ->db
    ->createCommand()
    ->delete('UsuariosHasPermisos', ['idusuario' => $id])
    ->execute();

if($_POST)
    {
    foreach ($_POST as $item)
      {foreach ($item as $k) {
         $usario_permisos=new UsuariosHasPermisos();
            $usario_permisos->idpermiso=$k;
            $usario_permisos->idusuario=$id;
            $usario_permisos->save();
        # code...
      }
            
        
        }
    }



        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);




        return $this->render('guardarp', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {


        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuarios();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idusuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $usario_permisos=new UsuariosHasPermisos();
            $usario_permisos->idpermiso=1;
            $usario_permisos->idusuario=1;
            $usario_permisos->save();



            return $this->redirect(['view', 'id' => $model->idusuario]);
        } else {


             $usuario_permisos = new UsuariosHasPermisos();
            $itemsUsuariosPermisos=ArrayHelper::map(UsuariosHasPermisos::find()->where(['idusuario' => $id])->all(),'idpermiso','idusuario');

            $Objpermisos = new Permisos();
            $itemsPermisos=ArrayHelper::map(Permisos::find()->all(),'idpermiso','descripcion');
           
            return $this->render('update', [
                'model' => $model,
                'usuario_permisos'=>$usuario_permisos,
                'itemsUsuariosPermisos'=>$itemsUsuariosPermisos,
                'Objpermisos'=>$Objpermisos,
                'itemsPermisos'=>$itemsPermisos,
            ]);
        }
    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
